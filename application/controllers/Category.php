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
		
		if($this->input->post()) { if( isset($_POST['category_type']) && $_POST['category_type']=='on'){ $ct = 1;}else{ $ct = 2;} 
			$data = array(
							"category_name"=>$_POST['category_name'],
							"category_type_fk_id"=>$ct,
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
		if( isset($_POST['category_type']) && $_POST['category_type']=='on'){ $ct = 1;}else{ $ct = 2;}
			$data = array( 
							"category_name"=>$_POST['category_name'],
							"category_type_fk_id"=>$ct,
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
	public function sub_category_list(){
		//$id=intval(preg_replace('/[^0-9]+/', '', $id));
		 
		IsAdminActive();
		if($this->input->post()) {
			$data = array(
							"sc_category_name"=>$_POST['sc_category_name'],
							"sc_category_fk_id"=>$_POST['category_pk_id']
						);	
			if($insert_sub_cat = $this->category_model->add_sub_category($data)){
				$data = array(
							"sub_cat"=>$insert_sub_cat
							
						);	
				if($insert_slider = $this->category_model->add_slider($data)){
					for($i=0; $i<4; $i++){
						$data1 = array(
							"slider_id"=>$insert_slider
							
						);	
						$insert_slides = $this->category_model->add_slides($data1);
					}
				}
				/* if($insert_advert = $this->category_model->add_sec_advert($data)){
					for($i=0; $i<4; $i++){
						$data2 = array(
							"sec_advrt_id"=>$insert_advert
							
						);	
						$insert_slides = $this->category_model->add_advert_baner($data2);
					}
				}
				if($insert_third_advert = $this->category_model->add_third_advert($data)){
					for($i=0; $i<4; $i++){
						$data3 = array(
							"sec_advrt_id"=>$insert_third_advert
							
						);	
						$insert_slides = $this->category_model->add_third_advert_baner($data3);
					}
				}
				if($insert_fourth_advert = $this->category_model->add_fourth_advert($data)){
					for($i=0; $i<4; $i++){
						$data3 = array(
							"sec_advrt_id"=>$insert_fourth_advert
							
						);	
						$insert_slides = $this->category_model->add_fourth_advert_baner($data3);
					}
				}
				if($insert_banner_advert = $this->category_model->add_banner_advert($data)){
					for($i=0; $i<4; $i++){
						$dataB = array(
							"sec_advrt_id"=>$insert_banner_advert
							
						);	
						$insert_slides = $this->category_model->add_banner_advert_baner($dataB);
					}
				} */
			}
			redirect(base_url().'category/sub_category_list/', 'refresh');
		}
		$category_data = $this->category_model->get_sub_category_list();
		 $category_list = $this->category_model->get_category_list();
		$isSuccess='';
		$sendData = array('category_data'=>$category_data, 'category_list'=>$category_list, 'isSuccess'=>$isSuccess);
		self::slicing('sub_categories',$sendData);
	}
	public function edit_sub_category($id){
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		if($this->input->post()) { 
		 
			$data = array( 
							"sc_category_name"=>$_POST['sc_category_name'],
							"sc_category_fk_id"=>$_POST['category_pk_id']
							 
						);	
			$update_category = $this->category_model->edit_sub_category($data,$id);
			redirect(base_url().'category/sub_category_list', 'refresh');
		}
		 
		 
		$category_info = $this->category_model->get_sub_category_by_id($id); 
		 $category_list = $this->category_model->get_category_list();
		$category_data = $this->category_model->get_sub_category_list();
		$isSuccess='';
		$sendData = array('category_data'=>$category_data, 'category_list'=>$category_list,'category_info'=>$category_info,  'isSuccess'=>$isSuccess);
		self::slicing('sub_categories',$sendData);
	}
	public function size_category_list(){
		//$id=intval(preg_replace('/[^0-9]+/', '', $id));
		
		IsAdminActive();
		if($this->input->post()) {
			$data = array(
							"sz_category_name"=>$_POST['sz_category_name'],
							"sz_sc_category_fk_id"=>$_POST['sub_cat']
						);	
			$insert_sub_cat = $this->category_model->add_size_category($data);
			
			redirect(base_url().'category/size_category_list/', 'refresh');
		}
		$category_data = $this->category_model->get_size_category_list();
		
		 $category_list = $this->category_model->get_category_list();
		$isSuccess='';
		$sendData = array('category_data'=>$category_data, 'category_list'=>$category_list, 'isSuccess'=>$isSuccess);
		self::slicing('size_categories',$sendData);
	}
	public function edit_size_category($id){
		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		if($this->input->post()) { 
		 
			$data = array( 
							"sz_category_name"=>$_POST['sz_category_name'],
							"sz_sc_category_fk_id"=>$_POST['sub_cat']
							 
						);	
			$update_category = $this->category_model->edit_size_category($data,$id);
			redirect(base_url().'category/size_category_list', 'refresh');
		}
		 
		 
		$category_info = $this->category_model->get_size_category_by_id($id); 
		$category_list = $this->category_model->get_category_list();
		$subcategory_data = $this->category_model->get_sub_category_list();
		$category_data = $this->category_model->get_size_category_list();
		$isSuccess='';
		$sendData = array('category_data'=>$category_data,'subcategory_data'=>$subcategory_data, 'category_list'=>$category_list,'category_info'=>$category_info,  'isSuccess'=>$isSuccess);
		self::slicing('size_categories',$sendData);

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
