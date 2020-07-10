<?php

class Perjalanan_dinas_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$query = $this->db->get();
        
        return $query;
	}

}

?>