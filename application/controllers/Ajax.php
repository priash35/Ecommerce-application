<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('cms_model');
    }

    // check superadmin login credentials
    function check_admin_login() {
        $this->load->model('login_model');
        $postData = array('password' => $_GET['fieldValue'], 'email' => $_GET['email']);

        $isLogin = $this->login_model->login($postData);
        if ($isLogin['flag'] == 1) {
            $arr = array($_GET['fieldId'], true, '');
        } else {
            $arr = array($_GET['fieldId'], false, 'Invalid email and password');
        }
        echo json_encode($arr);
    }

    //check email already exist or not
    function check_emailid_exist() {
        $result = $this->user_model->check_emailid_exist($_GET['fieldValue']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], False, 'Email already exist.');
        } else {
            $arr = array($_GET['fieldId'], true, '');
        }
        echo json_encode($arr);
    }

    //check email
    function check_emailid_forgot_pass() {
        $result = $this->user_model->check_emailid_exist($_GET['fieldValue']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], true, '');
        } else {
            $arr = array($_GET['fieldId'], false, 'Email id does not exist. Please enter a valid email id.');
        }
        echo json_encode($arr);
    }

    //check user email exist
    function check_email_exist() {
        $result = $this->user_model->check_user_emailid_exist($_GET['fieldValue'], $_GET['action'], $_GET['id']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], false, 'Email id already exist.');
        } else {
            $arr = array($_GET['fieldId'], true, '');
        }
        echo json_encode($arr);
    }

    function check_area_exist() {
        $result = $this->user_model->check_area_exist(strtolower($_GET['fieldValue']), $_GET['action'], $_GET['id']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], false, 'Area already exist.');
        } else {
            $arr = array($_GET['fieldId'], true, '');
        }
        echo json_encode($arr);
    }

    function check_category_exist() {
        $result = $this->category_model->check_category_exist(strtolower($_GET['fieldValue']), $_GET['action'], $_GET['id']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], false, 'Area already exist.');
        } else {
            $arr = array($_GET['fieldId'], true, '');
        }
        echo json_encode($arr);
    }

    //check email already exist or not
    function check_pass_exist() {
        $ses = $this->session->userdata('super_admin_logged_in');
        $result = $this->user_model->check_password_exist($_GET['fieldValue'], $ses['SUPER_ADMIN_SESS_ID']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], true, '');
        } else {
            $arr = array($_GET['fieldId'], false, 'Please enter correct password.');
        }
        echo json_encode($arr);
    }

    //check contact number already exist or not
    function check_contactctno_exist() {
        $ses = $this->session->userdata('super_admin_logged_in');
        $result = $this->venue_model->check_contact_exist($_GET['fieldValue'], $_GET['id'], $_GET['action'], $ses['SUPER_ADMIN_SESS_ID']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], false, 'Contact number already exist.');
        } else {
            $arr = array($_GET['fieldId'], true, '');
        }
        echo json_encode($arr);
    }

    //check user contact exist
    function check_user_contact_exist() {
        $result = $this->user_model->check_contact_exist($_GET['fieldValue'], $_GET['id'], $_GET['action']);
        if ($result == 1) {
            $arr = array($_GET['fieldId'], false, 'Contact number already exist.');
        } else {
            $arr = array($_GET['fieldId'], true, '');
        }
        echo json_encode($arr);
    }

    //change area status
    function area_status_change() {
        $result = $this->user_model->change_area_status($_POST['id'], $_POST['status']);
        echo 1;
    }

    //delete area
    function delete_city() {
        $result = $this->user_model->delete_city($_POST['id']);
        echo 1;
    }

