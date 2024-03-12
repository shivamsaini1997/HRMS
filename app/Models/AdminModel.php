<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\SiteInfo;
use App\Models\Challenge;
use App\Models\ToolkitDetails;

class AdminModel extends Model
{
	function getAllData($table,$limit){
    	$results = DB::table($table)->paginate($limit);
		return $results;
	}
		
	function getAllDataOrderBy($table,$id,$orderby){
    	$results = DB::table($table)->orderBy($id,$orderby)->get();
		return $results;
	}
	function getAllDataSelect($table,$select){
    	$results = DB::table($table)->select($select)->get();
		return $results;
	}
	function getRowById($table,$where){
	$row = DB::table($table)->where($where)->first();
	return $row;
	}
	function insert($table, $data){
		$result = DB::table($table)->insert($data);
		//return $result;
		return DB::getPdo()->lastInsertId();
	}
	function getResultById($table, $where){
	$result = DB::table($table)->where($where)->get();
	return $result;
	}
	function update_row($table, $data, $where){
		$result = DB::table($table)->where($where)->update($data);
		//return $result;	
		if($result){
			return true;
		}else{
			return false;
		} 
	} 
	
	function getLastRowById($table,$where,$id,$orderby){
	$last_row=DB::table($table)->where($where)->orderBy($id,$orderby)->first();
	return $last_row;
	}
	
    /* Admin Login */
	function userlogin($username,$password){
		$results= DB::table('tbl_admin')
			->where('username','=',$username)
			->where('password','=',md5($password))
			->where('status','=','A')
			->first();
		return $results;	
	}
	/* Check user exist or not */
	function checkuser($username){
		$results= DB::table('tbl_admin')
			->where('username','=',$username)
			->where('status','=','A')
			->first();
		return $results;	
	}
	function checkdetailsuser($id){
		$results= DB::table('tbl_admin')
			->where('admin_id','=',$id)
			->first();
		return $results;	
	}	
	function checkcurrentpassword($id,$new_password){
		$results= DB::table('tbl_admin')
			->where('admin_id','=',$id)
			->where('password','=',$new_password)
			->first();
		return $results;	
	}
	function user_update($data,$id){
		$results = DB::table('tbl_admin')
            ->where('admin_id', $id)
            ->update($data);
			return $results;	
	}
	
	function EditedAddSiteInfo($data,$id){
		$result=SiteInfo::where('id',$id)->update($data);
		return $result;
	}
	
	
	function EditedAddproducts($data,$id){
		$result=SiteInfo::where('id',$id)->update($data);
		return $result;
	}
	
	function ManageSiteinfo($search){
		if($search == ''){
		$results = SiteInfo::paginate(15);
		}else{
			$results = SiteInfo::where('title','LIKE','%'.$search.'%')->orwhere('description','LIKE','%'.$search.'%')->paginate(15);
			
		}
		return $results; 
		 
	}
	
	
	
	function EditSiteinfo($id){
		$result=SiteInfo::where('id',$id)
		->first();
		return $result;
	}
	
	function DeleteSiteinfo($id){
		$result = SiteInfo::where('id', $id)->delete();
		return $result;	
	}
	
	function SiteinfoStatus($id,$data){
		$results = SiteInfo::where('id', $id)->update($data);
			return $results;
	
	}
	
	function ManageJudges($search){
		if($search == ''){
		$results = DB::table('tbl_admin')->where('type',3)->paginate(10);
		}else{
			$results = DB::table('tbl_admin')
			->where('type',3)
			    ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                          ->orWhere('username', 'LIKE', '%' . $search . '%');
                })->paginate(10);
			
		}
		return $results; 
		 
	}
	
	function EditedAddJudgeInfo($data,$id){
		$result=DB::table('tbl_admin')->where('admin_id',$id)->where('admin_id','!=',1)->where('type',3)->update($data);
		return $result;
	}
	
	function EditJudge($id){
		$result=DB::table('tbl_admin')->where('admin_id',$id)->where('type',3)->where('admin_id','!=',1)
		->first();
		return $result;
	}
	
	function DeleteJudge($id){
		$result = DB::table('tbl_admin')->where('admin_id', $id)->where('type',3)->where('admin_id','!=',1)->delete();
		return $result;	
	}
	
	function JudgeStatus($id,$data){
		$results = DB::table('tbl_admin')->where('admin_id', $id)->where('type',3)->where('admin_id','!=',1)->update($data);
			return $results;
	
	}
	
	function ManageMentorExpert($search){
		if($search == ''){
		$results = DB::table('tbl_admin')->where('type','=',4)->paginate(10);
		}else{
			$results = DB::table('tbl_admin')
			->where('type', 4)
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                          ->orWhere('username', 'LIKE', '%' . $search . '%');
                })
                ->paginate(10);
			
		}
		return $results; 
		 
	}
	
	function EditedAddMentorExpertInfo($data,$id){
		$result=DB::table('tbl_admin')->where('admin_id',$id)->where('type',4)->where('admin_id','!=',1)->update($data);
		return $result;
	}
	
	function EditMentorExpert($id){
		$result=DB::table('tbl_admin')->where('admin_id',$id)->where('type',4)->where('admin_id','!=',1)
		->first();
		return $result;
	}
	
	function DeleteMentorExpert($id){
		$result = DB::table('tbl_admin')->where('admin_id', $id)->where('type',4)->where('admin_id','!=',1)->delete();
		return $result;	
	}
	
	function MentorExpertStatus($id,$data){
		$results = DB::table('tbl_admin')->where('admin_id', $id)->where('type',4)->where('admin_id','!=',1)->update($data);
			return $results;
	
	}
	
	function EditedAddChallenge($data,$id){
		$result=Challenge::where('id',$id)->where('status','A')->update($data);
		return $result;
	}
	
	function ManageChallenge($search){
		if($search == ''){
		$results = DB::table('challenges')->paginate(10);
		}else{
			$results = DB::table('challenges')
			->where('type', 4)
                ->where(function ($query) use ($search) {
                    $query->where('challenge_title', 'LIKE', '%' . $search . '%')
                          ->orWhere('org_name', 'LIKE', '%' . $search . '%')
                          ->orWhere('hashtags', 'LIKE', '%' . $search . '%')
                          ->orWhere('eligibility', 'LIKE', '%' . $search . '%');
                })
                ->paginate(10);
			
		}
		return $results; 
		 
	}
	
	function EditChallenge($id){
		$result=Challenge::where('id',$id)
		->first();
		return $result;
	}
	
	function DeleteChallenge($id){
		$result = Challenge::where('id', $id)->delete();
		return $result;	
	}
	
	function ChallengeStatus($id,$data){
		$results = Challenge::where('id', $id)->update($data);
			return $results;
	
	}
	
	function EditSubmitAddUseItBtnPage($data,$id){

		$result=DB::table('toolkit_details')->where('id',$id)->update($data);

		return $result;

	}
	
	function ManageUseItBtnPage($search){
		if($search == ''){
		$results = DB::table('toolkit_details')->paginate(5);
		}else{
			$results = DB::table('toolkit_details')
			->where('type', 4)
                ->where(function ($query) use ($search) {
                    $query->where('toolkit_category', 'LIKE', '%' . $search . '%')
                          ->orWhere('toolkit_title', 'LIKE', '%' . $search . '%');
                })
                ->paginate(5);
			
		}
		return $results; 
		 
	}
	
	
	function EditUseItBtnPage($id){

		$result=ToolkitDetails::where('id',$id)

		->first();
        //dd($result);
		return $result;

	}
}