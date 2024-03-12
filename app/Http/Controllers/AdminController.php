<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\AdminModel;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Library\Encryption;
use ZipArchive;
use Validator;
use App\Http\Controllers\Response;
//use Exception;
use Razorpay\Api\Api;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserAttendanceExport;
use App\Exports\HtmlTableExport;
use Carbon\Carbon;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Event;
// use PDF;
// use Dompdf\Dompdf;
// use Dompdf\Options;
date_default_timezone_set("Asia/Kolkata");



class AdminController extends BaseController

{

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct(AdminModel $AdminModel, Encryption $Encryption) {

        $this->AdminModel = $AdminModel;	

        $this->Encryption = $Encryption;	

    }

	

	function index(){

		if(empty(Session::get('ad_id'))){

			return view('admin/login');

		}else{

			return redirect('/dashboard');	

		}

		

	}

	

	public function  dologin(Request $request){

		$user_email = $request->user_email;		

		$user_password =$request->user_password;

		$data = $this->AdminModel->userlogin($user_email,$user_password);

		if(empty($data)){

			return back()->with('error','Invalid Login details');	

		}else{

		   Session::put('ad_id',$data->admin_id);

		   //echo "<pre>";print_r($data);die();

		  return redirect('/admin/dashboard');	

		}

    }

	

	public function logout()

    {    

		 Session::flush();

         return redirect('/admin');		 

    }

	

	

	public function changepassword(){

		

		

	return view('admin/change_password');	

	}

	function forgotpassword(){

		return view('admin/forgot');

	}

    function forgot_password(Request $request){

		

		$data = $this->AdminModel->checkuser($request->email);

	

		if(empty($data)){

			return back()->with('error','Email id is not exit. please check you email');

		}else{	

				

			/* Update data */

				$updatedata = [

					"forgot"=>'Y'

				];

				$this->AdminModel->user_update($updatedata,$data->admin_id);

			/* Update data */

			

			$username =  '';

			$encrypted = Crypt::encryptString($data->admin_id);

			$data2 =  [

				'username'=>$data->username,

				'ad_id'=>$encrypted

			];

			//$from="";

			$to = $data->username;

			$subject = "Forgot Password";

			$txt = " <p>Hi ".$data2['username']."</p>

			<a href='".env('APP_URL')."ad_resetpassword/".$data2['ad_id']."'>".env('APP_URL')."ad_resetpassword/".$data2['ad_id']."</a>";

			// $headers = "MIME-Version: 1.0" . "\r\n";

			// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// $headers .= 'From: Your name <admin@accessassist.in>' . "\r\n";

			//mail($to,$subject,$txt,$headers);


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
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $txt;
            $mail->send();

			return back()->with('success','Email has been sent in your email address please check');

		}

		

	}

	public function resetpassword($id){ 

		$decrypted = Crypt::decryptString($id);

		$getdetails = $this->AdminModel->checkdetailsuser($decrypted);

		if($getdetails->forgot == 'Y'){

			return view('admin/reset_password',compact('decrypted','id'));

		}else{

			return redirect('/admin')->with('error','Invalid Url');

		}

	}

	public function change_password(Request $request){

		$userid = Session::get('ad_id');

		$password = $request->new_password;

		

			$new_password=md5($request->current_password);

			$getdetails = $this->AdminModel->checkcurrentpassword($userid,$new_password);

             //print_r($getdetails); die;

			if(empty($getdetails)){

					return redirect('admin/change_password')->with('error','Current Password is wrong.');

			}else{

				$data=[

				"password"=>md5($password),

			];

			$this->AdminModel->user_update($data,$userid);	

			return redirect('/admin/dashboard')->with('success','Password has been changed successfully');

			}

		

	}

	

	public function updatePassword(Request $request){

			$id=Crypt::decryptString($request->id);

           $password = $request->new_password;

		   $data=[

				"password"=>md5($password),

				"forgot"=> 'Y'

			];

			$this->AdminModel->user_update($data,$id);	

			return redirect('/admin')->with('success','Password has been changed successfully');

        }

    
	public  function home(){

		$ad_id=Session::get('ad_id');
		$admindetails = $this->AdminModel->getRowById('tbl_admin',array('admin_id'=>$ad_id));
        $get_all_emp= DB::table('users')->get();
        $assist_get_all_emp= DB::table('users')->where('orgname','Access Assist')->get();
        $l2g_get_all_emp= DB::table('users')->where('orgname','Loan to Grow')->get();
        $bv_get_all_emp= DB::table('users')->where('orgname','Business Ventures')->get();
        
        //dd($admindetails);
		return view('admin/dashboard',compact('admindetails','get_all_emp','assist_get_all_emp','l2g_get_all_emp','bv_get_all_emp'));

	}

    public static function userinfo(){
		if(!empty(Session::get('ad_id'))){
            $ad_id=Session::get('ad_id');
			$profile_info = DB::table('tbl_admin')->where('admin_id',$ad_id)->first();
            
		}else{
			$profile_info='';
		}
		return $profile_info;
	}






/*

|=============================|

|===== Manage Site Info=======|

|=============================|

*/



    public function AddSiteInfo(){

        $id='';

		$response='';

		$siteinfo = SiteInfo::all();

		

		return view('admin/siteinfo/add',compact('id','siteinfo','response'));

    }

    



    public function SubmitAddSiteInfo(Request $request){

        $id = $request->id;

    

        if ($request->hasFile('header_logo') && $request->hasFile('footer_logo')) {

            // For header logo

            $file_header_logo = $request->file('header_logo');

            $header_logo_filename = $file_header_logo->getClientOriginalName() . uniqid();

            $file_header_logo->move(public_path('/uploads/website-assets'), $header_logo_filename);

            $header_logo = $header_logo_filename;

    

            // For footer logo

            $file_footer_logo = $request->file('footer_logo');

            $footer_logo_filename = $file_footer_logo->getClientOriginalName() . uniqid();

            $file_footer_logo->move(public_path('/uploads/website-assets'), $footer_logo_filename);

            $footer_logo = $footer_logo_filename;

    

            // Rest of the form data

            $data = array(

                'header_logo' => $header_logo,

                'footer_logo' => $footer_logo,

                'email' => $request->input('email'),

                'phone_number' => $request->input('phone_number'),

                'address' => $request->input('address'),

                'business_hours' => $request->input('business_hours'),

                'linkedin_link' => $request->input('linkedin_link'),

                'facebook_link' => $request->input('facebook_link'),

                'tweeter_link' => $request->input('tweeter_link'),

                'youtube_link' => $request->input('youtube_link'),

                'instagram_link' => $request->input('instagram_link'),

                'created_at' => now(),

                'updated_at' => now(),

            );

    

            if (empty($id)) {

                $insert_id = $this->AdminModel->insert('site_infos', $data);

                if ($insert_id) {

                    return back()->with('success', 'Site info added Successfully');

                } else {

                    return back()->with('error', 'Unable to add');

                }

            } else {

                $this->AdminModel->EditedAddSiteInfo($data, $id);

                return redirect('admin/manage-siteinfo')->with('success', 'Site info edited successfully');

            }

        }else{

             return back()->with('error', 'Please re-choose logos');

        }

    }



    

    public function ManageSiteinfo(Request $request){

		$search='';

		$search=$request->search;

		$siteinfo = $this->AdminModel->ManageSiteinfo($search);

			

		return view('admin/siteinfo/manage',compact('siteinfo','search'));

			

	}

	

	public function EditSiteinfo(Request $request,$id){

		$response='';

		$id= $request->id;

		if(!empty($id)){

			$response= $this->AdminModel->EditSiteinfo($id);

				

		}

		

		return view('admin/siteinfo/add',compact('id','response'));

		

	

	} 

	

	public function DeleteSiteinfo(Request $request){

		$id = $request->id;

		$response = $this->AdminModel->DeleteSiteinfo($id);

		return redirect('admin/manage-siteinfo')->with('error','Site info deleted successfully');

	}

	

	public function SiteinfoStatus(Request $request){

		$status = $request->status;

		$id = $request->id;

			

		if($status=='D'){

			$newstatus='A';

		}else{

			$newstatus='D'; 	

		}

		$data=[

			"status"=>$newstatus,

			];

		$this->AdminModel->SiteinfoStatus($id,$data);

			

	}

    

    

  

	/*

    |==============================|

	|=====Manage Judges============|

	|==============================|

    */

    

    public function AddJudge(){

	    $id='';

		$response='';

		$judges = DB::table('tbl_admin')->get();

		

		return view('admin/judges/add',compact('id','judges','response'));

	}

	

	public function SubmitAddJudge(Request $request){

        $id = $request->id;

        

        if ($request->all()) {

            $data = array(

                'name' => $request->input('name'),

                'username' => $request->input('email'),

                'password' => md5($request->input('password')),

                'adminphoneno' => $request->input('phoneno'),

                'type' => 3,

                // 'created_at' => now(),

                // 'updated_at' => now(),

            );

    

            if (empty($id)) {

                $insert_id = $this->AdminModel->insert('tbl_admin', $data);

                if ($insert_id) {

                    return back()->with('success', 'Judge added Successfully');

                } else {

                    return back()->with('error', 'Unable to add');

                }

            } else {

                $this->AdminModel->EditedAddJudgeInfo($data, $id);

                return redirect('admin/manage-judges')->with('success', 'Judge edited successfully');

            }

        }else{

              return back()->with('error', 'Somthing went wrong');

        }

    }

    

    public function ManageJudges(Request $request){

		$search='';

		$search=$request->search;

		$judgeinfo = $this->AdminModel->ManageJudges($search);

			

		return view('admin/judges/manage',compact('judgeinfo','search'));

			

	}

	

	public function EditJudge(Request $request,$id){

		$response='';

		$id= $request->id;

		if(!empty($id)){

			$response= $this->AdminModel->EditJudge($id);

				

		}

		

		return view('admin/judges/add',compact('id','response'));

		

	

	} 

	

	public function DeleteJudge(Request $request){

		$id = $request->id;

		$response = $this->AdminModel->DeleteJudge($id);

		return redirect('admin/manage-judge')->with('error','Site info deleted successfully');

	}

	

	public function JudgeStatus(Request $request){

		$status = $request->status;

		$id = $request->id;

			

		if($status=='D'){

			$newstatus='A';

		}else{

			$newstatus='D'; 	

		}

		$data=[

			"status"=>$newstatus,

			];

		$this->AdminModel->JudgeStatus($id,$data);

			

	}



