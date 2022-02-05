<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('product_model');
        $this->load->library('image_lib');
    }

    //product listget_cor_product_list
    public function product_list() {
        IsAdminActive();
        $product_data = $this->product_model->get_product_list();
        $isSuccess = '';
        $sendData = array('product_data' => $product_data, 'isSuccess' => $isSuccess);
        self::slicing('product_list', $sendData);
    }

    //product cor list
    public function cor_product_list() {
        IsAdminActive();
        $product_data = $this->product_model->get_cor_product_list();
        $isSuccess = '';
        $sendData = array('product_data' => $product_data, 'isSuccess' => $isSuccess);
        self::slicing('product_cor_list', $sendData);
    }

    //add product
    public function add_product() {
        IsAdminActive();
        $isAddproduct = '';
        $getSuccess = $this->uri->segment('3');

        if ($this->input->post()) {
            $area_id = trim($_POST['area_id'], ',');
            $insertData = array(
                "product_name" => $_POST['product_name'],
                "product_desc" => $_POST['product_desc'],
                "category_fk_id" => $_POST['category_id'],
                "sub_category_fk_id" => $_POST['sub_cat'],
                "price" => $_POST['price'],
                "IsCorporate" => 0,
                "area_fk_id" => $area_id,
                "delInfo" => $_POST['delInfo'],
                "care" => $_POST['care'],
                "product_status" => $_POST['is_active']
            );
            $isAddproduct = $this->product_model->add_product($insertData);
            $FullPath = DOCUMENT_ROOT . 'assets/images/product_image';
            if (!file_exists($FullPath)) {
                mkdir($FullPath, 0777, true);
            }
            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/product_image/thumb/';
            if (!file_exists($FullPathThumb)) {
                mkdir($FullPathThumb, 0777, true);
            }
            if (isset($_FILES['prod_images']['name']) && !empty($_FILES['prod_images']['name'])) {
                $query = 'INSERT INTO product_images (file_name,product_fk_id) VALUES ';
                $query_parts = array();
                for ($i = 0; $i < count($_FILES['prod_images']['name']); $i++) {
                    $prd_img = $_FILES['prod_images']['name'][$i];
                    if ($prd_img != '') {
                        $product_images = explode('.', $prd_img);
                        $productimages = time() . 'prod_images' . $product_images[0] . "." . $product_images[1];


                        $target = $FullPath . '/' . $productimages;
                        move_uploaded_file($_FILES['prod_images']['tmp_name'][$i], $target);

                        $image_path = $productimages;
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = DOCUMENT_ROOT . 'assets/images/product_image/' . $productimages;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = False;
                        $config['height'] = 200;
                        $config['width'] = 200;
                        $config['new_image'] = DOCUMENT_ROOT . 'assets/images/product_image/thumb/' . $productimages;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $query_parts[] = "('" . $image_path . "','" . $isAddproduct . "')";
                    }
                }
            }
            if (!empty($query_parts)) {
                $query.= implode(',', $query_parts);
                $insertRecord = $this->db->query($query);
            }
            if ($isAddproduct) {
                $this->session->set_flashdata('product_add', 'Product has been added successfully');
                redirect(base_url() . 'product/product_list', 'refresh');
            }
        }
        $area_data = $this->product_model->get_all_area();
        $category_data = $this->product_model->get_all_category();
        $sendData = array('isAddproduct' => $isAddproduct, 'isSuccess' => $getSuccess, 'area_data' => $area_data, 'category_data' => $category_data);
        self::slicing('add_product', $sendData);
    }

    //add cor product
    public function add_cor_product() {
        IsAdminActive();
        $isAddproduct = '';
        $getSuccess = $this->uri->segment('3');

        if ($this->input->post()) {
            $area_id = trim($_POST['area_id'], ',');
            $insertData = array(
                "product_name" => $_POST['product_name'],
                "product_desc" => $_POST['product_desc'],
                "IsCorporate" => 1,
                "CorporateType" => $_POST['CorporateType'],
                "price" => $_POST['price'],
                "area_fk_id" => $area_id,
                "delInfo" => $_POST['delInfo'],
                "care" => $_POST['care'],
                "product_status" => $_POST['is_active']
            );
            //	print_r($insertData);
            $isAddproduct = $this->product_model->add_product($insertData);
            $FullPath = DOCUMENT_ROOT . 'assets/images/product_image';
            if (!file_exists($FullPath)) {
                mkdir($FullPath, 0777, true);
            }
            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/product_image/thumb/';
            if (!file_exists($FullPathThumb)) {
                mkdir($FullPathThumb, 0777, true);
            }
            if (isset($_FILES['prod_images']['name']) && !empty($_FILES['prod_images']['name'])) {
                $query = 'INSERT INTO product_images (file_name,product_fk_id) VALUES ';
                $query_parts = array();
                for ($i = 0; $i < count($_FILES['prod_images']['name']); $i++) {
                    $prd_img = $_FILES['prod_images']['name'][$i];
                    if ($prd_img != '') {
                        $product_images = explode('.', $prd_img);
                        $productimages = time() . 'prod_images' . $product_images[0] . "." . $product_images[1];


                        $target = $FullPath . '/' . $productimages;
                        move_uploaded_file($_FILES['prod_images']['tmp_name'][$i], $target);

                        $image_path = $productimages;
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = DOCUMENT_ROOT . 'assets/images/product_image/' . $productimages;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = False;
                        $config['height'] = 200;
                        $config['width'] = 200;
                        $config['new_image'] = DOCUMENT_ROOT . 'assets/images/product_image/thumb/' . $productimages;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $query_parts[] = "('" . $image_path . "','" . $isAddproduct . "')";
                    }
                }
            }
            if (!empty($query_parts)) {
                $query.= implode(',', $query_parts);
                $insertRecord = $this->db->query($query);
            }
            if ($isAddproduct) {
                $this->session->set_flashdata('product_add', 'Product has been added successfully');
                redirect(base_url() . 'product/cor_product_list', 'refresh');
            }
        }
        $area_data = $this->product_model->get_all_area();
        $category_data = $this->product_model->get_all_category();
        $sendData = array('isAddproduct' => $isAddproduct, 'isSuccess' => $getSuccess, 'area_data' => $area_data, 'category_data' => $category_data);
        self::slicing('add_cor_product', $sendData);
    }

    //edit product
    public function edit_product($id) {
        $id = intval(preg_replace('/[^0-9]+/', '', $id));
        $getSuccess = $this->uri->segment('3');
        IsAdminActive();
        $isEditproduct = '';

        if ($this->input->post()) {
            $area_id = trim($_POST['area_id'], ',');
            $updateData = array(
                "product_name" => $_POST['product_name'],
                "product_desc" => $_POST['product_desc'],
                "IsCorporate" => 0,
                "category_fk_id" => $_POST['category_id'],
                "sub_category_fk_id" => $_POST['sub_cat'],
                "price" => $_POST['price'],
                "area_fk_id" => $area_id,
                "delInfo" => $_POST['delInfo'],
                "care" => $_POST['care'],
                "product_status" => $_POST['is_active']
            );
            $isEditproduct = $this->product_model->edit_product($updateData, $id);
            $FullPath = DOCUMENT_ROOT . 'assets/images/product_image';
            if (!file_exists($FullPath)) {
                mkdir($FullPath, 0777, true);
            }
            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/product_image/thumb/';
            if (!file_exists($FullPathThumb)) {
                mkdir($FullPathThumb, 0777, true);
            }
            if (isset($_FILES['prod_images']['name']) && !empty($_FILES['prod_images']['name'])) {
                $query = 'INSERT INTO product_images (file_name,product_fk_id) VALUES ';
                $query_parts = array();
                for ($i = 0; $i < count($_FILES['prod_images']['name']); $i++) {
                    $prd_img = $_FILES['prod_images']['name'][$i];
                    if ($prd_img != '') {
                        $product_images = explode('.', $prd_img);
                        $productimages = time() . 'prod_images' . $product_images[0] . "." . $product_images[1];


                        $target = $FullPath . '/' . $productimages;
                        move_uploaded_file($_FILES['prod_images']['tmp_name'][$i], $target);

                        $image_path = $productimages;
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = DOCUMENT_ROOT . 'assets/images/product_image/' . $productimages;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = False;
                        $config['height'] = 200;
                        $config['width'] = 200;
                        $config['new_image'] = DOCUMENT_ROOT . 'assets/images/product_image/thumb/' . $productimages;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $query_parts[] = "('" . $image_path . "','" . $id . "')";
                    }
                }
            }
            if (!empty($query_parts)) {
                $query.= implode(',', $query_parts);
                $insertRecord = $this->db->query($query);
            }
            $this->session->set_flashdata('product_edit', 'product has been updated successfully');
            redirect(base_url() . 'product/product_list', 'refresh');
        }
        $area_data = $this->product_model->get_all_area();
        $category_data = $this->product_model->get_all_category();
        $product_images = $this->product_model->get_product_images($id);
        $product_info = $this->product_model->get_product_by_id($id);
        $sub_category_info = $this->product_model->get_sub_category_by_id($product_info->category_fk_id);
        $sendData = array('isEditproduct' => $isEditproduct, 'sub_category_info' => $sub_category_info, 'product_images' => $product_images, 'area_data' => $area_data, 'category_data' => $category_data, 'getproduct' => $product_info, 'isSuccess' => $getSuccess);
        self::slicing('add_product', $sendData);
    }

