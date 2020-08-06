<?php

class Karyawan extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_karyawan');
		$query = $this->db->get();    
        return $query;
	}

	public function check_employe($id){
		$this->db->select('*');
		$this->db->from('tbl_karyawan');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add_employe($id){	
		return  $this->db->insert('tbl_karyawan', $id); 
	}

	public function delete($id)
	{
		$query=$this->db->query("DELETE a.*, b.* FROM tbl_karyawan a, tbl_kehadiran b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		return $query;
		
		// $query=$this->db->query("DELETE a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.* FROM 
		// tbl_karyawan a, 
		// tbl_kehadiran b,
		// tbl_medical c,
		// tbl_jumlah_cuti d,
		// tbl_transportasi e,
		// tbl_purcase_request f,
		// tbl_jumlah_cuti g,
		// tbl_absen h
		// WHERE 
		// a.id_karyawan = '$id' 
		// AND 
		// b.id_karyawan = '$id'
		// AND
		// c.id_karyawan = '$id'
		// AND
		// d.id_karyawan = '$id'
		// AND
		// e.id_karyawan = '$id'
		// AND
		// f.id_karyawan = '$id'
		// AND
		// g.id_karyawan = '$id'
		// AND
		// h.id_karyawan = '$id'");
		
		// return $query; 
	}

	public function delete2($id)
	{
		$query=$this->db->query("DELETE a.*, b.* FROM tbl_karyawan a, tbl_dinas b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		return $query;
	}
	

	public function edit($id, $data)
	{
	
		$this->db->update('tbl_karyawan', $data, $id);
		
	}

}

?>