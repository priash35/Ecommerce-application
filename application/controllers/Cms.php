
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model('cms_model');
    }

    public function cms() {
        IsAdminActive();
        if ($this->input->post()) {
            $data = array(
                "cms_page_name" => $_POST['cms_page_name'],
                "cms_meta_title" => $_POST['cms_meta_title'],
                "cms_meta_Keywords" => $_POST['cms_meta_Keywords'],
                "cms_meta_description" => $_POST['cms_meta_description'],
                "cms_page_content" => $_POST['cms_page_content']
            );

            $insert_cms = $this->cms_model->add_cms($data);

            redirect(base_url() . 'cms/cmsList', 'refresh');
        }
        $cms_data = $this->cms_model->get_cms_list();
        $sendData = array('cms_data' => $cms_data);
        self::slicing('add_cmspage', $sendData);
    }

    public function cmsList() {
        $cms_data = $this->cms_model->get_cms_list();

//		$category_types = $this->category_model->get_category_types();
        $sendData = array('cms_data' => $cms_data);

        self::slicing('cms_list', $sendData);
    }

    public function edit_cms($id) {

        if ($this->input->post()) {
            $data = array(
                "cms_page_name" => $_POST['cms_page_name'],
                "cms_meta_title" => $_POST['cms_meta_title'],
                "cms_meta_Keywords" => $_POST['cms_meta_Keywords'],
                "cms_meta_description" => $_POST['cms_meta_description'],
                "cms_page_content" => $_POST['cms_page_content']
            );

            $update_cms = $this->cms_model->edit_cms($data, $id);
            redirect(base_url() . 'cms/cmsList', 'refresh');
        }
        $cms_data = $this->cms_model->get_cms_list();
        $cms_info = $this->cms_model->get_cms_by_id($id);
        $sendData = array('cms_data' => $cms_data, 'cms_info' => $cms_info);
      
        self::slicing('edit_cmspage', $sendData);
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('superadmin/master/header');
        $this->load->view('superadmin/' . $viewTemp, $sendArray);
        $this->load->view('superadmin/master/left');
        $this->load->view('superadmin/master/footer');
    }

    public function cmsPages($page_name) {
        $sendData['data'] = $this->db->get_where('cms', array("replace(cms_page_name, ' ', '') = " => $page_name))->row();

        self::slicinguser('Aboutus', $sendData);
    }

    function slicinguser($viewTemp, $sendArray) {
        $this->load->view('frontend/master/header', $sendArray);
        $this->load->view('frontend/' . $viewTemp);
        $this->load->view('frontend/master/footer');
    }

}

?>