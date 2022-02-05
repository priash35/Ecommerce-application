<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
	}

	// check superadmin login credentials
    function check_admin_login()
    {
		$this->load->model('login_model');
        $postData = array('password'=>$_GET['fieldValue'],'email'=>$_GET['email']);

        $isLogin = $this->login_model->login($postData);
        if($isLogin['flag'] == 1) {
            $arr = array($_GET['fieldId'],true,'');
        } else {
            $arr = array($_GET['fieldId'],false,'Invalid email and password');
        }
        echo json_encode($arr);
    }
	
	
	//check email already exist or not
	function check_emailid_exist(){
		$result = $this->user_model->check_emailid_exist($_GET['fieldValue']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],False,'Email already exist.');
        } else {
            $arr = array($_GET['fieldId'],true,'');
        }
        echo json_encode($arr);
	}


	//check email
	function check_emailid_forgot_pass(){
		$result = $this->user_model->check_emailid_exist($_GET['fieldValue']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],true,'');
        } else {
            $arr = array($_GET['fieldId'],false,'Email id does not exist. Please enter a valid email id.');
        }
        echo json_encode($arr);
	}
	//check user email exist
	function check_email_exist(){
		$result = $this->user_model->check_user_emailid_exist($_GET['fieldValue'],$_GET['action'],$_GET['id']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],false,'Email id already exist.');
        } else {
            $arr = array($_GET['fieldId'],true,'');
        }
        echo json_encode($arr);
	}
	function check_area_exist(){
		$result = $this->user_model->check_area_exist(strtolower($_GET['fieldValue']),$_GET['action'],$_GET['id']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],false,'Area already exist.');
        } else {
            $arr = array($_GET['fieldId'],true,'');
        }
        echo json_encode($arr);
		
	}
	function check_category_exist(){
		$result = $this->category_model->check_category_exist(strtolower($_GET['fieldValue']),$_GET['action'],$_GET['id']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],false,'Area already exist.');
        } else {
            $arr = array($_GET['fieldId'],true,'');
        }
        echo json_encode($arr);
		
	}
	//check email already exist or not
	function check_pass_exist(){
		$ses = $this->session->userdata('super_admin_logged_in');
		$result = $this->user_model->check_password_exist($_GET['fieldValue'],$ses['SUPER_ADMIN_SESS_ID']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],true,'');
        } else {
            $arr = array($_GET['fieldId'],false,'Please enter correct password.');
        }
        echo json_encode($arr);
	}
	//check contact number already exist or not
	function check_contactctno_exist(){
		$ses = $this->session->userdata('super_admin_logged_in');
		$result = $this->venue_model->check_contact_exist($_GET['fieldValue'],$_GET['id'],$_GET['action'],$ses['SUPER_ADMIN_SESS_ID']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],false,'Contact number already exist.');
        } else {
            $arr = array($_GET['fieldId'],true,'');
        }
        echo json_encode($arr);
	}
	//check user contact exist
	function check_user_contact_exist(){
		$result = $this->user_model->check_contact_exist($_GET['fieldValue'],$_GET['id'],$_GET['action']);
        if($result == 1) {
            $arr = array($_GET['fieldId'],false,'Contact number already exist.');
        } else {
            $arr = array($_GET['fieldId'],true,'');
        }
        echo json_encode($arr);
	}
	//change area status
	function area_status_change(){
		$result = $this->user_model->change_area_status($_POST['id'],$_POST['status']);
		echo 1;
	}
	//delete area
	function delete_area(){
		$result = $this->user_model->delete_area($_POST['id']);
		echo 1;
	}
	//change area status
	function user_status_change(){
		$result = $this->user_model->change_user_status($_POST['id'],$_POST['status']);
		echo 1;
	}
	//delete user
	function delete_user(){
		$result = $this->user_model->delete_user($_POST['id']);
		echo 1;
	}
	function product_status_change(){
		$result = $this->product_model->change_product_status($_POST['id'],$_POST['status']);
		echo 1;
	}
	function delete_product(){
		$result = $this->product_model->delete_product($_POST['id']);
		echo 1;
	}
	function category_status_change(){
		$result = $this->category_model->change_category_status($_POST['id'],$_POST['status']);
		echo 1;
	}
	//delete venue
	function delete_category(){
		$result = $this->category_model->delete_category($_POST['id']);
		echo 1;
	}
	function delete_sub_category(){
		$result = $this->category_model->delete_sub_category($_POST['id']);
		echo 1;
	}
	function delete_prod_image(){
		$result = $this->product_model->delete_product_image($_POST['id'],$_POST['img_name']);
		echo 1;
	}
	function append_subcategory(){
		$get_subcategory = $this->category_model->get_sub_category_list($_POST['mydata']);
		$html ='<label>Select Sub Category<span style="color:red">*</span></label>
            <select class="form-control sec_id validate[required]" id="sub_cat" name="sub_cat">';
        if(count($get_subcategory)>0){

            $html.= '<option value="">---Select Sub Category---</option>';
            foreach($get_subcategory as $val) {

            $html.='<option value='.$val['sc_pk_id'].'>
                        '.$val['sc_category_name'].'
                    </option>';

            }
         }else {

            $html.= '<option value="">---Sub Category not found---</option>';
         }

        $html.='</select>';

        echo $html;die;
	}
}

?>
