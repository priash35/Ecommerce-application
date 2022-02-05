<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Wishlist
 *
 * @author Pravinkumar
 */
class Wishlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $data = $this->session->userdata('front_user_logged_in');
        if ($data == "") {
            redirect(base_url());
        }

    }

    public function index() {
        $wishlist = $this->User_model->getuser_wishlist();
        $sendData = array('wishlist' => $wishlist);
        self::slicing('wishlist', $sendData);
    }

    public function add() {
        $data = $this->session->userdata('front_user_logged_in');
        if ($data == "") {
            redirect(base_url());
        }
        else{
            
           // $id = $this->input->post('id'); //$_POST['aid'];
             $id = $_POST['pid'];
             $col = $_POST['col'];
             $uid = $data['USER_SESS_ID'];

            // $udata = array('user_id' => $uid, 'w_pro_id' => $uid);

             $this->db->select('*');
             $this->db->from('wishlist');
             $this->db->where('user_id', $uid);
             $this->db->where('w_pro_id', $id);
             $query = $this->db->get();
             $dd =  $query->result();
            
             if(empty($dd)){
                    
                    $insdata = array('user_id' => $data['USER_SESS_ID'], 'w_pro_id' => $id, 'w_color' => $col,'create_date' => date('Y-m-d H:i:s'), 'status' => 1);
                    $d = $this->db->insert('wishlist', $insdata);
                    redirect('wishlist');
             }
             else
             {
                    $this->db->where('user_id', $uid);
                    $this->db->where('w_pro_id', $id);
                    $this->db->delete('wishlist');
                    //redirect('wishlist');
             }
           
             //redirect('wishlist');

            /* $uid = $data['USER_SESS_ID'];
             $this->db->select('*');
             $this->db->from('wishlist');
             $this->db->where('user_id', $uid);
             $this->db->or_where('w_pro_id', $id);
             $query = $this->db->get();
             $dd =  $query->result();

             print_r($dd);
             die();*/

        }
        /*$data = $this->session->userdata('front_user_logged_in');
        if ($data == "") {
            redirect(base_url());
        }
        $insdata = array('user_id' => $data['USER_SESS_ID'], 'wishlist_title' => $this->input->post('wishlittitle'), 'create_date' => date('Y-m-d H:i:s'), 'status' => 1);
        $d = $this->db->insert('wishlist', $insdata);
        redirect('wishlist');*/
    }

    public function delete($id) {
        $this->db->where('w_id', $id);
        $this->db->delete('wishlist');
        redirect('wishlist');
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('frontend/master/header', $sendArray);
        $this->load->view('frontend/' . $viewTemp);
        $this->load->view('frontend/master/footer');
    }

    //put your code here
}
