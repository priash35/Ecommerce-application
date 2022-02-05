<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('product_model');
		$this->load->library('image_lib');				
		$this->load->model('category_model');
		$this->load->library('email');
		//error_reporting(0);
	}
	
	//product list
	public function Category(){	
		$category_types = $this->category_model->get_category_types();
		foreach($category_types as $ct){				
			$abc = ($ct['category_type']); 		
			$catTyID = ($ct['category_type_pk_id']);
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
		}
		$cat_name = urldecode($this->uri->segment('3'));
		$sort_val = urldecode($this->uri->segment('5'));
		$CategoryID =  urldecode($this->uri->segment('4'));
		$catIDbyName = $this->category_model->get_subcategory_by_ID($CategoryID);
		$product_data = $this->product_model->get_product_list_by_catID($catIDbyName[0]['sc_pk_id'],$catIDbyName[0]['sc_category_fk_id'],$sort_val);
		$isSuccess='';
		$sendData = array('product_data'=>$product_data,'sort_val'=>$sort_val,'cat_id'=>$CategoryID,'cat_name'=>$cat_name,'category_types'=>$category_types,'catArray'=>$catArray,'isSuccess'=>$isSuccess);
		self::slicing('product_list',$sendData);
	}
	//corporate product list
	public function corporate(){	
		$category_types = $this->category_model->get_category_types();
		foreach($category_types as $ct){				
			$abc = ($ct['category_type']); 		
			$catTyID = ($ct['category_type_pk_id']);
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
		}
		
		$CategoryID =  urldecode($this->uri->segment('4'));
		$catIDbyName = $this->category_model->get_subcategory_by_ID($CategoryID);
		$product_dataBSCG = $this->product_model->get_corporate_product_list('Best Seller Corporate Gifts');
		$product_dataBGI = $this->product_model->get_corporate_product_list('Corporate Gifting Ideas');
		$isSuccess='';
		$sendData = array('product_dataBSCG'=>$product_dataBSCG,'product_dataBGI'=>$product_dataBGI,'category_types'=>$category_types,'catArray'=>$catArray,'isSuccess'=>$isSuccess);
		self::slicing('product_cor_list',$sendData);
	}
	//product list
	public function Details(){
		$prod = $this->uri->segment('3');
		$id = $this->uri->segment('4');
		$action = base_url().'products/details/'.$prod.'/'.$id;
		$hash = '';
		$Prod_info = '';
		$txnid = '';
		if(isset($_POST['key']) && $_POST['key']!=''){
			// Merchant product info.
			$Prod_info='';

			$SALT = PAYU_MERCHANT_SALT;
			$posted = array();
			if(!empty($_POST)) {
			  foreach($_POST as $key => $value) {
				$posted[$key] = $value;
				}
			}
			//pre($_POST,1);
			$formError = 0;
			if(empty($posted['txnid'])) {
			  // Generate random transaction id
			  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			} else {
			  $txnid = $posted['txnid'];
			}
			// Hash Sequence
			$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
			if(empty($posted['hash']) && sizeof($posted) > 0) { 
				//if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['udf1']) || empty($posted['udf2']) || empty($posted['udf5']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {

				if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
					$formError = 1;
				}else{
					//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
					$hashVarsSeq = explode('|', $hashSequence);
					$hash_string = '';
					foreach($hashVarsSeq as $hash_var) {
						$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
						$hash_string .= '|';
					}

					$hash_string .= PAYU_MERCHANT_SALT;
					$hash = strtolower(hash('sha512', $hash_string));
					$action = PAYU_BASE_URL . '/_payment';
				}
			}elseif(!empty($posted['hash'])) {
				$hash = $posted['hash'];
				$action = PAYU_BASE_URL . '/_payment';
			}
		}
		$category_types = $this->category_model->get_category_types();
		
		foreach($category_types as $ct){				
			$abc = ($ct['category_type']); 		
			$catTyID = ($ct['category_type_pk_id']);
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
		}
		
		$product_data = $this->product_model->get_product_details_by_id($id);
		$product_images = $this->product_model->get_product_images($id);
		$isSuccess='';
		$sendData = array('product_data'=>$product_data,'product_images'=>$product_images,'category_types'=>$category_types,'action'=>$action,'Prod_info'=>$Prod_info,'hash'=>$hash,'txnid'=>$txnid,'catArray'=>$catArray,'isSuccess'=>$isSuccess);
		self::slicing('product_details',$sendData);
	}
	public function corporate_details(){
		$prod = $this->uri->segment('3');
		$id = $this->uri->segment('4');
		$category_types = $this->category_model->get_category_types();
		if($this->input->post()) {
			$data = array(
							"product_fk_id"=>$_POST['id'],
							"name"=>$_POST['name'],
							"email"=>$_POST['email'],
							"contact_number"=>$_POST['contact_no'],
							"quantity"=>$_POST['quantity'],
							"company_name"=>$_POST['company_name']
						);
			$ins = $this->product_model->insert_corporate_form($data);
			redirect(base_url().'Products/corporate', 'refresh');
		}
		foreach($category_types as $ct){				
			$abc = ($ct['category_type']); 		
			$catTyID = ($ct['category_type_pk_id']);
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
		}
		
		$product_data = $this->product_model->get_product_details_by_id($id);
		$product_images = $this->product_model->get_product_images($id);
		$isSuccess='';
		$sendData = array('product_data'=>$product_data,'product_images'=>$product_images,'category_types'=>$category_types,'catArray'=>$catArray,'isSuccess'=>$isSuccess);
		self::slicing('corporate_product_details',$sendData);
	}
	public function check_area_availability(){
		
		$check_product = $this->product_model->check_product_pincode_available($_POST['pincode'],$_POST['product_id']);
		if(!empty($check_product)){
			echo 0;
		}else{
			echo 1;
		}
	}
	public function payment_success(){
		$category_types = $this->category_model->get_category_types();		
		foreach($category_types as $ct){						
			$abc = ($ct['category_type']); 			
			$catTyID = ($ct['category_type_pk_id']);			
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);						
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);					
		}	
		$sendData = array('catArray'=>$catArray);
		self::slicing('success',$sendData);
	}
	public function payment_failure(){
		$category_types = $this->category_model->get_category_types();		
		foreach($category_types as $ct){						
			$abc = ($ct['category_type']); 			
			$catTyID = ($ct['category_type_pk_id']);			
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);						
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);					
		}	
		$sendData = array('catArray'=>$catArray);
		self::slicing('failure',$sendData);
	}
   function slicing($viewTemp,$sendArray)
	{
		$this->load->view('frontend/master/header',$sendArray);
		$this->load->view('frontend/'.$viewTemp);
		$this->load->view('frontend/master/footer');
	}
}

?>
