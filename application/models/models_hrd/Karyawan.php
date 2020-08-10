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
<<<<<<< HEAD
		$query=$this->db->query("DELETE a.*, b.* FROM tbl_karyawan a, tbl_purcase_request b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		return $query;
=======
		

		// $this->db->query("DELETE a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.* FROM tbl_transportasi a, tbl_medical b, tbl_pengajuan_biaya c, tbl_perjalanan_dinas d, tbl_dinas e, tbl_dinas f, tbl_purcase_request g, tbl_absen h, tbl_jumlah_cuti i, tbl_kehadiran j WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id' AND c.id_karyawan = '$id' AND d.nomor_sppd = '$id' AND e.nomor_sppd = '$id' AND f.id_karyawan = '$id' AND g.id_karyawan = '$id' AND h.id_karyawan = '$id' AND i.id_karyawan = '$id' AND j.id_karyawan = '$id'");
		// $this->db->query("DELETE FROM tbl_karyawan WHERE id_karyawan = '$id'");

		//$this->db->query("DELETE a.*, b.*, c.* FROM tbl_jumlah_cuti a, tbl_absen b, tbl_kehadiran c WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id' AND c.id_karyawan = '$id'");
		// //$this->db->query("DELETE a.*, b.* FROM tbl_kehadiran a, tbl_karyawan b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		//$this->db->query("DELETE a.*, b.* FROM tbl_perjalanan_dinas a, tbl_dinas b WHERE a.nomor_sppd = '$id' AND b.nomor_sppd = '$id'");
		// // //$this->db->query("DELETE a.*, b.* FROM tbl_dinas a, tbl_karyawan b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		//$this->db->query("DELETE a.*, b.* FROM tbl_manage_barang a, tbl_purcase_request b WHERE a.id_purchase_request = '$id' AND b.id_purchase_request = '$id'");
		$this->db->query("DELETE FROM tbl_karyawan WHERE id_karyawan = '$id'");
		//$this->db->query("DELETE a.*, b.* FROM tbl_purcase_request a, tbl_karyawan b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		// $query2 = $this->db->query("DELETE a.*, b.*, c.* FROM tbl_jumlah_cuti a, tbl_absen b, tbl_kehadiran c WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id' AND c.id_karyawan = '$id'");
		// $query3 = $this->db->query("DELETE a.*, b.* FROM tbl_perjalanan_dinas a, tbl_dinas b WHERE a.nomor_sppd = '$id' AND b.nomor_sppd = '$id'");
		// $query4 = $this->db->query("DELETE a.*, b.* FROM tbl_manage_barang a, tbl_purcase_request b WHERE a.id_purchase_request = '$id' AND b.id_purchase_request = '$id'");
		// return $query;
		// return $query2;
		// return $query3;
		
		// return $query;
		//$this->db->delete('tbl_karyawan', array('id_karyawan' => $id));
		// $query = "DELETE FROM tbl_absen,tbl_kehadiran,tbl_medical,tbl_jumlah_cuti,tbl_transportasi,tbl_dinas, tbl_purcase_request, tbl_karyawan WHERE id_karyawan='$id'";
		// return $query;

		// $this->db->delete('tbl_karyawan.*,tbl_absen.*,tbl_kehadiran.*,tbl_medical.*,tbl_jumlah_cuti.*,tbl_transportasi.*,tbl_dinas.*,tbl_purcase_request.*');
		// $this->db->from('tbl_karyawan');
		// $this->db->where('tbl_karyawan.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_absen.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_kehadiran.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_medical.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_jumlah_cuti.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_transportasi.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_dinas.id_karyawan', $id_karyawan);
		// $this->db->where('tbl_purcase_request.id_karyawan', $id_karyawan);
		// $this->db->join('tbl_absen','tbl_absen.id_karyawan = tbl_karyawan.id_karyawan');
		// $this->db->join('tbl_kehadiran','tbl_kehadiran.id_karyawan = tbl_karyawan.id_karyawan');
		// $this->db->join('tbl_medical','tbl_medical.id_karyawan = tbl_karyawan.id_karyawan');
		// $this->db->join('tbl_jumlah_cuti','tbl_jumlah_cuti.id_karyawan = tbl_karyawan.id_karyawan');
		// $this->db->join('tbl_transportasi','tbl_transportasi.id_karyawan = tbl_karyawan.id_karyawan');
		// $this->db->join('tbl_dinas','tbl_dinas.id_karyawan = tbl_karyawan.id_karyawan');
		// $this->db->join('tbl_purcase_request','tbl_purcase_request.id_karyawan = tbl_karyawan.id_karyawan');
		// $query = $this->db->get();

	
		// $this->db->query("DELETE tbl_absen,tbl_kehadiran,tbl_medical,tbl_jumlah_cuti,tbl_transportasi,tbl_dinas, tbl_purcase_request, tbl_karyawan 
		// FROM 
		// tbl_absen INNER JOIN tbl_kehadiran INNER JOIN tbl_medical INNER JOIN tbl_jumlah_cuti INNER JOIN tbl_transportasi INNER JOIN tbl_dinas 
		// INNER JOIN tbl_purcase_request INNER JOIN tbl_karyawan 
		// WHERE 
		// tbl_kehadiran.id_karyawan = tbl_medical.id_karyawan 
		// AND tbl_medical.id_karyawan = tbl_jumlah_cuti.id_karyawan 
		// AND tbl_jumlah_cuti.id_karyawan = tbl_transportasi.id_karyawan 
		// AND tbl_transportasi.id_karyawan = tbl_dinas.id_karyawan
		// AND tbl_dinas.id_karyawan = tbl_purcase_request.id_karyawan 
		// AND tbl_purcase_request.id_karyawan = tbl_karyawan.id_karyawan
		// AND tbl_karyawan.id_karyawan='".$id_karyawan."'");
>>>>>>> 950e293d5dedb87976b5b51e3b83f4641050e6b4
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