
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('product_model');			
		$this->load->model('category_model');
		$this->load->model('billing_model');
        $this->load->library('cart');
		$this->load->library('email');
	}

	
public function Contact()
{
	$category_types = $this->category_model->get_category_types();
	foreach($category_types as $ct){				
		$abc = ($ct['category_type']); 		
		$catTyID = ($ct['category_type_pk_id']);
		$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
		$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
	}
	$sendData = array('category_types'=>$category_types,'catArray'=>$catArray);
	if(isset($_POST['contactSubmit']) && $_POST['contactSubmit']=='Submit'){
		
		$html = '<html><head></head><body><div>'.$_POST['message'].'</div></body></html>';
		$this->load->library('email');
		$this->email->from('orders@florisan.in', 'Florisan');
		//$this->email->from('', 'Florisan');
		$this->email->to($_POST['email']);
		$this->email->cc('');
		$this->email->bcc('');
		$this->email->set_mailtype('html');
		$this->email->subject($_POST["subject"]);
		$this->email->message($html);

		$this->email->send();
	}	
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('frontend/master/header',$sendData);
	$this->load->view('frontend/contact');
	$this->load->view('frontend/master/footer');
}
	
public function Help()
{
	$category_types = $this->category_model->get_category_types();
	foreach($category_types as $ct){				
		$abc = ($ct['category_type']); 		
		$catTyID = ($ct['category_type_pk_id']);
		$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
		$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
	}
	$sendData = array('category_types'=>$category_types,'catArray'=>$catArray);
	if(isset($_POST['contactSubmit']) && $_POST['contactSubmit']=='Submit'){
		
		$html = '<html><head></head><body><div>'.$_POST['message'].'</div></body></html>';
		$this->load->library('email');
		$this->email->from('orders@florisan.in', 'Florisan');
		//$this->email->from('', 'Florisan');
		$this->email->to($_POST['email']);
		$this->email->cc('');
		$this->email->bcc('');
		$this->email->set_mailtype('html');
		$this->email->subject($_POST["subject"]);
		$this->email->message($html);

		$this->email->send();
	}	
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('frontend/master/header',$sendData);
	$this->load->view('frontend/Help');
	$this->load->view('frontend/master/footer');
}
public function Aboutus()
{
	$category_types = $this->category_model->get_category_types();
	foreach($category_types as $ct){				
		$abc = ($ct['category_type']); 		
		$catTyID = ($ct['category_type_pk_id']);
		$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
		$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
	}
	$sendData = array('category_types'=>$category_types,'catArray'=>$catArray);
	if(isset($_POST['contactSubmit']) && $_POST['contactSubmit']=='Submit'){
		
		$html = '<html><head></head><body><div>'.$_POST['message'].'</div></body></html>';
		$this->load->library('email');
		$this->email->from('orders@florisan.in', 'Florisan');
		//$this->email->from('', 'Florisan');
		$this->email->to($_POST['email']);
		$this->email->cc('');
		$this->email->bcc('');
		$this->email->set_mailtype('html');
		$this->email->subject($_POST["subject"]);
		$this->email->message($html);

		$this->email->send();
	}	
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('frontend/master/header',$sendData);
	$this->load->view('frontend/Aboutus');
	$this->load->view('frontend/master/footer');
}
public function Faq()
{
	$category_types = $this->category_model->get_category_types();
	foreach($category_types as $ct){				
		$abc = ($ct['category_type']); 		
		$catTyID = ($ct['category_type_pk_id']);
		$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
		$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
	}
	$sendData = array('category_types'=>$category_types,'catArray'=>$catArray);
	if(isset($_POST['contactSubmit']) && $_POST['contactSubmit']=='Submit'){
		
		$html = '<html><head></head><body><div>'.$_POST['message'].'</div></body></html>';
		$this->load->library('email');
		$this->email->from('orders@florisan.in', 'Florisan');
		//$this->email->from('', 'Florisan');
		$this->email->to($_POST['email']);
		$this->email->cc('');
		$this->email->bcc('');
		$this->email->set_mailtype('html');
		$this->email->subject($_POST["subject"]);
		$this->email->message($html);

		$this->email->send();
	}	
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('frontend/master/header',$sendData);
	$this->load->view('frontend/faq');
	$this->load->view('frontend/master/footer');
}


}