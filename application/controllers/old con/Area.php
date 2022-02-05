<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model('user_model');
	}

	//load area list view
	public function area_list(){
		IsAdminActive();
		if($this->input->post()) {
			$data = array(
							"area_name"=>$_POST['area_name'],
							"area_pin"=>$_POST['pincode'],
							"area_status"=>$_POST['is_active']
						);	
			$insert_area = $this->user_model->add_area($data);
			redirect(base_url().'area/area_list', 'refresh');
		}
		$area_data = $this->user_model->get_area_list();
		$isSuccess='';
		$sendData = array('area_data'=>$area_data,'isSuccess'=>$isSuccess);
		self::slicing('add_area',$sendData);
	}
	public function edit_area($id){
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		if($this->input->post()) {
			$data = array(
							"area_name"=>$_POST['area_name'],
							"area_pin"=>$_POST['pincode'],
							"area_status"=>$_POST['is_active']
						);	
			$update_area = $this->user_model->edit_area($data,$id);
			redirect(base_url().'area/area_list', 'refresh');
		}
		$area_data = $this->user_model->get_area_list();
		$area_info = $this->user_model->get_area_by_id($id);
		$isSuccess='';
		$sendData = array('area_data'=>$area_data,'area_info'=>$area_info,'isSuccess'=>$isSuccess);
		self::slicing('add_area',$sendData);
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
