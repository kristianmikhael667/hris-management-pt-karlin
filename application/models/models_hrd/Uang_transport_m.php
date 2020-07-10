<?php

class Uang_transport_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_transportasi');
		$query = $this->db->get();
        
        return $query;
	}

}

?>