<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_model extends CI_Model {
    
     // Get all details get_slider_list table in database.
        public function get_slider_list()
	{
		$where = array('sub_category_status'=>1);
		$query =$this->db->select('slider.*,sub_categories.*')
		->from('slider')
		->join('sub_categories','sub_categories.sc_pk_id = slider.sub_cat')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} // Get all details get_slider_home_page_list table in database.
        public function get_slider_home_page_list()
	{
		$where = array();
		$query =$this->db->select('*')
		->from('homeslider')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	// Get all details get_slider_home_page_list table in database.
        public function get_cat_page_list_by_Cat($cat,$tbN)
	{
		$where = array("cat"=>$cat);
		$query =$this->db->select('*')
		->from($tbN)
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	// Get all details get_slider_cat_page_list table in database.
        public function get_slider_cat_page_list($cat)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from('catslider')
		->where($where)
		->get();
		
		return $query->result_array(); 
	}    public function get_first_cat_page_list($cat)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from('catfirst')
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	public function get_second_cat_page_list($cat)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from('catsecond')
		->where($where)
		->get();
		
		return $query->result_array(); 
	} public function get_third_cat_page_list($cat)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from('catthird')
		->where($where)
		->get();
		
		return $query->result_array(); 
	} public function get_fourth_cat_page_list($cat)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from('catfourth')
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	public function get_five_cat_page_list($cat)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from('catfive')
		->where($where)
		->get();
		
		return $query->result_array(); 
	}  
	public function get_cat_page_data_by_cat($cat,$tableN)
	{
		$where = array('cat'=>$cat);
		$query =$this->db->select('*')
		->from($tableN)
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	public function get_home_secondsection_list()
	{ 
		$where = array();
		$query =$this->db->select('*')
		->from('homesecondsection')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	public function get_home_thirdsection_list()
	{ 
		$where = array();
		$query =$this->db->select('*')
		->from('homethirdsection')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	public function get_home_slid_by_id($id)
	{
		$where = array("slid_id"=>$id);
		$query =$this->db->select('*')
		->from('homeslider')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} 
	// Get all details  "get_adverties_list" table in database.
        public function get_adverties_list()
	{
		$where = array('sub_category_status'=>1);
		$query =$this->db->select('adverties.*,sub_categories.*')
		->from('adverties')
		->join('sub_categories','sub_categories.sc_pk_id = adverties.sub_cat')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}  
	// Get all details  "get_third_adv_list" table in database.
        public function get_third_adv_list()
	{
		$where = array('sub_category_status'=>1);
		$query =$this->db->select('third_advrt.*,sub_categories.*')
		->from('third_advrt')
		->join('sub_categories','sub_categories.sc_pk_id = third_advrt.sub_cat')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}    
	public function get_fourth_adv_list()
	{
		$where = array('sub_category_status'=>1);
		$query =$this->db->select('fourth_advrt.*,sub_categories.*')
		->from('fourth_advrt')
		->join('sub_categories','sub_categories.sc_pk_id = fourth_advrt.sub_cat')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	} public function get_fourth_adv_slider_by_subcat($cat)
	{
		$where = array('fourth_advrt.sub_cat'=>$cat);
		$query =$this->db->select('fourth_advrt.*,fourth_advrt_baner.*')
				->from('fourth_advrt_baner')
				->join('fourth_advrt','fourth_advrt.advet_id = fourth_advrt_baner.sec_advrt_id')
				
				->where($where)
				->get(); 
			//echo	$this->db->last_query();
			return $query->result_array(); 
	} 
	public function get_banner_adv_list()
	{
		$where = array('sub_category_status'=>1);
		$query =$this->db->select('banner_advrt.*,sub_categories.*')
		->from('banner_advrt')
		->join('sub_categories','sub_categories.sc_pk_id = banner_advrt.sub_cat')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}  
	
	
	//slides baners
	public function get_slides_list_by_id($id)
	{
		$where = array('slider_id'=>$id);
		$query =$this->db->select('*')
		->from('slides')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}
	public function get_adv_baner_list_by_id($id)
	{
		$where = array('sec_advrt_id'=>$id);
		$query =$this->db->select('*')
		->from('sec_advrt_baner')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}
	public function get_third_adv_baner_list_by_id($id)
	{
		$where = array('sec_advrt_id'=>$id);
		$query =$this->db->select('*')
		->from('third_advrt_baner')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}
	public function get_fourth_adv_baner_list_by_id($id)
	{
		$where = array('sec_advrt_id'=>$id);
		$query =$this->db->select('*')
		->from('fourth_advrt_baner')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}public function get_banner_adv_baner_list_by_id($id)
	{
		$where = array('sec_advrt_id'=>$id);
		$query =$this->db->select('*')
		->from('banner_advrt_baner')
		
		->where($where)
		->get();
		
		return $query->result_array(); 
	}
	 
	 
	 function update_slides($data, $slide_id){
		$where = array('slide_id'=>$slide_id);
		$this->db->update('slides', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	} 
	 
	function update_home_slides($data, $slide_id){
		$where = array('slid_id'=>$slide_id);
		$this->db->update('homeslider', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	function update_cat_slider($data, $slide_id){
		$where = array('slid_id'=>$slide_id);
		$this->db->update('catslider', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	function update_cat_page_section($data, $slide_id,$tableN){
		$where = array('slid_id'=>$slide_id);
		$this->db->update($tableN, $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	function update_home_secondsection($data, $slide_id){
		$where = array('slid_id'=>$slide_id);
		$this->db->update('homesecondsection', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	function update_home_thirdsection($data, $slide_id){
		$where = array('slid_id'=>$slide_id);
		$this->db->update('homethirdsection', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	function update_sec_advrt_baner($data, $slide_id){
		$where = array('sec_advrt_baner_id'=>$slide_id);
		$this->db->update('sec_advrt_baner', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	function update_third_advrt_baner($data, $slide_id){
		$where = array('sec_advrt_baner_id'=>$slide_id);
		$this->db->update('third_advrt_baner', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}function update_fourth_advrt_baner($data, $slide_id){
		$where = array('sec_advrt_baner_id'=>$slide_id);
		$this->db->update('fourth_advrt_baner', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}function update_banner_advrt_baner($data, $slide_id){
		$where = array('sec_advrt_baner_id'=>$slide_id);
		$this->db->update('banner_advrt_baner', $data, $where);
       return $this->db->affected_rows();
		//return $result = $query->result_array();
	}
	
	
	
	
}