<?php

class Kehadiran_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_kehadiran');
		$query = $this->db->get();
        
        return $query;
	}

}

?>