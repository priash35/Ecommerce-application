<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //add cms page
    function add_cms($data){
       
        $insert = $this->db->insert('cms', $data);
        return $this->db->insert_id();
    }
    
    //get all cms page list
    function get_cms_list() {
        $where = array();
        $query = $this->db->select('*')
                ->from('cms')
                ->where($where)
                ->get();

        $result = $query->result_array();
        return $result;
    }

    //update cms page
    function edit_cms($data,$id) {
       
       $where = array('cms_id' => $id);
       $q =  $this->db->update('cms', $data, $where);
        return $q;
    }

    //delete cms page
    function delete_cms($id) {
        $where = array('cms_id' => $id);
       
        //$sql = $this->db->last_query();
        $q = $this->db->delete('cms', array('cms_id' => $id));
        return $q;
    }

    //get cms page by id
    function get_cms_by_id($id) {
      
        $where = array('cms_id' => $id);
        $this->db->select('*');
        $getSqlRes = $this->db->get_where('cms', $where);
        return $response = $getSqlRes->row();

    }
}

