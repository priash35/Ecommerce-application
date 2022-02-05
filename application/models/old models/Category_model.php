<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
 
	 public function __construct(){
	  parent::__construct();
      $this->load->helper(array('form', 'url'));
	 }
	//get all category
	function get_category_list(){
		$where = array();
		$query =$this->db->select('category.*,status.*,category_types.category_type')
				->from('category')
				->join('status','status.status_pk_id = category.category_status')
				->join('category_types','category_types.category_type_pk_id = category.category_type_fk_id')
				->where($where)
				->get();
		return $result = $query->result_array();
		
	}
	function get_category_types(){
		$where = array();
		$query =$this->db->select('*')
				->from('category_types')
				->where($where)
				->get();
		return $result = $query->result_array();
		
	}
	//add category 
    function add_category($data){
		$insert = $this->db->insert('category',$data);
        return $this->db->insert_id();
	}
	//update category
	function edit_category($data,$id){
		$where = array('category_pk_id'=>$id);
		$this->db->update('category', $data, $where);
        return $this->db->affected_rows();
	}
	function change_category_status($id,$status){
		$category_status = ($status==1)?2:1;
		$data = array('category_status'=>$category_status);
		$where = array('category_pk_id'=>$id);
		$this->db->update('category', $data, $where);
        return $this->db->affected_rows();
	}
	function get_category_by_id($id){
		$where = array('category_pk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('category',$where);
		return $response = $getSqlRes->row();
	}
	function get_subcategory_by_ID($id){
		$where = array('sc_pk_id'=>$id);
		 $query =$this->db->select('*')
				->from('sub_categories')
				->where($where)
				->get();
				
		return $result = $query->result_array();
		
		
	}
	function get_categories_by_CatType($CatType){
		
		$where = array('category_type_fk_id'=>$CatType);
		$query = $this->db->select('*')  
				->from('category')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	function get_subcategories_by_CatID($CatID){
		
		$where = array('category_fk_id'=>$CatID);
		$query = $this->db->select('*')  
				->from('subcategory')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	function check_category_exist($category_name,$action,$id){
		if($action=='Add'){
			$where = array('LOWER(category_name)'=>$category_name);
		}else{
			$where = array('LOWER(category_name)'=>$category_name,'category_pk_id!='=>$id);
		}
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('category',$where);
		$response = $getSqlRes->row();
		if(count($response)>0){
			return 1;
		}else{
			return 0;
		}
	}
	function delete_category($id){
		$this->db->delete('category', array('category_pk_id' => $id)); 
		return $this->db->affected_rows();
	}
	function delete_sub_category($id){
		$this->db->delete('sub_categories', array('sc_pk_id' => $id)); 
		return $this->db->affected_rows();
	}
	function get_sub_category_list($id){
		$where = array('sc_category_fk_id'=>$id);
		$query =$this->db->select('*')
				->from('sub_categories')
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	function add_sub_category($data){
		$insert = $this->db->insert('sub_categories',$data);
        return $this->db->insert_id();
	}
	function edit_sub_category($data,$id){
		$where = array('sc_pk_id'=>$id);
		$this->db->update('sub_categories', $data, $where);
        return $this->db->affected_rows();
	}
	function get_sub_category_by_id($id){
		$where = array('sc_pk_id'=>$id);
		$this->db->select('*');        
        $getSqlRes = $this->db->get_where('sub_categories',$where);
		return $response = $getSqlRes->row();
	}
}
?>
