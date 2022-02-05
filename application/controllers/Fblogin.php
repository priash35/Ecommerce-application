<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fblogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){ // redirect function 
		
		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));
		$this->load->model('home_model');
		$user = $this->facebook->getUser();
     echo $user;die;
        if ($user) {
            try { 
                $user_profile = $this->facebook->api('/me?fields=id,name,email,first_name,last_name');
  
		   $chkRes = $this->home_model->check_email_exist($user_profile['email']);
			
			  if(count($chkRes)>0){
				  $usersession = array(
						'userid'  => $chkRes[0]->id,
						'username'  => $chkRes[0]->username,
						'email'     => $chkRes[0]->emailid,
						'fullname'     => $chkRes[0]->fullname,
						'thumimageurl'     => $chkRes[0]->imgthumb,
						'usertype'     => $chkRes[0]->usertype,
						'newsletter' => $chkRes[0]->isnewsletter,
						'logged_in' => TRUE
				);

				$this->session->set_userdata('caforntUser',$usersession);
			  }else{
				  $userarray = array(	
								"username"=>$user_profile['name'],
								"fullname"=>$user_profile['first_name']." ".$user_profile['last_name'],
								"emailid"=>$user_profile['email'],
								"imageurl"=>"http://graph.facebook.com/".$user_profile['id']."/picture",
								"thumimageurl"=>"http://graph.facebook.com/".$user_profile['id']."/picture",
								"usertype"=>2,
								"userstatus"=>1
							);
							
					$insertData = array(
						"email"=>$this->session->userdata('email'),
						"contact_number"=>$this->session->userdata('mobile'),
						"password"=>md5($this->session->userdata('password')),
						"user_type"=>$user_type,
						"status"=>1,
					);
					$insRes = $this->home_model->insert_user($insertData);
			
			$usersession = array(
						'userid'  => $inserRes,
						'username'  => $user_profile['name'],
						'email'     => $user_profile['email'],
						'fullname'     => $user_profile['first_name']." ".$user_profile['last_name'],
						'thumimageurl'     => "http://graph.facebook.com/".$user_profile['id']."/picture",
						'usertype'     => 2,
                                                'newsletter' => 0,
						'logged_in' => TRUE
				);

				$this->session->set_userdata('caforntUser',$usersession);
			  }
			  redirect('/');
			  exit();

            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fblogin'), 
                'scope' => array("email") // permissions here
            ));
        }
    }


    public function loginview(){
    	$this->load->library('facebook');
$this->fb_config = array(
            'appId' => $this->config->item('appId'),
            'secret' => $this->config->item('secret'),
            'fb_baseurl' => site_url('users/facebooklogin'),
        );
        // Create our Application instance.
        $this->facebook = new Facebook(array(
            'appId'  => $this->fb_config['appId'],
            'secret' =>	$this->fb_config['secret']
        ));
$fdata ='';
$user = null;
		$loginurl = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fblogin'), 
                'scope'         => 'email,user_birthday,user_location,user_work_history,user_about_me,user_hometown,publish_actions', // permissions here
            ));
		//$this->fdata = $data;

		echo  '<a href="'.$loginurl.'">loginn with facebook</a>';
    }

}

