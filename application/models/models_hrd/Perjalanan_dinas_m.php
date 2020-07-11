<?php

class Perjalanan_dinas_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$query = $this->db->get();
        
        return $query;
	}

	public function check_dinas($id){
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add_dinas($id){	
		return  $this->db->insert('tbl_perjalanan_dinas', $id); 
	}
}

?>