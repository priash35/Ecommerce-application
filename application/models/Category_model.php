<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //get all category
    function get_category_list() {
        $where = array();
        $query = $this->db->select('category.*,status.*,category_types.category_type')
                ->from('category')
                ->join('status', 'status.status_pk_id = category.category_status')
                ->join('category_types', 'category_types.category_type_pk_id = category.category_type_fk_id')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function get_category_list_header() {
        $where = array('category.category_status' => 1);
        $query = $this->db->select('category.*,status.*')
                ->from('category')
                ->join('status', 'status.status_pk_id = category.category_status')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function get_category_types() {
        $where = array();
        $query = $this->db->select('*')
                ->from('category_types')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    //add category 
    function add_category($data) {
        $insert = $this->db->insert('category', $data);
        return $this->db->insert_id();
    }

    //add add_slider 
    function add_slider($data) {
        $insert = $this->db->insert('slider', $data);
        return $this->db->insert_id();
    }

    function add_slides($data) {
        $insert = $this->db->insert('slides', $data);
        return $this->db->insert_id();
    }

    //add add_sec_advert 
    function add_sec_advert($data) {
        $insert = $this->db->insert('adverties', $data);
        return $this->db->insert_id();
    }

    function add_advert_baner($data) {
        $insert = $this->db->insert('sec_advrt_baner', $data);
        return $this->db->insert_id();
    }

    //add add_third_advert
    function add_third_advert($data) {
        $insert = $this->db->insert('third_advrt', $data);
        return $this->db->insert_id();
    }

    function add_third_advert_baner($data) {
        $insert = $this->db->insert('third_advrt_baner', $data);
        return $this->db->insert_id();
    }

    //add add_third_advert
    function add_fourth_advert($data) {
        $insert = $this->db->insert('fourth_advrt', $data);
        return $this->db->insert_id();
    }

    function add_fourth_advert_baner($data) {
        $insert = $this->db->insert('fourth_advrt_baner', $data);
        return $this->db->insert_id();
    }

    //add add_banner_advert
    function add_banner_advert($data) {
        $insert = $this->db->insert('banner_advrt', $data);
        return $this->db->insert_id();
    }

    function add_banner_advert_baner($data) {
        $insert = $this->db->insert('banner_advrt_baner', $data);
        return $this->db->insert_id();
    }

    //update category
    function edit_category($data, $id) {
        $where = array('category_pk_id' => $id);
        $this->db->update('category', $data, $where);
        return $this->db->affected_rows();
    }

    function change_category_status($id, $status) {
        $category_status = ($status == 1) ? 2 : 1;
        $data = array('category_status' => $category_status);
        $where = array('category_pk_id' => $id);
        $this->db->update('category', $data, $where);
        return $this->db->affected_rows();
    }

    function change_sub_category_status($id, $status) {
        $sub_category_status = ($status == 1) ? 2 : 1;
        $data = array('sub_category_status' => $sub_category_status);
        $where = array('sc_pk_id' => $id);
        $this->db->update('sub_categories', $data, $where);
        return $this->db->affected_rows();
    }

    function change_size_category_status($id, $status) {
        $size_category_status = ($status == 1) ? 2 : 1;
        $data = array('size_category_status' => $size_category_status);
        $where = array('sz_pk_id' => $id);
        $this->db->update('size_categories', $data, $where);
        return $this->db->affected_rows();
    }

    function get_category_by_id($id) {
        $where = array('category_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('category', $where);
        return $response = $getSqlRes->row();
    }

    function get_subcategory_by_ID($id) {
        $where = array('sc_pk_id' => $id);
        $query = $this->db->select('*')
                ->from('sub_categories')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function get_categories_by_CatType($CatType) {

        $where = array('category_type_fk_id' => $CatType);
        $query = $this->db->select('*')
                ->from('category')
                ->where($where)
                ->get();
        return $result = $query->result_array();
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
    function get_sub_subcategories_by_CatID($subCatID) {


        $where = array('sz_sc_category_fk_id' => $subCatID, 'size_category_status' => '1');
        $query = $this->db->select('*')
                ->from('size_categories')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function get_sizecategories_by_CatID($CatID) {

        $where = array('sz_sc_category_fk_id' => $CatID, 'size_category_status' => 1);
        $query = $this->db->select('*')
                ->from('size_categories')
                ->where($where)
                ->get();
        return $result = $query->result_array();
    }

    function check_category_exist($category_name, $action, $id) {
        if ($action == 'Add') {
            $where = array('LOWER(category_name)' => $category_name);
        } else {
            $where = array('LOWER(category_name)' => $category_name, 'category_pk_id!=' => $id);
        }
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('category', $where);
        $response = $getSqlRes->row();
        if (count($response) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_category($id) {
        $where = array('sc_category_fk_id' => $id);
        $query = $this->db->select('*')
                ->from('sub_categories')
                ->where($where)
                ->get();

        $subCt = $query->result_array();
        //$sql = $this->db->last_query();

        foreach ($subCt as $SC) { //print_r($SC['sc_pk_id']); die;
            $where1 = array('sz_sc_category_fk_id' => $SC['sc_pk_id']);
            $query1 = $this->db->select('*')
                    ->from('size_categories')
                    ->where($where1)
                    ->get();

            $sizeCt = $query1->result_array();
            //echo $sql1 = $this->db->last_query();
            foreach ($sizeCt as $SZ) {
                $this->db->delete('size_categories', array('sz_pk_id' => $SZ['sc_pk_id']));
            }
            $this->db->delete('sub_categories', array('sc_pk_id' => $SC['sc_pk_id']));
        }
        $this->db->delete('category', array('category_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function delete_sub_category($id) {

        $where1 = array('sz_sc_category_fk_id' => $id);
        $query1 = $this->db->select('*')
                ->from('size_categories')
                ->where($where1)
                ->get();

        $sizeCt = $query1->result_array();
        //echo $sql1 = $this->db->last_query();
        foreach ($sizeCt as $SZ) {
            $this->db->delete('size_categories', array('sz_pk_id' => $SZ['sc_pk_id']));
        }
        $this->db->delete('sub_categories', array('sc_pk_id' => $id));

        return $this->db->affected_rows();
    }

    function delete_size_category($id) {
        $this->db->delete('size_categories', array('sz_pk_id' => $id));
        return $this->db->affected_rows();
    }

    function get_sub_category_list() {
        $where = array();
        $query = $this->db->select('sub_categories.*,category.*,status.*')
                ->from('sub_categories')
                ->join('category', 'category.category_pk_id = sub_categories.sc_category_fk_id')
                ->join('status', 'status.status_pk_id = sub_categories.sub_category_status')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function add_sub_category($data) {
        $insert = $this->db->insert('sub_categories', $data);
        return $this->db->insert_id();
    }

    function edit_sub_category($data, $id) {
        $where = array('sc_pk_id' => $id);
        $this->db->update('sub_categories', $data, $where);
        return $this->db->affected_rows();
    }

    function get_sub_category_by_id($id) {
        $where = array('sc_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('sub_categories', $where);
        return $response = $getSqlRes->row();
    }

    function get_size_category_list() {
        $where = array();
        $query = $this->db->select('size_categories.*,sub_categories.*,category.*,status.*')
                ->from('size_categories')
                ->join('sub_categories', 'sub_categories.sc_pk_id = size_categories.sz_sc_category_fk_id')
                ->join('category', 'category.category_pk_id = sub_categories.sc_category_fk_id')
                ->join('status', 'status.status_pk_id = size_categories.size_category_status')
                ->where($where)
                ->get();

        return $result = $query->result_array();
    }

    function add_size_category($data) {
        $insert = $this->db->insert('size_categories', $data);
        return $this->db->insert_id();
    }

    function edit_size_category($data, $id) {
        $where = array('sz_pk_id' => $id);
        $this->db->update('size_categories', $data, $where);
        return $this->db->affected_rows();
    }

    function get_size_category_by_id($id) {
        $where = array('sz_pk_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('size_categories', $where);
        return $response = $getSqlRes->row();
    }

}

?>
