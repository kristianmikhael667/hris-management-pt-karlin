<?php

class Kehadiran_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_kehadiran t_hadir');
		$this->db->join('tbl_jumlah_cuti t_jumlah_cuti', 't_hadir.id_karyawan = t_jumlah_cuti.id_karyawan');
		$this->db->join('tbl_karyawan t_karyawan', 't_karyawan.id_karyawan = t_hadir.id_karyawan');
		$query = $this->db->get();
        
        return $query;
	}

	public function lists($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kehadiran t_hadir');
		$this->db->join('tbl_jumlah_cuti t_jumlah_cuti', 't_hadir.id_karyawan = t_jumlah_cuti.id_karyawan');
		$this->db->join('tbl_karyawan t_karyawan', 't_karyawan.id_karyawan = t_hadir.id_karyawan');
		$query = $this->db->get();
        
        return $query;
	}

	public function check_kehadiran($jumlah, $id){
		$this->db->select('jumlah_sakit');
		$this->db->from('tbl_kehadiran');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function check_employe($id){
		$this->db->select('*');
		$this->db->from('tbl_kehadiran');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add_kehadiran($id){	
		return  $this->db->insert('tbl_kehadiran', $id); 
	}

	public function delete($id)
	{
		$query=$this->db->query("DELETE a.*, b.*, c.* FROM tbl_jumlah_cuti a, tbl_absen b, tbl_kehadiran c WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id' AND c.id_karyawan = '$id'");
		return $query; 
	}
	

	public function hitunguang($id)
	{
		$this->db->select('*');
         $this->db->from('tbl_transportasi t_transport');
         $this->db->join('tbl_kehadiran t_hadir', 't_transport.id_karyawan = t_hadir.id_karyawan');
         $this->db->where('id_karyawan', $id);
	    $query = $this->db->get();
	    return $query;
	}

	
	public function hadir($id){
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$query = $this->db->get();    
        return $query;
	}
	
	public function hapushadir($id){
		$this->db->where($id);
		$this->db->delete('tbl_absen');
	}

}

?>