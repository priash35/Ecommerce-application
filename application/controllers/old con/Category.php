<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->model('category_model');
	}

	//load category list view
	public function category_list(){
		IsAdminActive();
		if($this->input->post()) {
			$data = array(
							"category_name"=>$_POST['category_name'],
							"category_type_fk_id"=>$_POST['category_type'],
							"category_status"=>$_POST['is_active']
						);	
			$insert_category = $this->category_model->add_category($data);
			redirect(base_url().'category/category_list', 'refresh');
		}
		$category_data = $this->category_model->get_category_list();
		$category_types = $this->category_model->get_category_types();
		$isSuccess='';
		$sendData = array('category_data'=>$category_data,'category_types'=>$category_types,'isSuccess'=>$isSuccess);
		self::slicing('add_category',$sendData);
	}
	public function edit_category($id){
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		if($this->input->post()) {
			$data = array(
							"category_name"=>$_POST['category_name'],
							"category_type_fk_id"=>$_POST['category_type'],
							"category_status"=>$_POST['is_active']
						);	
			$update_category = $this->category_model->edit_category($data,$id);
			redirect(base_url().'category/category_list', 'refresh');
		}
		$category_data = $this->category_model->get_category_list();
		$category_types = $this->category_model->get_category_types();
		$category_info = $this->category_model->get_category_by_id($id);
		$isSuccess='';
		$sendData = array('category_data'=>$category_data,'category_types'=>$category_types,'category_info'=>$category_info,'isSuccess'=>$isSuccess);
		self::slicing('add_category',$sendData);
	}
	public function sub_category_list($id){
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		IsAdminActive();
		if($this->input->post()) {
			$data = array(
							"sc_category_name"=>$_POST['sub_category_name'],
							"sc_category_fk_id"=>$_POST['cat_id']
						);	
			$insert_sub_cat = $this->category_model->add_sub_category($data);
			redirect(base_url().'category/sub_category_list/'.$id, 'refresh');
		}
		$category_data = $this->category_model->get_sub_category_list($id);
		$isSuccess='';
		$sendData = array('category_data'=>$category_data,'cat_id'=>$id,'isSuccess'=>$isSuccess);
		self::slicing('sub_category_list',$sendData);
	}
	public function edit_sub_category(){
		$sub_cat_id =  $this->uri->segment(3);
        $cat_id =  $this->uri->segment(4);
		if($this->input->post()) {
			$data = array(
							"sc_category_name"=>$_POST['sub_category_name']
						);	
			$update_sub_cat = $this->category_model->edit_sub_category($data,$sub_cat_id);
			redirect(base_url().'category/sub_category_list/'.$cat_id, 'refresh');
		}
		$category_data = $this->category_model->get_sub_category_list($cat_id);
		$category_info = $this->category_model->get_sub_category_by_id($sub_cat_id);
		$isSuccess='';
		$sendData = array('category_data'=>$category_data,'category_info'=>$category_info,'cat_id'=>$cat_id,'isSuccess'=>$isSuccess);
		self::slicing('sub_category_list',$sendData);
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
