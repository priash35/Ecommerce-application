<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('user_model');
		$this->load->model('frontend_model');
		$this->load->model('product_model');
	} 
	public function index()	{		
		$slider  = $this->frontend_model->get_slider_home_page_list();
		$secondsection  = $this->frontend_model->get_home_secondsection_list();
		$NewArrivalsOffer  = $this->product_model->get_NewArrivalsOffer_list();
		/* echo "<pre>";
           print_r($NewArrivalsOffer);
           echo "</pre>";
          die(); */
		//echo $sql = $this->db->last_query();
		$thirdsection  = $this->frontend_model->get_home_thirdsection_list();
		$cat  = $this->category_model->get_category_list_header();
		$product_data='';
		$isSuccess='';		
		$sendData = array('product_data'=>$product_data,'NewArrivalsOffer'=>$NewArrivalsOffer,'secondsection'=>$secondsection,'thirdsection'=>$thirdsection,'cat'=>$cat,'slider'=>$slider,'isSuccess'=>$isSuccess);		
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
