<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\HomeModel;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Library\Encryption;
use ZipArchive;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\URL;
//use Mail;
use PDF;
use Illuminate\Support\Facades\Hash;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;
use App\Notifications\allNotification;
use App\Models\ToolkitDetails;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Event;
date_default_timezone_set("Asia/Kolkata");
class HomeController extends BaseController

{

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct(HomeModel $HomeModel, Encryption $Encryption) {

        $this->HomeModel = $HomeModel;	

        $this->Encryption = $Encryption;	

    }

    public function home(Request $request){
        if(!empty(Session::get('member_id'))){
            $today = now()->format('l, j F Y');
            $getuser=User::where('userid',Session::get('member_id'))->first();
            $CheckinTime=DB::table('emp_attendance')->where('userid',Session::get('member_id'))->where('date', '=', now()->format('Y-m-d'))->first();
            //dd($get_today_attendence);
            if($CheckinTime && $CheckinTime->checkin_time != null){
                $get_today_attendance = Carbon::parse($CheckinTime->checkin_time)->format('h:i A');
            }else{
                $get_today_attendance = '00:00';
            }
            
            if($CheckinTime && $CheckinTime->checkout_time !=null){
                $get_today_acheckout = Carbon::parse($CheckinTime->checkout_time)->format('h:i A');
            }else{
                $get_today_acheckout ='00:00';
            }
            $td = Carbon::today()->toDateString();

            $usersWithBirthdayToday =  DB::table('emp_details')
            ->whereMonth('emp_details.dob', '=', Carbon::today()->month)
            ->whereDay('emp_details.dob', '=', Carbon::today()->day)
            ->leftJoin('users', 'users.userid', '=', 'emp_details.userid')
            ->get();

            $get_leave_details = DB::table('emp_leave_req')
            ->leftJoin('users', 'users.userid', '=', 'emp_leave_req.userid')
            ->where('emp_leave_req.status','A')
            //->whereBetween(DB::raw('DATE(emp_leave_req.created_at)'), [Carbon::today()->startOfDay(), Carbon::today()->endOfMonth()])
            ->whereBetween(DB::raw('DATE(emp_leave_req.created_at)'), [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()])
            ->orderBy('emp_leave_req.id', 'desc')
            ->get();
        
//dd($get_leave_details);
            
            if(!empty($usersWithBirthdayToday)){
                $bday=$usersWithBirthdayToday;
            }else{
                $bday = '0';
            }
            //dd($bday);
            $all_locations=DB::table('office_locations')->where('updated_at',null)->select('officelat','officelng','threshold')->get();
            if(!empty($all_locations)){
                $all_location=$all_locations;
            }else{
                $all_location = '0';
            }
           // dd($all_location);

            $check_announcement=DB::table('announcement')->where('deleted_at',null)->orderBy('id', 'desc')->get();

            
            if($request->ajax()) {
                //  $data = Event::whereDate('start', '>=', $request->start)
                //            ->whereDate('end',   '<=', $request->end)
                //            ->get(['id', 'title', 'start', 'end','time']);

                $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get([
                    'id', 
                    DB::raw("CASE 
                                    WHEN time IS NOT NULL THEN CONCAT(title, '-', time) 
                                    ELSE title 
                            END AS title"),
                    'start', 
                    'end',
                    'time'
                ]);

                return response()->json($data);
            }

            return view('frontend/employee-dashboard',compact('getuser','today','get_today_attendance','get_today_acheckout','bday','check_announcement','all_location','get_leave_details'));

        }else{
            return view('frontend/login');
        }
    }
    public function MyProfile(){
        if(!empty(Session::get('member_id'))){
    	    $getuser=User::where('userid',Session::get('member_id'))->first();
            $get_emp_details= DB::table('emp_details')->where('userid',Session::get('member_id'))->first();
            $get_emp_emargency_contact = DB::table('emp_emargency_contact')->where('userid',Session::get('member_id'))->first();
            $get_emp_bank_details = DB::table('emp_bank_info')->where('userid',Session::get('member_id'))->first();
            //dd($get_emp_emargency_contact);

            $get_assigned_emp_manager_teamlead = DB::table('users')->where('userid',Session::get('member_id'))->where('manager_id','!=',null)
            ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
            ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
            ->select('manager.name as managername','team_lead.name as teamleadname')
            ->first();


		    return view('frontend/profile',compact('getuser','get_emp_details','get_emp_emargency_contact','get_emp_bank_details','get_assigned_emp_manager_teamlead'));
        }else{
	        return view('frontend/page_not_found');
	    }
        //return view('frontend/profile');
	}
    public static function userinfo(){
		if(!empty(Session::get('member_id'))){
			$profile_info=DB::table('users')->where('userid', Session::get('member_id'))->first();
		}else{
			$profile_info='';
		}
		return $profile_info;
	}

    public function GetProfileDetails(Request $request){
        if(!empty(Session::get('member_id'))){
            $userid=Session::get('member_id');
            $empdetails = DB::table('users')->where('users.userid',$userid)->leftJoin('emp_details', 'emp_details.userid', '=', 'users.userid')->first();
            return response()->json(['success' => true, 'empdetails' => $empdetails]);
        }else{
            return response()->json(['success' => false, 'message' => 'Somthing went wrong']);
        }
        
    }

    public function GetEmargencyDetails(Request $request){
        if(!empty(Session::get('member_id'))){
            $userid=Session::get('member_id');
            $empdetails = DB::table('users')->where('users.userid',$userid)->leftJoin('emp_emargency_contact', 'emp_emargency_contact.userid', '=', 'users.userid')->first();
            return response()->json(['success' => true, 'emp_emargency_contact' => $empdetails]);
        }else{
            return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
        }
        
    }
    

    public function EditEmargencyDetails(Request $request) {
        if (!empty(Session::get('member_id'))) {
            $alldata = $request->all();
            $userid = Session::get('member_id');
            $check_emp_details = DB::table('emp_emargency_contact')->where('userid', $userid)->first();
            if ($check_emp_details != null) {
                $employeeTableDate = [
                    'primary_name' => $request->primary_name,
                    'primary_relationship' => $request->primary_relationship,
                    'primary_contact' => $request->primary_contact,
                    'secondary_name' => $request->secondary_name,
                    'secondary_relationship' => $request->secondary_relationship,
                    'secondary_contact' => $request->secondary_contact,
                    'updated_At' => now(),
                ];
                $update_employeeTableDate = DB::table('emp_emargency_contact')->where('userid', $userid)->update($employeeTableDate);
            } else {
                $employeeTableDate = [
                    'userid' => $userid,
                    'primary_name' => $request->primary_name,
                    'primary_relationship' => $request->primary_relationship,
                    'primary_contact' => $request->primary_contact,
                    'secondary_name' => $request->secondary_name,
                    'secondary_relationship' => $request->secondary_relationship,
                    'secondary_contact' => $request->secondary_contact,
                ];
    
                $insert_employeeTableDate = DB::table('emp_emargency_contact')->insert($employeeTableDate);
            }
            return response()->json(['success' => true, 'message' => 'Emargency contact details updated successfully']);       
        }
        return response()->json(['error' => false, 'message' => 'Something went wrong']);
    }

    public function EditBankDetails(Request $request) {
        $all = $request->all();
    
        if (!empty(Session::get('member_id'))) {
            $userid = Session::get('member_id');
            $check_emp_details = DB::table('emp_bank_info')->where('userid', $userid)->first();
    
            if ($request->hasFile('pandocument') && $request->hasFile('bankstatement')) {
                $pandocument = $request->file('pandocument');
                $pandocumentfilename = $pandocument->getClientOriginalName();
                $pandocument->move(public_path('/uploads/pandocument'), $pandocumentfilename);
                $pandocument_img = $pandocumentfilename;
    
                $bankstatement = $request->file('bankstatement');
                $bankstatementfilename = $bankstatement->getClientOriginalName();
                $bankstatement->move(public_path('/uploads/bankstatement'), $bankstatementfilename);
                $bankstatement_img = $bankstatementfilename;
            }else{
                $bankstatement_img=null;
                $pandocument_img=null;
            }
    
            if ($check_emp_details != null) {
                $employeeTableDate = [
                    'account_holder_name' => $request->account_holder_name,
                    'bankname' => $request->bankname,
                    'bankaccount' => $request->bankaccount,
                    'ifsccode' => $request->ifsccode,
                    'panno' => $request->panno,
                    'pandocument' => $pandocument_img,
                    'bankstatement' => $bankstatement_img,
                    'updated_at' => now(),
                ];
    
                $update_employeeTableDate = DB::table('emp_bank_info')->where('userid', $userid)->update($employeeTableDate);
                return response()->json(['success' => true, 'message' => 'Bank details updated successfully']);
            } else {
                $employeeTableDate = [
                    'userid' => $userid,
                    'account_holder_name' => $request->account_holder_name,
                    'bankname' => $request->bankname,
                    'bankaccount' => $request->bankaccount,
                    'ifsccode' => $request->ifsccode,
                    'panno' => $request->panno,
                    'pandocument' => $pandocument_img,
                    'bankstatement' => $bankstatement_img,
                ];
    
                $insert_employeeTableDate = DB::table('emp_bank_info')->insert($employeeTableDate);
                return response()->json(['success' => true, 'message' => 'Bank details added successfully']);
            }
           
        }
    
        return response()->json(['error' => false, 'message' => 'Invalid user session']);
    }
    
    public function GetBankDetails(Request $request){
        if(!empty(Session::get('member_id'))){
            $userid=Session::get('member_id');
            $empdetails = DB::table('users')->where('users.userid', $userid)->leftJoin('emp_bank_info', 'emp_bank_info.userid', '=', 'users.userid')->first();
            return response()->json(['success' => true, 'emp_bank_info' => $empdetails]);
        }else{
            return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
        }
        
    }
    

    public function EditProfileDetails(Request $request) {
        if (!empty(Session::get('member_id'))) {
            $alldata = $request->all();
            
            $userid = Session::get('member_id');
            $type= $request->type;
            
            if($type == "subpi"){
                $check_emp_details = DB::table('emp_details')->where('userid', $userid)->first();
                $employeeTableDate = [
                    'noofchildren' => $request->no_of_children,
                    'nationality' => $request->nationality,
                    'state' => $request->state,
                    'religion' => $request->religion,
                    'maritalstatus' => $request->marital_status,
                ];
                $update_employeeTableDate = DB::table('emp_details')->where('userid', $userid)->update($employeeTableDate);
                return response()->json(['success' => true, 'message' => 'Profile details updated successfully']);
            }else{
            $check_emp_details = DB::table('emp_details')->where('userid', $userid)->first();
            if ($check_emp_details != null) {
                $employeeTableDate = [
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'nationality' => $request->nationality,
                    'state' => $request->state,
                    'dob' => $request->dob,
                    'pin' => $request->pin,
                    'doj' =>$request->doj,
                    'updated_at' =>now(),

                ];
                $update_employeeTableDate = DB::table('emp_details')->where('userid', $userid)->update($employeeTableDate);
            } else {
                $employeeTableDate = [
                    'userid' => $userid,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'nationality' => $request->nationality,
                    'state' => $request->state,
                    'dob' => $request->dob,
                    'pin' => $request->pin,
                    'doj' =>$request->doj,
                ];
    
                $insert_employeeTableDate = DB::table('emp_details')->insert($employeeTableDate);
            }
    
            $userTableDate = [
                'firstname' => $request->name,
                'dept' => $request->dept,
                'phone_no' => $request->phonenumber,
            ];
    
            $updateusertable = DB::table('users')->where('userid', $userid)->update($userTableDate);
    
            
                return response()->json(['success' => true, 'message' => 'Profile details updated successfully']);
           
        }
        }
        return response()->json(['error' => false, 'message' => 'Something went wrong']);
    }
    
    public function UpdateProfileImage(Request $request){
        $data = $request->all();
        if (!empty(Session::get('member_id'))) {
            if ($request->hasFile('profileImage')) {
                // For header logo
                $profileimage = $request->file('profileImage');
                $profileimagefilename = $profileimage->getClientOriginalName();
                $profileimage->move(public_path('/uploads/profile'), $profileimagefilename);
                $profileimage_logo = $profileimagefilename;
    
                $userTableDate = [
                    'image' => $profileimage_logo, // Correct variable reference here
                ];
    
                $userid = Session::get('member_id');
                $updateusertable = DB::table('users')->where('userid', $userid)->update($userTableDate);
    
                if ($updateusertable) {
                    return response()->json(['success' => true, 'message' => 'Profile photo updated successfully']);
                }
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }

    public function CheckInOut(Request $request) {
        if (!empty(Session::get('member_id'))) {
            $userid = Session::get('member_id');
            $check_emp_daily_attendance = DB::table('emp_attendance')->where('userid', $userid)->whereDate('date', now())->first();
            if ($request->action == "check_in") {
                if ($check_emp_daily_attendance == null || ($check_emp_daily_attendance->checkin_time == null && $check_emp_daily_attendance->checkout_time != null)) {
                    $attendanceData = [
                        'userid' => $userid,
                        'checkin_time' => now()->format('H:i:s'),
                        'checkout_time' => null,
                        'date' => now()->format('Y-m-d'),
                    ];
                    $insert_employee_attendance = DB::table('emp_attendance')->insert($attendanceData);
                    return response()->json(['success' => true, 'message' => 'You have checked In']);
                } else {
                    return response()->json(['success' => false, 'message' => 'You have already checked In']);
                }
            } elseif ($request->action == "check_out") {
                if ($check_emp_daily_attendance != null && $check_emp_daily_attendance->checkout_time == null && $check_emp_daily_attendance->checkin_time != null) {
                    $attendanceData = [
                        'checkout_time' => now()->format('H:i:s'),
                        'updated_at' => now(),
                    ];
                    $insert_employee_attendance = DB::table('emp_attendance')->where('userid', $userid)->whereDate('date', now())->update($attendanceData);
                    return response()->json(['success' => true, 'message' => 'You have checked Out']);
                } else {
                    return response()->json(['success' => false, 'message' => 'You have already checked Out']);
                }
            } else {
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'User not authenticated']);
        }
    }
    
    

	public function login(){

		$back = Session::put('url_back',url()->previous());

    	$current = url()->current();

		if(!empty(Session::get('member_id'))){
		    $getuserdata = User::where('userid',Session::get('member_id'))->first();
            if(!empty($getuserdata)){
                return redirect('/');
            }
           
		}else{
           
			return view('frontend/login');

		}

	}
	
	public function  dologin(Request $request){
    
        $user_email = $request->input('email'); 
        $user_password = $request->input('password');
    
        $data = $this->HomeModel->userlogin($user_email, $user_password);
    
        if (empty($data)) {
            return response()->json(['success' => false, 'message' => 'Invalid Login details!']);
        } else {
            if ($data->status != 'A') {
                return response()->json(['success' => false, 'message' => 'Your account is deactivated.']);
            } else {
                Session::put('member_id', $data->userid);
                
                
                return response()->json(['success' => true, 'message' => 'Successfully logged in!']);
            }
        }

    }

	public function register(){

		

		if(!empty(Session::get('member_id'))){
		    $getuser=User::where('userid',Session::get('member_id'))->first();
	    //dd($getuser);
	        
                return redirect('/');
            
			//Redirect::setIntendedUrl(url()->previous());

		}else{
            $country=DB::table('country')->get();
            //$get_org_dept=DB::table('organization')->leftJoin('department', 'department.org_id', '=', 'department.id')->select('department.*','organization.name')->get();
            //dd($get_org_dept);

            // $get_all_org=DB::table('organization')->get();
            // $get_all_dept=DB::table('department')->leftJoin('organization', 'organization.id', '=', 'department.org_id')->select('department.*','organization.name')->get();
            $get_all_dept = DB::table('department')
                ->leftJoin('organization', 'organization.id', '=', 'department.org_id')
                ->select('department.*', 'organization.name as org_name')
                ->get();

            // Organize departments by organization
            $departmentsByOrganization = [];

            foreach ($get_all_dept as $department) {
                $orgId = $department->org_id;

                // If organization doesn't exist in the array, create it
                if (!isset($departmentsByOrganization[$orgId])) {
                    $departmentsByOrganization[$orgId]['org_name'] = $department->org_name;
                    $departmentsByOrganization[$orgId]['departments'] = [];
                }

                // Add department to the organization's array
                $departmentsByOrganization[$orgId]['departments'][] = [
                    'id' => $department->id,
                    'dept_name' => $department->dept_name,
                    'created_at' => $department->created_at,
                    'updated_at' => $department->updated_at
                ];
            }

            $office_locations=DB::table('office_locations')->select('id','city')->get();
            //dd($departmentsByOrganization);
		    return view('frontend/register',compact('country','departmentsByOrganization','office_locations'));

		}

	}

	public function forgot(){

		

		if(!empty(Session::get('member_id'))){

			return redirect('/projects');

		}else{

		return view('frontend/forgot');

		}

	}

	public function forgot_request(Request $request){

		$email = $request->email;

		$agent_info=DB::table('users')->where('email', $email)->first();

		if(!empty($agent_info)){

		$updatedata = [

					"forgot"=>'A'

			];

		DB::table('users')->where('userid',$agent_info->id)->update($updatedata);

			

			

			return back()->with('success','Email has been sent in your email address please check');	

		}else{

			

			return back()->with('error','Email id is not exit. please check you email');

			

		}

		

	}

	public function reset_password($id){ 

		$decrypted = Crypt::decryptString($id);

		$getdetails = DB::table('users')->where('id', $decrypted)->first();

		if($getdetails->forgot == 'Y'){

			return view('frontend/reset_password',compact('decrypted','id'));

		}else{

			return redirect('/login')->with('error','Invalid Url');

		}

	}

	public function submit_resetpassword(Request $request){ 

		$decrypted = Crypt::decryptString($request->id);

			$updatedata = [

					"password"=>md5($request->password)

			];

		DB::table('users')->where('userid',$decrypted)->update($updatedata);

		return redirect('/login')->with('success','You have successfully changed the password.');

	}

    public function postregister(Request $request){
        //dd($request->all());
        $users =  DB::table('users')->where('email', $request->email)->get();
    
        # check if email already exists
        if(sizeof($users) > 0){
            # tell user not to duplicate same email
            return response()->json(['success' => false, 'message' => 'This user already signed up!']);
        }
    
        $current_date_time = now();
        
        // Generate emp_id
        $lastEmpId = DB::table('users')->latest('emp_id')->value('emp_id');
        if($request->orgname == 'Access Assist'){
            $newEmpId = $this->generateEmpId($lastEmpId);
        }

        if($request->orgname == 'Loan to Grow'){
            $newEmpId = $this->generateEmpIdlg($lastEmpId);
        }

        if($request->orgname == 'Business Ventures'){
            $newEmpId = $this->generateEmpIdBV($lastEmpId);
        }
        
    
        $data = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lname,
            'dept' => $request->dept,
            'email' => $request->email,
            'orgname' => $request->orgname,
            'design' => $request->design,
            'phone_no' => $request->phonenumber,
            'password' => Hash::make($request->password),
            'emp_id' => $newEmpId,
            'dateadded' => $current_date_time,
            'office_location'=>$request->ofl,
            'country' => $request->country_id,
            'phone_code' => $request->country_code,

        );
    
        $insert_id = $this->HomeModel->insert('users', $data);
    
        if ($insert_id) {
            return response()->json(['success' => true, 'message' => 'You have successfully registered.']);
            $to = $request->email;
            $data = [
                'username' => $request->email, 
                'password' => $request->password, 
            ];
            $content = view('frontend.email_templates.registration-mail', compact('data'))->render();
            $subject = "User Registration: ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: admin@accessassist.in' . "\r\n";
            
            mail($to, $subject, $content, $headers);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing went wrong.']);
        }
    
        
    }
    
    private function generateEmpId($lastEmpId)
    {
        if (!$lastEmpId) {
            return 'AA000001';
        } else {
            $lastNumber = (int)substr($lastEmpId, 2); // Extract the numeric part
            $newNumber = $lastNumber + 1;
            return 'AA' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }

    private function generateEmpIdlg($lastEmpId)
    {
        if (!$lastEmpId) {
            return 'LTG000001';
        } else {
            $lastNumber = (int)substr($lastEmpId, 2); // Extract the numeric part
            $newNumber = $lastNumber + 1;
            return 'L2G' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }

    private function generateEmpIdBV($lastEmpId)
    {
        if (!$lastEmpId) {
            return 'BV000001';
        } else {
            $lastNumber = (int)substr($lastEmpId, 2); // Extract the numeric part
            $newNumber = $lastNumber + 1;
            return 'BV' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }


	public function logout(){    

		 Session::flush();

         return redirect('/login');		 

    }

	public function forget_password(){    
		return view('frontend/forget-password');		 
    }

	public function otp_verification(){    
		return view('frontend/otp-verification');		 
    }

	public function email_reset_password(){    
		return view('frontend/reset-password');		 
    }



	

    public function resetPasswordEmailCheck(Request $request) {
        $email = $request->input('email');
        
        if (!empty($email)) {
            $user = User::where('email', $email)->first();
    
            if ($user) {
                // Check for an existing valid OTP
                $verificationCode = VerificationCode::where('user_id', $user->userid)
                    ->latest('expire_at')
                    ->first();
                    
                $now = Carbon::now();
    
                if ($verificationCode && $now->isBefore($verificationCode->expire_at)) {
                    return response()->json(['success' => true, 'verificationCode' => $verificationCode]);
                     $to = $user->email;
                            $data = [
                                'otp' => $verificationCode, 
                            ];
                    
                            $content = view('frontend.email_templates.email-otp', compact('data'))->render();;
                    
                            // $subject = "Forget Password OTP ";
                            // $headers = "MIME-Version: 1.0" . "\r\n";
                            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            // $headers .= 'From: admin@accessassist.in' . "\r\n";
                    
                            // mail($to, $subject, $content, $headers);

                            $mail = new PHPMailer(true);

                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );

                           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        
                            $mail->SMTPDebug = false;
                            $mail->isSMTP();
                            $mail->Host       = env("ZOHO_MAIL_HOST");
                            $mail->SMTPAuth   = true;
                            $mail->Username   = env("ZOHO_MAIL_FROM_ADDRESS");
                            $mail->Password   = env("ZOHO_MAIL_PASSWORD");
                           // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    //$mail->Port       = 587;
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mail->Port       = 465;
                            //$mail->SMTPSecure = env("ZOHO_MAIL_ENCRYPTION");
                            //$mail->Port       = env("ZOHO_MAIL_PORT");
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Recipients
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            $mail->setFrom('admin@accessassist.in', 'HRMS Admin');
                            $mail->addAddress($to);
                            // $mail->addAddress('test@example.com');
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Attachments
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            // $mail->addAttachment('/var/tmp/file.tar.gz');
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Content
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            
                            
                            $mail->isHTML(true); //Set email format to HTML
                            $mail->Subject = 'Forget Password OTP';
                            $mail->Body    = $content;
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            $mail->send();
                            
                }
    
                // Create a New OTP
                $newOtp = random_int(100000, 999999);
    
                $insertedData = VerificationCode::create([
                    'user_id' => $user->userid,
                    'email_otp' => $newOtp,
                    'expire_at' => Carbon::now()->addMinutes(10)
                ]);
    
                if ($insertedData) {
                    Session::put('member_username', $user->email);
                    Session::put('member_userid', $user->userid);
                    $getotp = VerificationCode::where('id', $insertedData->id)->first();
                            $to = $user->email;
                            $data = [
                                'otp' => $getotp->email_otp, 
                                'username'=>$user->email,
                            ];
                    
                            $content = view('frontend.email_templates.email-otp', compact('data'))->render();;
                    
                            // $subject = "Forget Password OTP ";
                            // $headers = "MIME-Version: 1.0" . "\r\n";
                            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            // $headers .= 'From: admin@accessassist.in' . "\r\n";
                    
                            // mail($to, $subject, $content, $headers);
                            $mail = new PHPMailer(true);
        
                            $mail->SMTPDebug = false;
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.zoho.in';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = env("ZOHO_MAIL_FROM_ADDRESS");
                            $mail->Password   = env("ZOHO_MAIL_PASSWORD");
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mail->Port       = 465;
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Recipients
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            $mail->setFrom('admin@accessassist.in', 'HRMS Admin');
                            $mail->addAddress($to);
                            // $mail->addAddress('test@example.com');
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Attachments
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            // $mail->addAttachment('/var/tmp/file.tar.gz');
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Content
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            
                            
                            $mail->isHTML(true); //Set email format to HTML
                            $mail->Subject = 'Forget Password OTP';
                            $mail->Body    = $content;
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            $mail->send();
                    return response()->json(['success' => true, 'message' => 'OTP sent to your email.']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'User does not exist.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid email provided.']);
        }
    }
    
    

    public function verifyOtp(Request $request) {
        if (!empty(Session::get('member_username')) && !empty(Session::get('member_userid'))) {
            $verificationCode = VerificationCode::where('user_id', Session::get('member_userid'))
                ->where('email_otp', $request->otp)
                ->first();
    
            $now = Carbon::now();
    
            if (!$verificationCode) {
                return response()->json(['error' => 'Your OTP is not correct']);
            } elseif ($now->isAfter($verificationCode->expire_at)) {
                return response()->json(['expired' => 'Your OTP has expired']);
            }
    
            $user = User::where('userid',Session::get('member_userid'))->first();
    
            if ($user) {
                // Optionally, you can update the expiration time after successful verification
                $verificationCode->update([
                    'expire_at' => Carbon::now()
                ]);
    
                return response()->json(['success' => 'Your OTP is correct']);
            } else {
                return response()->json(['error' => 'Something went wrong']);
            }
        } else {
            return response()->json(['error' => 'Something data missing']);
        }
    }

    public function changePassword(Request $request){
        if (!empty(session('member_username')) && !empty(session('member_userid'))) {
            $newPassword = $request->input('password'); // Get the new password from the request
            $user = User::where('userid', session('member_userid'))->first();
            if ($user) {
                User::where('userid', session('member_userid'))->update([
                    'password' => Hash::make($newPassword),
                ]);
    
                if ($user->wasChanged()) { // Check if the password was updated successfully
                    $to = session('member_username');
                    $data = [
                        'password' => $newPassword,
                        'username' => session('member_username'),
                    ];
    
                    $content = view('frontend.email_templates.change-password', compact('data'))->render();
    
                    // $subject = "Changed Password";
                    // $headers = "MIME-Version: 1.0" . "\r\n";
                    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // $headers .= 'From: admin@accessassist.in' . "\r\n";
    
                    // $sent = mail($to, $subject, $content, $headers);
                    $mail = new PHPMailer(true);
        
                            $mail->SMTPDebug = false;
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.zoho.in';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = env("ZOHO_MAIL_FROM_ADDRESS");
                            $mail->Password   = env("ZOHO_MAIL_PASSWORD");
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mail->Port       = 465;
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Recipients
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            $mail->setFrom('admin@accessassist.in', 'HRMS Admin');
                            $mail->addAddress($to);
                            // $mail->addAddress('test@example.com');
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Attachments
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            // $mail->addAttachment('/var/tmp/file.tar.gz');
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            //Content
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            
                            
                            $mail->isHTML(true); //Set email format to HTML
                            $mail->Subject = 'Changed Password';
                            $mail->Body    = $content;
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            //++++++++++++++++++++++++++++++++++++++++++++++
                            $sent = $mail->send();
                    if ($sent) {
                        session()->flush(); // Clear the session
                        return response()->json(['success' => 'Your password changed successfully']);
                    } else {
                        return response()->json(['error' => 'Error sending email']);
                    }
                } else {
                    return response()->json(['error' => 'Password update failed']);
                }
            } else {
                return response()->json(['error' => 'User not found']);
            }
        } else {
            return response()->json(['error' => 'Session data missing']);
        }
    }

 

    public function adminDashboard(){    
		return view('frontend/admin-dashboard');		 
    }

    public function employeeDashboard(){    
		return view('frontend/employee-dashboard');		 
    }

    public function EmployeeSalary(Request $request){
        if (!empty(Session::get('member_id'))) {
            $userid=Session::get('member_id');
            $getall_emp_salary= DB::table('emp_salary')->where('emp_salary.userid',$userid)
            ->leftJoin('users', 'users.userid', '=', 'emp_salary.userid')
            ->leftJoin('emp_details', 'emp_details.userid', '=', 'emp_salary.userid')
            ->select('emp_salary.*','users.firstname','users.image','users.emp_id','users.dept','emp_details.doj')->get();
            return view ('frontend/salary',compact('getall_emp_salary'));
        }else{
            return view('frontend/page_not_found');
        }
       		 
    }
    public function GenerateSalary(Request $request, $salid){
        $emp_id=Session::get('member_id');
        $salary_id=$salid;
        $check_user=DB::table('users')->where('userid',$emp_id)->first();
       // dd($check_user);

        if(!empty($check_user)){
            //dd($check_salary_data);
            $getall_emp_salary= DB::table('emp_salary')->where('emp_salary.userid',$emp_id)->where('emp_salary.id',$salary_id)
            ->leftJoin('users', 'users.userid', '=', 'emp_salary.userid')
            ->leftJoin('emp_details', 'emp_details.userid', '=', 'emp_salary.userid')
            ->select('emp_salary.*','users.firstname','users.image','users.emp_id','users.dept','emp_details.doj')->first();
            //dd($getall_emp_salary);
            return view('frontend/salary-view',compact('getall_emp_salary'));
        }else{
            return view('frontend/page_not_found');
        }
        	
    }
    
    // public function SalaryView(){
    //     return view ('frontend/salary-view');
    // }
    public function LeavesEmployee(Request $request){
        if (!empty(Session::get('member_id'))) {
            $get_leaves = DB::table('emp_leave_req')->where('userid',Session::get('member_id'))->get();
            return view ('frontend/leaves-employee',compact('get_leaves'));
        }else{
            return view('frontend/page_not_found');
        }
    }

    public function PostLeavesEmployee(Request $request){
        $data = $request->all();
        if (!empty(Session::get('member_id'))) {
            $userid = Session::get('member_id');
            $leavedata = [
                'userid' => $userid,
                'leave'=>$request->l,
                'leave_type' => $request->lt,
                'from' => $request->lfd,
                'to' => $request->ltd,
                'no_of_day' => $request->lnd,
                'leave_reason' => $request->lr,
            ];  
            $updateuserleave = DB::table('emp_leave_req')->insert($leavedata);
           
            $lastInsertedId = DB::getPdo()->lastInsertId();
            if ($lastInsertedId) {
                $getuser_details= DB::table('users')->where('userid',Session::get('member_id'))->first();
                $get_assigned_emp_manager_teamlead = DB::table('users')->where('manager_id','!=',null)
                ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
                ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
                ->select('users.firstname','users.lastname','users.userid','manager.name as managername','team_lead.name as teamleadname')
                ->get();

                $get_manager_email= DB::table('users')
                                    ->where('userid',Session::get('member_id'))
                                    ->where('manager_id','!=',null)
                                    ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
                                    ->select('manager.username as manageremail')->first();

                $get_tl_email= DB::table('users')
                                    ->where('userid',Session::get('member_id'))
                                    ->where('manager_id','!=',null)
                                    ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
                                    ->select('team_lead.username as tlemail')->first();


                $content = view('frontend.email_templates.leave-mail', compact('data','getuser_details'))->render();

                $m_email=$get_manager_email->manageremail;
                
                
                
                $to_user_email = $getuser_details->email;
                
                // $to_hremail = 'kapil.singh@accessassist.in';
                // $cc_email1 = 'js@accessassist.in';
                // $cc_email2 = 'nidhi.gupta@accessassist.in';   
                
               

                // $to = $to_user_email . ', ' . $to_hremail;
                // $cc= $cc_email1 . ', ' . $cc_email2;
                // $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // $headers .= 'From: admin@accessassist.in' . "\r\n";           
                // // Add CC header
                // $headers .= 'Cc: ' . $cc . "\r\n";                            
                // $subject = "Test Leave Request";              
                // // Send email
                // mail($to, $subject, $content, $headers);

                $mail = new PHPMailer(true);
                $mail->SMTPDebug = false;
                $mail->isSMTP();
                $mail->Host       = 'smtp.zoho.in';
                $mail->SMTPAuth   = true;
                $mail->Username   = env("ZOHO_MAIL_FROM_ADDRESS");
                $mail->Password   = env("ZOHO_MAIL_PASSWORD");
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                //++++++++++++++++++++++++++++++++++++++++++++++
                //Recipients
                //++++++++++++++++++++++++++++++++++++++++++++++
                $mail->setFrom('admin@accessassist.in', 'HRMS Admin');
                $mail->addAddress($to_user_email);
                
                 $mail->addAddress($m_email);
                if(!empty($get_tl_email->tlemail)){
                    $mail->addAddress($get_tl_email->tlemail);
                }

                // $mail->addCC($cc_email1);
                // $mail->addCC($cc_email2);

                //++++++++++++++++++++++++++++++++++++++++++++++
                //Attachments
                //++++++++++++++++++++++++++++++++++++++++++++++
                // $mail->addAttachment('/var/tmp/file.tar.gz');
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
                //++++++++++++++++++++++++++++++++++++++++++++++
                //Content
                //++++++++++++++++++++++++++++++++++++++++++++++


                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = "Leave Request - " . $getuser_details->firstname . " " . $getuser_details->lastname;
                $mail->Body    = $content;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                //++++++++++++++++++++++++++++++++++++++++++++++
                $sent = $mail->send();
                


                return response()->json(['success' => true, 'message' => 'Profile photo insert successfully']);
            } 
        } else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }

public function AttendanceReports(Request $request){
    if (!empty(Session::get('member_id'))) {
        $userid = Session::get('member_id');

        $month = $request->input('smonth', date('n')); 
        $year = $request->input('year', date('Y'));
 
        $firstDayOfMonth = Carbon::now()->startOfMonth();
        $lastDayOfMonth = Carbon::now()->endOfMonth();
        
        if (!empty($month) && !empty($year)) {
            $get_attendance = DB::table('emp_attendance')
            ->where('userid', $userid)
            ->whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->whereBetween('date', [$firstDayOfMonth->toDateString(), $lastDayOfMonth->toDateString()])
            ->get();
        }else{
            $get_attendance = DB::table('emp_attendance')
            ->where('userid', $userid)
            ->whereBetween('date', [$firstDayOfMonth->toDateString(), $lastDayOfMonth->toDateString()])
            ->get();
        }
       
        
       
        
        $formattedData = [];

        $currentDate = $firstDayOfMonth->copy();

        while ($currentDate <= $lastDayOfMonth) {
            $formattedDate = $currentDate->toDateString();

            $attendanceRecord = $get_attendance->firstWhere('date', $formattedDate);

            if ($attendanceRecord) {
                $attendanceRecord->checkin_time = $this->formatTime($attendanceRecord->checkin_time);
                $attendanceRecord->checkout_time = $this->formatTime($attendanceRecord->checkout_time);
                $attendanceRecord->day = $currentDate->format('l');

                $checkin = Carbon::parse($attendanceRecord->checkin_time);
                $checkout = $attendanceRecord->checkout_time ? Carbon::parse($attendanceRecord->checkout_time) : null;

                if ($checkout) {
                    $totalHours = $checkout->diffInHours($checkin) . ':' . $checkout->diff($checkin)->format('%I');
                    $attendanceRecord->total_hours = $totalHours;
                } else {
                    $attendanceRecord->total_hours = '00:00';
                }

                $formattedData[] = $attendanceRecord;
            } else {
                $formattedData[] = (object) [
                    'date' => $formattedDate,
                    'day' => $currentDate->format('l'),
                    'checkin_time' => '00:00',
                    'checkout_time' => '00:00',
                    'total_hours' => '00:00',
                ];
            }

            $currentDate->addDay();
        }

        return view('frontend.attendance-reports', compact('formattedData'));
    } else {
        return view('frontend.page_not_found');
    }
}

private function formatTime($time) {
    return $time ? Carbon::parse($time)->format('h:i A') : '00:00';
}


    

    public function Holidays(){
        return view ('frontend/holidays');
    }
    public function Announcement(Request $request, $slug){
        if (!empty(Session::get('member_id'))){
            $get_announcement=DB::table('announcement')->where('slug',$slug)->first();
            return view ('frontend/announcement',compact('get_announcement'));
        }else{
            return view('frontend/page_not_found');
        }
    }
    public function PerformanceAppraisal(){
        return view ('frontend/performance-appraisal');
    }

    public function Assets(Request $request){
        if (!empty(Session::get('member_id'))){
            $get_assets=DB::table('assets')->where('assets.userid',Session::get('member_id'))->leftJoin('users', 'users.userid', '=', 'assets.userid')
            ->select('assets.*','users.firstname')
            ->get();
            return view ('frontend/assets',compact('get_assets'));
        }else{
            return view('frontend/page_not_found');
        }
    }

    public function Travel(Request $request){
        if (!empty(Session::get('member_id'))){
            $get_user=User::where('userid',Session::get('member_id'))->first();
            $get_all_travel_req=DB::table('travel_req')->where('userid',Session::get('member_id'))->where('travel_details','!=',null)->where('deleted_at','=',null)->get();
            $get_all_hotel_req=DB::table('travel_req')->where('userid',Session::get('member_id'))->where('hotel_details','!=',null)->where('deleted_at','=',null)->get();
            //dd($get_all_travel_req);
            return view ('frontend/travel',compact('get_user','get_all_travel_req','get_all_hotel_req'));
        }else{
            return view('frontend/page_not_found');
        }
        
    }

    public function TravelRequestDelete(Request $request){
        if (!empty(Session::get('member_id'))){
            $type=$request->type;
            $userid=Session::get('member_id');
            $travelid=$request->travelid;
            $hotelid=$request->hotelid;
            if($type == 'deltravel'){
                //dd($request->all());
                $removetraveldata=[
                    'travel_details'=>null,                       
                ];
                $update_travel = DB::table('travel_req')->where('id',$travelid)->where('userid', $userid)->update($removetraveldata);
                if($update_travel){
                    return response()->json(['success' => true, 'message' => 'Travel request deleted successfully']);
                }else{
                    return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
                }
               
            }elseif($type == 'delhotel'){
                //dd($request->all());
                $removehoteldata=[
                    'hotel_details'=>null,                    
                ];
                $update_hotel = DB::table('travel_req')->where('id',$hotelid)->where('userid', $userid)->update($removehoteldata);
                if($update_hotel){
                    return response()->json(['success' => true, 'message' => 'Hotel request delted successfully']);
                }else{
                    return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
                }
            }else{
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            }

            
        }else{
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }

    public function TravelRequest(Request $request){
        if (!empty(Session::get('member_id'))) {
            
            $travelDetails = [];
        $hotelDetails = [];
    
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'travel_') === 0) {
                $parts = explode('_', $key);
                $index = $parts[1];

                if (!isset($travelDetails[$index])) {
                    $travelDetails[$index] = [];
                }

                $travelDetails[$index][$key] = $value;
            } elseif (strpos($key, 'hotel_') === 0) {
                $parts = explode('_', $key);
                $index = $parts[1];

                if (!isset($hotelDetails[$index])) {
                    $hotelDetails[$index] = [];
                }

                $hotelDetails[$index][$key] = $value;
            }
        }
  
        $travelDetailsArray = array_values($travelDetails);
        $hotelDetailsArray = array_values($hotelDetails);

        $travelDetailsJson = json_encode($travelDetailsArray);
        $hotelDetailsJson = json_encode($hotelDetailsArray);

            $lastTravelId = DB::table('travel_req')->latest('travelid')->value('travelid');
            $newTravelId = $this->generateTravelID($lastTravelId);

            $traveldata=[
                'travelid'=>$newTravelId,
                'userid'=>$request->uid,
                'travel_days'=>$request->tday,
                'travel_details'=>$travelDetailsJson,
                'hotel_details'=>$hotelDetailsJson,
            ];

            $inserttraveldata = DB::table('travel_req')->insert($traveldata);
            $lastInsertedId = DB::getPdo()->lastInsertId();
            if ($lastInsertedId) {
                
                $getuser_details= DB::table('users')->where('userid',Session::get('member_id'))->first();

                $get_travel_details=DB::table('travel_req')
                                ->where('id',$lastInsertedId)
                                ->where('travel_req.userid',Session::get('member_id'))
                                ->leftJoin('users', 'users.userid', '=', 'travel_req.userid')
                                ->select('travel_req.*','users.firstname','users.lastname')
                                ->first();

                $get_manager_email= DB::table('users')
                                    ->where('userid',Session::get('member_id'))
                                    ->where('manager_id','!=',null)
                                    ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
                                    ->select('manager.username as manageremail')->first();

                $get_tl_email= DB::table('users')
                                    ->where('userid',Session::get('member_id'))
                                    ->where('manager_id','!=',null)
                                    ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
                                    ->select('team_lead.username as tlemail')->first();


                $content = view('frontend.email_templates.travel-mail', compact('getuser_details','get_travel_details'))->render();

                $m_email=$get_manager_email->manageremail;

                $to_user_email = $getuser_details->email;


                $mail = new PHPMailer(true);
                $mail->SMTPDebug = false;
                $mail->isSMTP();
                $mail->Host       = 'smtp.zoho.in';
                $mail->SMTPAuth   = true;
                $mail->Username   = env("ZOHO_MAIL_FROM_ADDRESS");
                $mail->Password   = env("ZOHO_MAIL_PASSWORD");
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                

                $mail->setFrom('admin@accessassist.in', 'HRMS Admin');
                $mail->addAddress($to_user_email);

                //$mail->addAddress($m_email);
                $mail->addAddress('shivam.saini@accessassist.in');
                if(!empty($get_tl_email->tlemail)){
                    $mail->addAddress($get_tl_email->tlemail);
                }



                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = "Travel Request - " . $getuser_details->firstname . " " . $getuser_details->lastname;
                $mail->Body    = $content;

                $sent = $mail->send();  
                return response()->json(['success' => true, 'message' => 'Travel request added successfully']);
            }else{
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            } 
           
        }else{
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
        
    }

    private function generateTravelID($lastTravelId)
    {
        if (!$lastTravelId) {
            return 'tr000001';
        } else {
            $lastNumber = (int)substr($lastTravelId, 2); // Extract the numeric part
            $newNumber = $lastNumber + 1;
            return 'tr' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }

    public function CompanyPolicies(){
        $get_policy=DB::table('com_policies')->where('policy_title','=','cp')->first();
        return view('frontend/company-policies',compact('get_policy'));	
    
    }
    public function TravelPolicies(){
        $get_policy=DB::table('com_policies')->where('policy_title','=','tp')->first();
        return view('frontend/travelpolicies',compact('get_policy'));	
    
    }
    public function Reimbursement(Request $request){
        if (!empty(Session::get('member_id'))){
            $get_user=User::where('userid',Session::get('member_id'))->first();
            $get_all_travel_req=DB::table('travel_req')->where('userid',Session::get('member_id'))->where('deleted_at','=',null)->get();
            $get_all_reimbursement_req=DB::table('reimbursement_req')
                ->where('reimbursement_req.userid',Session::get('member_id'))
                ->where('reimbursement_req.deleted_at','=',null)
                ->leftJoin('travel_req', 'travel_req.userid', '=', 'reimbursement_req.userid')
                ->select('reimbursement_req.*','travel_req.travelid as travel_req_travelid')
                ->get();
            //dd($get_all_reimbursement_req);
            return view('frontend/reimbursement',compact('get_all_travel_req','get_all_reimbursement_req'));	
        }else{
            return view('frontend/page_not_found');
        }  
    
    }

    public function UpdateReimbursement(Request $request)
    {
        if (!empty(Session::get('member_id'))) {
            
            $travelid = $request->input('travelid');
            $travelamount = $request->input('travelamount');
            $hotalamount = $request->input('hotalamount');
            $ltravelamount = $request->input('ltravelamount');
            $totalamount = $request->input('totalamount');
            
            $traveldocfilename = [];
                if ($request->hasFile('traveldoc')) {
                    $traveldocFiles = $request->file('traveldoc');
                    foreach ($traveldocFiles as $index => $file) {
                        $filename = $file->getClientOriginalName();
                        $uniqueId = uniqid();
                        $newFilename = $uniqueId . '_' . $filename; // Append unique id to the filename
                        $file->move(public_path('uploads/traveldocument'), $newFilename);
                        $traveldocfilename[] = $newFilename;
                    }
                }else{
                    $traveldocfilename=null;
                }

            $hotaldocfilename = [];
                if ($request->hasFile('hotaldoc')) {
                    $hotaldocFiles = $request->file('hotaldoc');
                    foreach ($hotaldocFiles as $index => $file) {
                        $filename = $file->getClientOriginalName();
                        $uniqueId = uniqid();
                        $newFilename = $uniqueId . '_' . $filename;
                        $file->move(public_path('uploads/hotaldocument'), $newFilename);
                        $hotaldocfilename[] = $newFilename;
                    }
                }else{
                    $hotaldocfilename=null;
                }

            $ltraveldocFilesfilename = [];
                if ($request->hasFile('ltraveldoc')) {
                    $ltraveldocFiles = $request->file('ltraveldoc');
                    foreach ($ltraveldocFiles as $index => $file) {
                        $filename = $file->getClientOriginalName();
                        $uniqueId = uniqid();
                        $newFilename = $uniqueId . '_' . $filename;
                        $file->move(public_path('uploads/localtraveldocument'), $newFilename);
                        $ltraveldocFilesfilename[] = $newFilename;
                    }
                }else{
                    $ltraveldocFilesfilename=null;
                }
            
            $reimbursement_data=[
                'userid'=>Session::get('member_id'),
                'travelid'=>$travelid,
                'travel_amt'=>$travelamount,
                'travel_doc'=>json_encode($traveldocfilename),
                'hotel_amt'=>$hotalamount,
                'hotel_doc'=>json_encode($hotaldocfilename),
                'loc_amt'=>$ltravelamount,
                'loc_doc'=>json_encode($ltraveldocFilesfilename),
                'total_amt'=>$totalamount,
            ];

            $insert_reimbursement_data = DB::table('reimbursement_req')->insert($reimbursement_data);
            if ($insert_reimbursement_data) {
                return response()->json(['success' => true, 'message' => 'Travel reimbursement request added successfully']);
            }else{
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            } 

        } else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }
    
    public static function CheckProfileDetails(){
        $check_profile_info = [];
    
        if(!empty(Session::get('member_id'))){
            $check_profile_info['emp_details'] = DB::table('emp_details')->where('userid', Session::get('member_id'))->first();
            $check_profile_info['emp_emargency_contact'] = DB::table('emp_emargency_contact')->where('userid', Session::get('member_id'))->first();
            $check_profile_info['emp_bank_info'] = DB::table('emp_bank_info')->where('userid', Session::get('member_id'))->first();
        }
    
        return $check_profile_info;
    }
    
    public function localTravel(){
        if (!empty(Session::get('member_id'))) {
            $userId = Session::get('member_id'); 
            $get_ltr_details=DB::table('local_travel')->where('userid',$userId)->get();
            return view('frontend/localtravel',compact('get_ltr_details'));	

        }else{
            return view('frontend/page_not_found');
        }
    }
    public function LocalTravelSubmit(Request $request) {

        if (!empty(Session::get('member_id'))) {
            $userId = Session::get('member_id');   
            $type = $request->type;
            if ($type == 'adlt') {
                if (!$request->hasFile('td')) {
                    return response()->json(['error' => true, 'message' => 'No file uploaded']);
                }
                $locDocument = $request->file('td');
                $locDocumentFilename = $locDocument->getClientOriginalName();
                
                $uniqueId = uniqid();
                $newFilename = $uniqueId . '_' . $locDocumentFilename;

                $destinationPath = public_path('/uploads/localtravel');
                $locDocument->move($destinationPath, $newFilename);
    
                $lastLocTravelId = DB::table('local_travel')->latest('travelid')->value('travelid');
                $newLocTravelId = $this->generateLocTravelID($lastLocTravelId);
    
                $ltrData = [
                    'userid' => $userId,
                    'travelid' => $newLocTravelId,
                    'traveldate' => $request->tdate,
                    'travel_reason' => $request->tr,
                    'travel_mode' => $request->tm,
                    'travel_amount' => $request->ta,
                    'doc' => $newFilename,
                ];
    
                $insertLtrData = DB::table('local_travel')->insert($ltrData);
                if ($insertLtrData) {
                    return response()->json(['success' => true, 'message' => 'Local travel data request added successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Failed to insert data into the database']);
                } 
            }elseif($type == 'deltravel'){
                $id= $request->travelid;
                $deleteid=DB::table('local_travel')->where('userid',$userId)->where('id',$id)->delete();
                if ($deleteid) {
                    return response()->json(['success' => true, 'message' => 'Local travel data deleted successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
                } 

            }else {
                return response()->json(['error' => true, 'message' => 'Invalid type']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'User not logged in']);
        }
    }
    
    private function generateLocTravelID($lastLocTravelId) {
        if (!$lastLocTravelId) {
            return 'ltr000001';
        } else {
            $lastNumber = (int)substr($lastLocTravelId, 3); 
            $newNumber = $lastNumber + 1;
            return 'ltr' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }
    

    public function localPayReimbursement(){
        if (!empty(Session::get('member_id'))) {
            $userId = Session::get('member_id'); 
            $get_ltr_details=DB::table('local_pay_reimbursement')->where('userid',$userId)->get();
            return view('frontend/local-pay-reimbursement',compact('get_ltr_details'));	

        }else{
            return view('frontend/page_not_found');
        }
    }

    public function localPayReimbursementSubmit(Request $request) {

        if (!empty(Session::get('member_id'))) {
            $userId = Session::get('member_id');   
            $type = $request->type;
            if ($type == 'adltr') {
                if (!$request->hasFile('pd')) {
                    return response()->json(['error' => true, 'message' => 'No file uploaded']);
                }
                $locDocument = $request->file('pd');
                $locDocumentFilename = $locDocument->getClientOriginalName();
                
                $uniqueId = uniqid();
                $newFilename = $uniqueId . '_' . $locDocumentFilename;

                $destinationPath = public_path('/uploads/localpay');
                $locDocument->move($destinationPath, $newFilename);
    
                $lastLocTravelId = DB::table('local_pay_reimbursement')->latest('ltrid')->value('ltrid');
                $newLocTravelId = $this->generateLCRlID($lastLocTravelId);
    
                $ltrData = [
                    'userid' => $userId,
                    'ltrid' => $newLocTravelId,
                    'date' => $request->pdate,
                    'reason' => $request->pt,
                    'paidby' => $request->pb,
                    'amount' => $request->pa,
                    'doc' => $newFilename,
                ];
    
                $insertLtrData = DB::table('local_pay_reimbursement')->insert($ltrData);
                if ($insertLtrData) {
                    return response()->json(['success' => true, 'message' => 'Local travel data request added successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Failed to insert data into the database']);
                } 
            }elseif($type == 'deltravel'){
                $id= $request->travelid;
                $deleteid=DB::table('local_travel')->where('userid',$userId)->where('id',$id)->delete();
                if ($deleteid) {
                    return response()->json(['success' => true, 'message' => 'Local travel data deleted successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
                } 

            }else {
                return response()->json(['error' => true, 'message' => 'Invalid type']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'User not logged in']);
        }
    }
    
    private function generateLCRlID($lastLocTravelId) {
        if (!$lastLocTravelId) {
            return 'lpr000001';
        } else {
            $lastNumber = (int)substr($lastLocTravelId, 3); 
            $newNumber = $lastNumber + 1;
            return 'lpr' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }
    
    

}

