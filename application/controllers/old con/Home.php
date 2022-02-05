<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('user_model');
	}
	public function index()	{		
		$category_types = $this->category_model->get_category_types();		
		foreach($category_types as $ct){						
			$abc = ($ct['category_type']); 			
			$catTyID = ($ct['category_type_pk_id']);			
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);						
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);
			
		} 
		
		$product_data='';
		$isSuccess='';		
		$sendData = array('product_data'=>$product_data,'category_types'=>$category_types,'catArray'=>$catArray,'isSuccess'=>$isSuccess);		
		self::slicing('product_list',$sendData);
	}
	
	function page_not_found()
	{   
	    $sendData = array();
		self::slicing('page_not_found',$sendData);	    
	}	
	function slicing($viewTemp,$sendArray){
		//check with otp login
		if(isset($this->session->userdata['front_user_logged_in'])) {
			$is_user_logedin_withotp ='';
			$is_user_logedin_withotp = $this->user_model->is_user_logedin_withotp();	
			if($is_user_logedin_withotp !=0){ $this->session->unset_userdata('front_user_logged_in'); }
		}
		//check with otp login	
		$this->load->view('frontend/master/header',$sendArray);		
		$this->load->view('frontend/index');
		$this->load->view('frontend/master/footer');
	}
}
?>
