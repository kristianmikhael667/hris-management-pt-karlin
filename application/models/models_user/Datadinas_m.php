<?php

class Datadinas_m extends CI_Model{

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$query = $this->db->get();    
        return $query;
	}

	public function datadinass($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();    
        return $query;
    }
}

?>