<?php 

class M_data extends CI_Model{
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    function get_data($where,$table){
        $this->db->where($where);
        return $this->db->get($table);
    }

    function get_all($table){
    	return $this->db->get($table);
    }
}

?>