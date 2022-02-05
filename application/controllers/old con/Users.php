
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('user_model');
		$this->load->model('login_model');			
		$this->load->model('product_model');			
		$this->load->model('category_model');
		$this->load->model('billing_model');
        $this->load->library('cart');
		$this->load->library('email');

			$config['protocol']    = 'smtp';

			$config['smtp_host']    = 'mail.inncrotech.site';

			$config['smtp_port']    = '587';

			$config['smtp_timeout'] = '7';

			$config['smtp_user']    = 'testing@inncrotech.site';

			$config['smtp_pass']    = 'testing';

			$config['charset']    = 'utf-8';

			$config['newline']    = "\r\n";

			$config['mailtype'] = 'text'; // or html

			$config['validation'] = TRUE; // bool whether to validate email or not      

			$this->email->initialize($config);
	}
	/* public function index()
	{
		
        if($this->input->post()) {
	        $getDetails = $this->login_model->login_user_ajax($this->input->post());
			/*$ses = $this->session->userdata('user_logged_in');
			$updateData = array(
							"user_last_login_time"=>date('Y-m-d H:m:s'),
							"first_time_user"=>2
						);
			$updUser = $this->login_model->update_user_login_time($updateData,$ses['USER_SESS_ID']);*/
			/*print_r($getDetails); die;
			if(!empty($getDetails)){
				echo  1;die;
			}else{
				echo  0;die;
			}
        }
        if(isset($this->session->userdata['front_user_logged_in'])) {
	       echo 1;die;
        }
		
	} */
	public function login()
	{  
		$sendData = '';
        if($this->input->post()) {
	        $getDetails = $this->login_model->login_user($this->input->post());
			
			$ses = $this->session->userdata('front_user_logged_in');
			$updateData = array(
							"user_last_login_time"=>date('Y-m-d H:m:s'),
							"first_time_user"=>2
						);
					
			$updUser = $this->login_model->update_user_login_time($updateData,$ses['USER_SESS_ID']);
			if($getDetails['flag']==1){
				echo 1; die;
			}else{
				echo 0; die;
			}
        }
        
		self::slicing('signin',$sendData);
		
	}
	
	function register(){
		
		$category_types = $this->category_model->get_category_types();		
		foreach($category_types as $ct){						
			$abc = ($ct['category_type']); 			
			$catTyID = ($ct['category_type_pk_id']);			
			$cat  = $this->category_model->get_categories_by_CatType($catTyID);						
			$catArray[] = array('CT'=>$abc,'CatList'=>$cat);					
		}	
		
		$isAddUser ='';
		if($this->input->post()) {
			$digits = 4;
			$OTP = rand(pow(10, $digits-1), pow(10, $digits)-1);
			$insertData = array(
							"user_first_name"=>$_POST['fname'],
							"user_email"=>$_POST['email'],
							"user_password"=>MD5($_POST['pass']),
							"user_contact"=>$_POST['phone'],
							"OTP"=> $OTP,
							"user_status"=>0
						);
			$isAddUser = $this->user_model->add_user($insertData);
			if($isAddUser) {
				
				$this->email->clear();

				$this->email->to($_POST['email']);
				$this->email->from('testing@inncrotech.site');
				$this->email->subject('OTP');
				$this->email->message('Hi  Here is your OTP:'.$OTP.' .');
				if($this->email->send()){
					
				}else{
					echo $this->email->print_debugger();
					 	
				}
            }
		}
		
		$sendData = array('isAddUser'=>$isAddUser, 'catArray'=>$catArray);
		self::slicing('signup',$sendData);
	}
	public function otpverify(){ 
		
		$result = $this->user_model->get_details_OTP($_POST['OTP'],$_POST['HEmail']);
		
		if(!empty($result)){
			echo ($result); die;
		}else{
			echo 0; die;
		}
	}
	public function lotpverify(){ 
		
		$result = $this->user_model->get_details_LOTP($_POST['OTP']);
		
		if(!empty($result)){
			echo ($result); die;
		}else{
			echo 0; die;
		}
	}
	
	public function check_email(){
		$result = $this->login_model->get_details($_POST['email']);
		//print_r($result); die;
		if( $result!=''){
			echo 0;die;
		}else{
			echo 1;die;
		}
	}
	public function genOTPlogin(){
		$digits = 4;
		$OTP = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$updateData = array(
						"LOTP"=>$OTP
					);
		$updUser = $this->login_model->update_user_login_time($updateData,$_SESSION['front_user_logged_in']['USER_SESS_ID']);
		
		if($updUser) {
			
			$this->email->clear();

			$this->email->to($_POST['email']);
			$this->email->from('testing@inncrotech.site');
			$this->email->subject('OTP');
			$this->email->message('Hi  Here is your OTP:'.$OTP.' .');
			if($this->email->send()){
				echo 1; die;
			}else{
				echo 0; die;
					
			}
		}else{
			echo 0; die;
		}
	}
	public function lotpreset(){
		
		$updateData = array(
						"LOTP"=>0
					);
		$updUser = $this->login_model->update_user_login_time($updateData,$_SESSION['front_user_logged_in']['USER_SESS_ID']);
		
		if($updUser) {
			
			echo 1; die;
		}else{
			echo 0; die;
				
		}
		
	}
	public function log_out()
	{
		$this->session->unset_userdata('front_user_logged_in');
		redirect(base_url().'users/login', 'refresh');
	}
	 function slicing($viewTemp,$sendArray)
	{
		$this->load->view('frontend/master/header',$sendArray);
		$this->load->view('frontend/'.$viewTemp);
		$this->load->view('frontend/master/footer');
	}
}