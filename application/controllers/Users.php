
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('user_model');
        $this->load->model('login_model');
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('billing_model');
        $this->load->library('cart');
        $this->load->library('facebook');
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.inncrotech.site';
        $config['smtp_port'] = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'testing@inncrotech.site';
        $config['smtp_pass'] = 'testing';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
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
      $updUser = $this->login_model->update_user_login_time($updateData,$ses['USER_SESS_ID']); */
    /* print_r($getDetails); die;
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

    public function login() {
        $sendData = '';
        if ($this->input->post()) 
		{
            $getDetails = $this->login_model->login_user($this->input->post());

            $ses = $this->session->userdata('front_user_logged_in');
            $updateData = array(
                "user_last_login_time" => date('Y-m-d H:m:s'),
                "first_time_user" => 2
            );

            $updUser = $this->login_model->update_user_login_time($updateData, $ses['USER_SESS_ID']);
            if ($getDetails['flag'] == 1) 
			{
                echo 1;
                die;
            } else {
                echo 0;
                die;
            }
        }

        $login_url = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('users/facebook_login'),
            'scope' => array("email")
        ));
        $cat = $this->category_model->get_category_list();
        $sendData = array('cat' => $cat, 'login_url' => $login_url);
        self::slicing('signin', $sendData);
    }

    function fbLogin() {

        $r = $this->db->get_where('users', array('user_email' => $_POST['email']));
        if ($r->num_rows() > 0) {
            $resultArray = $r->result();
            $sessArray = array(
                'USER_SESS_ID' => $resultArray[0]->user_pk_id,
                'USER_NAME' => $resultArray[0]->user_first_name,
                'USER_TYPE' => $resultArray[0]->user_type,
                'USER_LAST_LOGIN' => $resultArray[0]->user_last_login_time,
                'FIRST_TIME_USER' => $resultArray[0]->first_time_user
            );
            $this->session->set_userdata('front_user_logged_in', $sessArray);
            echo 1;
        } else {
            $insertData = array(
                "user_first_name" => $_POST['firstname'] . ' ' . $_POST['lastname'],
//                "user_last_name" => $_POST['lastname'],
                "user_email" => $_POST['email'],
                "profile_image" => $_POST['image'],
                "user_status" => 2
            );
            $isAddUser = $this->user_model->add_user($insertData);
            $sessArray = array(
                'USER_SESS_ID' => $isAddUser,
                'USER_NAME' => $resultArray[0]->user_first_name,
                'USER_TYPE' => $resultArray[0]->user_type,
                'USER_LAST_LOGIN' => $resultArray[0]->user_last_login_time,
                'FIRST_TIME_USER' => $resultArray[0]->first_time_user
            );
            $this->session->set_userdata('front_user_logged_in', $sessArray);
            echo 1;
        }
    }

    function register() {
        $isAddUser = '';
        if ($this->input->post()) {
            $digits = 4;
            $OTP = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $insertData = array(
                "user_first_name" => $_POST['fname'],
                "user_email" => $_POST['email'],
                "user_password" => MD5($_POST['pass']),
                "user_contact" => $_POST['phone'],
                "OTP" => $OTP,
                "user_status" => 2
            );
            $this->session->set_userdata('front_user_logged_in', $insertData);
            $isAddUser = $this->user_model->add_user($insertData);
            if ($isAddUser) {

                $this->email->clear();

                $this->email->to($_POST['email']);
                $this->email->from('testing@inncrotech.site');
                $this->email->subject('OTP');
                $this->email->message('Hi  Here is your OTP:' . $OTP . ' .');
                if ($this->email->send()) {
                    
                } else {
                    echo $this->email->print_debugger();
                }
            }
        }
        $cat = $this->category_model->get_category_list();


        $sendData = array('isAddUser' => $isAddUser, 'cat' => $cat);
        self::slicing('signup', $sendData);
    }

    function edit_user() {
        $id = $this->session->userdata['front_user_logged_in']['USER_SESS_ID'];
        if ($id == null) {
            redirect(base_url() . 'users/login', 'refresh');

        }
        else {
         
//        $id=intval(preg_replace('/[^0-9]+/', '', $id));
        if ($this->input->post()) {
            $data = array(
                "user_first_name" => $_POST['fname'],
                "user_email" => $_POST['email'],
//                "user_password" => MD5($_POST['pass']),
                "user_contact" => $_POST['phone'],
                "user_address" => $_POST['address1'],
                "user_address1" => $_POST['addrerss2'],
                "pincode" => $_POST['pincode'],
                "state" => $_POST['state'],
                "city" => $_POST['city'],
                "country" => $_POST['country'],
//                                           "OTP"=>$_POST['$OTP'],
                "user_status" => 2
            );

            $update_user = $this->user_model->edit_user($data, $id);
            $this->session->set_flashdata('success', 'Profile Updateed Sucessfully');
            redirect(base_url() . 'users/edit_user', 'refresh');
        }
        $user_data = $this->user_model->get_user_list();
        $user_info = $this->user_model->get_user_by_id($id);
        $isSuccess = '';
        $sendData = array('user_data' => $user_data, 'user_info' => $user_info, 'isSuccess' => $isSuccess);

        self::slicing('profile', $sendData);
          
        }
    }

    function track_orderDetails() {
       $id = $this->session->userdata['front_user_logged_in']['USER_SESS_ID'];

        if($id == null){
        
            redirect(base_url() . 'users/login', 'refresh');
        }
        else
        {
            $track_data = $this->user_model->get_track_list();
            $isSuccess = '';
            $sendData = array('track_data' => $track_data, 'isSuccess' => $isSuccess);
            self::slicing('track_order', $sendData);
        }
    }

    function track_order() {
        $orderId = $_POST['orderId'];

        $track_info = $this->user_model->get_track_by_orderId($orderId);
        if (!empty($track_info)) {
            $track_data .= '<div class="item orderdetail_box">';
            $track_data .= '<h4 style="">';
            $track_data .= '<span class="order_id">Order ID: <a href="orderdetails.php">' . $track_info->order_id . '</a></span><br><p style="margin-top: 10px;">Order Placed on ' . $track_info->orderdate . '</p>';
            $track_data .= '<br><p style="margin-top: 10px;">Order Status <b>' . $track_info->order_status . '</b></p>';
            $track_data .= '</h4>';
            $track_data .= '';

            $ord_del = $this->db->get_where('order_detail', array('orderid' => $orderId))->result();

            $total = 0;
            foreach ($ord_del as $row) {

                $track_data .= '<div class="row">';
                $track_data .= '<div class="prod_info">';
                $track_data .= '<div class="col-md-2 no_padding">';
                $track_data .= '<div class="prod_image">';
                $img = $this->db->select('file_name')->get_where('product_images', array('product_fk_id' => $row->productid))->row();
                $track_data .= '<img src="' . base_url() . 'assets/images/product_image/' . $img->file_name . '" class="img-responsive">';
                $track_data .= '</div>';
                $track_data .= '</div>';
                $track_data .= '<div class="col-md-4 prod_details">';
                $track_data .= '<h3><a target="_blank" href="">' . $row->name . '</a></h3>';
                $track_data .= '<p>Price: <span><i class="fa fa-rupee"></i> ' . $row->subtotal . '</span></p>';
                $track_data .= '<p>Quantity: <span>' . $row->quantity . '</span></p>';
                $track_data .= '<p>Color: <span>' . $row->color . '</span></p>';
                $track_data .= '</div>';
                $track_data .= '</div>';
                $track_data .= '</div>';
                $total += floatval($row->subtotal);
            }
            $track_data .= ' <div class="row">';
            $track_data .= '<div class="col-md-6 text-left pdt10"><span class=""><span>Ordered On </span></span>' . $track_info->orderdate . '</div>';
            $track_data .= '<div class="col-md-6 text-right pdt10"><span class=""><span>Order Total </span></span><span style="font-weight: 500;"><i class="fa fa-rupee"></i> 449</span></div>';
            $track_data .= '</div>';
            $track_data .= '</div>';
        } else {
            $track_data = '<div class="row" style="color:red"> Please Enter Valid Order No.</div>';
        }
        echo $track_data;
    }

    function orderDetails() {


        $userid = $this->session->userdata['front_user_logged_in']['USER_SESS_ID'];
        if ($userid == null) {
            redirect(base_url() . 'users/login', 'refresh');
        }
        else
        {
             $order_data = $this->user_model->get_order_list_byUserId($userid);
//        echo "<pre>";
//        print_r($order_data);
//        echo "</pre>";
//        die();
        $isSuccess = '';
        $sendData = array('order_data' => $order_data, 'isSuccess' => $isSuccess);
        self::slicing('order_history', $sendData);
        }
       
    }

    function orderHistory($orderid) {
        $this->db->where('order_id', $orderid);
        $results['users'] = $this->db->get('orders')->row();
        $results['ord_del'] = $this->db->get_where('order_detail', array('orderid' => $orderid))->result();


        self::slicing('order_history_details', $results);
    }

    public function otpverify() {

        $result = $this->user_model->get_details_OTP($_POST['OTP'], $_POST['HEmail']);

        if (!empty($result)) {
            echo ($result);
            die;
        } else {
            echo 0;
            die;
        }
    }

    public function lotpverify() {

        $result = $this->user_model->get_details_LOTP($_POST['OTP']);

        if (!empty($result)) {
            echo ($result);
            die;
        } else {
            echo 0;
            die;
        }
    }

    public function check_email() {
        $result = $this->login_model->get_details($_POST['email']);
        //print_r($result); die;
        if ($result != '') {
            echo 0;
            die;
        } else {
            echo 1;
            die;
        }
    }

    public function genOTPlogin() {
        $digits = 4;
        $OTP = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $updateData = array(
            "LOTP" => $OTP
        );
        $updUser = $this->login_model->update_user_login_time($updateData, $_SESSION['front_user_logged_in']['USER_SESS_ID']);

        if ($updUser) {

            $this->email->clear();

            $this->email->to($_POST['email']);
            $this->email->from('testing@inncrotech.site');
            $this->email->subject('OTP');
            $this->email->message('Hi  Here is your OTP:' . $OTP . ' .');
            if ($this->email->send()) {
                echo 1;
                die;
            } else {
                echo 0;
                die;
            }
        } else {
            echo 0;
            die;
        }
    }

    public function lotpreset() {

        $updateData = array(
            "LOTP" => 0
        );
        $updUser = $this->login_model->update_user_login_time($updateData, $_SESSION['front_user_logged_in']['USER_SESS_ID']);

        if ($updUser) {

            echo 1;
            die;
        } else {
            echo 0;
            die;
        }
    }

    public function log_out() {
        $this->session->unset_userdata('front_user_logged_in');
        
        redirect(base_url() . 'users/login', 'refresh');
    }

    public function open_id_login_process($id = "") {

        $credentials_of = $id;
        if ($credentials_of == "google") {
            //echo $id;	
            //die('3'); 
            require_once APPPATH . 'libraries/Google/Google_Client.php';
            $client = new Google_Client();
            /* $client_id = '485016058590-f6bj9fs27u5k92klq9e1v1ib434q6j3p.apps.googleusercontent.com';
              $client_secret = 'A-a1AEa9JebCJF3OesCxr9D7'; */
