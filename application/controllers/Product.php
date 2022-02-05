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
        $this->load->model('user_model');
        $this->load->model('category_model');
        $this->load->library('image_lib');
    }

    //product listget_cor_product_list
    public function product_list() {
        //IsAdminActive();
        $product_data = $this->product_model->get_product_list();
		
        $isSuccess = '';
        $sendData = array('product_data' => $product_data, 'isSuccess' => $isSuccess);
        self::slicing('product_list', $sendData);
    }

    //add product
    public function add_product() {
        //IsAdminActive();
        $isAddproduct = '';
        $getSuccess = $this->uri->segment('3');

        if ($this->input->post()) {
            
            $data = array();
            if (!empty($_FILES['prod_images']['name'])) {
                $filesCount = count($_FILES['prod_images']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userFile']['name'] = $_FILES['prod_images']['name'][$i];
                    $_FILES['userFile']['type'] = $_FILES['prod_images']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['prod_images']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['prod_images']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['prod_images']['size'][$i];
                    $uploadPath = './assets/images/product_image';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['encrypt_name'] = True;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('userFile')) {
                        $fileData = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $fileData['full_path'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['width'] = 200;
                        $config['height'] = 200;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $uploadData[$i] = $fileData['file_name'];
                    }
                }
            }
            /*echo array_sum($_POST['quantity']);
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            die();*/
            //echo "<pre>"; print_r($_FILES);die;

            $insertData = array(
                "product_name" => $_POST['product_name'],
                "SUK" => $_POST['SUK'],
                "product_desc" => $_POST['product_desc'],
                "category_fk_id" => $_POST['category_id'],
                "sub_category_fk_id" => $_POST['sub_cat'],
                "size_category_fk_id" => $_POST['size_cat'],
                "pro_vendor_id" => $_POST['vendor_pk_id'],
                "product_color" => $_POST['product_color'],
                "brand" => $_POST['brand'],
                "product_status" => 1,
				"product_image" => $fileData['file_name']
            );

             /*echo "<pre>";
            print_r($insertData);
            echo "</pre>";
            die();*/
            $r = $this->db->insert('product', $insertData);

            if ($r) {
                $product_id = $this->db->insert_id();

                $insertData1 = array(
                    "product_id" => $product_id,
                    "QTY" => array_sum($_POST['quantity'])
                );
                $isAddproductStock = $this->product_model->add_product_stock($insertData1);

                $pro_size = $_POST['size'];
                $pro_unitprice = $_POST['unitprice'];
                $pro_discount = $_POST['discount'];
                $pro_discPrice = $_POST['discPrice'];
                $pro_quantity = $_POST['quantity'];
                for ($i = 0; $i < count($pro_size); $i++) {
                    $s = array(
                        "product_id" => $product_id,
                        "size_name" => $pro_size[$i],
                        "size_prize" => $pro_unitprice[$i],
                        "size_descount" => $pro_discount[$i],
                        "size_descprice" => $pro_discPrice[$i],
                        "size_qty" => $pro_quantity[$i]
                    );
                    $this->product_model->add_product_size($s);
                }
               
                 /* echo '<pre>';
                print_r($vendor_data);
                echo '</pre>';
                die();*/


                for ($i = 0;; $i++) {
                    if (isset($_POST['area_' . $i])) {
                        $insertPAD = array(
                            "Pa_product_id" => $product_id,
                            "pa_areaID" => $_POST['area_' . $i],
                            "city_id" => $_POST['cityid_' . $i],
                            "delivery_charges" => $_POST['delivery_charges_' . $i],
                            "no_of_days" => $_POST['no_of_days_' . $i],
                        );
                        $isAddproductAreaD = $this->product_model->add_product_area_details($insertPAD);
                    } else {
                        break;
                    }
                    echo $i;
                }
//                $i = 0;
//                foreach($pro_size as $rs){
//                    $insertPAD = array(
//                            "Pa_product_id" => $product_id,
//                            "pa_areaID" => $_POST['area_' . $i],
//                            "city_id" => $_POST['cityid_' . $i],
//                            "delivery_charges" => $_POST['delivery_charges_' . $i],
//                            "no_of_days" => $_POST['no_of_days_' . $i],
//                        );
//                        $isAddproductAreaD = $this->product_model->add_product_area_details($insertPAD);
//                        $i++;
//                }
//                
               

                foreach ($uploadData as $row) {
                    $img = array(
                        'file_name' => $row,
                        'product_fk_id' => $product_id
                    );
                    $this->db->insert('product_images', $img);
                }
            }

            if ($r) {
                $this->session->set_flashdata('product_add', 'Product has been added successfully');
                redirect(base_url() . 'product/product_list', 'refresh');
            }
        }
        $area_data = $this->product_model->get_all_area();
        $category_data = $this->product_model->get_category_Active();
        $brandList = $this->product_model->get_brand_listActive();

        $CityData = $this->user_model->get_city_listActive();

        $vendor_data = $this->user_model->get_Vendors_listActive();

        $color_data = $this->product_model->get_all_product_colors();
        $sendData = array('isAddproduct' => $isAddproduct, 'color_data' => $color_data, 'vendor_data' => $vendor_data, 'CityData' => $CityData, 'brandList' => $brandList, 'isSuccess' => $getSuccess, 'area_data' => $area_data, 'category_data' => $category_data);
        self::slicing('add_product', $sendData);
              
    }

    //edit product
    public function edit_product($id) {

        $id = intval(preg_replace('/[^0-9]+/', '', $id));
        $getSuccess = $this->uri->segment('3');
        IsAdminActive();
        $isEditproduct = '';

        if ($this->input->post()) {
           

            $data = array();
            if (!empty($_FILES['prod_images']['name'])) {
                $filesCount = count($_FILES['prod_images']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userFile']['name'] = $_FILES['prod_images']['name'][$i];
                    $_FILES['userFile']['type'] = $_FILES['prod_images']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['prod_images']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['prod_images']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['prod_images']['size'][$i];
                    $uploadPath = './assets/images/product_image';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['encrypt_name'] = True;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('userFile')) {
                        $fileData = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $fileData['full_path'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['width'] = 200;
                        $config['height'] = 200;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $uploadData[$i] = $fileData['file_name'];
                    }
                }
            }
            
            foreach ($uploadData as $row) {
                $img = array(
                    'file_name' => $row,
                    'product_fk_id' => $id
                );
                $this->db->insert('product_images', $img);
            }

            $updateData = array(
                "product_name" => $_POST['product_name'],
                "SUK" => $_POST['SUK'],
                "product_desc" => $_POST['product_desc'],
                "category_fk_id" => $_POST['category_id'],
                "sub_category_fk_id" => $_POST['sub_cat'],
                "size_category_fk_id" => $_POST['size_cat'],
                "pro_vendor_id" => $_POST['vendor_pk_id'],
                "product_color" => $_POST['product_color'],
                "brand" => $_POST['brand'],
//                "product_status" => 2
            );
            $this->db->where('product_pk_id', $id);
            $r = $this->db->update('product', $updateData);

            $insertData1 = array(
                "QTY" => array_sum($_POST['quantity'])
            );
            $this->db->where('product_id', $id);
            $this->db->update('product_stock', $insertData1);

            $this->db->where('product_id', $id);
            $this->db->delete('product_size');
            $pro_size = $_POST['size'];
            $pro_unitprice = $_POST['unitprice'];
            $pro_discount = $_POST['discount'];
            $pro_discPrice = $_POST['discPrice'];
            $pro_quantity = $_POST['quantity'];
            for ($i = 0; $i < count($pro_size); $i++) {
                $s = array(
                    "product_id" => $id,
                    "size_name" => $pro_size[$i],
                    "size_prize" => $pro_unitprice[$i],
                    "size_descount" => $pro_discount[$i],
                    "size_descprice" => $pro_discPrice[$i],
                    "size_qty" => $pro_quantity[$i]
                );
                $this->product_model->add_product_size($s);
            }
            
            $this->db->where('Pa_product_id', $id);
            $this->db->delete('product_area');
            for ($i = 0;; $i++) {
                if (isset($_POST['area_' . $i])) {
                    $insertPAD = array(
                        "Pa_product_id" => $id,
                        "pa_areaID" => $_POST['area_' . $i],
                        "city_id" => $_POST['cityid_' . $i],
                        "delivery_charges" => $_POST['delivery_charges_' . $i],
                        "no_of_days" => $_POST['no_of_days_' . $i],
                    );
                    $isAddproductAreaD = $this->product_model->add_product_area_details($insertPAD);
                } else {
                    break;
                }
            }



//            $isEditproduct = $this->product_model->edit_product($updateData, $id);
//            $FullPath = DOCUMENT_ROOT . 'assets/images/product_image';
//            if (!file_exists($FullPath)) {
//                mkdir($FullPath, 0777, true);
//            }
//            $FullPathThumb = DOCUMENT_ROOT . 'assets/images/product_image/thumb/';
//            if (!file_exists($FullPathThumb)) {
//                mkdir($FullPathThumb, 0777, true);
//            }
//            if (isset($_FILES['prod_images']['name']) && !empty($_FILES['prod_images']['name'])) {
//                $query = 'INSERT INTO product_images (file_name,product_fk_id) VALUES ';
//                $query_parts = array();
//                for ($i = 0; $i < count($_FILES['prod_images']['name']); $i++) {
//                    $prd_img = $_FILES['prod_images']['name'][$i];
//                    if ($prd_img != '') {
//                        $product_images = explode('.', $prd_img);
//                        $productimages = time() . 'prod_images' . $product_images[0] . "." . $product_images[1];
//
//
//                        $target = $FullPath . '/' . $productimages;
//                        move_uploaded_file($_FILES['prod_images']['tmp_name'][$i], $target);
//
//                        $image_path = $productimages;
//                        $config['image_library'] = 'gd2';
//                        $config['source_image'] = DOCUMENT_ROOT . 'assets/images/product_image/' . $productimages;
//                        $config['create_thumb'] = TRUE;
//                        $config['maintain_ratio'] = False;
//                        $config['height'] = 200;
//                        $config['width'] = 200;
//                        $config['new_image'] = DOCUMENT_ROOT . 'assets/images/product_image/thumb/' . $productimages;
//                        $this->image_lib->initialize($config);
//                        $this->image_lib->resize();
//                        $query_parts[] = "('" . $image_path . "','" . $id . "')";
//                    }
//                }
//            }
//            if (!empty($query_parts)) {
//                $query.= implode(',', $query_parts);
//                $insertRecord = $this->db->query($query);
//            }
//            $update_Data1 = array(
//                "QTY" => $_POST['QTY']
//            );
//            $isUpdateproductStock = $this->product_model->update_product_stock($update_Data1, $id);
//
//            $updatePSX = array(
//                "size_name" => 'X',
//                "size_prize" => $_POST['psXprice'],
//                "size_descount" => $_POST['psXdic']
//            );
//            $isUpdateproductSizeX = $this->product_model->update_product_size($updatePSX, $id, 'X');
//            $updatePSXX = array(
//                "size_name" => 'XX',
//                "size_prize" => $_POST['psXXprice'],
//                "size_descount" => $_POST['psXXdic']
//            );
//            $isUpdateproductSizeXX = $this->product_model->update_product_size($updatePSXX, $id, 'XX');
//            $updatePSXL = array(
//                "size_name" => 'XL',
//                "size_prize" => $_POST['psXLprice'],
//                "size_descount" => $_POST['psXLdic']
//            );
//            $isUpdateproductSizeXL = $this->product_model->update_product_size($updatePSXL, $id, 'XL');
//            $updatePSM = array(
//                "size_name" => 'M',
//                "size_prize" => $_POST['psMprice'],
//                "size_descount" => $_POST['psMdic']
//            );
//            $isUpdateproductSizeM = $this->product_model->update_product_size($updatePSM, $id, 'M');
//
//            


            /* for($i=0; ; $i++){
              if(isset($_POST['area_'.$i])) {
              $insertPAD = array(
              "Pa_product_id"=>$insert_id,
              "pa_areaID"=>$_POST['area_'.$i],
              "delivery_charges"=>$_POST['delivery_charges_'.$i],
              );
              $isAddproductAreaD = $this->product_model->add_product_area_details($insertPAD);
              }else{
              break;
              }
              } */
            $this->session->set_flashdata('product_edit', 'product has been updated successfully');
            redirect(base_url() . 'product/product_list', 'refresh');
        }


        $product_images = $this->product_model->get_product_images($id);

        $product_info = $this->product_model->get_product_by_id($id);
        $size = $this->product_model->get_pro_size($id);
        $area_data = $this->product_model->get_all_area();
        $category_data = $this->product_model->get_category_Active();
        $subcategory_data = $this->category_model->get_subcategories_by_CatID($product_info->category_fk_id);
        $sizecategory_data = $this->category_model->get_sizecategories_by_CatID($product_info->sub_category_fk_id);
       
        $brandList = $this->product_model->get_brand_listActive();
        $CityData = $this->user_model->get_city_listActive();
        $vendor_data = $this->user_model->get_Vendors_listActive();
        $color_data = $this->product_model->get_all_product_colors();
        $area_details = $this->product_model->product_area($id);
        $sendData = array('isEditproduct' => $isEditproduct,
            'color_data' => $color_data, 'vendor_data' => $vendor_data, 'CityData' => $CityData,
            'brandList' => $brandList, 'product_images' => $product_images, 'area_data' => $area_data,
            'category_data' => $category_data, 'getproduct' => $product_info, 'isSuccess' => $getSuccess,
            'pro_size' => $size, 'subcategory_data' => $subcategory_data, 'sizecategory_data' => $sizecategory_data, 'area_details' => $area_details
        );
        self::slicing('edit_product', $sendData);
    }

    public function product_colors() {
        if ($this->input->post()) {
            $data = array(
                "color_code" => $_POST['color_pick']
            );
            $insert_area = $this->product_model->add_product_color($data);
            redirect(base_url() . 'product/product_colors', 'refresh');
        }
        $color_data = $this->product_model->get_all_product_colors();
        $sendData = array('color_data' => $color_data);
        self::slicing('product_color_list', $sendData);
    }
    //gs
    public function size_product() {
        if ($this->input->post()) {
            
            $data = array(
                "category_id" => $_POST['category'],
                "sub_category_id" => $_POST['sub_cat'],
                "sub_sub_category_id" => $_POST['sub_sub_cat'],
                "size" => $_POST['size'],
                "status" => 1
            );
                
            if ($this->input->post('id') != "") {
                unset($data[status]);
                $this->db->where('id', $this->input->post('id'));
                $r = $this->db->update('category_size', $data);
            } else {
                $r = $this->db->insert('category_size', $data);
            }

            redirect(base_url() . 'product/size_product', 'refresh');
        }
        $cat_size = array();
        if ($this->input->get('id') != "") {
            $cat_size = $this->product_model->getsizeById($this->input->get('id'));
        }
        
        $category = $this->product_model->get_category();
        $sub_categories = $this->product_model->get_sub_categories();
        $subcategory_data = $this->product_model->get_subcategories_by_CatID($cat_size->category_id);
		$category_list = $this->category_model->get_category_list();
		$subsubcategory_data = $this->product_model->get_sub_sub_categories($cat_size->sub_sub_category_id);//gs
           
        $size = $this->product_model->getsize();    
        $sendData = array('size' => $size, 'category' => $category, 'data' => $cat_size,'subcategory_data' => $subcategory_data, 'subsubcategory_data' => $subsubcategory_data);
              /*  echo '<pre>';
                print_r($size);
                echo '</pre>';
                die();*/
        self::slicing('product_size', $sendData);
    }

    public function delete_size($id) {
        $this->db->where('id', $id);
        $r = $this->db->delete('category_size');
        redirect('product/size_product');
    }

    function slicing($viewTemp, $sendArray) {
        $this->load->view('superadmin/master/header');
        $this->load->view('superadmin/' . $viewTemp, $sendArray);
        $this->load->view('superadmin/master/left');
        $this->load->view('superadmin/master/footer');
    }
    
    public function brand_list(){
		IsAdminActive();

		if($this->input->post()) {
//                    if( isset($_POST['category_type']) && $_POST['category_type']=='on'){ $ct = 1;}else{ $ct = 2;}
			$data = array(
                                            "brand_name"=>$_POST['brand_name'],
                                            "brand_status"=>$_POST['is_active']
                                    );
			$insert_brand = $this->product_model->add_brand($data);
			redirect(base_url().'product/brand_list', 'refresh');
		}
		$brand_data = $this->product_model->get_brand_list();
               
//		$category_types = $this->category_model->get_category_types();
		$isSuccess='';
		$sendData = array('brand_data'=>$brand_data,'isSuccess'=>$isSuccess);
		self::slicing('add_brand',$sendData);
	}
	public function edit_brand($id){
   
//		$id=intval(preg_replace('/[^0-9]+/', '', $id));
		if($this->input->post()) {
			$data = array(
                                           "brand_name"=>$_POST['brand_name'],
                                           "brand_status"=>$_POST['is_active'],
                                    );
			$update_brand = $this->product_model->edit_brand($data,$id);
			redirect(base_url().'product/brand_list', 'refresh');
		}
		$brand_data = $this->product_model->get_brand_list();
//		$category_types = $this->category_model->get_category_types();
		$brand_info = $this->product_model->get_brand_by_id($id);
		$isSuccess='';
		$sendData = array('brand_data'=>$brand_data,'brand_info'=>$brand_info,'isSuccess'=>$isSuccess);
//		echo '<pre>';
//                print_r($sendData);
//                echo '</pre>';
//                die();
                self::slicing('add_brand',$sendData);
	}
}
?>
