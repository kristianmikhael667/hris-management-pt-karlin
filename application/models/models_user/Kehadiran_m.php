<?php

class Kehadiran_m extends CI_Model{

	public function check_kehadiran($id){
		$this->db->select('*');
		$this->db->from('tbl_kehadiran');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add_kehadiran($id){	
		return  $this->db->insert('tbl_kehadiran', $id); 
	}

}

?>