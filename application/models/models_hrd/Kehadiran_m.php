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
		$this->db->where($id);
		$this->db->delete('tbl_kehadiran');
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

}

?>