//            $client_id = '172974816727-p0h8fml5pr735s5kfetvetsp5hvtk5b6.apps.googleusercontent.com';
//            $client_secret = 'JwzXBAaheJ6FLaqViy8fmqF3';
            $client_id = '699373281632-dvbej2bbfmc7qktbkg73dr5dlftproh8.apps.googleusercontent.com';
            $client_secret = 'ftTfE3PbT55KgPS9qXEZAxP9';
//            $redirect_uri = site_url() . 'users/google_sign_up';
            $redirect_uri = "http://www.ecom.inncrotech.site/users/google_sign_up";

            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->setScopes('email profile');
            //print_r($client); die("test");
            $authUrl = $client->createAuthUrl();
            //echo $authUrl.'<br>';
            /* echo $redirect_uri;
              die; */
            redirect($authUrl);
        }
    }

    public function google_sign_up() {
        //die('212');
        // $this->load->library('Googleapi/lightopenid');
        include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
//        $clientId = '699373281632-dvbej2bbfmc7qktbkg73dr5dlftproh8.apps.googleusercontent.com';
        $clientId = '699373281632-dvbej2bbfmc7qktbkg73dr5dlftproh8.apps.googleusercontent.com';
        $clientSecret = 'ftTfE3PbT55KgPS9qXEZAxP9';
//        $clientSecret = 'ftTfE3PbT55KgPS9qXEZAxP9';
//        $redirectUrl = "http://www.ecom.inncrotech.site/users/google_sign_up";
        $redirectUrl = base_url() . "users/google_sign_up";
//        $redirectUrl = base_url() . 'user_authentication/';
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
//        die();
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to Ecom');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $userProfile['picture'];

            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            if (!empty($userID)) {
                $data['userData'] = $userData;
                $this->session->set_userdata('userData', $userData);
            } else {
                $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }

//        
//        require_once APPPATH . 'libraries/Googleapi/lightopenid.php';
//        
//        //   $user_role = $this->session->userdata('check_user_role');
//        ////////////////////////////////////////////
//        ////google creadentials coding starts////////
//        ////////////////////////////////////////////
//
//        require_once APPPATH . 'libraries/Google/Google_Client.php';
//
//        //		print_r($_GET['code']);exit;
//
//        if (isset($_GET['code'])) {
//
//            $client = new Google_Client();
//            //print_r($client);
//            //die;
//
//            /* $client_id = '485016058590-f6bj9fs27u5k92klq9e1v1ib434q6j3p.apps.googleusercontent.com';
//              $client_secret = 'A-a1AEa9JebCJF3OesCxr9D7'; */
//
//
//            $client_id = '699373281632-dvbej2bbfmc7qktbkg73dr5dlftproh8.apps.googleusercontent.com';
//            $client_secret = 'ftTfE3PbT55KgPS9qXEZAxP9';
//            $redirect_uri = site_url() . 'users/google_sign_up';
//            //	echo $redirect_uri;exit;
//
//            $client->setClientId($client_id);
//            $client->setClientSecret($client_secret);
//            $client->setRedirectUri($redirect_uri);
//            $client->setScopes('email profile');
//
//            $client->authenticate($_GET['code']);
//            //print_r($_GET);die("test");
////                           
//            $this->session->set_userdata('access_token', $client->getAccessToken());
//
//
//
//            $json_array = json_decode($this->session->userdata('access_token'));
//
//            $url = 'https://www.googleapis.com/oauth2/v2/userinfo?access_token=' . $json_array->access_token . '&access_token_type=bearer';
//            $user_info_json = file_get_contents($url);
//            $user_info = json_decode($user_info_json);
//            //print_r($user_info_json);
//            //exit;
//
//            $info['google_id'] = $user_info->id;
//            $info['first_name'] = $user_info->given_name;
//            $info['last_name'] = $user_info->family_name;
//            $info['user_email'] = $user_info->email;
//            $info['profile_img'] = $user_info->picture;
//            $arrs = array('email_id' => $info['user_email']);
//
//            echo "<pre>";
//            print_r($info);
//            echo "</pre>";
//            die();
//            $datas = $this->user_model->check_user_already_exist($info['user_email']);
//
//            if ($datas) {
//                if ($datas[0]->is_delete == '1') {
//                    $sess = array();
//                    $sess['user_id'] = $datas[0]->Uid;
//                    $sess['phone'] = $datas[0]->phone;
//                    $sess['dob'] = $datas[0]->dob;
//                    $sess['email'] = $datas[0]->Email_Address;
//                    $sess['ref_id'] = $datas[0]->ref_id;
////                                    
//                    $sess['user_name'] = $info['first_name'] . " " . $info['last_name'];
//                    $sess['first_name'] = $info['first_name'];
//                    $sess['last_name'] = $info['last_name'];
//                    $sess['image'] = $info['profile_img'];
//                    $sess['user_type'] = "gmail";
//                    $this->session->set_userdata($sess);
//                    $this->user_model->usercart_data();
//                    $this->session->set_flashdata('success', 'Welcome ' . $info['first_name']);
//                    $this->db->where('Uid', $datas[0]->Uid);
//                    $this->db->update('Switch_user_login', array('image' => $info['profile_img']));
//                    redirect('user_home');
//                } else {
//                    $this->session->set_flashdata('error', 'Could Not Proccess. because your account is deleted by admin..');
////                                    
//                    redirect('front_signup');
//                }
//            } else {
//
//                //$eml = explode('@',$user_info->email);
//                //$profile_counter = 	$this->front_model->check_email_for_profile($eml[0]);
//                //echo $profile_counter;exit;
//                $ref_id = "NIKS-" . strtoupper(substr(md5(uniqid(rand(), true)), 0, 7));
//                $arr = array('first_name' => $info['first_name'], 'last_name' => $info['last_name'], 'Email_Address' => $user_info->email, 'image' => $user_info->picture, 'user_type' => 'gmail', 'ref_id' => $ref_id, 'is_created' => date('Y-m-d'));
//
//                $this->db->insert('Switch_user_login', $arr);
//                $last_id = $this->db->insert_id();
//                if (!empty($last_id)) {
//
//                    $desc = "Niks Mart Welcome Cash";
//                    $amt = 200;
//                    $add_niks_cash = array('user_id' => $last_id, 'description' => $desc, 'niks_cash_total' => $amt, 'update_date' => date('Y-m-d'));
//                    $this->db->insert('user_cash_detail', $add_niks_cash);
//                    $sess = array();
////                                    
//                    $sess['email'] = $user_info->email;
//                    $sess['user_name'] = $info['first_name'] . " " . $info['last_name'];
//                    $sess['first_name'] = $info['first_name'];
//                    $sess['last_name'] = $info['last_name'];
//                    $sess['ref_id'] = $ref_id;
//                    $sess['image'] = $user_info->picture;
//                    $sess['user_id'] = $last_id;
//                    $sess['user_type'] = "gmail";
//                    $this->session->set_userdata($sess);
//                    $this->user_model->usercart_data();
//                    $this->session->set_flashdata('success', 'Welcome ' . $info['first_name']);
//                    redirect('user_home');
//                } else {
////                                    
//                    $this->session->set_flashdata('error', 'Please Try Again.');
//                    redirect('front_signup');
//                }
//            }
//        } else {
//            $this->session->set_flashdata('error', 'Cluld Not Proccess. Please Try Again.');
//            redirect('Login');
//        }
        ///////////////////////////////////////////
        ////google credentials coding Ends/////////
        ////////////////////////////////////////////
    }

    public function google() {
        require_once(APPPATH . 'libraries/google/apiClient.php');
        require_once(APPPATH . 'libraries/google/contrib/apiPlusService.php');
        $client = new apiClient();
        $client->setApplicationName("9lessons Google+ Login Application");
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $plus = new apiPlusService($client);
        if (isset($_GET['code'])) {  //pre($_GET['code'],1); 
            $client->authenticate();
            $client_token = $client->getAccessToken();
            $this->session->set_userdata('access_token', $client_token);
        }
//echo "DDs";die;
        if ($this->session->userdata('access_token')) {
            $client->setAccessToken($this->session->userdata('access_token'));
        }

        if ($client->getAccessToken()) {
            $me = $plus->people->get('me');

            echo "<pre>";
            print_r($me);
            die;
            $optParams = array('maxResults' => 100);
            $activities = $plus->activities->listActivities('me', 'public', $optParams);
            $result = $this->login_model->get_details($me['emails'][0]['value']);
            if ($result != '') {
                $ses = $this->session->userdata('front_user_logged_in');
            } else {
                $insertData = array(
                    "user_email" => $me['emails'][0]['value'],
                    "user_first_name" => $me['name']['givenName'],
                    "user_last_name" => $me['name']['familyName'],
                    "user_type" => 3,
                    "user_status" => 1,
                );
                $insRes = $this->home_model->insert_user($insertData);



                //$this->session->set_flashdata('mykey', 'User Logged in successfully.');
                //$this->session->set_userdata('userlogin',$checkEmail->user_id);
                //$this->session->set_userdata('name',$me['name']['givenName']);
            }
            //	$this->session->set_userdata('userinfo',$me);
            //	header("location: ".site_url()."Home/myaccount");
            //	exit;
        }
        // The access token may have been updated lazily.
    }

    function facebook_login() {
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $user_profile = $this->facebook->api('/me');
                $result = $this->login_model->get_details($user_profile['email']);
                if (!empty($result)) {
                    $ses = $this->session->userdata('front_user_logged_in');
                } else {
                    $insertData = array(
                        "user_email" => $user_profile['email'],
                        "user_first_name" => $user_profile['name'],
                        "user_type" => 3,
                        "user_status" => 1,
                    );
                    $insRes = $this->user_model->add_user($insertData);
                    if ($insRes) {
                        $ses = $this->session->userdata('front_user_logged_in');
                    }
                }
                redirect(base_url(), 'refresh');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }
        $sendData = '';
        $login_url = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('users/facebook_login'),
            'scope' => array("email")
        ));
        $cat = $this->category_model->get_category_list();
        $sendData = array('cat' => $cat, 'login_url' => $login_url);
        self::slicing('signin', $sendData);
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('frontend/master/header', $sendArray);
        $this->load->view('frontend/' . $viewTemp);
        $this->load->view('frontend/master/footer');
    }

    function sendMail($to, $sub, $msg, $from = 'support@inncrotech.site') {
//        $this->load->library('email');
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from); // change it to yours
        $this->email->to($to); // change it to yours
        $this->email->subject($sub);
        $this->email->message($msg);
        $r = $this->email->send();
        return $r;
    }

    public function send_contact() {

        $results['userdetails'] = $_POST;
        $msg = $this->load->view('emails/contact', $results, true);
        $r = $this->sendMail(ADMINEMAIL, $_POST['subject'], $msg, $_POST['email']);
        $this->session->set_flashdata('success', 'Information Send Sucessfully');

        redirect('page/contact');
    }

}
