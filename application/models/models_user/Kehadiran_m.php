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

	public function update_data($id, $data)
	{
		$this->db->update('tbl_kehadiran', $data, $id);
	}

	public function cek_data_hadir($id, $tanggal){
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$this->db->where('id_karyawan', $id);
		$this->db->where('tanggal_masuk', $tanggal);
		$query = $this->db->get();
		return $query;
	}

	public function hadir($id){
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$query = $this->db->get();    
        return $query;
	}

	function insert_absen($data,$table){
		$this->db->insert($table,$data);
	}
}

?>