	/*

    |=======================================|

	|=====Manage Mentors/Experts============|

	|=======================================|

    */

    

    public function AddMentorExpert(){

	    $id='';

		$response='';

		$judges = DB::table('tbl_admin')->get();

		

		return view('admin/mentors/add',compact('id','judges','response'));

	}

	

	public function SubmitAddMentorExpert(Request $request){

        $id = $request->id;

        

        if ($request->all()) {

            $data = array(

                'name' => $request->input('name'),

                'username' => $request->input('email'),

                'password' => md5($request->input('password')),

                'adminphoneno' => $request->input('phoneno'),

                'type' => 4,

                // 'created_at' => now(),

                // 'updated_at' => now(),

            );

    

            if (empty($id)) {

                $insert_id = $this->AdminModel->insert('tbl_admin', $data);

                if ($insert_id) {

                    return back()->with('success', 'Mentor/Expert added Successfully');

                } else {

                    return back()->with('error', 'Unable to add');

                }

            } else {

                $this->AdminModel->EditedAddMentorExpertInfo($data, $id);

                return redirect('admin/manage-mentors-experts')->with('success', 'Mentor/Expert edited successfully');

            }

        }else{

              return back()->with('error', 'Somthing went wrong');

        }

    }

    

    public function ManageMentorExpert(Request $request){

		$search='';

		$search=$request->search;

		$mentors = $this->AdminModel->ManageMentorExpert($search);

			

		return view('admin/mentors/manage',compact('mentors','search'));

			

	}

	

	public function EditMentorExpert(Request $request,$id){

		$response='';

		$id= $request->id;

		if(!empty($id)){

			$response= $this->AdminModel->EditMentorExpert($id);

				

		}

		

		return view('admin/mentors/add',compact('id','response'));

		

	

	} 

	

	public function DeleteMentorExpert(Request $request){

		$id = $request->id;

		$response = $this->AdminModel->DeleteMentorExpert($id);

		return redirect('admin/manage-mentors-experts')->with('error','Mentors Experts deleted successfully');

	}

	

	public function MentorExpertStatus(Request $request){

		$status = $request->status;

		$id = $request->id;

			

		if($status=='D'){

			$newstatus='A';

		}else{

			$newstatus='D'; 	

		}

		$data=[

			"status"=>$newstatus,

			];

		$this->AdminModel->MentorExpertStatus($id,$data);

			

	}



    /*

    |=======================================|

	|=====Manage Challenges=================|

	|=======================================|

    */

    

    public function AddChallenge(){

	    $id='';

		$response='';

		$challenge = Challenge::all();

		

		return view('admin/challenges/add',compact('id','challenge','response'));

	}
   

	

	public function SubmitAddAddChallenge(Request $request){

	  

        $id = $request->input('id');



        $validator = Validator::make($request->all(), [

            'challenge_title' => 'required|max:255|unique:challenges,challenge_title',

            'org_name' => 'required|max:255',

            'hashtags' => 'required',

            'logo' => 'required',

            'reg_fee' => 'required',

            'challenge_date' => 'required',

            'max_member' => 'required', 

            'eligibility' => 'required',

            'aboutcompany' => 'required', 

            'aboutchallenge' => 'required', 

            'idea' => 'required',

            'prize_amount' => 'required',

            'stage_title.*' => 'required',

            'stage_about.*' => 'required',

            'stage_date.*' => 'required|date',

            'importantdates_title.*' => 'required',

            'importantdates_date.*' => 'required|date',

            'guidelines' => 'required',

            'contact_details' => 'required', 

            'rewards' => 'required',

            

            

        ]);



        if ($validator->fails()) {

            return back()

                ->withErrors($validator)

                ->withInput();

        }else{



            $stageTitles = $request->input('stage_title');

            $stageDates = $request->input('stage_date');

            $stageAbouts = $request->input('stage_about');

            $importantDatesTitles = $request->input('importantdates_title');

            $importantDatesDates = $request->input('importantdates_date');

            $challenge_logo = $request->file('logo');

            $challenge_logo_filename = $challenge_logo->getClientOriginalName() . uniqid();

            $challenge_logo->move(public_path('/uploads/challenge-logo'), $challenge_logo_filename);

            $logo = $challenge_logo_filename;

        

            $challengestage = [];

                foreach ($stageTitles as $index => $title) {

                    $titles = $stageTitles[$index];

                    $date = $stageDates[$index];

                    $about = $stageAbouts[$index];

                    $challengestage[] = ['title' => $titles, 'date' => $date, 'about' => $about];

                }

                

            $importantdates = [];

            foreach ($importantDatesTitles as $index => $title) {

                    $title = $importantDatesTitles[$index];

                    $date = $importantDatesDates[$index];

                    $importantdates[] = ['title' => $title, 'date' => $date];

            }

            

        $title = $request->input('challenge_title');

        $slug = strtolower(str_replace(' ', '-', $title));

        $data =  array(

            'logo'=>$logo,

            'challenge_title' => $request->input('challenge_title'),

            'org_name' => $request->input('org_name'),

            'hashtags' => $request->input('hashtags'),

            'reg_fee' => $request->input('reg_fee'),

            'prize_amount' => $request->input('prize_amount'),

            'challenge_date' => $request->input('challenge_date'),

            'max_member' => $request->input('max_member'),

            'eligibility' => $request->input('eligibility'),

            'about' => json_encode(['aboutcompany' => $request->input('aboutcompany'), 'aboutchallenge' => $request->input('aboutchallenge')]),

            'idea' => $request->input('idea'),

            'guidelines' => $request->input('guidelines'),

            'contact_details' => $request->input('contact_details'),

            'challenge_stage'=>json_encode($challengestage),

            'important_dates'=>json_encode($importantdates),

            'slug'=>$slug,

            'rewards'=> $request->input('rewards'),

            'created_at'=>now(),

        );

        //dd($data);

            if (empty($id)) {

                $insert_id = $this->AdminModel->insert('challenges', $data);

                if ($insert_id) {

                    return back()->with('success', 'Challenge added Successfully');

                } else {

                    return back()->with('error', 'Unable to add');

                }

            } else {

                $this->AdminModel->EditedAddChallenge($data, $id);

                return redirect('admin/manage-challenge')->with('success', 'Challenge edited successfully');

            }

        }

    }

    

    public function ManageChallenge(Request $request){

		$search='';

		$search=$request->search;

		$challenges = $this->AdminModel->ManageChallenge($search);

			//dd($challenges);

		return view('admin/challenges/manage',compact('challenges','search'));

			

	}

	

	public function EditChallenge(Request $request,$id){

		$response='';

		$id= $request->id;

		if(!empty($id)){

			$response= $this->AdminModel->EditChallenge($id);

				

		}

		

		return view('admin/challenges/add',compact('id','response'));

		

	

	} 

	

	public function DeleteChallenge(Request $request){

		$id = $request->id;

		$response = $this->AdminModel->DeleteChallenge($id);

		return redirect('admin/manage-challenges')->with('error','Challenges deleted successfully');

	}

	

	public function ChallengeStatus(Request $request){

		$status = $request->status;

		$id = $request->id;

			

		if($status=='D'){

			$newstatus='A';

		}else{

			$newstatus='D'; 	

		}

		$data=[

			"status"=>$newstatus,

			];

		$this->AdminModel->ChallengeStatus($id,$data);

			

	}

	
/*

|=============================|

|===== Startups=======|

|=============================|

*/

public function addStartupsSector(){
	

	return view('admin/startups/add-startups-sector');	

}
public function addStartups(){
	$id='';

	$response='';

	$challenge = Challenge::all();



	
	return view('admin/startups/add',compact('id','challenge','response'));	

}
public function manageStartupSector(){

	return view('admin/startups/manage-startup-sector');	

}
public function manageStartup(){

	return view('admin/startups/manage-startup');	

}

    public function Excelimport(Request $request) {
      
         $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');

        $fileupload = Excel::import(new ExcelImport, $file);
        if($fileupload){
            return response()->json(['success' => 'Successfully imported excel']);
        }else{
            return response()->json(['error' => 'Somthing weny wrong']);
        }
        // return redirect()->back()->with('success', 'Data imported successfully.');
    
    }
    
    
    public function addUseItBtnPage(){
        $id='';

	$response='';

	
        return view('admin/useit/add',compact('id','response'));	
    }


     public function SubmitaddUseItBtnPage(Request $request){
        $id = $request->id;

        if ($request->hasFile('table_img') && $request->hasFile('example_img') && $request->hasFile('upload_document')) {
            $request->validate([
                'table_img' => 'required',
                'example_img' => 'required',
                'upload_document' => 'required',
            ]);

            $table_img = $request->file('table_img');
            $table_img_filename = uniqid().$table_img->getClientOriginalName();
            $table_img->move(public_path('/uploads/useit'), $table_img_filename);
            
            $example_img = $request->file('example_img');
            $example_img_filename = uniqid().$example_img->getClientOriginalName();
            $example_img->move(public_path('/uploads/useit'), $example_img_filename);
            
            $upload_document = $request->file('upload_document');
            $upload_document_filename = uniqid().$upload_document->getClientOriginalName();
            $upload_document->move(public_path('/uploads/useitdoc'), $upload_document_filename);
            
        } else {
            // User hasn't selected a new file, retain the existing file
            $check_table_img = DB::table('toolkit_details')->where('id', $id)->first();
            $table_img_filename = $check_table_img->table_img;
            
            $check_example_img = DB::table('toolkit_details')->where('id', $id)->first();
            $example_img_filename = $check_example_img->exmp_img;
            
            $check_upload_document = DB::table('toolkit_details')->where('id', $id)->first();
            $upload_document_filename = $check_upload_document->toolkit_doc;
        }
        
        if ($request->all()) {
            $toolkit_title_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->toolkit_title); 
            $toolkit_title_final_slug = preg_replace('/-+/', '-', $toolkit_title_string); 
            $toolkit_title_slug = strtolower(rtrim($toolkit_title_final_slug, '-'));
            
            $toolkit_category_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->toolkit_category); 
            $toolkit_category_final_slug = preg_replace('/-+/', '-', $toolkit_category_string); 
            $toolkit_category_slug = strtolower(rtrim($toolkit_category_final_slug, '-'));


