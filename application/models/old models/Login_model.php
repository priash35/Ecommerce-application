<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
 
	public function __construct(){
		parent::__construct();
	}	
	
	function login($postData)
	{
        $mainTable = 'users';
        $select = '*';
        $tablesReln = array(
                           );

        $where = array('user_email'=>$postData['email'],
                       'user_password'=>md5($postData['password']),
					   'user_type'=>1,
					   'user_status'=>1);
        $resultArray = $this->joinSql($select,$where,$mainTable,$tablesReln);
		if(count($resultArray) > 0)
        {   
            $sessArray = array(
                'SUPER_ADMIN_SESS_ID' => $resultArray[0]->user_pk_id,
                'SUPER_ADMIN_USER_NAME' => $resultArray[0]->user_first_name,
                'SUPER_ADMIN_USER_TYPE' => $resultArray[0]->user_type,
                'SUPER_ADMIN_LAST_LOGIN' => $resultArray[0]->user_last_login_time,
				'FIRST_TIME_USER' => $resultArray[0]->first_time_user
            );
            
            $this->session->set_userdata('super_admin_logged_in', $sessArray);

            return array('flag'=>'1');
                        
        } else {
        
            return array('flag'=>'0');
        }
	}
	function login_user_ajax($postData)
	{
        $mainTable = 'users';
        $select = '*';
        $tablesReln = array(
                           );

        $where = array('user_email'=>$postData['email'],
                       'user_password'=>md5($postData['password']),
					   'user_type'=>0,
					   'user_status'=>1);
        $resultArray = $this->joinSql($select,$where,$mainTable,$tablesReln);
		
		return $resultArray;
	}
	function get_details($email){ 
        $where = array('user_email'=>$email);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('users',$where);
		return $response = $getSqlRes->row();
	}
	function login_user($postData)
	{
        $mainTable = 'users';
        $select = '*';
        $tablesReln = array(
                           );

        $where = array('user_email'=>$postData['email'],
                       'user_password'=>md5($postData['password']),
					   'user_type'=>0,
					   'user_status'=>1);
        $resultArray = $this->joinSql($select,$where,$mainTable,$tablesReln);
		
	    if(count($resultArray) > 0)
        {   
            $sessArray = array(
                'USER_SESS_ID' => $resultArray[0]->user_pk_id,
                'USER_NAME' => $resultArray[0]->user_first_name,
                'USER_TYPE' => $resultArray[0]->user_type,
                'USER_LAST_LOGIN' => $resultArray[0]->user_last_login_time,
				'FIRST_TIME_USER' => $resultArray[0]->first_time_user
            );
            
            $this->session->set_userdata('front_user_logged_in', $sessArray);

            return array('flag'=>'1');
                        
        } else {
        
            return array('flag'=>'0');
        }
	}
	function joinSql($select,$whereArr,$tables,$Joinrelation,$orderByColumn='', $orderBy='desc',$isOrderArr='')
    {
        $response = array();
        $this->db->select($select);
        if($isOrderArr == "") {
            $this->db->order_by($orderByColumn, $orderBy);
        } else {
            if(count($orderByColumn) > 0) {
                foreach($orderByColumn as $keyO=>$valueO) {
                    $this->db->order_by($keyO,$valueO);
                }
            }
        }
                        
        if(count($whereArr) > 0) {
            foreach($whereArr as $key=>$value) {
                $this->db->where($key,$value);
            }
        }
        $this->db->from($tables);
        foreach($Joinrelation as $key=>$value) {
            $this->db->join($key, $value);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $response = $query->result();
            return $response;
        } else {
        
            return $response;
        }
    }
	function update_password($data,$email){ 
        $where = array('user_email'=>$email);
		$this->db->update('users', $data,$where);
        return $this->db->affected_rows();
	}
    //update user type
	function update_user_login_time($data,$id){
		$where = array('user_pk_id'=>$id);
		$this->db->update('users', $data, $where);
        return $this->db->affected_rows();
	 }
	
}
?>