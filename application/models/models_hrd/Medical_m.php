<?php

class Medical_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_medical');
		$query = $this->db->get();
        
        return $query;
	}

}

?>