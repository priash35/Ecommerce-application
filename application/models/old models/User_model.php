<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
 
	 public function __construct(){
	  parent::__construct();
      $this->load->helper(array('form', 'url'));
	 }
	 function is_user_logedin_withotp(){
		$where = array('user_pk_id'=>$_SESSION['front_user_logged_in']['USER_SESS_ID']);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		return ($response->LOTP);
	 } 
	function check_emailid_exist($email){
		$where = array('user_email'=>$email);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	 }
	 function get_details_OTP($otp,$HEmail){
		$where = array('OTP'=>$otp,'user_email'=>$HEmail);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		
		if(isset($response->user_pk_id)&&($response->user_pk_id!='')){
			$data = array('user_status'=>1,'OTP'=>0);
			
			$where = array('user_pk_id'=>$response->user_pk_id);
			$this->db->update('users', $data, $where);
			$res = $this->db->affected_rows();
			if ($res == 1){
				echo $response->user_pk_id; die;
			}else{
				echo $response->user_pk_id; die;
			}
		}else{
			echo 0; die;
		}
		
	 }
	 function get_details_LOTP($otp){
		$where = array('LOTP'=>$otp,'user_pk_id'=>$_SESSION['front_user_logged_in']['USER_SESS_ID']);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		
		if(isset($response->user_pk_id)&&($response->user_pk_id!='')){
			$data = array('user_status'=>1,'OTP'=>0);
			
			$where = array('user_pk_id'=>$response->user_pk_id);
			$this->db->update('users', $data, $where);
			$res = $this->db->affected_rows();
			if ($res == 1){
				echo $response->user_pk_id; die;
			}else{
				echo $response->user_pk_id; die;
			}
		}else{
			echo 0; die;
		}
		
	 }
	function check_user_emailid_exist($email,$action,$id){
	    if($action=='Add'){
			$where = array('user_email'=>$email);
	    }else{
			$where = array('user_email'=>$email,'user_pk_id!='=>$id);
		}
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	}
	//user contact exist or not
	function check_contact_exist($contact,$id,$action){
		if($action=='Add'){
			$where = array('user_contact'=>$contact);
		}else{
			$where = array('user_contact'=>$contact,'user_pk_id!='=>$id);
		}
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	}
	function update_password($data,$id){
        $where = array('user_pk_id'=>$id);
		$this->db->update('users', $data, $where);
        return $this->db->affected_rows();
	}
	//check password exist or not
	function check_password_exist($pass,$id){
		$where = "user_password='".MD5(trim($pass))."' And user_pk_id ='".$id."'";
		$this->db->select('*');
        $getSqlRes = $this->db->get_where('users',$where);
		$response = $getSqlRes->row();
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	}
	//get user list
	function get_user_list(){
		$where = array();
		$query =$this->db->select('users.*,status.*')
				->from('users')
				->join('status','status.status_pk_id = users.user_status')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	//get user list
	function get_active_user_list(){
		$where = array('users.user_status'=>1);
		$query =$this->db->select('users.*,status.*')
				->from('users')
				->join('status','status.status_pk_id = users.user_status')
				->where($where)
				->get();
		return $result = $query->num_rows();
	}
	
	function add_user($data){
		$insert = $this->db->insert('users',$data);
        return $this->db->insert_id();
	}
	//delete user
	function delete_user($id){
		$this->db->delete('users', array('user_pk_id' => $id)); 
		return $this->db->affected_rows();
	}
	//get user by id 
	function get_user_byid($id){
		$where = array('user_pk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		return $response = $getSqlRes->row();
	}
	//update user
	function edit_user($data,$id){
		$where = array('user_pk_id'=>$id);
		$this->db->update('users', $data, $where);
        return $this->db->affected_rows();
	}
	//update status
	function change_user_status($id,$status){
		$user_status = ($status==1)?2:1;
		$data = array('user_status'=>$user_status);
		$where = array('user_pk_id'=>$id);
		$this->db->update('users', $data, $where);
        return $this->db->affected_rows();
	}
	//get all area
	function get_area_list(){
		$where = array();
		$query =$this->db->select('area.*,status.*')
				->from('area')
				->join('status','status.status_pk_id = area.area_status')
				->where($where)
				->get();
		return $result = $query->result_array();
		
	}
	//add area 
    function add_area($data){
		$insert = $this->db->insert('area',$data);
        return $this->db->insert_id();
	}
	//update area
	function edit_area($data,$id){
		$where = array('area_pk_id'=>$id);
		$this->db->update('area', $data, $where);
        return $this->db->affected_rows();
	}
	function change_area_status($id,$status){
		$area_status = ($status==1)?2:1;
		$data = array('area_status'=>$area_status);
		$where = array('area_pk_id'=>$id);
		$this->db->update('area', $data, $where);
        return $this->db->affected_rows();
	}
	function get_area_by_id($id){
		$where = array('area_pk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('area',$where);
		return $response = $getSqlRes->row();
	}
	function check_area_exist($area_name,$action,$id){
		if($action=='Add'){
			$where = array('LOWER(area_name)'=>$area_name);
		}else{
			$where = array('LOWER(area_name)'=>$area_name,'area_pk_id!='=>$id);
		}
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('area',$where);
		$response = $getSqlRes->row();
//echo $this->db->last_query();exit;
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	}
	function delete_area($id){
		$this->db->delete('area', array('area_pk_id' => $id)); 
		return $this->db->affected_rows();
	}
}
?>