//change area status

    function city_status_change() {
        $result = $this->user_model->change_city_status($_POST['id'], $_POST['status']);
        echo 1;
    }

    //delete area
    function delete_area() {
        $result = $this->user_model->delete_area($_POST['id']);
        echo 1;
    }

    //change area status
    function user_status_change() {
        $result = $this->user_model->change_user_status($_POST['id'], $_POST['status']);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

//change vendor  status

    function vendor_status_change() {
        $result = $this->user_model->vendor_status_change($_POST['id'], $_POST['status']);
        echo 1;
    }

    //delete user
    function delete_user() {
        $result = $this->user_model->delete_user($_POST['id']);
        echo 1;
    }

    //delete Vendor
    function delete_vendor() {
        $result = $this->user_model->delete_vendor($_POST['vid']);
        $result = $this->user_model->delete_user($_POST['uid']);
        echo 1;
    }

    //delete cms
        function delete_cms() {
        $result = $this->cms_model->delete_cms($_POST['cid']);
        echo 1;
    }

    function product_status_change() {
        $result = $this->product_model->change_product_status($_POST['id'], $_POST['status']);
        echo 1;
    }

    function delete_product() {
        $result = $this->product_model->delete_product($_POST['id']);
        echo 1;
    }

    function delete_product_color() {
        $result = $this->product_model->delete_product_color($_POST['id']);
        echo 1;
    }

    function brand_status_change() {
        $result = $this->product_model->change_brand_status($_POST['id'], $_POST['status']);
        echo 1;
    }

    function category_status_change() {
        $result = $this->category_model->change_category_status($_POST['id'], $_POST['status']);
        echo 1;
    }

    function sc_category_status_change() {
        $result = $this->category_model->change_sub_category_status($_POST['id'], $_POST['status']);
        echo 1;
    }

    function sz_category_status_change() {
        $result = $this->category_model->change_size_category_status($_POST['id'], $_POST['status']);
        echo 1;
    }
    
    

    //delete venue
    function delete_category() {
        $result = $this->category_model->delete_category($_POST['id']);
        echo 1;
    }

    //delete brand
    function delete_brand() {
        $result = $this->product_model->delete_brand($_POST['id']);
        echo 1;
    }

    function delete_sub_category() {
        $result = $this->category_model->delete_sub_category($_POST['id']);
        echo 1;
    }

    function delete_size_category() {
        $result = $this->category_model->delete_size_category($_POST['id']);
        echo 1;
    }

    function delete_prod_image() {
        $result = $this->product_model->delete_product_image($_POST['id'], $_POST['img_name']);
        echo 1;
    }

    function append_subcategory() {
        $get_subcategory = $this->category_model->get_subcategories_by_CatID($_POST['mydata']);
        $html = '<label>Select Sub Category</label>
            <select required class="form-control sec_id" id="sub_cat" name="sub_cat">';
        if (count($get_subcategory) > 0) {

            $html.= '<option value="">---Select Sub Category---</option>';
            foreach ($get_subcategory as $val) {

                $html.='<option value=' . $val['sc_pk_id'] . '>
                        ' . $val['sc_category_name'] . '
                    </option>';
            }
        } else {

            $html.= '<option value="">---Sub Category not found---</option>';
        }

        $html.='</select>';

        echo $html;
        die;
    }

    //gs
    function append_sub_subcategory() {
        $get_sub_subcategory = $this->category_model->get_sub_subcategories_by_CatID($_POST['mysubdata']);

        $html = '<label>Select Sub Sub Category</label>
            <select required class="form-control sec_id" id="sub_sub_cat" name="sub_sub_cat">';
        if (count($get_sub_subcategory) > 0) {

            $html.= '<option value="">---Select Sub Sub Category---</option>';
            foreach ($get_sub_subcategory as $val) {

                $html.='<option value=' . $val['sz_pk_id'] . '>
                        ' . $val['sz_category_name'] . '
                    </option>';
            }
        } else {

            $html.= '<option value="">---Sub Category not found---</option>';
        }

        $html.='</select>';

        echo $html;
        die;
    }


    function append_subcategory_addproduct() {
        $get_subcategory = $this->category_model->get_subcategories_by_CatID($_POST['mydata']);
        $html = '
            <select id="sub_catidXYZ" class="form-control sec_id" name="sub_cat">';
        if (count($get_subcategory) > 0) {

            $html.= '<option value="">---Select Sub Category---</option>';
            foreach ($get_subcategory as $val) {
                $html.='<option value=' . $val['sc_pk_id'] . '>
                        ' . $val['sc_category_name'] . '
                    </option>';
            }
        } else {

            $html.= '<option value="">---Sub Category not found---</option>';
        }

        $html.='</select>';


        echo $html;
        die;
    }

    function append_sizecategory_addproduct() {
        $get_sizecategory = $this->category_model->get_sizecategories_by_CatID($_POST['mydata1']);
        $html = ' <select class="form-control sec_id" id="size_cat" name="size_cat">';
        if (count($get_sizecategory) > 0) {

            $html.= '<option value="">---Select Sub Sub Category---</option>';
            foreach ($get_sizecategory as $val) {

                $html.='<option value=' . $val['sz_pk_id'] . '>
                        ' . $val['sz_category_name'] . '
                    </option>';
            }
        } else {

            $html.= '<option value="">---Sub Sub Category not found---</option>';
        }

        $html.='</select>';

        echo $html;
        die;
    }

    function append_Area_addproduct() {
        $get_sizecategory = $this->user_model->get_area_list_BY_CITYid($_POST['CITY']);

        $html = '
            <select required class="form-control validate[required]" id="area_' . $_POST['a'] . '" name="area_' . $_POST['a'] . '">';
        if (count($get_sizecategory) > 0) {

            $html.= '<option value="">---Please Select Area Pin Code---</option>';
            foreach ($get_sizecategory as $val) {

                $html.='<option value=' . $val['area_pk_id'] . '>
                        ' . $val['area_pin'] . '
                    </option>';
            }
        } else {

            $html.= '<option value="">---Area not found---</option>';
        }

        $html.='</select>';

        echo $html;
        die;
    }

    public function google() {
        $this->session->set_userdata('redirect_url', $_POST['redirectTo']);
        //$this->session->set_userdata('google_user_type', $_POST['usertype']);
        //$this->session->set_userdata('user_type', $_POST['usertype']);
        //echo $this->session->userdata('redirectTo');
        //exit;

        require_once(APPPATH . 'libraries/google/apiClient.php');
        require_once(APPPATH . 'libraries/google/contrib/apiPlusService.php');
        $client = new apiClient();
        $client->setApplicationName("9lessons Google+ Login Application");
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $plus = new apiPlusService($client);
        if ($this->session->userdata('access_token')) {
            $client->setAccessToken($this->session->userdata('access_token'));
        }
        if ($client->getAccessToken()) { //echo "A";die;
            $me = $plus->people->get('me');

            $optParams = array('maxResults' => 100);
            $activities = $plus->activities->listActivities('me', 'public', $optParams);

            // The access token may have been updated lazily.
            $client_token = $client->getAccessToken();
            $this->session->set_userdata('access_token', $client_token);
            echo '0+http://www.ecom.inncrotech.site/users/google';
        } else { //echo "AB";die;
            $authUrl = $client->createAuthUrl();
            echo '0+' . $authUrl;
        }
    }
    
    public function change_status($id, $table, $key, $status){
        $this->db->where($key, $id);
        $r = $this->db->update($table, array('status' => ($status == 1) ? 0 : 1));
        echo $r;
    }
    
    public function append_produt_size(){
        $data = $this->product_model->getsizeByCatId();
       
        $i=1;
        $ret= "";
        if(!empty($data)){
        foreach ($data as $row){
            $ret .= "<tr class='clacutate'>"
                    . "<td>".$row->size ." <input type='hidden' name='size[]' value='". $row->id ."'> </td>"
                    . "<td><input type='text' class='form-control text-center unitprice numericOnly' name='unitprice[]' onkeyup='product_disc(". $i .")' onblur='product_disc(". $i .")' onkeypress='return isNumber(event)' placeholder='Unit Price' id='unitprice". $i ."' data-rowid='". $i ."'></td>"
                    . "<td><input type='text' class='form-control text-center discount numericOnly' name='discount[]' onkeyup='product_disc(". $i .")' onblur='product_disc(". $i .")' onkeypress='return isNumber(event)' placeholder='Discount (%)' id='discount". $i ."' data-rowid='". $i ."'></td>"
                    . "<td><input type='text' class='form-control text-center proquantity numericOnly' name='quantity[]' placeholder='Quantity' id='quantity". $i ."' data-rowid='". $i ."'></td>"    
                    . "<td><input type='text' class='form-control text-center discPrice numericOnly' name='discPrice[]' placeholder='Discount Price' readonly id='discPrice". $i ."' data-rowid='". $i ."'></td>"    
                    . "<tr>";
            $i++;
        }
        }else{
            $ret .="<tr class='clacutate'>"
                    . "<td> <input type='hidden' name='size[]' value='0'> </td>"
                    . "<td><input type='text' class='form-control text-center unitprice numericOnly' name='unitprice[]' onkeyup='product_disc(". $i .")' onblur='product_disc(". $i .")' onkeypress='return isNumber(event)' placeholder='Unit Price' id='unitprice". $i ."' data-rowid='". $i ."'></td>"
                    . "<td><input type='text' class='form-control text-center discount numericOnly' name='discount[]' onkeyup='product_disc(". $i .")' onblur='product_disc(". $i .")' onkeypress='return isNumber(event)' placeholder='Discount (%)' id='discount". $i ."' data-rowid='". $i ."'></td>"
                    . "<td><input type='text' class='form-control text-center proquantity numericOnly' name='quantity[]' placeholder='Quantity' id='quantity". $i ."' data-rowid='". $i ."'></td>"
                    . "<td><input type='text' class='form-control text-center discPrice numericOnly' name='discPrice[]' placeholder='Discount Price' readonly id='discPrice". $i ."' data-rowid='". $i ."'></td>"
                    . "<tr>";
            $i++;
        }
        echo $ret;
    }
}

?>
