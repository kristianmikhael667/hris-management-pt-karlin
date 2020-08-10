<?php

class Formcuti_m extends CI_Model{

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_cuti');
		$query = $this->db->get();    
        return $query;
	}

    function input_data($data){
		$this->db->insert('tbl_cuti',$data);
	}

	public function update_kehadiran($id, $data)
	{
		$this->db->update('tbl_kehadiran', $data, $id);
	}

	public function update_sisa_pengajuan($id, $data)
	{
		$this->db->update('tbl_jumlah_cuti', $data, $id);
	}

	public function check_sisa_pengajuan(){
		$this->db->select('*');
		$this->db->from('tbl_jumlah_cuti');
		$query = $this->db->get();    
		return $query;
	}

	public function delete($id_karyawan)
	{
		$this->db->where($id);
		$this->db->delete('tbl_cuti');
	}

	
}

?>