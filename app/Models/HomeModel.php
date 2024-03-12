<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Hash;
class HomeModel extends Model
{
	function getAllData($table,$limit){
    	$results = DB::table($table)->paginate($limit);
		return $results;
	}
	
	 
	
	function userlogin($user_email,$user_password){
		$user = DB::table('users')
        ->where('email', '=', $user_email)
        ->where('status', '=', 'A')
        ->first();
//dd($user); 
        if ($user && password_verify($user_password, $user->password)) {
            return $user;
        }
    
        return null;	
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
		$result = DB::table($table)->where('userid',$where)->update($data);
		//return $result;	
		if($result){
			return true;
		}else{
			return false;
		} 
	} 
	
	

}