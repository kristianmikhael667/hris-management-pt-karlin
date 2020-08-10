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
		//return $row = $this->query("SHOW COLUMNS FROM ".$table." LIKE '$field'")->row()->Type;

		return $this->db->insert('tbl_karyawan', $id); 
	}

	public function persetujuan($table, $field)
	{
		
	}

	public function delete($id)
	{
		$query=$this->db->query("DELETE a.*, b.* FROM tbl_karyawan a, tbl_purcase_request b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		return $query;
	}

	// public function hapuss($id)
	// {
	// 	$query2 = $this->db->query("DELETE a.*, b.*, c.* FROM tbl_jumlah_cuti a, tbl_absen b, tbl_kehadiran c WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id' AND c.id_karyawan = '$id'");
	// 	return $query2;
	// }

	// public function hapusss($id){
	// 	$query3 = $this->db->query("DELETE a.*, b.*, c.* FROM tbl_perjalanan_dinas a, tbl_dinas b, tbl_karyawan c WHERE a.nomor_sppd = '$id' AND b.nomor_sppd = '$id' AND c.id_karyawan = '$id'");
	// 	return $query3;
	// }

	// public function hapussss($id){
	// 	$query4 = $this->db->query("DELETE a.*, b.*, c.* FROM tbl_manage_barang a, tbl_purcase_request b, tbl_karyawan c WHERE a.id_purchase_request = '$id' AND b.id_purchase_request = '$id' AND c.id_karyawan = '$id'");
	// 	return $query4;
	// }

	public function edit($id, $data)
	{
	
		$this->db->update('tbl_karyawan', $data, $id);
		
	}

}

?>