
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('product_model');			
		$this->load->model('category_model');
		$this->load->model('billing_model');
        $this->load->library('cart');
	}

	
public function index()
{
	$category_types = $this->category_model->get_category_types();
	foreach($category_types as $ct){				
		$abc = ($ct['category_type']); 		
		$catTyID = ($ct['category_type_pk_id']);
		$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
		$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
	}
	$sendData = array('category_types'=>$category_types,'catArray'=>$catArray);
	//Get all data from database
	$data['products'] = $this->billing_model->get_all();
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('frontend/master/header',$sendData);
	$this->load->view('frontend/shopping_view', $data);
	$this->load->view('frontend/master/footer');
}

	
	
function add(){
	//print_r($_POST); die;
	//pre($_POST,1);
		  // Set array for send data.
	$insert_data = array(
		'id' => $this->input->post('id'),
		'name' => $this->input->post('name'),
		'price' => $this->input->post('price'),
		'pincode' => $this->input->post('pincode'),
		'delivery_date' => $this->input->post('delivery_date'),
		'delivery_time' => $this->input->post('delivery_time'),
		'qty' => 1
	);	
			
	//$this->billing_model->add_temp($insert_dataTemp);
	
			 // This function add items into cart.
	$this->cart->insert($insert_data);
			// This will show insert data in cart.
	redirect('shopping');
}
	
function remove($rowid) {
	// Check rowid value.
	if ($rowid==="all"){
	   // Destroy data which store in  session.
		$this->cart->destroy();
	}else{
				// Destroy selected rowid in session.
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
		);
				 // Update cart data, after cancle.
		$this->cart->update($data);
	}
	
			 // This will show cancle data in cart.
	redirect('shopping');
}
	
function update_cart(){
	// Recieve post values,calcute them and update
	$cart_info =  $_POST['cart'] ;
	
	foreach( $cart_info as $id => $cart)
	{	
		$rowid = $cart['rowid'];
		$price = $cart['price'];
		$amount = $price * $cart['qty'];
		$qty = $cart['qty'];
		$data = array(
			'rowid'   => $rowid,
			'price'   => $price,
			'amount' =>  $amount,
			'qty'     => $qty
		);
		 
		$this->cart->update($data);
	}
	redirect('shopping');        
}	
function billing_view(){
	// Load "billing_view".
	$action = '';
	$hash = '';
	$prod_info = '';
	$txnid = '';
	$email='';
	$phone='';
	$name='';
	$productname ='';
	$prod_info1 = array();
	if(isset($_POST['direct']) && $_POST['direct']=='yesDirect'){
		$prod_arr = array('prod_name'=>$_POST['prod_name'],'prod_id'=>$_POST['id'],'price'=>$_POST['price']);
		$this->session->set_userdata('prod_arr', $prod_arr);
	}
	if(isset($_POST['key']) && $_POST['key']!=''){
		///pre($_POST,1);
		$prod_info1 = array(
							'receiver_name'=>$_POST['udf1'],
							'receiver_mobile'=>$_POST['udf2'],
							'receiver_email'=>$_POST['udf3'],
							'receiver_address1'=>$_POST['address1'],
							'receiver_address2'=>$_POST['address2'],
							'receiver_pincode'=>$_POST['zipcode'],
							'card_message'=>$_POST['udf4'],
							'sender_name'=>$_POST['name'],
							'sender_mobile'=>$_POST['phone'],
							'sender_email'=>$_POST['email']
							);
		$prod = array($prod_info1);					
		$prod_info =json_encode($prod);
		$name_arr = array('name'=>$_POST['name']);
		$this->session->set_userdata('sender_name', $name_arr);
		if(isset($_POST['direct']) && $_POST['direct']=='yesDirect'){
			$email='';
			$phone='';
			$name='';
			$Prod_info=$_POST['productinfo'];
			$productname =$_POST['product_Name'];
		}else{
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$name=$_POST['name'];
			//$Prod_info='';
		}
		// Merchant product info.
		
        //pre($_POST,1);
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

			if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['name']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
				$formError = 1; 
			}else{
				
				//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
			//$posted['productinfo'] = json_encode(json_decode($posted['productinfo']));
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
	$productDAta = array('productname'=>$productname); 
	$sendData = array('productDAta'=>$productDAta,'category_types'=>$category_types,'catArray'=>$catArray);
	$data = array('action'=>$action,'Prod_info'=>$prod_info,'prod_info1'=>$prod_info1,'hash'=>$hash,'email'=>$email,'phone'=>$phone,'name'=>$name,'txnid'=>$txnid,);
	//Get all data from database
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('frontend/master/header',$sendData);
	$this->load->view('frontend/billing_view',$data);
	$this->load->view('frontend/master/footer');
}
        
public function save_order(){
          // This will store all values which inserted  from user.
		$customer = array(
			'name' 		=> $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);		
                 // And store user imformation in database.
		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $cust_id
		);		

		$ord_id = $this->billing_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		         $cust_id = $this->billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
	      
                // After storing all imformation in database load "billing_success".
				$category_types = $this->category_model->get_category_types();
				foreach($category_types as $ct){				
					$abc = ($ct['category_type']); 		
					$catTyID = ($ct['category_type_pk_id']);
					$cat  = $this->category_model->get_categories_by_CatType($catTyID);		
					$catArray[] = array('CT'=>$abc,'CatList'=>$cat);			
				}
				$sendData = array('category_types'=>$category_types,'catArray'=>$catArray);
				//Get all data from database
				//send all product data to "shopping_view", which fetch from database.
				$this->load->view('frontend/master/header',$sendData);
				$this->load->view('frontend/billing_success');
				$this->load->view('frontend/master/footer');
               
	}
}