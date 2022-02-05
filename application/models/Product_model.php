<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //get all product
    function get_product_list() {
        $where = array();
        $query = $this->db->select('product.*,status.*,product_stock.*, brand.*')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('product_stock', 'product_stock.product_id = product.product_pk_id')
                ->join('brand', 'brand.brand_pk_id = product.brand')
                ->where($where)
                ->order_by('product.product_pk_id', 'DESC')
                ->group_by('product.product_pk_id')
                ->get();
       return $result = $query->result_array();
	   //$result = $query->result_array();
		/* echo "<pre>";
		print_r($result);
		echo "</pre>";
		die(); */
    }

    //brand list
    function get_brand_list() {
        $where = array();
        $query = $this->db->select('*')
                ->from('brand')
                ->where($where)
                ->get();

        $result = $query->result_array();
        return $result;
    }

    function get_brand_by_id($id) {
        $where = array('brand_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('brand', $where);
        return $response = $getSqlRes->row();
    }

    //add brand
    function add_brand($data) {
        $insert = $this->db->insert('brand', $data);
        return $this->db->insert_id();
    }

    //update brand
    function edit_brand($data, $id) {
        $where = array('brand_pk_id' => $id);
        $this->db->update('brand', $data, $where);
        return $this->db->affected_rows();
    }

    function change_brand_status($id, $status) {
        $brand_status = ($status == 1) ? 2 : 1;
        $data = array('brand_status' => $brand_status);
        $where = array('brand_pk_id' => $id);
        $this->db->update('brand', $data, $where);
        return $this->db->affected_rows();
    }

    function get_brand_listActive() {
        $where = array('brand_status' => 1);
        $query = $this->db->select('brand.*')
                ->from('brand')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_all_product_enquiry() {
        $where = array();
        $query = $this->db->select('corporate.*,product.*')
                ->from('corporate')
                ->join('product', 'corporate.product_fk_id = product.product_pk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    //get all product
    function get_cor_product_list() {
        $where = array('IsCorporate' => '1');
        $query = $this->db->select('product.*,status.*,area.area_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('area', 'area.area_pk_id = product.area_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_images($id) {
        $where = array('product_fk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('product_images', $where);
        return $response = $getSqlRes->result_array();
    }

    function get_product_details_by_id($id) {
        $where = array('product.product_pk_id' => $id);
        $query = $this->db->select('product.*,product_size.*,product_stock.*')
                ->from('product')
                ->join('product_size', 'product_size.product_id = product.product_pk_id', 'left')
                ->join('product_stock', 'product_stock.product_id = product.product_pk_id', 'left')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function get_product_list_by_catID($id, $cat_id, $sort_by) {
        $where = array('product.category_fk_id' => $cat_id, 'product.sub_category_fk_id' => $id);
        $order_by = "";
        if ($sort_by == 'new') {
            $order_by = ("product_pk_id desc");
        } elseif ($sort_by == 'low_to_high') {
            $order_by = ("price asc");
        } elseif ($sort_by == 'high_to_low') {
            $order_by = ("price desc");
        }
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->order_by($order_by)
                ->get();
        return $result = $query->result_array();
    }

    function get_corporate_product_list($type) {
        //echo $type; die;
        $where = array('IsCorporate' => 1, 'CorporateType' => $type);
        $query = $this->db->select('product.*,status.*')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_all_area() {
        $where = array('area_status' => 1);
        $query = $this->db->select('*')
                ->from('area')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function get_all_category() {
        $where = array('category.category_status' => 1);
        $query = $this->db->select('category.*,category_types.category_type')
                ->from('category')
                ->join('category_types', 'category_types.category_type_pk_id = category.category_type_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    //add product 
    function add_product($data) {
        $insert = $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    //add add_product_stock 
    function add_product_stock($data) {
        $insert = $this->db->insert('product_stock', $data);
        return $this->db->insert_id();
    }

    function update_product_stock($data, $id) {
        $where = array('stockid' => $id);
        $this->db->update('product_stock', $data, $where);
        return $this->db->affected_rows();
    }

    function add_product_size($data) {
        $inse = $this->db->insert('product_size', $data);
        return $this->db->insert_id();
    }

    function update_product_size($data, $id, $size_name) {
        $where = array('product_id' => $id, 'size_name' => $size_name);
        $this->db->update('product_size', $data, $where);
        return $this->db->affected_rows();
    }

    function add_product_area_details($data) {
        $insert = $this->db->insert('product_area', $data);
        return $this->db->insert_id();
    }

    //update product
    function edit_product($data, $id) {
        $where = array('product_pk_id' => $id);
        $this->db->update('product', $data, $where);
        return $this->db->affected_rows();
    }

    function delete_brand($id) {
        $where = array('brand_pk_id' => $id);
        $query = $this->db->select('*')
                ->from('brand')
                ->where($where)
                ->get();

        $brand = $query->result_array();
        //$sql = $this->db->last_query();
        $this->db->delete('brand', array('brand_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function change_product_status($id, $status) {
        $product_status = ($status == 1) ? 2 : 1;
        $data = array('product_status' => $product_status);
        $where = array('product_pk_id' => $id);
        $this->db->update('product', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_pro_size($id) {
        $this->db->select('*');
        $this->db->where('product_size.product_id', $id);
        $this->db->join('category_size', 'product_size.size_name = category_size.id', 'left');
        $data = $this->db->get('product_size')->result_array();
      
        return $data;
    }

    public function product_area($id) {
        $this->db->select('*');
        $this->db->where('product_area.Pa_product_id', $id);
//        $this->db->join('city', 'product_area.city_id = city.city_pk_id');
        $data = $this->db->get('product_area')->result_array();
        return $data;
    }

    public function get_arealist($id) {
        return $this->db->get_where('area', array('city_id' => $id))->result_array();
    }

    function get_product_by_id($id) {

        $where = array('product_pk_id' => $id);
        $getSqlRes = $this->db->select('*')
                ->from('product')
                ->join('product_stock', 'product_stock.product_id = product.product_pk_id')
//                ->join('product_size', 'product_size.product_id = product.product_pk_id')
                ->where($where)
                ->get();
        return $response = $getSqlRes->row();
    }

    function get_product_by_size($id, $size) {
        $where = array('product_id' => $id, 'size_name' => $size);
        $getSqlRes = $this->db->select('*')
                ->from('product_size')
                ->where($where)
                ->get();
        return $response = $getSqlRes->row();
    }

    function check_product_exist($contact, $id, $action) {
        if ($action == 'Add') {
            $where = array('product_name' => $contact);
        } else {
            $where = array('product_name' => $contact, 'product_pk_id!=' => $id);
        }
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('product', $where);
        $response = $getSqlRes->row();
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_product($id) {
        $this->db->delete('product', array('product_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function delete_product_color($id) {
        $this->db->delete('product_colors', array('color_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function get_product_listBy_selected_cat($cat) {
        $where = array('category_fk_id' => $cat);
        $query = $this->db->select('product.*,status.*,area.area_name,category.category_name')->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('area', 'area.area_pk_id = product.area_fk_id')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->group_by('product.product_pk_id')
                ->where($where)->get();
        return $result = $query->result_array();
    }

    function delete_product_image($id, $img_name) {
        $this->db->delete('product_images', array('prod_img_pk_id' => $id));
        $res = $this->db->affected_rows();
        $FullPath = DOCUMENT_ROOT . 'assets/images/product_image/';
        $FullPathThumb = DOCUMENT_ROOT . 'assets/images/product_image/thumb/';
        if ($res) {
            @unlink($FullPath . '/' . $img_name);
            @unlink($FullPath . '/thumb/' . $img_name);
        }
    }

    function get_sub_category_by_id($id) {
        $where = array('sc_category_fk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('sub_categories', $where);
        return $response = $getSqlRes->result_array();
    }

    function check_product_pincode_available($pincode, $id) {
        $data = array('Pa_product_id' => $id, 'area_pin' => $pincode);
        $this->db->join('area', 'area.area_pk_id= product_area.pa_areaID');
        $Q = $this->db->get_where('product_area', $data);
        
        if ($Q->num_rows() > 0) {
            return $Q->row();
        } else {
            return FALSE;
        }
    }

    function insert_corporate_form($data) {
        $insert = $this->db->insert('corporate', $data);
        return $this->db->insert_id();
    }

    function get_product_listbyType($type) {
        $where = array('da' => $type);
        $query = $this->db->select('product.*,status.*,area.area_name,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('area', 'area.area_pk_id = product.area_fk_id')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_listbybestseller() {
        $where = array('product.category_fk_id' => 1);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_listbybirthdate() {
        $where = array('product.category_fk_id' => 2);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_listbyAnniversary() {
        $where = array('product.category_fk_id' => 3);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_listbyValentine() {
        $where = array('product.category_fk_id' => 4);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_listbygift() {
        $where = array('product.category_fk_id' => 5);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function get_product_listbyocc() {
        $where = array('product.category_fk_id' => 6);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function Get_product_by_catID($id) {
        $where = array('product.category_fk_id' => $id);
        $query = $this->db->select('product.*,status.*,category.category_name')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('category', 'category.category_pk_id = product.category_fk_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function Get_products_by_catID($id, $subcat) {

        $where = array('product.product_status' => 1);
        $query = $this->db->select('product.*,status.*,size_categories.*,sub_categories.*,category.category_name,product_size.size_prize,product_size.size_descount, product_size.size_descprice');
        $this->db->from('product');
        $this->db->join('status', 'status.status_pk_id = product.product_status');
        $this->db->join('size_categories', 'size_categories.sz_pk_id = product.size_category_fk_id', 'left');
        $this->db->join('sub_categories', 'product.sub_category_fk_id = sub_categories.sc_pk_id', 'left');
        $this->db->join('category', 'category.category_pk_id = product.category_fk_id', 'left');
        $this->db->join('product_size', 'product.product_pk_id = product_size.product_id', 'left');
        $this->db->where($where);
        $this->db->group_by('product.product_pk_id');
        if ($id != "") {
            $this->db->where('product.sub_category_fk_id', $id);
        }
        if ($subcat != "") {
            $this->db->where('product.size_category_fk_id', $subcat);
        }
        $this->db->order_by("product.product_pk_id", "desc");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function get_NewArrivalsOffer_list() {
        $where = array('product.product_status' => 1);
        /* $query = $this->db->select('product.*,status.*,size_categories.*,sub_categories.*,category.category_name,product_size.size_prize,product_size.size_descount')
                ->from('product')
                ->join('status', 'status.status_pk_id = product.product_status')
                ->join('size_categories', 'size_categories.sz_pk_id = product.size_category_fk_id')
                ->join('sub_categories', 'size_categories.sz_sc_category_fk_id = sub_categories.sc_pk_id')
                ->join('category', 'category.category_pk_id = sub_categories.sc_category_fk_id')
               // ->join('product_size', 'product_size.ps_id = product.product_pk_id')
			   ->join('product_size', 'product_size.product_id = product.product_pk_id')
                ->where($where)
                ->get(); */
				/* $result = $query->result_array();
				echo "<pre>";
            print_r($result);
           echo "</pre>";
           die(); */
		   //$this->db->distinct('product_size.product_id');
		   $this->db->select('product.*,status.*,size_categories.*,sub_categories.*,category.category_name,product_size.size_prize,product_size.size_descount');
		   $this->db->from('product');
		   $this->db->join('status', 'status.status_pk_id = product.product_status');
		   $this->db->join('size_categories', 'size_categories.sz_pk_id = product.size_category_fk_id');
		   $this->db->join('sub_categories', 'size_categories.sz_sc_category_fk_id = sub_categories.sc_pk_id');
		   $this->db->join('category', 'category.category_pk_id = sub_categories.sc_category_fk_id');
		   $this->db->join('product_size', 'product_size.product_id = product.product_pk_id');
            //$this->db->join('wishlist', 'wishlist.w_pro_id = product.product_pk_id');//new wish list gs
		   $this->db->group_by('product_size.product_id');
		   $this->db->where($where);
		   $query= $this->db->get();
		   
		return $result = $query->result_array();
    }

    function Get_slider_by_SubcatID($id) {
        $where = array('slider.sub_cat' => $id);
        $query = $this->db->select('slider.*,slides.*')
                ->from('slides')
                ->join('slider', 'slider.slider_id = slides.slider_id')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function Get_sub_by_sizeID($id) {
        $where = array('sz_pk_id' => $id);
        $query = $this->db->select('*')
                ->from('size_categories')
                ->where($where)
                ->get();
        return $result = $query->row();
    }

    public function get_product_size_by_product_id($id) {
        $where = array('product_id' => $id);
        $query = $this->db->select('*')
                ->from('product_size')
                ->join('category_size', 'category_size.id= product_size.size_name')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    public function get_product_images_by_id($id) {
        $where = array('product_fk_id' => $id);
        $query = $this->db->select('*')
                ->from('product_images')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    public function get_subcategory_images($id) {
        $where = array('product.sub_category_fk_id' => $id, 'product_image!=' => '');
        $query = $this->db->select('product.*,product_size.*')
                ->from('product')
                ->join('product_size', 'product_size.ps_id = product.product_pk_id')
                ->where($where)
                ->limit('0', '5')
                ->get();

        return $result = $query->result_array();
    }

    public function get_related_subcategory_products($id) {
        $where = array('product.sub_category_fk_id' => $id, 'product.product_status' => 1);
        $query = $this->db->select('product.*,product_size.*')
                ->from('product')
                ->join('product_size', 'product_size.product_id = product.product_pk_id', 'left')
                ->where($where)
                ->group_by('product.product_pk_id')
                ->limit('0', '5')
                ->get();
//        echo "<pre>";
//        print_r($this->db->last_query());
//        echo "</pre>";
//        die();
        return $result = $query->result_array();
    }

    public function get_all_product_colors() {
        $query = $this->db->select('*')
                ->from('product_colors')
                ->get();

        return $result = $query->result_array();
    }

    public function get_all_product_colorsActive() {
        $query = $this->db->select('*')
                ->from('product_colors')
                ->get();
        return $result = $query->result_array();
    }

    public function add_product_color($data) {
        $insert = $this->db->insert('product_colors', $data);
        return $this->db->insert_id();
    }

    public function get_category() {
        return $this->db->get_where('category', array('category_type_fk_id' => 1))->result();
    }

    public function get_sub_categories() {
        return $this->db->get('sub_categories')->result();
    }
    //gs
     public function get_sub_sub_categories($ssid) {
        //return $this->db->get('size_categories')->result();
        $where = array('sz_pk_id' => $ssid, 'size_category_status' => '1');
        $query = $this->db->select('*')
                ->from('size_categories')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    public function get_category_Active() {
        return $this->db->get_where('category', array('category_status' => 1))->result_array();
    }

    function get_subcategories_by_CatID($CatID) {

        $where = array('sc_category_fk_id' => $CatID, 'sub_category_status' => '1');
        $query = $this->db->select('*')
                ->from('sub_categories')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }
    //gs
    public function getsize() {
        $this->db->select('*');
        $this->db->join('category c', 's.category_id = c.category_pk_id');
        $this->db->join('sub_categories sub', 'sub.sc_pk_id = s.sub_category_id');
        $this->db->join('size_categories sc', 'sc.sz_pk_id = s.sub_sub_category_id');
        $r = $this->db->get('category_size s')->result();
        return $r;
    }

    public function getsizeById($id) {
        $this->db->select('*');
        $r = $this->db->get_where('category_size', array('id' => $id))->row();
        return $r;
    }

   /* public function getsizeByCatId() {
        $id = $this->input->post('mydata');
        $this->db->select('*');
        $r = $this->db->get_where('category_size', array('sub_category_id' => $id, 'status'=> 1))->result();
        return $r;
    }*/
     public function getsizeByCatId() {
        $id = $this->input->post('mysubdata');
        $this->db->select('*');
        $r = $this->db->get_where('category_size', array('sub_sub_category_id' => $id, 'status'=> 1))->result();
        return $r;
    }

    public function get_search($match) {
        

        $where = array('product.product_status' => 1);
        $query = $this->db->select('product.*,status.*,size_categories.*,sub_categories.*,category.category_name,product_size.size_prize,product_size.size_descount, product_size.size_descprice');
        $this->db->from('product');
        $this->db->join('status', 'status.status_pk_id = product.product_status');
        $this->db->join('size_categories', 'size_categories.sz_pk_id = product.size_category_fk_id', 'left');
        $this->db->join('sub_categories', 'product.sub_category_fk_id = sub_categories.sc_pk_id', 'left');
        $this->db->join('category', 'category.category_pk_id = product.category_fk_id', 'left');
        $this->db->join('product_size', 'product.product_pk_id = product_size.product_id', 'left');
        $this->db->where($where);
        $this->db->group_by('product.product_pk_id');       
        $this->db->order_by("product.product_pk_id", "desc");
        //search criteria on product,category or sub category
        $this->db->like('product.product_name',$match);
        $this->db->or_like('product.product_desc',$match);
        $this->db->or_like('category.category_name',$match);
        $this->db->or_like('sub_categories.sc_category_name',$match);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;               
    }



}

?>
