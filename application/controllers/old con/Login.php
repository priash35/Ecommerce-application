<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('login_model');
		$this->load->model('user_model');
	}

	public function index()
	{
        if($this->input->post()) {
	        $getDetails = $this->login_model->login($this->input->post());
			$ses = $this->session->userdata('super_admin_logged_in');
			$updateData = array(
							"user_last_login_time"=>date('Y-m-d H:m:s'),
							"first_time_user"=>2
						);
			$updUser = $this->login_model->update_user_login_time($updateData,$ses['SUPER_ADMIN_SESS_ID']);
	        redirect('dashboard', 'refresh');
        }
        if(isset($this->session->userdata['super_admin_logged_in'])) {
	        redirect('dashboard', 'refresh');
        }

        $user = array('loginBy'=>'SuperAdmin');
        $this->load->view('superadmin/login',$user);
	}
	public function forgot_password(){
		$password = genrateOTP();
		$updateData = array(
							"password"=>md5(trim($password))
							); 
		$updateRes = $this->login_model->update_password($updateData,$_POST['email']);
			if($updateRes>0){
			    require_once(APPPATH.'libraries/phpmailer/class.phpmailer.php');
			    $username = 'rlamkhade@elivotech.com';
			    $to = $_POST['email'];
			    $from = $username;
			    $message ='';
			    $mail_subject = "Update Password!";
			    $message.= 'Hi,'.$getRes->user_fullname.' <br/><br/> ';
				//pre($subject,1);
			    $message.= "Your new password for partei is :<b>".$password."</b><br/><br/><br/>";
				$message.= "Thanks,<br>Partei Team.";
				//pre($message_body,1);
			    $headers = $username;
			    $mail = new PHPMailer();
			    // enables SMTP debug information (for testing)
			    $mail->SMTPAuth = true; // enable SMTP authentication
			    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
			    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
			    $mail->Port = 465; // set the SMTP port for the GMAIL server
			    $mail->Username = 'rlamkhade@elivotech.com'; // GMAIL username
			    $mail->Password = 'Rohit@123'; // GMAIL password
			    $mail->AddAddress($to,$from);
			    $mail->SetFrom($username, 'Partei');
			    $mail->Subject = $mail_subject;
			    $mail->CharSet = 'UTF-8';
			    $mail->MsgHTML($message);
			    $mail->Send();
			}
        $this->load->view('superadmin/login');
	}
	public function logout()
	{
		$this->session->unset_userdata('super_admin_logged_in');
		redirect(base_url()."login", 'refresh');
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