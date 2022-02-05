<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function is_user_logedin_withotp() {
        $where = array('user_pk_id' => $_SESSION['front_user_logged_in']['USER_SESS_ID']);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();
//        return ($response->LOTP);
    }

    function check_emailid_exist($email) {
        $where = array('user_email' => $email);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_details_OTP($otp, $HEmail) {
        $where = array('OTP' => $otp, 'user_email' => $HEmail);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();

        if (isset($response->user_pk_id) && ($response->user_pk_id != '')) {
            $data = array('user_status' => 1, 'OTP' => 0);

            $where = array('user_pk_id' => $response->user_pk_id);
            $this->db->update('users', $data, $where);
            $res = $this->db->affected_rows();
            if ($res == 1) {
                echo $response->user_pk_id;
                die;
            } else {
                echo $response->user_pk_id;
                die;
            }
        } else {
            echo 0;
            die;
        }
    }

    function get_details_LOTP($otp) {
        $where = array('LOTP' => $otp, 'user_pk_id' => $_SESSION['front_user_logged_in']['USER_SESS_ID']);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();

        if (isset($response->user_pk_id) && ($response->user_pk_id != '')) {
            $data = array('user_status' => 1, 'OTP' => 0);

            $where = array('user_pk_id' => $response->user_pk_id);
            $this->db->update('users', $data, $where);
            $res = $this->db->affected_rows();
            if ($res == 1) {
                echo $response->user_pk_id;
                die;
            } else {
                echo $response->user_pk_id;
                die;
            }
        } else {
            echo 0;
            die;
        }
    }

    function check_user_emailid_exist($email, $action, $id) {
        if ($action == 'Add') {
            $where = array('user_email' => $email);
        } else {
            $where = array('user_email' => $email, 'user_pk_id!=' => $id);
        }
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    //user contact exist or not
    function check_contact_exist($contact, $id, $action) {
        if ($action == 'Add') {
            $where = array('user_contact' => $contact);
        } else {
            $where = array('user_contact' => $contact, 'user_pk_id!=' => $id);
        }
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function update_password($data, $id) {
        $where = array('user_pk_id' => $id);
        $this->db->update('users', $data, $where);
        return $this->db->affected_rows();
    }

    //check password exist or not
    function check_password_exist($pass, $id) {
        $where = "user_password='" . MD5(trim($pass)) . "' And user_pk_id ='" . $id . "'";
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        $response = $getSqlRes->row();
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    //get user list
//    function get_user_list() {
//        $where = array('users.user_type' => 0);
//        $query = $this->db->select('users.*,status.*')
//                ->from('users')
//                ->join('status', 'status.status_pk_id = users.user_status')
//                ->where($where)
//                ->get();
//        return $result = $query->result_array();
//    }

    //get get_subc_list list
    function get_subc_list() {
        $where = array();
        $query = $this->db->select('subcription.*')
                ->from('subcription')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    //get user list
    function get_active_user_list() {
        $where = array('users.user_status' => 1);
        $query = $this->db->select('users.*,status.*')
                ->from('users')
                ->join('status', 'status.status_pk_id = users.user_status')
                ->where($where)
                ->get();
        return $result = $query->num_rows();
    }

    function get_Vendors_list() {
        $where = array('users.user_type' => 3);
        $query = $this->db->select('users.*,vendors.* ,status.* ')
                ->from('users')
                ->join('vendors', 'vendors.User_fk_id = users.user_pk_id')
                ->join('status', 'status.status_pk_id = users.user_status')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }
    
    function get_Vendors_listActive() {
        $where = array('users.user_type' => 3, 'users.user_status' => 1);
        $query = $this->db->select('users.*,vendors.* ,status.* ')
                ->from('users')
                ->join('vendors', 'vendors.User_fk_id = users.user_pk_id')
                ->join('status', 'status.status_pk_id = users.user_status')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function add_user($data) {
        $insert = $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function add_vendor($data) {
        $insert = $this->db->insert('vendors', $data);
        return $this->db->insert_id();
    }

    //delete user
    function delete_user($id) {
        $this->db->delete('users', array('user_pk_id' => $id));
        return $this->db->affected_rows();
    }

    //delete vendor
    function delete_vendor($id) {
        $this->db->delete('vendors', array('vendor_pk_id' => $id));
        return $this->db->affected_rows();
    }

    //get user by id 
    function get_user_byid($id) {
        $where = array('user_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        return $response = $getSqlRes->row();
    }

    //get userID by vendor id 
    function getUserIDBYvendorID($id) {
        $where = array('vendor_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('vendors', $where);
        return $response = $getSqlRes->row();
    }

    //update vendor
    function edit_vendor($data, $id) {
       
        $where = array('vendor_pk_id' => $id);
        $this->db->update('vendors', $data, $where);
        return $this->db->affected_rows();
    }

//update user

    function edit_user($data, $id) {
       
        $where = array('user_pk_id' => $id);
        $t = $this->db->update('users', $data, $where);
        echo $this->db->last_query();
        die();
        return $t;
    }

    function get_user_list() {
        $where = array();
        $query = $this->db->select('*')
                ->from('users')
                ->where($where)
                ->get();

         $result = $query->result_array();
        return $result;
    }
    //gs
    function get_admin_list() {
        $where = array('user_type'=> 1);
        $query = $this->db->select('*')
                ->from('users')
                ->where($where)
                ->get();

         $result = $query->result_array();
        return $result;
    }

     function get_user_by_id($id) {
       
        $where = array('user_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('users', $where);
        return $response = $getSqlRes->row();
    }
    
    function get_track_list() {
        $where = array();
        $query = $this->db->select('*')
                ->from('orders')
                ->where($where)
                ->get();

         $result = $query->result_array();
         
        return $result;
    }

     function get_track_by_orderId($orderId) {
         $id = $this->session->userdata['front_user_logged_in']['USER_SESS_ID'];
        $query = $this->db->select('*')
                ->from('orders')
                ->where('order_id',$orderId)
                ->where('user_id',$id)
                ->get();
        $result = $query->row();
        
       
        if ($result > 0) {
            return $result;
        } else {
            return FALSE;
        }
        
    }
    
    function get_order_list_byUserId($userid) {
       
        $query = $this->db->select('*')
                ->from('orders')
//                ->join('orders', 'orders.user_id = users.user_pk_id','left')
//                ->join('order_detail', 'order_detail.orderid = orders.order_id','left')
//                ->join('product_images', 'product_images.product_fk_id = order_detail.productid','left')
                ->where('user_id',$userid)
                ->get();
        $result = $query->result();
        return $result;
    }
    
    function get_order_details_byUserId($orderid) {
       
        $query = $this->db->select('*')
                ->from('orders')
                ->join('order_detail', 'order_detail.orderid = orders.order_id','left')
                ->join('product_images', 'product_images.product_fk_id = order_detail.productid','left')
//                ->group_by('order_detail.orderid')
                ->where('order_id',$orderid)
                ->get();
        $result = $query->row();
//        echo "<pre>";
//        print_r($result);
//        echo "</pre>";
//        die();
        return $result;
    }

    //update status
    function change_user_status($id, $status) {
        $user_status = ($status == 1) ? 2 : 1;
        $data = array('user_status' => $user_status);
//        $where = array('' => );
        $this->db->where('user_pk_id', $id);
        $r =  $this->db->update('users', $data);
        return $r;
    }

    //update status
    function vendor_status_change($id, $status) {
        $user_status = ($status == 1) ? 2 : 1;
        $data = array('user_status' => $user_status);
        $where = array('user_pk_id' => $id);
        $r = $this->db->update('users', $data, $where);
        return $r;
    }

    //get all area
    function get_area_list() {
        $where = array();
        $query = $this->db->select('area.*,status.*')
                ->from('area')
                ->join('status', 'status.status_pk_id = area.area_status')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_area_list_BY_CITYid($id) {
        $where = array('city_id' => $id,'status'=>'active');
        $query = $this->db->select('area.*,status.*')
                ->from('area')
                ->join('status', 'status.status_pk_id = area.area_status')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    //get all city
    function get_city_list() {
        $where = array();
        $query = $this->db->select('city.*,status.*')
                ->from('city')
                ->join('status', 'status.status_pk_id = city.city_status')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }
    
    function get_city_listActive() {
        $query = $this->db->select('*')
                ->from('city')
                ->where('city_status', '1')
                ->get();
        return $result = $query->result_array();
    }
    
    

    //add area 
    function add_area($data) {
        $insert = $this->db->insert('area', $data);
        return $this->db->insert_id();
    }

    //update area
    function edit_area($data, $id) {
        $where = array('area_pk_id' => $id);
        $this->db->update('area', $data, $where);
        return $this->db->affected_rows();
    }

//add area 

    function add_city($data) {
        $insert = $this->db->insert('city', $data);
        return $this->db->insert_id();
    }

    //update area
    function edit_city($data, $id) {
        $where = array('city_pk_id' => $id);
        $this->db->update('city', $data, $where);
        return $this->db->affected_rows();
    }

    function change_area_status($id, $status) {
        $area_status = ($status == 1) ? 2 : 1;
        $data = array('area_status' => $area_status);
        $where = array('area_pk_id' => $id);
        $this->db->update('area', $data, $where);
        return $this->db->affected_rows();
    }

    function change_city_status($id, $status) {
        $city_status = ($status == 1) ? 2 : 1;
        $data = array('city_status' => $city_status);
        $where = array('city_pk_id' => $id);
        $this->db->update('city', $data, $where);
        return $this->db->affected_rows();
    }

    function get_area_by_id($id) {
        $where = array('area_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('area', $where);
        return $response = $getSqlRes->row();
    }

    function get_city_by_id($id) {
        $where = array('city_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('city', $where);
        return $response = $getSqlRes->row();
    }

    function check_area_exist($area_name, $action, $id) {
        if ($action == 'Add') {
            $where = array('LOWER(area_name)' => $area_name);
        } else {
            $where = array('LOWER(area_name)' => $area_name, 'area_pk_id!=' => $id);
        }
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('area', $where);
        $response = $getSqlRes->row();
//echo $this->db->last_query();exit;
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function check_city_exist($city_name, $action, $id) {
        if ($action == 'Add') {
            $where = array('LOWER(city_name)' => $city_name);
        } else {
            $where = array('LOWER(city_name)' => $city_name, 'city_pk_id!=' => $id);
        }
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('city', $where);
        $response = $getSqlRes->row();
//echo $this->db->last_query();exit;
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_area($id) {
        $this->db->delete('area', array('area_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function delete_city($id) {
        $this->db->delete('city', array('city_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function get_userdat_by_sessionID_delveryAdd() {


        $where = array('user_id' => $_SESSION['front_user_logged_in']['USER_SESS_ID']);
        $query = $this->db->select('*')
                ->from('userdelvaddress')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_userdat_by_sessionID() {
        $where = array('user_pk_id' => $_SESSION['front_user_logged_in']['USER_SESS_ID']);
        $query = $this->db->select('*')
                ->from('users')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_update_address($id) {

        $data = array(
            'uda_address1' => $_POST['address_1'],
            'uda_address2' => $_POST['address_2'],
            'uda_city' => $_POST['city_id'],
            'uda_pincode' => $_POST['postcode'],
            'uda_country' => $_POST['country_id'],
            'uda_state' => $_POST['state_id']
        );
        $where = array('uda_id' => $id);
        $this->db->update('userdelvaddress', $data, $where);

        return $this->db->affected_rows();
    }

    function get_addDel_address() {

        $data = array(
            'uda_address1' => $_POST['address_1'],
            'uda_address2' => $_POST['address_2'],
            'uda_city' => $_POST['city_id'],
            'uda_pincode' => $_POST['postcode'],
            'uda_country' => $_POST['country_id'],
            'user_id' => $_SESSION['front_user_logged_in']['USER_SESS_ID'],
            'uda_state' => $_POST['state_id']
        );

        $this->db->insert('userdelvaddress', $data);

        return $this->db->affected_rows();
    }
    
    public function getuser_wishlist(){
        $data = $this->session->userdata('front_user_logged_in');
        /*$this->db->order_by('w_id', 'DESC');
        return $this->db->get_where('wishlist', array('user_id' => $data['USER_SESS_ID']))->result();
*/
         $uid = $data['USER_SESS_ID'];
         $this->db->select('*');
         $this->db->from('wishlist w');
         $this->db->join('product p', 'w.w_pro_id = p.product_pk_id');
         $this->db->where('user_id', $uid);
         $query = $this->db->get();
         return $query->result();



    }

}

?>
