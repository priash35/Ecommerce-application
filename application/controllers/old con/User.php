<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('user_model');
		$this->load->library('image_lib');
	}
	
	//change password
	public function change_password()
	{	
		IsAdminActive();
		$ses = $this->session->userdata('super_admin_logged_in');
		if($this->input->post()) {
			$updateData = array(
							"password"=>MD5(trim($_POST['t_password']))
						);
			$updUserpass = $this->user_model->update_password($updateData,$ses['SUPER_ADMIN_SESS_ID']);
			$this->session->set_flashdata('msg', 'Password updated successfully');
			redirect(base_url().'user/change_password', 'refresh');
		}
		$getSuccess = $this->uri->segment('3');
		$sendData = array('isSuccess'=>$getSuccess);
		self::slicing('change_password',$sendData);
	}
	//user list
	public function user_list(){
		IsAdminActive();
		$user_data = $this->user_model->get_user_list();
		$isSuccess='';
		$sendData = array('user_data'=>$user_data,'isSuccess'=>$isSuccess);
                
		self::slicing('user_list',$sendData);
	}
	//add user
	public function add_user(){
		IsAdminActive();
		$isAddUser = '';
		$getSuccess = $this->uri->segment('3');
		
		if($this->input->post()) {
			$FullPath =  DOCUMENT_ROOT.'assets/images/user_profile';
			if (!file_exists($FullPath)) {
				mkdir($FullPath, 0777, true);
			}
			$FullPathThumb = DOCUMENT_ROOT.'assets/images/user_profile/thumb/';
			if (!file_exists($FullPathThumb)) {
				mkdir($FullPathThumb, 0777, true);
			} 
			if(isset($_FILES['user_photo']['name']) && $_FILES['user_photo']['name']!=''){
				if(isset($_POST['user_photo_old']) && $_POST['user_photo_old']!=''){
					@unlink($FullPath.'/'.$_POST['user_photo_old']);
					@unlink($FullPath.'/thumb/'.$_POST['user_photo_old']);
				}
				$fatherprf = $_FILES['user_photo']['name'];
				$user_photo = explode('.',$fatherprf);
				$userphoto = time().'user_photo'.$user_photo[0].".".$user_photo[1];


				$target = $FullPath.'/'.$userphoto;
				move_uploaded_file($_FILES['user_photo']['tmp_name'], $target);

				$image_path = base_url()."assets/images/user_profile/".$userphoto;
				$config['image_library'] = 'gd2';
				$config['source_image'] = DOCUMENT_ROOT.'assets/images/user_profile/'.$userphoto;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['height'] = 200;
				$config['width'] = 200;
				$config['new_image'] = DOCUMENT_ROOT.'assets/images/user_profile/thumb/'.$userphoto;
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

			}else if(isset($_POST['user_photo_old']) && $_POST['user_photo_old']!=''){
				$userphoto = $_POST['user_photo_old'];
			}else{
				$userphoto = '';
			}
			$insertData = array(
							"user_first_name"=>$_POST['first_name'],
							"user_last_name"=>$_POST['last_name'],
							"user_email"=>$_POST['email'],
							"user_password"=>MD5($_POST['password']),
							"user_contact"=>$_POST['contact'],
							"user_address"=>$_POST['address'],
							"user_status"=>$_POST['is_active']
						);
			$isAddUser = $this->user_model->add_user($insertData);
			if($isAddUser) {
				$this->session->set_flashdata('user_add', 'User has been added successfully');
                redirect(base_url().'user/user_list', 'refresh');
            }
		}
		$sendData = array('isAddUser'=>$isAddUser,'isSuccess'=>$getSuccess);
		self::slicing('add_user',$sendData);
	}
	//edit user
	public function edit_user($id){
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		$getSuccess = $this->uri->segment('3');
		IsAdminActive();
		$isEditUser = '';
		
		if($this->input->post()) {
			$FullPath =  DOCUMENT_ROOT.'assets/images/user_profile';
			if (!file_exists($FullPath)) {
				mkdir($FullPath, 0777, true);
			}
			$FullPathThumb = DOCUMENT_ROOT.'assets/images/user_profile/thumb/';
			if (!file_exists($FullPathThumb)) {
				mkdir($FullPathThumb, 0777, true);
			} 
			if(isset($_FILES['user_photo']['name']) && $_FILES['user_photo']['name']!=''){
				if(isset($_POST['user_photo_old']) && $_POST['user_photo_old']!=''){
					@unlink($FullPath.'/'.$_POST['user_photo_old']);
					@unlink($FullPath.'/thumb/'.$_POST['user_photo_old']);
				}
				$userprf = $_FILES['user_photo']['name'];
				$user_photo = explode('.',$userprf);
				$userphoto = time().'user_photo'.$user_photo[0].".".$user_photo[1];


				$target = $FullPath.'/'.$userphoto;
				move_uploaded_file($_FILES['user_photo']['tmp_name'], $target);

				$image_path = base_url()."assets/images/user_profile/".$userphoto;
				$config['image_library'] = 'gd2';
				$config['source_image'] = DOCUMENT_ROOT.'assets/images/user_profile/'.$userphoto;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['height'] = 200;
				$config['width'] = 200;
				$config['new_image'] = DOCUMENT_ROOT.'assets/images/user_profile/thumb/'.$userphoto;
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

			}else if(isset($_POST['user_photo_old']) && $_POST['user_photo_old']!=''){
				$userphoto = $_POST['user_photo_old'];
			}else{
				$userphoto = '';
			}
			$updateData = array(
							"user_first_name"=>$_POST['first_name'],
							"user_last_name"=>$_POST['last_name'],
							"user_email"=>$_POST['email'],
							"user_contact"=>$_POST['contact'],
							"user_address"=>$_POST['address'],
							"user_status"=>$_POST['is_active']
						);	
			$isEditUser = $this->user_model->edit_user($updateData,$id);
			if($isEditUser) {
				$this->session->set_flashdata('user_edit', 'User has been updated successfully');
                redirect(base_url().'user/user_list', 'refresh');
            }
		}
		$user_info = $this->user_model->get_user_byid($id);
		$sendData = array('isEditUser'=>$isEditUser,'getuser'=>$user_info,'isSuccess'=>$getSuccess);
		self::slicing('add_user',$sendData);
	}
	
   function slicing($viewTemp,$sendArray)
	{
		$this->load->view('superadmin/master/header');
		$this->load->view('superadmin/'.$viewTemp,$sendArray);
		$this->load->view('superadmin/master/left');
		$this->load->view('superadmin/master/footer');
	}
}

?>