//edit cor product

    public function edit_cor_product($id) {
        $id = intval(preg_replace('/[^0-9]+/', '', $id));
        $getSuccess = $this->uri->segment('3');
        IsAdminActive();
        $isEditproduct = '';

        if ($this->input->post()) {
            $area_id = trim($_POST['area_id'], ',');
            $updateData = array(
                "product_name" => $_POST['product_name'],
                "product_desc" => $_POST['product_desc'],
                "IsCorporate" => 1,
                "CorporateType" => $_POST['CorporateType'],
                "price" => $_POST['price'],
                "area_fk_id" => $area_id,
                "delInfo" => $_POST['delInfo'],
                "care" => $_POST['care'],
                "product_status" => $_POST['is_active']
            );

            $isEditproduct = $this->product_model->edit_product($updateData, $id);
            $FullPath = DOCUMENT_ROOT . 'assets/images/product_image';
            if (!file_exists($FullPath)) {
                mkdir($FullPath, 0777, true);
            }
            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/product_image/thumb/';
            if (!file_exists($FullPathThumb)) {
                mkdir($FullPathThumb, 0777, true);
            }
            if (isset($_FILES['prod_images']['name']) && !empty($_FILES['prod_images']['name'])) {
                $query = 'INSERT INTO product_images (file_name,product_fk_id) VALUES ';
                $query_parts = array();
                for ($i = 0; $i < count($_FILES['prod_images']['name']); $i++) {
                    $prd_img = $_FILES['prod_images']['name'][$i];
                    if ($prd_img != '') {
                        $product_images = explode('.', $prd_img);
                        $productimages = time() . 'prod_images' . $product_images[0] . "." . $product_images[1];


                        $target = $FullPath . '/' . $productimages;
                        move_uploaded_file($_FILES['prod_images']['tmp_name'][$i], $target);

                        $image_path = $productimages;
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = DOCUMENT_ROOT . 'assets/images/product_image/' . $productimages;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = False;
                        $config['height'] = 200;
                        $config['width'] = 200;
                        $config['new_image'] = DOCUMENT_ROOT . 'assets/images/product_image/thumb/' . $productimages;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $query_parts[] = "('" . $image_path . "','" . $id . "')";
                    }
                }
            }
            if (!empty($query_parts)) {
                $query.= implode(',', $query_parts);
                $insertRecord = $this->db->query($query);
            }
            $this->session->set_flashdata('product_cor_edit', 'product has been updated successfully');
            redirect(base_url() . 'product/cor_product_list', 'refresh');
        }
        $area_data = $this->product_model->get_all_area();
        $product_images = $this->product_model->get_product_images($id);
        $product_info = $this->product_model->get_product_by_id($id);
        $sendData = array('isEditproduct' => $isEditproduct, 'product_images' => $product_images, 'area_data' => $area_data, 'getproduct' => $product_info, 'isSuccess' => $getSuccess);
        self::slicing('add_cor_product', $sendData);
    }

    public function corporate_product_enquiry() {
        $enquiry_data = $this->product_model->get_all_product_enquiry();
        $sendData = array('enquiry_data' => $enquiry_data);
        self::slicing('enquiry_list', $sendData);
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('superadmin/master/header');
        $this->load->view('superadmin/' . $viewTemp, $sendArray);
        $this->load->view('superadmin/master/left');
        $this->load->view('superadmin/master/footer');
    }

}

?>
