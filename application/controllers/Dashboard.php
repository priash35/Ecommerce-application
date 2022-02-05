<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');	
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
	}

	public function index()
	{ 
        IsAdminActive();
		//print_r($_SESSION); die;
		$total_venues = 0;
		$total_active_venues = 0;
		$total_users = $this->user_model->get_user_list();
		
		$total_category = $this->category_model->get_category_list();
		$total_area = $this->user_model->get_area_list();
		$total_products = $this->product_model->get_product_list();
		//die;
		$sendData = array('total_category'=>$total_category,'total_products'=>$total_products,'total_users'=>$total_users,'total_area'=>$total_area);
		self::slicing('dashboard',$sendData);
	}
	
	function page_not_found()
	{   
	    $sendData = array();
		self::slicing('page_not_found',$sendData);	    
	}
	
	function slicing($viewTemp,$sendArray)
	{
		
		$this->load->view('superadmin/master/header');
		$this->load->view('superadmin/'.$viewTemp,$sendArray);
		$this->load->view('superadmin/master/left');
		$this->load->view('superadmin/master/footer');
	}
	
	function ajaxSlicing($viewTemp,$sendArray)
	{
	    $this->load->view('superadmin/ajax/'.$viewTemp,$sendArray);
	}
}

?>
