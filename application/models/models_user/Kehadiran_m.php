<?php

class Kehadiran_m extends CI_Model{

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_kehadiran');
		$query = $this->db->get();    
        return $query;
	}

	public function chack_kehadiran($id){
		$this->db->select('*');
		$this->db->from('tbl_kehadiran');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();    
        return $query;
	}

	public function kehadiran($id){
		$this->db->select('*');
		$this->db->from('tbl_kehadiran');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();    
        return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

}

?>