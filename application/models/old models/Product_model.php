<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
 
	 public function __construct(){
	  parent::__construct();
      $this->load->helper(array('form', 'url'));
	 }
	//get all product
	function get_product_list(){
		$where = array();
		$query =$this->db->select('product.*,status.*,area.area_name,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('area','area.area_pk_id = product.area_fk_id')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	 function get_all_product_enquiry(){
		$where = array();
		$query =$this->db->select('corporate.*,product.*')
				->from('corporate')
				->join('product','corporate.product_fk_id = product.product_pk_id')
				
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	//get all product
	function get_cor_product_list(){
		$where = array('IsCorporate'=>'1');
		$query =$this->db->select('product.*,status.*,area.area_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('area','area.area_pk_id = product.area_fk_id')
				 
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	function get_product_images($id){
		$where = array('product_fk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('product_images',$where);
		return $response = $getSqlRes->result_array();
	}
	function get_product_details_by_id($id){
		$where = array('product_pk_id'=>$id);
		$query =$this->db->select('*')
				->from('product')
				
				->where($where)
				->get();
				
		return $result = $query->result_array();
	}
	
	function get_product_list_by_catID($id,$cat_id,$sort_by){
		$where = array('product.category_fk_id'=>$cat_id,'product.sub_category_fk_id'=>$id);
		$order_by ="";
		if($sort_by=='new'){
			$order_by = ("product_pk_id desc");
		}elseif($sort_by=='low_to_high'){
			$order_by = ("price asc");
		}elseif($sort_by=='high_to_low'){
			$order_by = ("price desc");
		}
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->order_by($order_by)
				->get();
		return $result = $query->result_array();
	}
	
	function get_corporate_product_list($type){
		//echo $type; die;
		 $where = array('IsCorporate'=>1,'CorporateType'=>$type);
		$query =$this->db->select('product.*,status.*')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				
				->where($where)
				->get();
		return $result = $query->result_array();
		
		
	}
	function get_all_area(){
		$where = array('area_status'=>1);
		$query =$this->db->select('*')
				->from('area')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	function get_all_category(){
		$where = array('category.category_status'=>1);
		$query =$this->db->select('category.*,category_types.category_type')
				->from('category')
				->join('category_types','category_types.category_type_pk_id = category.category_type_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	//add product 
    function add_product($data){
		$insert = $this->db->insert('product',$data);
        return $this->db->insert_id();
	}
	//update product
	function edit_product($data,$id){
		$where = array('product_pk_id'=>$id);
		$this->db->update('product', $data, $where);
        return $this->db->affected_rows();
	}
	function change_product_status($id,$status){
		$product_status = ($status==1)?2:1;
		$data = array('product_status'=>$product_status);
		$where = array('product_pk_id'=>$id);
		$this->db->update('product', $data, $where);
        return $this->db->affected_rows();
	}
	function get_product_by_id($id){
		$where = array('product_pk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('product',$where);
		return $response = $getSqlRes->row();
	}
	function check_product_exist($contact,$id,$action){
		if($action=='Add'){
			$where = array('product_name'=>$contact);
		}else{
			$where = array('product_name'=>$contact,'product_pk_id!='=>$id);
		}
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('product',$where);
		$response = $getSqlRes->row();
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	}
	function delete_product($id){
		$this->db->delete('product', array('product_pk_id' => $id)); 
		return $this->db->affected_rows();
	}	
	function get_product_listBy_selected_cat($cat){		$where = array('category_fk_id'=>$cat);		$query =$this->db->select('product.*,status.*,area.area_name,category.category_name')				->from('product')				->join('status','status.status_pk_id = product.product_status')				->join('area','area.area_pk_id = product.area_fk_id')				->join('category','category.category_pk_id = product.category_fk_id')				->where($where)				->get();		return $result = $query->result_array();	}
	function delete_product_image($id,$img_name){
		$this->db->delete('product_images', array('prod_img_pk_id' => $id)); 
		$res =  $this->db->affected_rows();
		$FullPath = DOCUMENT_ROOT.'assets/images/product_image/';
		$FullPathThumb = DOCUMENT_ROOT.'assets/images/product_image/thumb/';
		if($res){
			@unlink($FullPath.'/'.$img_name);
			@unlink($FullPath.'/thumb/'.$img_name);
		}
	}	
	function get_sub_category_by_id($id){
		$where = array('sc_category_fk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('sub_categories',$where);
		return $response = $getSqlRes->result_array();
	}
	function check_product_pincode_available($pincode,$id){
		$result1 = array();
		$where = array('product_pk_id'=>$id);
		$query =$this->db->select('*')
				->from('product')
				->where($where)
				->get();
		$result = $query->row();
		if(!empty($result)){
			$where1 = array('product_pk_id'=>$id);
			$query1 =$this->db->select('*')
					->from('area')
					->where('area_pk_id IN ('.$result->area_fk_id.')')
					->where('area_pin',$pincode)
					->get();
			 $result1 = $query1->result_array();
		}
		//echo $this->db->last_query();die;
		return $result1;
	}
	function insert_corporate_form($data){
		$insert = $this->db->insert('corporate',$data);
        return $this->db->insert_id();
	}
	function get_product_listbyType($type){
		$where = array('da'=>$type);
		$query =$this->db->select('product.*,status.*,area.area_name,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('area','area.area_pk_id = product.area_fk_id')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	
	
	
	function get_product_listbybestseller(){
		$where = array('product.category_fk_id'=>1);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}function get_product_listbybirthdate(){
		$where = array('product.category_fk_id'=>2);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}function get_product_listbyAnniversary(){
		$where = array('product.category_fk_id'=>3);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}function get_product_listbyValentine(){
		$where = array('product.category_fk_id'=>4);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}function get_product_listbygift(){
		$where = array('product.category_fk_id'=>5);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}function get_product_listbyocc(){
		$where = array('product.category_fk_id'=>6);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}function Get_product_by_catID($id){
		$where = array('product.category_fk_id'=>$id);
		$query =$this->db->select('product.*,status.*,category.category_name')
				->from('product')
				->join('status','status.status_pk_id = product.product_status')
				->join('category','category.category_pk_id = product.category_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
}
?>
