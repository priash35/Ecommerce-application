<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
 
	 public function __construct(){
	  parent::__construct();
      $this->load->helper(array('form', 'url'));
	 }
	//get all product
	function get_all_orders(){
		$where = array();
		$query =$this->db->select('orders.*,customers.*,reciver.*,order_track.*')
				->from('orders')
				->join('customers','customers.serial = orders.customerid')
				->join('reciver','orders.serial = reciver.orderid')
				->join('order_track','orders.serial = order_track.orderID')
				->where($where)
				->get(); 
				
		return $result = $query->result_array(); 
		
	}
	function get_all_ProductsByorder($od_id){
		$where = array('orderid'=>$od_id);
		$query =$this->db->select('order_detail.*,product.*')
				->from('order_detail')
				->join('product','product.product_pk_id = order_detail.productid')
				
				->where($where)
				->get();
		return $result = $query->result_array();
	}
	function order_IDByemail($email){
		$where = array('email'=>$email);
		$query =$this->db->select('orders.*','customers.serial as cid')
				->from('orders')
				->join('customers','customers.serial = orders.customerid')
				->where($where)
				->get();
		return $orders = $query->result_array();
		
	}
	function get_orders_status_odrId($orderID){
		
		$where = array('orderID'=>$orderID);
		$query =$this->db->select('*')
				->from('order_track')
				->join('order_track_status','order_track.ord_status = order_track_status.statusId')
				->where($where)
				->get();
		return $orders = $query->result_array();
		
		
	}
	function update_order_status($data, $od_id){
		$where = array('orderID'=>$od_id);
		$this->db->update('order_track', $data, $where);
        return $this->db->affected_rows();
		return $result = $query->result_array();
	}
	
}
?>
