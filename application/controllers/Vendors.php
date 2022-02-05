<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model('user_model');
    }

    //load area list view
    public function index() {
        IsAdminActive();

        $Vendors_data = $this->user_model->get_Vendors_list();
        $isSuccess = '';
        $sendData = array('Vendors_data' => $Vendors_data, 'isSuccess' => $isSuccess);
        self::slicing('vendor_list', $sendData);
    }

    //load area list view
    public function add() {
        IsAdminActive();
        $isAddUser = '';
        $getSuccess = $this->uri->segment('3');

        if ($this->input->post()) {
            $FullPath = DOCUMENT_ROOT . 'assets/images/user_profile';
            if (!file_exists($FullPath)) {
                mkdir($FullPath, 0777, true);
            }
            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/user_profile/thumb/';
            if (!file_exists($FullPathThumb)) {
                mkdir($FullPathThumb, 0777, true);
            }
            if (isset($_FILES['user_photo']['name']) && $_FILES['user_photo']['name'] != '') {
                if (isset($_POST['user_photo_old']) && $_POST['user_photo_old'] != '') {
                    @unlink($FullPath . '/' . $_POST['user_photo_old']);
                    @unlink($FullPath . '/thumb/' . $_POST['user_photo_old']);
                }
                $fatherprf = $_FILES['user_photo']['name'];
                $user_photo = explode('.', $fatherprf);
                $userphoto = time() . 'user_photo' . $user_photo[0] . "." . $user_photo[1];


                $target = $FullPath . '/' . $userphoto;
                move_uploaded_file($_FILES['user_photo']['tmp_name'], $target);

                $image_path = base_url() . "assets/images/user_profile/" . $userphoto;
                $config['image_library'] = 'gd2';
                $config['source_image'] = DOCUMENT_ROOT . 'assets/images/user_profile/' . $userphoto;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['height'] = 200;
                $config['width'] = 200;
                $config['new_image'] = DOCUMENT_ROOT . 'assets/images/user_profile/thumb/' . $userphoto;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            } else if (isset($_POST['user_photo_old']) && $_POST['user_photo_old'] != '') {
                $userphoto = $_POST['user_photo_old'];
            } else {
                $userphoto = '';
            }
            $insertData = array(
                "user_first_name" => $_POST['first_name'],
                "user_last_name" => '',
                "user_email" => $_POST['email'],
                "user_password" => '',
                "user_contact" => $_POST['contact'],
                "user_address" => $_POST['address'],
                "profile_image" => $userphoto,
                "user_status" => 2,
                "user_type" => 3
            );
            $isAddUser = $this->user_model->add_user($insertData);
            $lastId = $this->db->insert_id();
            if ($isAddUser) {
                $vendercode = "VEN" . rand();
                $insertDataV = array(
                    "bus_name" => $_POST['bus_name'],
                    "vendorcode" => $vendercode,
                    "reg_no" => $_POST['reg_no'],
                    "ven_subcription" => $_POST['ven_subcription'],
                    "User_fk_id" => $lastId,
                );
                $isAddVendor = $this->user_model->add_vendor($insertDataV);
                if ($isAddVendor) {
                    $this->session->set_flashdata('add', 'User has been added successfully');
                    redirect(base_url() . 'Vendors', 'refresh');
                }
            }
        }
        $sendData = array('isAddUser' => $isAddUser, 'isSuccess' => $getSuccess);
        $subc_data = $this->user_model->get_subc_list();
        $isSuccess = '';
        $sendData = array('subc_data' => $subc_data, 'isSuccess' => $isSuccess);
        self::slicing('new_vendor', $sendData);
    }

    //edit user
    public function edit($vid) {
        $vid = intval(preg_replace('/[^0-9]+/', '', $vid));
        $Getid = $this->user_model->getUserIDBYvendorID($vid);
        $id = $Getid->User_fk_id;
        $getSuccess = $this->uri->segment('3');
        IsAdminActive();
        $isEditUser = '';

        if ($this->input->post()) {
            $FullPath = DOCUMENT_ROOT . 'assets/images/user_profile';
            if (!file_exists($FullPath)) {
                mkdir($FullPath, 0777, true);
            }
            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/user_profile/thumb/';
            if (!file_exists($FullPathThumb)) {
                mkdir($FullPathThumb, 0777, true);
            }
            if (isset($_FILES['user_photo']['name']) && $_FILES['user_photo']['name'] != '') {
                if (isset($_POST['user_photo_old']) && $_POST['user_photo_old'] != '') {
                    @unlink($FullPath . '/' . $_POST['user_photo_old']);
                    @unlink($FullPath . '/thumb/' . $_POST['user_photo_old']);
                }
                $userprf = $_FILES['user_photo']['name'];
                $user_photo = explode('.', $userprf);
                $userphoto = time() . 'user_photo' . $user_photo[0] . "." . $user_photo[1];


                $target = $FullPath . '/' . $userphoto;
                move_uploaded_file($_FILES['user_photo']['tmp_name'], $target);

                $image_path = base_url() . "assets/images/user_profile/" . $userphoto;
                $config['image_library'] = 'gd2';
                $config['source_image'] = DOCUMENT_ROOT . 'assets/images/user_profile/' . $userphoto;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['height'] = 200;
                $config['width'] = 200;
                $config['new_image'] = DOCUMENT_ROOT . 'assets/images/user_profile/thumb/' . $userphoto;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            } else if (isset($_POST['user_photo_old']) && $_POST['user_photo_old'] != '') {
                $userphoto = $_POST['user_photo_old'];
            } else {
                $userphoto = '';
            }
            $updateData = array(
                "user_first_name" => $_POST['first_name'],
                "profile_image" => $userphoto,
                "user_email" => $_POST['email'],
                "user_contact" => $_POST['contact'],
                "user_address" => $_POST['address'],
            );
            $isEditUser = $this->user_model->edit_user($updateData, $id);
            if ($isEditUser) {
                $updateDataV = array(
                    "bus_name" => $_POST['bus_name'],
                    "reg_no" => $_POST['reg_no'],
                    "ven_subcription" => $_POST['ven_subcription'],
                );
                $isEditVendor = $this->user_model->edit_vendor($updateDataV, $vid);
                IF ($isEditVendor) {
                    $this->session->set_flashdata('edit', 'Vendor has been updated successfully');
                    redirect(base_url() . 'Vendors/index', 'refresh');
                }
            }
        }
        $user_info = $this->user_model->get_user_byid($id);
        $VENDER_info = $this->user_model->getUserIDBYvendorID($vid);
        $subc_data = $this->user_model->get_subc_list();
        $sendData = array('isEditUser' => $isEditUser, 'subc_data' => $subc_data, 'getuser' => $user_info, 'VENDER_info' => $VENDER_info, 'isSuccess' => $getSuccess);
        self::slicing('new_vendor', $sendData);
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('superadmin/master/header');
        $this->load->view('superadmin/' . $viewTemp, $sendArray);
        $this->load->view('superadmin/master/left');
        $this->load->view('superadmin/master/footer');
    }

}

?>