            $data = array(
                'table_img' =>$table_img_filename,
                'exmp_img' =>$example_img_filename,
                'toolkit_doc' =>$upload_document_filename,
                'understanding_the_tool'     => json_encode(['card_content_1' => $request->input('card_content_1'), 'card_content_2' => $request->input('card_content_2'), 'card_content_3' => $request->input('card_content_3'), 'card_content_4' => $request->input('card_content_4'), 'card_content_5' => $request->input('card_content_5'), 'card_content_6' => $request->input('card_content_6')]),
                'toolkit_title'=> $request->toolkit_title,
                'toolkit_category'=> $request->toolkit_category,
                'toolkit_title_desc'=> $request->toolkit_title_discription,
                'what_is_it'=> $request->what_is_it_discription,
                'how_it_helps'=> $request->how_it_helps_discription,
                'use_cases_desc'=> $request->use_cases_discription,
                'limitations_desc'=> $request->limitation_discription,
                'sbs_desc'=> $request->step_by_step_discription,
                'toolkit_category_slug'=>$toolkit_category_slug,
                'toolkit_title_slug'=> $toolkit_title_slug,
                'status'=>'A',
                'created_at' =>now(),
            );

            if (empty($id)) {
                $insert_id = $this->AdminModel->insert('toolkit_details', $data);
                if ($insert_id) {
                    return back()->with('success', 'Use It page data added Successfully');
                } else {
                    return back()->with('error', 'Unable to add');
                }
            } else {
                
                $this->AdminModel->EditSubmitAddUseItBtnPage($data, $id);
                return back()->with('success', 'Use It page data edited Successfully');
            }
        }else{
              return back()->with('error', 'Somthing went wrong');

        }
    
    }

    public function ManageUseItBtnPage(Request $request){
		$search='';
		$search=$request->search;
		$toolkits = $this->AdminModel->ManageUseItBtnPage($search);
		//dd($toolkits);
		return view('admin/useit/manage',compact('toolkits','search'));
	}
	
	
	
	public function EditUseItBtnPage(Request $request,$id){
		$response='';

		$id= $request->id;

		if(!empty($id)){
			$response= $this->AdminModel->EditUseItBtnPage($id);
		}

		return view('admin/useit/add',compact('id','response'));

	} 
    public function Employees(Request $request){
        $country = DB::table('country')->get();
    
        if ($request->has('search') && $request->search == 'chorg') {
            $all_emp = User::where('status', 'A')->where('orgname', $request->organization)->get();
        } elseif ($request->has('search') && $request->search == 'enorg') {
            $all_emp = User::where('status', 'A')
                            ->where(function ($query) use ($request) {
                                $query->where('emp_id', $request->employeeId)
                                      ->orWhere('firstname', $request->employeeName)
                                      ->orWhere('lastname', $request->employeeName);
                            })
                            ->get();
        } else {
            $all_emp = User::where('status', 'A')->get(); 
        }
    
        $get_all_dept = DB::table('department')
                            ->leftJoin('organization', 'organization.id', '=', 'department.org_id')
                            ->select('department.*', 'organization.name as org_name')
                            ->get();
    
        $departmentsByOrganization = [];
    
        foreach ($get_all_dept as $department) {
            $orgId = $department->org_id;
    
            if (!isset($departmentsByOrganization[$orgId])) {
                $departmentsByOrganization[$orgId]['org_name'] = $department->org_name;
                $departmentsByOrganization[$orgId]['departments'] = [];
            }
    
            $departmentsByOrganization[$orgId]['departments'][] = [
                'id' => $department->id,
                'dept_name' => $department->dept_name,
                'created_at' => $department->created_at,
                'updated_at' => $department->updated_at
            ];
        }
    
        // Check if the request is AJAX, return only the staff grid if it is
        if ($request->ajax()) {
            return view('admin.employees', compact('all_emp', 'country', 'departmentsByOrganization'));
        }
    
        // Otherwise, return the full view with all data
        return view('admin/employees', compact('all_emp', 'country', 'departmentsByOrganization'));
    }
    

    public function EmployeeAdd(Request $request){
        $users =  DB::table('users')->where('email', $request->email)->get();
        # check if email already exists
        if(sizeof($users) > 0){
            # tell user not to duplicate same email
            return response()->json(['success' => false, 'message' => 'This user already signed up!']);
        }
        $current_date_time = now();

        // Generate emp_id
        $lastEmpId = DB::table('users')->latest('emp_id')->value('emp_id');
        $newEmpId = $this->generateEmpId($lastEmpId);
    
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

            'country' => $request->country_id,
            'phone_code' => $request->country_code,

        );
    
        $insert_id = $this->AdminModel->insert('users', $data);
    
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
    private function generateEmpId($lastEmpId){
        if (!$lastEmpId) {
            return 'AA000001';
        } else {
            $lastNumber = (int)substr($lastEmpId, 2); // Extract the numeric part
            $newNumber = $lastNumber + 1;
            return 'AA' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        }
    }
    public function EmployeesDetails(Request $request){
        $userid=$request->id;
        if(!empty($userid)){
            $empdetails = DB::table('users')->where('users.userid',$userid)->leftJoin('emp_details', 'emp_details.userid', '=', 'users.userid')->first();
            return response()->json(['success' => true, 'empdetails' => $empdetails]);
        }else{
            return response()->json(['success' => false, 'message' => 'Somthing went wrong']);
        }
        
    }

    public function EmployeesUpdatePass(Request $request){
        $users =  DB::table('users')->where('email', $request->email)->first();
        //dd($users);
        
        if(!empty($users)){
            $data = array(
                'password' => Hash::make($request->password),
                'updated_at'=>now(),

            );
        
            $insert_id = DB::table('users')->where('userid', $users->userid)->update($data);
        
            if ($insert_id) {
                $to = $request->email;
                $data = [
                    'username' => $request->email, 
                    'password' => $request->password, 
                ];
                $content = view('frontend.email_templates.signup_email_templates', compact('data'))->render();
                $subject = "User Registration: ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: admin@accessassist.in' . "\r\n";
                
                mail($to, $subject, $content, $headers);
            }
        
            return response()->json(['success' => true, 'message' => 'You have successfully updated password.']);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }
    public function EmployeesDelete(Request $request){
        $users =  DB::table('users')->where('email', $request->email)->first();
        if(!empty($users)){
            $data = array(
                'status'=>'D',  
                'deleted_at'=>now(),
            );
        
            $insert_id = DB::table('users')->where('userid', $users->userid)->where('email', $request->email)->update($data);
            return response()->json(['success' => true, 'message' => 'You have deleted the employee.']);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }

    public function EmployeesProfile(Request $request, $id){
        $empid=strtoupper($request->id);
        //dd($empid);
        $user=User::where('emp_id',$empid)->first();
        if(!empty($user)){
            $getuser=User::where('emp_id',$empid)->first();
            $get_emp_details= DB::table('emp_details')->where('userid',$getuser->userid)->first();
            $get_emp_emargency_contact = DB::table('emp_emargency_contact')->where('userid',$getuser->userid)->first();
            $get_emp_bank_details = DB::table('emp_bank_info')->where('userid',$getuser->userid)->first();

            $get_assigned_emp_manager_teamlead = DB::table('users')->where('userid',$user->userid)->where('manager_id','!=',null)
            ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
            ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
            ->select('manager.name as managername','team_lead.name as teamleadname')
            ->first();
            $office_locations=DB::table('office_locations')->select('id','city')->get();
            //dd($get_assigned_emp_manager_teamlead);

            $get_office_name=DB::table('office_locations')->leftJoin('users', 'users.office_location', '=', 'office_locations.id')->where('users.userid',$user->userid)->first();
            return view('admin/emp-profile',compact('getuser','get_emp_details','get_emp_emargency_contact','get_emp_bank_details','get_assigned_emp_manager_teamlead','office_locations','get_office_name'));
        }else{
            return view('frontend/page_not_found');
        }
        
    }

    public function UpdateSalaryEmployee(Request $request){
       // dd($request->all());
        $users =  DB::table('users')->where('email', $request->emp_sal_id)->first();
        if(!empty($users)){
            if($request->type == 'addsal'){
                $usersal= DB::table('emp_details')->where('userid', $users->userid)->select('salary_amt')->first();
                if($usersal != null){
                    $data = array(
                        'salary_amt' => $request->emsalaryAdd,
                    );
                    $insert_id = DB::table('emp_details')->where('userid', $users->userid)->update($data);
                    if($insert_id){
                        return response()->json(['success' => true, 'message' => 'You have successfully updated the salary.']);
                    }else{
                        return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
                    }
                }else{
                    $data = array(
                        'salary_amt' => $request->emsalaryAdd,
                        'userid'=>$users->userid,
                    );
                    $insert_id = DB::table('emp_details')->insert($data);
                    if($insert_id){
                        return response()->json(['success' => true, 'message' => 'You have successfully added the salary.']);
                    }else{
                        return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
                    }
                }
                

                
            }elseif($request->type == 'getsal'){
                $usersal= DB::table('emp_details')->where('userid', $users->userid)->select('salary_amt')->first();
                return response()->json(['success' => true, 'data' => $usersal]);
            }elseif($request->type == 'editsal'){
                $data = array(
                    'salary_amt' => $request->editemsalaryAdd,
                );
                $insert_id = DB::table('emp_details')->where('userid', $users->userid)->update($data);
                if($insert_id){
                    return response()->json(['success' => true, 'message' => 'You have successfully updated the salary.']);
                }else{
                    return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
                }
                
            }else{
                return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
            }
           
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }
    
    public function UpdateEmployeeOfficeLocation(Request $request){
        // dd($request->all());
         $users =  DB::table('users')->where('email', $request->updateloc_emp_id)->first();
         if(!empty($users)){
            $data = array(
                'office_location' => $request->loc,
            );
            $insert_id = DB::table('users')->where('userid', $users->userid)->update($data);
            if($insert_id){
                return response()->json(['success' => true, 'message' => 'You have successfully updated the salary.']);
            }else{
                return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
            }
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }

    public function Leaves(Request $request){
        $admin_id=Session::get('ad_id');
        //dd($admin_id);
        $all_employees=DB::table('users')->where('status','A')->get();
        if($admin_id == 1){
            $all_leaves= DB::table('emp_leave_req')->leftJoin('users', 'users.userid', '=', 'emp_leave_req.userid')
            ->select('emp_leave_req.*','users.firstname','users.lastname','users.email','users.userid','users.image','users.dept','users.emp_id')->paginate('10');
        }else{
            $all_leaves = DB::table('emp_leave_req')
            ->leftJoin('users', 'users.userid', '=', 'emp_leave_req.userid')
            ->where(function ($query) use ($admin_id) {
                $query->where('users.manager_id', $admin_id)
                    ->orWhere('users.team_lead_id', $admin_id);
            })
            ->select('emp_leave_req.*', 'users.firstname', 'users.lastname', 'users.email', 'users.userid', 'users.image', 'users.dept', 'users.emp_id')
            ->paginate(10);
        }
        
       // dd($all_leaves);
        return view('admin/leaves',compact('all_leaves','all_employees'));	
    
    }

    public function UpdateEmployeeLeave(Request $request){
        $data = $request->type;
        if ($data =="update_status") {
            $userid = $request->userId;
            $leaveid = $request->leaveId;
            $status=$request->status;
            $check_asset =DB::table('emp_leave_req')->where('userid',$userid)->where('id',$leaveid)->first();
            if(!empty($check_asset)){
                $assetdata = [
                    'status' => $request->status,
                    'updated_at'=>now(),
                    'approved_by'=>Session::get('ad_id'),
                ];  
                $updateassetdata = DB::table('emp_leave_req')->where('userid', $userid)->where('id',$leaveid)->update($assetdata);
                if ($updateassetdata) {
                    $userdetails= DB::table('users')->where('userid',$userid)->first();

                    if($request->status == 'A'){
                        $update_status = 'Approved';

                        $event = Event::create([
                            'title' => ucfirst($userdetails->firstname) . ' ' . ucfirst($userdetails->lastname) . ' - On ' . ' ' . ' Leave', 
                            'start' =>  date('Y-m-d', strtotime($check_asset->from)),
                            'end' => date('Y-m-d', strtotime($check_asset->to)),
                            'time' => null,
                        ]);


                    } elseif($request->status == 'P'){
                        $update_status = 'Pending';
                    } elseif($request->status == 'D'){
                        $update_status = 'Declined';
                    }
                $getapproved_by_details=DB::table('tbl_admin')->where('admin_id',Session::get('ad_id'))->first(); 
                    
                
                $to_user_email = $userdetails->email;

                $get_manager_email= DB::table('users')
                                    ->where('userid',$userid)
                                    ->where('manager_id','!=',null)
                                    ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
                                    ->select('manager.username as manageremail')->first();

                $get_tl_email= DB::table('users')
                                    ->where('userid',$userid)
                                    ->where('manager_id','!=',null)
                                    ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
                                    ->select('team_lead.username as tlemail')->first();

                $m_email=$get_manager_email->manageremail;
                
                // $to_hremail = 'kapil.singh@accessassist.in';
                // $cc_email1 = 'js@accessassist.in';
                // $cc_email2 = 'nidhi.gupta@accessassist.in';   
                
                // $to_hremail = 'shivam.saini@accessassist.in';
                // $cc_email1 = 'aman.singh@accessassist.in';
               

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
                // $mail->addAddress($to_hremail);

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
                $mail->Subject = "Leave Request - " . $userdetails->firstname . " " . $userdetails->lastname . " " . $update_status ;
                $mail->Body = "
                Dear " . $userdetails->firstname . " " . $userdetails->lastname . ",
            
                Your leave request for " . $check_asset->no_of_day ."days starting from " . $check_asset->from ." to " . $check_asset->to .". The reason for leave is " . $check_asset->leave_reason ." has been  " . $update_status . ". 
            
                Thank you for your prompt attention to this matter.
            
                Best regards, " . $getapproved_by_details->name . ";";
            
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                //++++++++++++++++++++++++++++++++++++++++++++++
                $mail->send();

                    return response()->json(['success' => true, 'message' => 'Leave Status update successfully']);
                } 
            }else{
                return response()->json(['error' => true, 'message' => 'Employee not exist']);
            }
                
        }elseif($data =="add_leave"){
            $check_user=DB::table('users')->where('userid',$request->eid)->where('email',$request->email)->first();
            if(!empty($check_user)){
                $leavedata = [
                    'userid' => $request->eid,
                    'leave'=>$request->l,
                    'leave_type' => $request->lt,
                    'from' => $request->lfd,
                    'to' => $request->ltd,
                    'no_of_day' => $request->lnd,
                    'leave_reason' => $request->lr,
                ];  
                $updateuserleave = DB::table('emp_leave_req')->insert($leavedata);
                if ($updateuserleave) {
                    return response()->json(['success' => true, 'message' => 'Employee leave insert successfully']);
                }else{
                    return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
                } 
            }else{
                return response()->json(['error' => true, 'message' => 'Employee does not exixt']);
            }
           
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
        }

    }

    public function LeavesDelete(Request $request){
        $leaves =  DB::table('emp_leave_req')->where('id', $request->lid)->where('userid', $request->userid)->first();
        if(!empty($leaves)){
            $delete_id = DB::table('emp_leave_req')->where('userid', $request->userid)->where('id', $request->lid)->delete();
            return response()->json(['success' => true, 'message' => 'You have deleted the leaves.']);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }

    public function LeaveSetting(){

        return view('admin/leave-settings');	
    
    }
    public function holidays(){

        return view('admin/holidays');	
    
    }
    public function attendance(Request $request) {
        $month = $request->input('smonth', date('n')); 
        $year = $request->input('year', date('Y'));
        $org_name=$request->input('org');
    
        if (!empty($month) && !empty($year)) {
            $all_attendance = DB::table('emp_attendance')
                ->leftJoin('users', 'users.userid', '=', 'emp_attendance.userid')
                ->select('emp_attendance.*', 'users.firstname','users.lastname', 'users.emp_id', 'users.image')
                ->whereYear('emp_attendance.date', '=', $year)
                ->whereMonth('emp_attendance.date', '=', $month)
                ->when($org_name, function ($query) use ($org_name) {
                    return $query->where('users.orgname', $org_name);
                })
                ->get();

            $leave_by_month=DB::table('emp_leave_req')->where('status','A')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get();
        } else {
            $all_attendance = DB::table('emp_attendance')
                ->leftJoin('users', 'users.userid', '=', 'emp_attendance.userid')
                ->select('emp_attendance.*', 'users.firstname','users.lastname', 'users.emp_id', 'users.image')
                ->whereYear('emp_attendance.date', '=', date('Y'))
                ->whereMonth('emp_attendance.date', '=', date('m'))
                ->get();
                $leave_by_month=DB::table('emp_leave_req')->where('status','A')->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->get();
        }
        
        $get_all_dept = DB::table('department')
        ->leftJoin('organization', 'organization.id', '=', 'department.org_id')
        ->select('department.*', 'organization.name as org_name')
        ->get();

        $departmentsByOrganization = [];

        foreach ($get_all_dept as $department) {
            $orgId = $department->org_id;

            if (!isset($departmentsByOrganization[$orgId])) {
                $departmentsByOrganization[$orgId]['org_name'] = $department->org_name;
                $departmentsByOrganization[$orgId]['departments'] = [];
            }

            $departmentsByOrganization[$orgId]['departments'][] = [
                'id' => $department->id,
                'dept_name' => $department->dept_name,
                'created_at' => $department->created_at,
                'updated_at' => $department->updated_at
            ];
        }
    //dd($leave_by_month);
        return view('admin/attendance', compact('all_attendance','leave_by_month','departmentsByOrganization'));	
    }

    public function UpdateAttendance(Request $request){
        $emp_id=$request->dateforuid;
        $update_att_date=$request->hiddendate;

        $check_in_time=$request->checkintime;
        $check_out_time=$request->checkouttime;

        $get_user_id= DB::table('users')->where('emp_id',$emp_id)->first();
        $userid=$get_user_id->userid;

        $get_user_emp_att_data=DB::table('emp_attendance')->where('userid',$userid)->where('date',$update_att_date)->first();
//dd($get_user_emp_att_data);
        if(!empty($get_user_emp_att_data)){
            $updatedata= [
                'checkin_time' => $check_in_time,
                'checkout_time'=>$check_out_time,
                'updated_at' => now(),
            ];  
            $updateuser_attendance = DB::table('emp_attendance')->where('userid',$userid)->where('date',$update_att_date)->update($updatedata);
            if($updateuser_attendance){
                return response()->json(['success' => true, 'message' => 'You have successfully update the attendance.']);
            }else{
                return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
            }
        }else{
            $insertdata= [
                'userid'=>$userid,
                'date'=>$update_att_date,
                'checkin_time' => $check_in_time,
                'checkout_time'=>$check_out_time,
                'created_at' => now(),
                'updated_at' => now(),
            ];  
            $insertuser_attendance = DB::table('emp_attendance')->insert($insertdata);
            if($insertuser_attendance){
                return response()->json(['success' => true, 'message' => 'You have successfully update the attendance.']);
            }else{
                return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
            }
        }

       // dd($get_user_emp_att_data);

    }
    

//     public function exportAttendance(Request $request){
//     $year = $request->input('year');
//     $month = $request->input('month');

//     $userAttendance = DB::table('emp_attendance')
//         ->leftJoin('users', 'users.userid', '=', 'emp_attendance.userid')
//         ->select('emp_attendance.*', 'users.firstname', 'users.emp_id', 'users.image')
//         ->whereYear('emp_attendance.date', '=', $year)
//         ->whereMonth('emp_attendance.date', '=', $month)
//         ->get();

//     $htmlTableData = view('exports.html_table', compact('userAttendance'))->render();

//     return Excel::download(new HtmlTableExport($htmlTableData), 'user_attendance_export.xlsx');
// }

public function exportAttendance(Request $request)
{
    $year = $request->input('year');
    $month = $request->input('month');
    $html = $request->input('html');
    dd($html);
    $userAttendance = DB::table('emp_attendance')
        ->leftJoin('users', 'users.userid', '=', 'emp_attendance.userid')
        ->select('emp_attendance.*', 'users.firstname', 'users.emp_id', 'users.image')
        ->whereYear('emp_attendance.date', '=', $year)
        ->whereMonth('emp_attendance.date', '=', $month)
        ->get();

    // Organize attendance data by user and date
    $formattedUserAttendance = [];
    foreach ($userAttendance as $attendance) {
        $currentDate = $attendance->date;
        $dayOfWeek = Carbon::parse($currentDate)->format('N');

        $formattedUserAttendance[$attendance->userid][$currentDate] = [
            'checkin_time' => $attendance->checkin_time,
            'checkout_time' => $attendance->checkout_time,
            'image' => $attendance->image,
            'firstname' => $attendance->firstname,
            'emp_id' => $attendance->emp_id,
            'week_off' => in_array($dayOfWeek, [6, 7]), // 6 is Saturday, 7 is Sunday
        ];
    }

    // Create an array for Excel export
    $excelExportData = [];
    $headers = ['Employee'];

    // Set headers for each day
    foreach (range(1, 31) as $day) {
        $headers[] = $day;
        $headers[] = 'Check-in Time';
        $headers[] = 'Check-out Time';
    }

    $excelExportData[] = $headers; // Set the headers

    foreach ($formattedUserAttendance as $userId => $userDays) {
        $row = [$userDays[key($userDays)]['firstname']];
    
        foreach (range(1, 31) as $day) {
            $currentDate = date("$year-$month-$day");
            $dayOfWeek = Carbon::parse($currentDate)->format('N');
    
            $attendanceData = $userDays[$currentDate] ?? null;
    
            if (in_array($dayOfWeek, [6, 7])) {
                $row[] = $dayOfWeek == 6 ? 'Saturday' : 'Sunday';
                $row[] = 'Week Off';
                $row[] = $attendanceData['checkin_time'] ?? '00:00';
                $row[] =  $attendanceData['checkout_time'] ?? '00:00';
            } else {
                $row[] = ''; // No day name for weekdays
                $row[] = '';
                $row[] = $attendanceData['checkin_time'] ?? '00:00';
                $row[] = $attendanceData['checkout_time'] ?? '00:00';
            }
        }
    
        $excelExportData[] = $row;
    }

    return Excel::download(new UserAttendanceExport($excelExportData), 'user_attendance_export.xlsx');
}






// public function exportAttendance(Request $request)
// {
//     $year = $request->input('year');
//     $month = $request->input('month');

//     $userAttendance = DB::table('emp_attendance')
//         ->leftJoin('users', 'users.userid', '=', 'emp_attendance.userid')
//         ->select('emp_attendance.*', 'users.firstname', 'users.emp_id', 'users.image')
//         ->whereYear('emp_attendance.date', '=', $year)
//         ->whereMonth('emp_attendance.date', '=', $month)
//         ->get();

//     // Organize attendance data by user and date
//     $formattedUserAttendance = [];
//     foreach ($userAttendance as $attendance) {
//         $currentDate = $attendance->date;
//         $dayOfWeek = Carbon::parse($currentDate)->format('N');

//         $formattedUserAttendance[$attendance->userid][$currentDate] = [
//             'checkin_time' => $attendance->checkin_time,
//             'checkout_time' => $attendance->checkout_time,
//             'image' => $attendance->image,
//             'firstname' => $attendance->firstname,
//             'emp_id' => $attendance->emp_id,
//             'week_off' => in_array($dayOfWeek, [6, 7]), // 6 is Saturday, 7 is Sunday
//         ];
//     }

//     // Define the year and month dynamically
//     $year = date('Y');
//     $month = date('m');

//     // Create an array for Excel export
//     $excelExportData = [];
//     foreach ($formattedUserAttendance as $userId => $userDays) {
//         $row = [
//             'Employee' => $userDays[key($userDays)]['firstname'],
//         ];

//         foreach (range(1, 31) as $day) {
//             $currentDate = date("$year-$month-$day");
//             $dayOfWeek = Carbon::parse($currentDate)->format('N');

//             if (in_array($dayOfWeek, [6, 7])) {
//                 $row[$day] = 'Week Off';
//             } else {
//                 if (isset($userDays[$currentDate])) {
//                     $attendanceData = $userDays[$currentDate];

//                     if ($attendanceData) {
//                         $row[$day] = $attendanceData['checkin_time'] ?? '00:00';
//                     } else {
//                         $row[$day] = 'Week Off';
//                     }
//                 }
//             }
//         }

//         $excelExportData[] = $row;
//     }

//     return Excel::download(new UserAttendanceExport($excelExportData), 'user_attendance_export.xlsx');
// }



    // public function exportAttendance(Request $request){
    //     $year = $request->input('year');
    //     $month = $request->input('month');

    //     $userAttendance = DB::table('emp_attendance')
    //     ->leftJoin('users', 'users.userid', '=', 'emp_attendance.userid')
    //     ->select('emp_attendance.*', 'users.firstname', 'users.emp_id', 'users.image')
    //     ->whereYear('emp_attendance.date', '=', $year)
    //     ->whereMonth('emp_attendance.date', '=',$month)
    //     ->get(); 
    //     $htmlTableData = view('exports.html_table', compact('userAttendance'))->render();

    //     return Excel::download(new HtmlTableExport($htmlTableData), 'user_attendance_export.xlsx');

    //     // return Excel::download(new UserAttendanceExport($userAttendance), 'user_attendance_export.xlsx');
    
    // }
    
    // public function calender(){

    //     return view('admin/calender');	
    
    // }
    
    public function salary(Request $request){
        $all_employees= DB::table('users')->where('status','A')->get();
        $getall_emp_salary= DB::table('emp_salary')
        ->leftJoin('users', 'users.userid', '=', 'emp_salary.userid')
        ->leftJoin('emp_details', 'emp_details.userid', '=', 'emp_salary.userid')
        ->select('emp_salary.*','users.firstname','users.image','users.emp_id','users.dept','emp_details.doj')->get();
        //dd($getall_emp_salary);
        return view('admin/salary' , compact('all_employees','getall_emp_salary'));	
    
    }

    public function SalaryPayroll(Request $request){
        $data=$request->all();
        if(!empty($data)){
            $userid=$request->staff;
            $grosssalary=$request->grosssalary;
            $basic=$request->basic;
            $da=$request->da;
            $hra=$request->hra;
            $areas_ot=$request->areas_ot;
            $allowance =$request->allowance;
            $insentive=$request->insentive;
            $bonus=$request->bonus;

            $tds=$request->tds;
            $esi=$request->esi;
            $pf=$request->pf;
            $insurancededuction=$request->insurancededuction;
            $Prof=$request->Prof;
            $staffconvdeduction=$request->staffconvdeduction;
            $otherDeductions=$request->otherDeductions;
            $total_gross_salary= $grosssalary+$basic+$da+$hra+$areas_ot+$allowance+$insentive+$bonus;
            $total_deduction_salary=$tds+$esi+$pf+$insurancededuction+$Prof+$staffconvdeduction;

            $total_net_pay=$total_gross_salary -  $total_deduction_salary;

            $salarydata = [
                'userid' => $userid,
                'gross_salary'=>$grosssalary,
                'basic_salary' => $basic,
                'da' => $da,
                'hra' => $hra,
                'allowance' => $allowance,
                'insentive' => $insentive,
                'areas_ot_salary'=>$areas_ot,
                'bonus' => $bonus,
                'tds' => $tds,
                'esi' => $esi,
                'pf' => $pf,
                'insurance_deduction' => $insurancededuction,
                'prof_tax' => $Prof,
                'staf_conv_deduc' => $staffconvdeduction,
                'others' => $otherDeductions,
                'total_gross_salary' => $total_gross_salary,
                'total_deduction_salary' => $total_deduction_salary,
                'net_pay_salary' => $total_net_pay,
                'salary_month'=>$request->salarydate,
                
            ];  
            $insert_salary = DB::table('emp_salary')->insert($salarydata);
            if($insert_salary){
                return response()->json(['success' => true, 'message' => 'You have added the employee salary.']);
            }else{
                return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
            }
           
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }

    public function GenerateSalary(Request $request, $empid, $salid){
        $emp_id=strtoupper($empid);
        $salary_id=$salid;
        $check_user=DB::table('users')->where('emp_id',$emp_id)->first();
       // dd($check_user);

        if(!empty($check_user)){
            //dd($check_salary_data);
            $getall_emp_salary= DB::table('emp_salary')->where('emp_salary.userid',$check_user->userid)->where('emp_salary.id',$salary_id)
            ->leftJoin('users', 'users.userid', '=', 'emp_salary.userid')
            ->leftJoin('emp_details', 'emp_details.userid', '=', 'emp_salary.userid')
            ->select('emp_salary.*','users.firstname','users.image','users.emp_id','users.dept','emp_details.doj')->first();
            //dd($getall_emp_salary);
            return view('admin/salary-view',compact('getall_emp_salary'));
        }else{
            return view('frontend/page_not_found');
        }
        	
    }

    public function ConsultantSalaryGenerateSalary(Request $request, $empid, $salid){
        $emp_id=strtoupper($empid);
        $salary_id=$salid;
        $check_user=DB::table('users')->where('emp_id',$emp_id)->first();
       // dd($check_user);

        if(!empty($check_user)){
            //dd($check_salary_data);
            $getall_emp_salary= DB::table('consultant_salary')->where('consultant_salary.userid',$check_user->userid)->where('consultant_salary.id',$salary_id)
            ->leftJoin('users', 'users.userid', '=', 'consultant_salary.userid')
            ->leftJoin('emp_details', 'emp_details.userid', '=', 'consultant_salary.userid')
            ->leftJoin('emp_bank_info', 'emp_bank_info.userid', '=', 'consultant_salary.userid')
            ->select('consultant_salary.*','users.firstname','users.lastname','users.image','users.emp_id','users.dept','emp_details.doj','emp_details.gender','emp_bank_info.account_holder_name','emp_bank_info.panno','emp_bank_info.bankaccount','users.design')
            ->first();
           // dd($getall_emp_salary);
            return view('admin/consultant-salary-slip',compact('getall_emp_salary'));
        }else{
            return view('frontend/page_not_found');
        }
        	
    }


    public function DeleteConsultantSalary(Request $request){
        $userid = $request->userid;
        $csid = $request->csIdToDelete;
        $check_emp_salary =DB::table('consultant_salary')->where('userid',$userid)->where('id',$csid)->first();
       // dd($check_emp_salary);
        if(!empty($check_emp_salary)){
            $delete_emp_salary= DB::table('consultant_salary')->where('id',$csid)->where('userid', $userid)->delete();
            if ($delete_emp_salary) {
                return response()->json(['success' => true, 'message' => 'Consultant Salary Deleted successfully']);
            } else{
                return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
            }
        }else{
            return response()->json(['error' => true, 'message' => 'Data not found']);
        }
        
        
    }
    

    public function GeneratePDF(Request $request, $empid, $salid) {
        $emp_id = strtoupper($empid);
        $salary_id = $salid;
        $check_user=DB::table('users')->where('emp_id',$emp_id)->first();
        $getall_emp_salary= DB::table('consultant_salary')->where('consultant_salary.userid',$check_user->userid)->where('consultant_salary.id',$salary_id)
        ->leftJoin('users', 'users.userid', '=', 'consultant_salary.userid')
        ->leftJoin('emp_details', 'emp_details.userid', '=', 'consultant_salary.userid')
        ->leftJoin('emp_bank_info', 'emp_bank_info.userid', '=', 'consultant_salary.userid')
        ->select('consultant_salary.*','users.firstname','users.lastname','users.image','users.emp_id','users.dept','emp_details.doj','emp_details.gender','emp_bank_info.account_holder_name','emp_bank_info.panno','emp_bank_info.bankaccount','users.design')
        ->first();
        
        if (!empty($getall_emp_salary)) {
            $filename = $getall_emp_salary->firstname . '_' . str_replace('-', '_', $getall_emp_salary->sal_month);
            $filename = preg_replace('/[^A-Za-z0-9_\-]/', '', $filename); 
            $pdf = PDF::loadView('admin.demopdf', compact('getall_emp_salary'));
            // $destinationPath = public_path('uploads/pdf');
            
            // if (!file_exists($destinationPath)) {
            //     mkdir($destinationPath, 0755, true);
            // }
            
            // $pdf->save($destinationPath . '/' . $filename . '.pdf');
            
            return $pdf->download($filename . '.pdf');
        } else {
            // Handle the case where the data is not found
        }
   }


    public function SalaryView(){

        return view('admin/salary-view');	
    
    }
    public function LeaveReports(){

        return view('admin/leave-reports');	
    
    }
    public function Reimbursement(){

        return view('admin/reimbursement');	
    
    }
    public function AttendanceReports(){

        return view('admin/attendance-reports');	
    
    }
    public function EmployeeReports(){

        return view('admin/employee-reports');	
    
    }
    public function consultantSalarySlip(Request $request){
      
        return view('admin/consultant-salary-slip');	
    
    }

    public function ConsultantSalaryPayroll(Request $request){
        $type = $request->type;
        $userid = $request->staff;
        $grosssalary = $request->grosssalary;
        $consolidated_fee = $request->consolidated_fee;
        $salary_month = $request->salary_month;
        $daypayable = $request->daypayable;
        $ntp = $request->ntp;
        $tds = $request->tds;
    
        $product_details = []; // Initialize array to store project details
    
        if($type == 'project_based') {
            // Loop through project details from the request and construct an array
            for($i = 0; $i < count($request->projects); $i++) {
                $project_details = [
                    'projectnumber' => $request->projects[$i]['projectnumber'],
                    'projectcost' => $request->projects[$i]['projectcost'],
                    'numberofday' => $request->projects[$i]['numberofday']
                ];
                $product_details[] = $project_details;
            }
        }
    
        $salarydata = [
            'userid' => $userid,
            'payable_days' => $daypayable,
            'sal_month' => $salary_month,
            'monthly_sal' => $grosssalary,
            'consolidated_fee' => $consolidated_fee,
            'tds' => $tds,
            'net_pay' => $ntp,
            'type' => $type,
            'project_details' => json_encode($product_details) // Encode project details array into JSON format
        ];  
    
        $insert_salary = DB::table('consultant_salary')->insert($salarydata);
        if($insert_salary){
            return response()->json(['success' => true, 'message' => 'You have added the employee salary.']);
        } else {
            return response()->json(['error' => true, 'message' => 'Something went wrong.']);
        }
    }
    
    public function ConsultantSalary(){
        $all_emp_sal=DB::table('users')->leftjoin('emp_details', 'emp_details.userid', '=', 'users.userid')
        ->select('users.firstname','users.lastname','users.email','users.userid','emp_details.salary_amt')->get();

        $get_all_consultant_salary=DB::table('consultant_salary')->leftjoin('users', 'users.userid', '=', 'consultant_salary.userid')
        ->select('users.firstname','users.lastname','users.emp_id','users.email','users.userid as uid','consultant_salary.*','users.image',)->get();
      //dd($get_all_consultant_salary);
        //dd($all_emp_sal);
		return view('admin/consultant-salary',compact('all_emp_sal','get_all_consultant_salary'));

	}

    public function EmployeeAssets(Request $request){
        if($request->asset == 'asset'){
            $all_assets = DB::table('assets')->where('assets.deleted_at',null)->leftjoin('users', 'users.userid', '=', 'assets.userid')
            ->where('users.orgname',$request->organization)
            ->select('assets.*','users.firstname')->paginate(10);
        }else{
            $all_assets = DB::table('assets')->where('assets.deleted_at',null)->leftjoin('users', 'users.userid', '=', 'assets.userid')
            ->select('assets.*','users.firstname')->paginate(10);
        }
        $all_employees= DB::table('users')->where('status','A')->get();
        

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


       // dd($all_assets);
        return view('admin/assets',compact('all_employees','all_assets','departmentsByOrganization'));	
    
    }

    public function PostEmployeeAssets(Request $request){
        $data = $request->all();
        if ($request->type === "add_asset") {
            $userid = $request->userid;
            $email = $request->email;
            $check_user =DB::table('users')->where('userid',$userid)->where('email',$email)->first();
            if(!empty($check_user)){
                $assetdata = [
                    'userid' => $userid,
                    'assetname'=>$request->assetname,
                    'assetid' => $request->assetid,
                    'purchase_date' => $request->purchase_date,
                    'purchase_from' => $request->purchase_from,
                    'modelid' => $request->modelid,
                    'serial_number'=>$request->serial_number,
                    'status' => $request->status,
                    'description'=>$request->description,
                ];  
                $updateassetdata = DB::table('assets')->insert($assetdata);
                if ($updateassetdata) {
                    return response()->json(['success' => true, 'message' => 'Asset Assigned successfully']);
                } 
            }else{
                return response()->json(['error' => true, 'message' => 'Employee not exist']);
            }
                
        } else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }

        

    }

    public function UpdateEmployeeAssets(Request $request){
        $data = $request->type;
        if ($data =="update_status") {
            $userid = $request->userId;
            $assetid = $request->assetId;
            $status=$request->status;
            $check_asset =DB::table('assets')->where('userid',$userid)->where('id',$assetid)->first();
            if(!empty($check_asset)){
                $assetdata = [
                    'status' => $request->status,
                    'updated_at'=>now(),
                ];  
                $updateassetdata = DB::table('assets')->where('userid', $userid)->where('id',$assetid)->update($assetdata);
                if ($updateassetdata) {
                    return response()->json(['success' => true, 'message' => 'Asset Status update successfully']);
                } 
            }else{
                return response()->json(['error' => true, 'message' => 'Employee not exist']);
            }
                
        }elseif($data =='get_asset_details'){
            $userid = $request->userId;
            $empId =$request->empId;
            $check_asset =DB::table('assets')->where('assets.userid',$userid)->where('assets.id',$empId)->leftjoin('users', 'users.userid', '=', 'assets.userid')
            ->select('assets.*','users.firstname','users.email','users.userid')->first();
            $all_employees= DB::table('users')->where('status','A')->get();
            if($check_asset){
                return response()->json(['success' => true, 'check_asset' => $check_asset,'all_employees'=>$all_employees]);
            }else{
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            }

        }elseif($data == "update_asset_info"){
            $userid = $request->userid;
            $aset_id=$request->aid;
            $check_asset =DB::table('assets')->where('userid',$userid)->where('id',$aset_id)->first();
            //dd($check_asset);
            $assetdata = [
                'userid' => $userid,
                'assetname'=>$request->assetname,
                'assetid' => $request->assetid,
                'purchase_date' => $request->purchase_date,
                'purchase_from' => $request->purchase_from,
                'modelid' => $request->modelid,
                'serial_number'=>$request->serial_number,
                'status' => $request->status,
                'description'=>$request->description,
            ];  
            $updateassetdata = DB::table('assets')->where('userid', $userid)->where('id',$check_asset->id)->update($assetdata);
            if ($updateassetdata) {
                return response()->json(['success' => true, 'message' => 'Asset Update successfully']);
            } else{
                return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
            }
        }elseif($data =="del_asset"){
            $userid = $request->userid;
            $asetid = $request->asetid;
            $check_asset =DB::table('assets')->where('userid',$userid)->where('id',$asetid)->first();
            $assetdata = [
                'deleted_at'=>now(),
            ];  
            $updateassetdata = DB::table('assets')->where('userid', $userid)->where('id',$check_asset->id)->update($assetdata);
            if ($updateassetdata) {
                return response()->json(['success' => true, 'message' => 'Asset Deleted successfully']);
            } else{
                return response()->json(['error' => true, 'message' => 'Somthing went wrong']);
            }
        
        }else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }
    public function PerformanceAppraisal(){

        return view('admin/performance-appraisal');	
    
    }
    public function Announcement(Request $request){
        $get_announcement= DB::table('announcement')->where('deleted_at',null)->get();

        return view('admin/announcement',compact('get_announcement'));	
    
    }

    public function SubmitAnnouncement(Request $request){

        $announcement_title_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $request->annoucmenttitle); 
        $announcement_title_final_slug = preg_replace('/-+/', '-', $announcement_title_string); 
        $announcement_title_slug = strtolower(rtrim($announcement_title_final_slug, '-'));

        $annoucmenT_desc=  $request->annoucmentdes;

        $data = $request->type;
        if ( $data == 'add') {
            $companyPoliciedata = [
                'title' => $request->annoucmenttitle,
                'description' => $annoucmenT_desc,
                'slug' =>$announcement_title_slug,
            ];
            $result = DB::table('announcement')->insert($companyPoliciedata);
            if ($result) {
                return response()->json(['success' => true, 'message' => 'Announcement added successfully']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            }
        }elseif($data == 'get'){
            $get_ann=DB::table('announcement')->where('id',$request->emid)->first();
            return response()->json(['success' => true, 'get_ann' => $get_ann]);
        }elseif($data == 'edit'){
            $companyPoliciedata = [
                'title' => $request->annoucmenttitle,
                'description' => $annoucmenT_desc,
                'slug' =>$announcement_title_slug,
            ];
            $result = DB::table('announcement')->where('id',$request->eid)->update($companyPoliciedata);
            if ($result) {
                return response()->json(['success' => true, 'message' => 'Announcement added successfully']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            }
        }elseif($data == 'del_anc'){
            $result = DB::table('announcement')->where('id',$request->ancid)->delete();
            if ($result) {
                return response()->json(['success' => true, 'message' => 'Announcement deleted successfully']);
            } else {
                return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            }
        }else{
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
            
        }                    
            
    }

    public function CompanyPolicies(Request $request){
        $check_company_policie_data = DB::table('com_policies')->where('policy_title','=','cp')->first();
        //dd($check_company_policie_data);
        return view('admin/company-policies',compact('check_company_policie_data'));	
    
    }
    public function TravelPolicies(Request $request){
        $check_travel_policie_data = DB::table('com_policies')->where('policy_title','=','tp')->first();
        //dd($check_travel_policie_data);
        return view('admin/travelpolicies',compact('check_travel_policie_data'));	
    
    }
    public function Travel(Request $request){
        $get_all_travel_req=DB::table('travel_req')
            ->leftJoin('users', 'users.userid', '=', 'travel_req.userid')
            ->where('travel_req.travel_details','!=',null)
            ->where('travel_req.deleted_at','=',null)
            ->select('travel_req.*','users.firstname','users.lastname')
            ->get();
        $get_all_hotel_req=DB::table('travel_req')
            ->leftJoin('users', 'users.userid', '=', 'travel_req.userid')
            ->where('travel_req.hotel_details','!=',null)
            ->where('travel_req.deleted_at','=',null)
            ->select('travel_req.*','users.firstname','users.lastname')
            ->get();
        //dd($get_all_travel_req);
        return view('admin/travel',compact('get_all_travel_req','get_all_hotel_req'));	
    
    }

    public function UpdateTravelStatus(Request $request){
        $data = $request->type;
        if ($data =="update_travel_status") {
            $userid = $request->userId;
            $travelid = $request->travelid;
            $status=$request->status;
            $check_asset =DB::table('travel_req')->where('userid',$userid)->where('id',$travelid)->first();
            if(!empty($check_asset)){
                $assetdata = [
                    'travel_status' => $request->status,
                    'travel_approved_by'=>Session::get('ad_id'),
                    'travel_updated_at'=>now(),
                ];  
                $updateassetdata = DB::table('travel_req')->where('userid', $userid)->where('id',$travelid)->update($assetdata);
                if ($updateassetdata) {
                    return response()->json(['success' => true, 'message' => 'Travel Status update successfully']);
                } 
            }else{
                return response()->json(['error' => true, 'message' => 'Employee not exist']);
            }

        }elseif($data =="update_hotel_status"){
            $userid = $request->userId;
            $travelid = $request->travelid;
            $status=$request->status;
            $check_asset =DB::table('travel_req')->where('userid',$userid)->where('id',$travelid)->first();
            if(!empty($check_asset)){
                $assetdata = [
                    'hotel_status' => $request->status,
                    'hotel_approved_by'=>Session::get('ad_id'),
                    'hotel_updated_at'=>now(),
                ];  
                $updateassetdata = DB::table('travel_req')->where('userid', $userid)->where('id',$travelid)->update($assetdata);
                if ($updateassetdata) {
                    return response()->json(['success' => true, 'message' => 'Travel Status update successfully']);
                } 
            }else{
                return response()->json(['error' => true, 'message' => 'Employee not exist']);
            }

        }else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }

    public function UpdateCompanyPolicies(Request $request){
        $data = $request->type;
        if ($data === "cp") {
            $companyPolicie = $request->companyPolicie;
            $check_company_policie_data = DB::table('com_policies')->where('policy_title', '=', 'cp')->first();
    
            if (empty($check_company_policie_data)) {
                $companyPoliciedata = [
                    'policy_title' => 'cp',
                    'policies' => $companyPolicie,
                ];
                $result = DB::table('com_policies')->insert($companyPoliciedata);
                if ($result) {
                    return response()->json(['success' => true, 'message' => 'Company policie added successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
                }
            } else {
                $updatecompanyPoliciedata = [
                    'policy_title' => 'cp',
                    'policies' => $companyPolicie,
                    'updated_at' => now(),
                ];
                $result = DB::table('com_policies')->where('policy_title', '=', 'cp')->update($updatecompanyPoliciedata);
                if ($result) {
                    return response()->json(['success' => true, 'message' => 'Company policie updated successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
                }
            }
        } elseif ($data === "tp") {
            $travelpolicie = $request->travelpolicie;
            $check_travel_policie_data = DB::table('com_policies')->where('policy_title', '=', 'tp')->first();
    
            if (empty($check_travel_policie_data)) {
                $travelpoliciedata = [
                    'policy_title' => 'tp',
                    'policies' => $travelpolicie,
                ];
                $result = DB::table('com_policies')->insert($travelpoliciedata);
                if ($result) {
                    return response()->json(['success' => true, 'message' => 'Travel policie added successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
                }
            } else {
                $updatetravelpoliciedata = [
                    'policy_title' => 'tp',
                    'policies' => $travelpolicie,
                    'updated_at' => now(),
                ];
                $result = DB::table('com_policies')->where('policy_title', '=', 'tp')->update($updatetravelpoliciedata);
                if ($result) {
                    return response()->json(['success' => true, 'message' => 'Travel policie updated successfully']);
                } else {
                    return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
                }
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }

    public function AssignRole(Request $request){
        $all_employees=DB::table('users')->where('status','A')->get();
        $all_assign_role=DB::table('tbl_admin')->where('type','!=',1)->get();
        //dd($all_assign_role);
        return view('admin/assign-role',compact('all_employees','all_assign_role'));	
    
    }
    public function UpdateAssignRole(Request $request){
        $empid=$request->empselect;
        $roleid=$request->emprole;
        $pass=$request->password;
        $check_user=User::where('userid',$empid)->first();
        if(!empty($check_user)){
            $data=[
                'name'=>$check_user->firstname,
                'username'=>$check_user->email,
                'password'=>md5($pass),
                'type'=>$roleid,
            ];
            $insert_id = $this->AdminModel->insert('tbl_admin', $data);
            if($insert_id){
                return response()->json(['success' => true, 'message' => 'Employee Role Assigned']);
            }else{
                return response()->json(['success' => false, 'message' => 'Somthing went wrong']); 
            }
            
        }else{
            return response()->json(['success' => false, 'message' => 'User Not exist']);
        }
    }

    public function DeleteAssignRole(Request $request){
        if($request->type == 'del_rl'){
            $delete_id = DB::table('tbl_admin')->where('admin_id', $request->rlid)->delete();
            return response()->json(['success' => true, 'message' => 'You have deleted the assigned role.']);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }

    public function AssignManagerTeamlead(Request $request){
        $all_employees=DB::table('users')->where('status','A')->get();
        $all_assign_role=DB::table('tbl_admin')->where('type','!=',1)->get();
        $get_manager=DB::table('tbl_admin')->where('type','=',3)->get();
        $get_team_lead=DB::table('tbl_admin')->where('type','=',4)->get();
        //dd($all_assign_role);
        $get_assigned_emp_manager_teamlead = DB::table('users')->where('manager_id','!=',null)
                ->leftJoin('tbl_admin as manager', 'manager.admin_id', '=', 'users.manager_id')
                ->leftJoin('tbl_admin as team_lead', 'team_lead.admin_id', '=', 'users.team_lead_id')
                ->select('users.firstname','users.lastname','users.userid','manager.name as managername','team_lead.name as teamleadname')
                ->get();

            //dd($get_assigned_emp_manager_teamlead);
        return view('admin/assigned-manager',compact('all_employees','all_assign_role','get_team_lead','get_manager','get_assigned_emp_manager_teamlead'));	
    
    }


    public function UpdateAssignManagerTeamlead(Request $request){
        //dd($request->all());
        $empid=$request->empselect;
        $manager=$request->manager;
        $teamlead=$request->teamlead;
        $check_user=User::where('userid',$empid)->first();
        if(!empty($check_user)){
            $data=[
                'manager_id'=>$manager,
                'team_lead_id'=>$teamlead,               
            ];
            $insert_id = DB::table('users')->where('userid', $empid)->update($data);
            if($insert_id){
                return response()->json(['success' => true, 'message' => 'Employee Manager & Team Lead Assigned Assigned']);
            }else{
                return response()->json(['success' => false, 'message' => 'Somthing went wrong']); 
            }
            
        }else{
            return response()->json(['success' => false, 'message' => 'User Not exist']);
        }
    }

    
    public function DeleteAssignManagerTeamlead(Request $request){
        if($request->type == 'del_rl'){

            $check_user=User::where('userid',$request->rlid)->first();
            if(!empty($check_user)){
                $data=[
                    'manager_id'=>null,
                    'team_lead_id'=>Null,               
                ];
                $insert_id = DB::table('users')->where('userid', $request->rlid)->update($data);
                if($insert_id){
                    return response()->json(['success' => true, 'message' => 'You have deleted the Employee Manager & Team Lead']);
                }else{
                    return response()->json(['success' => false, 'message' => 'Somthing went wrong']); 
                }
                
            }else{
                return response()->json(['success' => false, 'message' => 'User Not exist']);
            }

        }else{
            return response()->json(['error' => true, 'message' => 'Somthing Went wrong.']);
        }
    }


    public function GetProfileDetails(Request $request){
        //dd($request->all());
        if(!empty(Session::get('ad_id'))){
            $userid=$request->userid;
            $empdetails = DB::table('users')->where('users.userid',$userid)->leftJoin('emp_details', 'emp_details.userid', '=', 'users.userid')
            ->select('users.*','emp_details.id','emp_details.address','emp_details.gender','emp_details.img','emp_details.dob','emp_details.nationality','emp_details.religion','emp_details.maritalstatus','emp_details.noofchildren','emp_details.state','emp_details.pin','emp_details.doj','emp_details.salary_amt')
            ->first();
            //dd($empdetails);
            return response()->json(['success' => true, 'empdetails' => $empdetails]);
        }else{
            return response()->json(['success' => false, 'message' => 'Somthing went wrong']);
        }
        
    }
    
    public function EditProfileDetails(Request $request) {
        if (!empty(Session::get('ad_id'))) {
            $alldata = $request->all();
            //dd($alldata);
            $userid = $request->custId;

            //dd($userid);
            $type= $request->type;
            
            if($type == "subpi"){
                $check_emp_details = DB::table('emp_details')->where('userid', $userid)->first();
                if ($check_emp_details != null) {
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
                    $employeeTableDate = [
                        'noofchildren' => $request->no_of_children,
                        'nationality' => $request->nationality,
                        'userid'=>$userid,
                        'state' => $request->state,
                        'religion' => $request->religion,
                        'maritalstatus' => $request->marital_status,
                    ];
                    $update_employeeTableDate = DB::table('emp_details')->insert($employeeTableDate);
                    return response()->json(['success' => true, 'message' => 'Profile details updated successfully']);
                }
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
                    'lastname' => $request->lname,
                    'design' => $request->deg,
                    'dept' => $request->dept,
                    'orgname' => $request->orgname,
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
        //dd($data);
        if (!empty(Session::get('ad_id'))) {
            if ($request->hasFile('profileImage')) {
                // For header logo
                $profileimage = $request->file('profileImage');
                $profileimagefilename = $profileimage->getClientOriginalName();
                $profileimage->move(public_path('/uploads/profile'), $profileimagefilename);
                $profileimage_logo = $profileimagefilename;
    
                $userTableDate = [
                    'image' => $profileimage_logo, 
                ];
    
                $userid = $request->userid;
                $updateusertable = DB::table('users')->where('userid', $userid)->update($userTableDate);
    
                if ($updateusertable) {
                    return response()->json(['success' => true, 'message' => 'Profile photo updated successfully']);
                }
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Something Went Wrong']);
        }
    }
    public function GetEmargencyDetails(Request $request){
        if(!empty(Session::get('ad_id'))){
            $userid=$request->userid;
            $empdetails = DB::table('users')->where('users.userid',$userid)->leftJoin('emp_emargency_contact', 'emp_emargency_contact.userid', '=', 'users.userid')->select('emp_emargency_contact.*','users.userid as empid')->first();
            return response()->json(['success' => true, 'emp_emargency_contact' => $empdetails]);
        }else{
            return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
        }
        
    }

    public function EditEmargencyDetails(Request $request) {
        if (!empty(Session::get('ad_id'))) {
            $alldata = $request->all();
            $userid = $request->custId;
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
    public function GetBankDetails(Request $request){
        if(!empty(Session::get('ad_id'))){
            $userid=$request->userid;
            $empdetails = DB::table('users')->where('users.userid', $userid)->leftJoin('emp_bank_info', 'emp_bank_info.userid', '=', 'users.userid')->select('emp_bank_info.*','users.userid as empid')->first();
            return response()->json(['success' => true, 'emp_bank_info' => $empdetails]);
        }else{
            return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
        }
        
    }

    public function EditBankDetails(Request $request) {
        $all = $request->all();
    
        if (!empty(Session::get('ad_id'))) {
            $userid = $request->custId;
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
    
    public function DepartmentOrg(Request $request){
        
        $get_all_org=DB::table('organization')->get();
        $get_all_dept=DB::table('department')->leftJoin('organization', 'organization.id', '=', 'department.org_id')->select('department.*','organization.name')->get();
        //dd($get_all_dept);
        return view('admin/department-org',compact('get_all_org','get_all_dept'));	
    
    }
    public function SubmitDepartmentOrg(Request $request){
        $all = $request->all();
        $type= $request->type;
        if (!empty(Session::get('ad_id'))) {          
            if ($type == 'org') {
                $organizationTableDate = [
                    'name' => $request->organizationadd,  
                ];
                $check_org_name=DB::table('organization')->where('name',$request->organizationadd)->get();
                if(sizeof($check_org_name) > 0){
                    return response()->json(['success' => false, 'message' => 'This organization allready exixt!']);
                }else{
                    $insert_organizationTableDate = DB::table('organization')->insert($organizationTableDate);
                    if($insert_organizationTableDate){
                        return response()->json(['success' => true, 'message' => 'Organization added successfully']);
                    }else{
                        return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
                    }  
                }
                         
            }elseif($type == 'editorg'){

                $orgdetails = DB::table('organization')->where('id',$request->id)->first();
                return response()->json(['success' => true, 'orgdetails' => $orgdetails]);

            }elseif($type == 'updateorg'){
                $organizationTableDate = [
                    'name' => $request->organizationadd, 
                    'updated_at'=>now(), 
                ];
               
                $update_organizationTableDate = DB::table('organization')->where('id',$request->eorgid)->update($organizationTableDate);
                if($update_organizationTableDate){
                    return response()->json(['success' => true, 'message' => 'Organization update successfully']);
                }else{
                    return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
                }  
               
            }elseif($type == 'deleteorg'){
                $del_org_id= $request->id;
                $delete_organizationTableDate = DB::table('organization')->where('id',$del_org_id)->delete();
                if($delete_organizationTableDate){
                    return response()->json(['success' => true, 'message' => 'Organization deleted successfully']);
                }else{
                    return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
                }  
               
            }elseif($type == 'dept_add_by_orgid'){
                $departmentTableDate = [
                    'org_id' => $request->orid, 
                    'dept_name' => $request->dept_name, 
                ];
                $check_org_id_and_dept=DB::table('department')->where('org_id',$request->orid)->where('dept_name',$request->dept_name)->get();
                if(sizeof($check_org_id_and_dept) > 0){
                    return response()->json(['success' => false, 'message' => 'This organization department allready exist!']);
                }else{
                    $insert_departmentTableDate = DB::table('department')->insert($departmentTableDate);
                    if($insert_departmentTableDate){
                        return response()->json(['success' => true, 'message' => 'Organizational department added successfully']);
                    }else{
                        return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
                    }  
                }
            }elseif($type =='editdeptorg'){
                $deptid=$request->deptid;
                $orgId=$request->orgId;
                $check_org_id_and_dept=DB::table('department')->where('id',$deptid)->where('org_id',$orgId)->first();
                if($check_org_id_and_dept){
                    return response()->json(['success' => true, 'deptdetails' => $check_org_id_and_dept]);
                }else{
                    return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
                }
            }elseif($type == 'updateeditdeptorg'){
                $deptid=$request->deptid;
                $orgId=$request->orgId;
                $department_name=$request->department_name;

                $organizationTableDate = [
                    'dept_name' => $department_name, 
                    'updated_at'=>now(), 
                ];
               
                $update_organizationTableDate = DB::table('department')->where('id',$deptid)->where('org_id',$orgId)->update($organizationTableDate);
                if($update_organizationTableDate){
                    return response()->json(['success' => true, 'message' => ' Department update successfully']);
                }else{
                    return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
                }  
               
            }
            else {
                return response()->json(['error' => false, 'message' => 'Somthing went wrong']);
            }   
        }
        return response()->json(['error' => false, 'message' => 'Invalid user session']);
    }
    public function AddLocation(Request $request){
        $all_location=DB::table('office_locations')->where('deleted_at',null)->orderBy('id')->get();
        return view('admin/add-location',compact('all_location'));	 
    }

    public function PostLocation(Request $request){
        $address=$request->officeaddress;
        $city=$request->officecity;
        $officelat=$request->officelongitude;
        $officelng=$request->officelatitude;
        $threshold=$request->threshold;
        
        $data=[
            'address'=>$address,
            'city'=>$city,
            'officelat'=>$officelat,
            'officelng'=>$officelng,
            'threshold'=>$threshold,
        ];
        $insert_id = $this->AdminModel->insert('office_locations', $data);
        if($insert_id){
            return response()->json(['success' => true, 'message' => 'Office locations added successfully']);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing went wrong']); 
        }
                 
    }

    public function DeleteLocation(Request $request){
        $data = array(
            'deleted_at'=>now(),
        );
        $del_id = DB::table('office_locations')->where('id', $request->id)->update($data);

        if($del_id){
            return response()->json(['success' => true, 'message' => 'Office locations deleted successfully']);
        }else{
            return response()->json(['error' => true, 'message' => 'Somthing went wrong']); 
        }
    }
    

    public function EmpGeneratePDF(){
        // Load the view and generate the PDF
       $pdf = PDF::loadView('admin/emp-salary-pdf');
       
       // Define the destination directory and filename within the public folder
       $destinationPath = public_path('uploads/pdf');
       $filename = 'empsal.pdf';

       // Ensure the destination directory exists, create it if not
       if (!file_exists($destinationPath)) {
           mkdir($destinationPath, 0755, true);
       }

       // Save the PDF to the destination directory with the specified filename
       $pdf->save($destinationPath . '/' . $filename);

       // Return a response to download the PDF
       return $pdf->download($filename);

   }


    public function localTravel(){
        if (!empty(Session::get('ad_id'))) {
           
            $get_ltr_details=DB::table('local_travel')
            ->leftJoin('users', 'users.userid', '=', 'local_travel.userid')
            ->leftJoin('tbl_admin', 'tbl_admin.admin_id', '=', 'local_travel.approved_by')
            ->select('local_travel.*','users.firstname','users.lastname','users.image','users.emp_id','tbl_admin.name')->get();
            //dd($get_ltr_details);
            return view('admin/localtravel',compact('get_ltr_details'));	

        }else{
            return view('frontend/page_not_found');
        }
    }
    public function LocalTravelSubmit(Request $request) {
//dd($request->all());
        if (!empty(Session::get('ad_id'))) {
            $type = $request->type;
            $approved_by=Session::get('ad_id');
            if ($type == 'update_status') {
                $trid=$request->trId;
                $userid=$request->userId;
                
                $ltrData = [
                    'status' => $request->status,
                    'approved_by' => $approved_by,
                    'updated_at' => now(),
                ];
                $updateLtrData = DB::table('local_travel')->where('userid',$userid)->where('id',$trid)->update($ltrData);
                if($updateLtrData){
                    return response()->json(['success' => true, 'message' => 'Local travel data status change successfully']);
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



        public function localPayReimbursement(){
        if (!empty(Session::get('ad_id'))) {
            $userId = Session::get('member_id'); 
            $get_ltr_details=DB::table('local_pay_reimbursement') ->leftJoin('users', 'users.userid', '=', 'local_pay_reimbursement.userid')
            ->leftJoin('tbl_admin', 'tbl_admin.admin_id', '=', 'local_pay_reimbursement.approved_by')
            ->select('local_pay_reimbursement.*','users.firstname','users.lastname','users.image','users.emp_id','tbl_admin.name')->get();
           // dd($get_ltr_details);
            return view('admin/local-pay-reimbursement',compact('get_ltr_details'));	

        }else{
            return view('frontend/page_not_found');
        }
        }

        public function localPayReimbursementSubmit(Request $request) {

        if (!empty(Session::get('ad_id'))) {
            $approved_by = Session::get('ad_id');   
            $type = $request->type;
            if ($type == 'update_status') {
                $trid=$request->trId;
                $userid=$request->userId;
                
                $ltrData = [
                    'status' => $request->status,
                    'approved_by' => $approved_by,
                    'updated_at' => now(),
                ];
                $updateLtrData = DB::table('local_pay_reimbursement')->where('userid',$userid)->where('id',$trid)->update($ltrData);
                if($updateLtrData){
                    return response()->json(['success' => true, 'message' => 'Local pay data status change successfully']);
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


    



}


