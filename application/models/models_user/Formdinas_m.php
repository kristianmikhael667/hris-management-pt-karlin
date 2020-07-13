<?php

class Formdinas_m extends CI_Model
{
	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$query = $this->db->get();    
        return $query;
	}

    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}