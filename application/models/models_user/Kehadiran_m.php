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


	function insert_absen($data,$table){
		$this->db->insert($table,$data);
	}

	public function jumlah_absen($id){
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        
        return $query;
	}

	public function record_cuti($id){
		$this->db->select('*');
		$this->db->from('tbl_kehadiran t_hadir');
		$this->db->join('tbl_jumlah_cuti t_jumlah_cuti', 't_hadir.id_karyawan = t_jumlah_cuti.id_karyawan');
		$this->db->join('tbl_karyawan t_karyawan', 't_karyawan.id_karyawan = t_hadir.id_karyawan');
		$this->db->where('t_karyawan.id_karyawan', $id);
		$query = $this->db->get();
        
        return $query;
	}
}

?>
