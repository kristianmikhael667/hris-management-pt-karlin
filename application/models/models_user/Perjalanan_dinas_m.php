<?php

class Perjalanan_dinas_m extends CI_Model{

    function tampil_data(){
		return $this->db->get('tbl_perjalanan_dinas');
	}

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$query = $this->db->get();
        
        return $query;
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}

?>