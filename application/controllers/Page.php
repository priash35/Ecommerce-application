
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('billing_model');
        $this->load->library('cart');
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

    public function Contact() {
        $cat = $this->category_model->get_category_list();
        $sendData = array('cat' => $cat);
        if (isset($_POST['contactSubmit']) && $_POST['contactSubmit'] == 'Submit') {

            $html = '<html><head></head><body><div>' . $_POST['message'] . '</div></body></html>';





            $this->email->send();
            $this->email->clear();

            $this->email->to($_POST['email']);
            $this->email->from('testing@inncrotech.site');
            $this->email->set_mailtype('html');
            $this->email->subject($_POST["subject"]);
            $this->email->message($html);
            if ($this->email->send()) {
                
            } else {
                echo $this->email->print_debugger();
            }
        }
        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('frontend/master/header', $sendData);
        $this->load->view('frontend/contact');
        $this->load->view('frontend/master/footer');
    }

    public function Help() {
        $cat = $this->category_model->get_category_list();
        $sendData = array('cat' => $cat);

        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('frontend/master/header', $sendData);
        $this->load->view('frontend/Help');
        $this->load->view('frontend/master/footer');
    }

    public function Aboutus() {
        $cat = $this->category_model->get_category_list();
        $sendData = array('cat' => $cat);

        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('frontend/master/header', $sendData);
        $this->load->view('frontend/Aboutus');
        $this->load->view('frontend/master/footer');
    }

    public function Faq() {
        $cat = $this->category_model->get_category_list();
        $sendData = array('cat' => $cat);
        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('frontend/master/header', $sendData);
        $this->load->view('frontend/faq');
        $this->load->view('frontend/master/footer');
    }

}
