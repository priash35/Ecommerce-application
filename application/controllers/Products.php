<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('product_model');
        $this->load->library('image_lib');
        $this->load->model('category_model');
        $this->load->model('frontend_model');
        $this->load->library('email');
        //error_reporting(0);
    }

    //product list
    public function product_list($subcat_id) {
//        $cat_id = $this->uri->segment('3');
        $subsubcat = $this->uri->segment('4');
//        $slider = '';
        
        $subCatId = $this->product_model->Get_sub_by_sizeID($subcat_id);
        if ($subCatId) {
            $slider = $this->product_model->Get_slider_by_SubcatID($subCatId->sz_sc_category_fk_id);
        }
        
        $product_list = $this->product_model->Get_products_by_catID($subcat_id, $subsubcat);
        $cat = $this->category_model->get_category_list_header();
        $sendData = array('product_list' => $product_list, 'cat' => $cat, 'slider' => $slider);
        self::slicing('product_list', $sendData);
    }

    public function Category() {
        $prod = $this->uri->segment('3');
        $cat = $this->category_model->get_category_list($prod);
        $isSuccess = '';
        $sendData = array('cat' => $cat, 'isSuccess' => $isSuccess);
        self::slicing('categorypage', $sendData);
    }

    //product list
    public function Details() {
        $prod = $this->uri->segment('3');
        $id = $this->uri->segment('4');
        $action = base_url() . 'products/details/' . $prod . '/' . $id;
        $hash = '';
        $Prod_info = '';
        $txnid = '';
        if (isset($_POST['key']) && $_POST['key'] != '') {
            // Merchant product info.
            $Prod_info = '';

            $SALT = PAYU_MERCHANT_SALT;
            $posted = array();
            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    $posted[$key] = $value;
                }
            }
            //pre($_POST,1);
            $formError = 0;
            if (empty($posted['txnid'])) {
                // Generate random transaction id
                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            } else {
                $txnid = $posted['txnid'];
            }
            // Hash Sequence
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
            if (empty($posted['hash']) && sizeof($posted) > 0) {
                //if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['udf1']) || empty($posted['udf2']) || empty($posted['udf5']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {

                if (empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
                    $formError = 1;
                } else {
                    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                    $hashVarsSeq = explode('|', $hashSequence);
                    $hash_string = '';
                    foreach ($hashVarsSeq as $hash_var) {
                        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                        $hash_string .= '|';
                    }

                    $hash_string .= PAYU_MERCHANT_SALT;
                    $hash = strtolower(hash('sha512', $hash_string));
                    $action = PAYU_BASE_URL . '/_payment';
                }
            } elseif (!empty($posted['hash'])) {
                $hash = $posted['hash'];
                $action = PAYU_BASE_URL . '/_payment';
            }
        }
    }

    public function check_area_availability() {

        $check_product = $this->product_model->check_product_pincode_available($_POST['pincode'], $_POST['product_id']);
//        print_r($check_product->delivery_charges); exit;
        if ($check_product) {
            echo json_encode($check_product);
        } else {
            echo 1;
        }
    }

    public function payment_success() {
        $category_types = $this->category_model->get_category_types();
        foreach ($category_types as $ct) {
            $abc = ($ct['category_type']);
            $catTyID = ($ct['category_type_pk_id']);
            $cat = $this->category_model->get_categories_by_CatType($catTyID);
            $catArray[] = array('CT' => $abc, 'CatList' => $cat);
        }
        $sendData = array('catArray' => $catArray);
        self::slicing('success', $sendData);
    }

    public function payment_failure() {
        $category_types = $this->category_model->get_category_types();
        foreach ($category_types as $ct) {
            $abc = ($ct['category_type']);
            $catTyID = ($ct['category_type_pk_id']);
            $cat = $this->category_model->get_categories_by_CatType($catTyID);
            $catArray[] = array('CT' => $abc, 'CatList' => $cat);
        }
        $sendData = array('catArray' => $catArray);
        self::slicing('failure', $sendData);
    }

    public function sub_categories() {
        $cat_id = $this->uri->segment('3');
        $product_list = $this->product_model->Get_products_by_catID($cat_id);
        $slider = $this->product_model->Get_slider_by_SubcatID($cat_id);
        $cat = $this->category_model->get_category_list_header();

        $sendData = array('product_list' => $product_list, 'cat' => $cat, 'slider' => $slider);
        self::slicing('sub_categories', $sendData);
    }

    public function categories() {
        $sectionT = $this->uri->segment('3');
        $catarr = array("0" => 'slider', "1" => 'first', "2" => 'second', "3" => 'third', "4" => 'fourth', "5" => 'five');

        foreach ($catarr as $caDATA) {
            if ($caDATA == 'slider') {
                $tableN = 'catslider';
            } elseif ($caDATA == 'first') {
                $tableN = 'catfirst';
            } elseif ($caDATA == 'second') {
                $tableN = 'catsecond';
            } elseif ($caDATA == 'third') {
                $tableN = 'catthird';
            } elseif ($caDATA == 'fourth') {
                $tableN = 'catfourth';
            } elseif ($caDATA == 'five') {
                $tableN = 'catfive';
            }
            $res[] = $this->frontend_model->get_cat_page_list_by_Cat($sectionT, $tableN);
            //echo $this->db->last_query();
        }
       /*  print_r($res);
       die(); */
        $NewArrivalsOffer = $this->product_model->get_NewArrivalsOffer_list();
        $cat = $this->category_model->get_category_list_header();
		/*print_r($NewArrivalsOffer);
       die();*/
        $sendData = array('NewArrivalsOffer' => $NewArrivalsOffer, 'cat' => $cat, 'res' => $res);
        self::slicing('sub_categories', $sendData);
    }

    public function product_details() {
        $sub_cat_products = array();
        $id = $this->uri->segment('3');
        $product_images = $this->product_model->get_product_images_by_id($id);
        $product_data = $this->product_model->get_product_details_by_id($id);
        $product_size = $this->product_model->get_product_size_by_product_id($id);
        //$product_colors = $this->product_model->get_product_colors_by_product_id($id);
        if (isset($product_data[0]['sub_category_fk_id']) && $product_data[0]['sub_category_fk_id'] != '') {
            $sub_cat_products = $this->product_model->get_related_subcategory_products($product_data[0]['sub_category_fk_id']); 
        }
        $cat = $this->category_model->get_category_list_header();
        $sendData = array('cat' => $cat, 'product_images' => $product_images, 'product_data' => $product_data, 'product_size' => $product_size, 'sub_cat_products' => $sub_cat_products);
        self::slicing('product_details', $sendData);
		
    }
    

    function slicing($viewTemp, $sendArray) {
        $this->load->view('frontend/master/header', $sendArray);
        $this->load->view('frontend/' . $viewTemp);
        $this->load->view('frontend/master/footer');
    }

    public function search_product() {
//        $cat_id = $this->uri->segment('3');
        //$subsubcat = $this->uri->segment('4');
        $search = $this->input->get('search');
        $slider = '';      
        
        $product_list = $this->product_model->get_search($search);

        $cat = $this->category_model->get_category_list_header();
        $sendData = array('product_list' => $product_list, 'cat' => $cat, 'slider' => $slider);
        
        self::slicing('product_list', $sendData);
    }
    
    
}

?>
