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
		$query=$this->db->query("DELETE a.*, b.* FROM tbl_karyawan a, tbl_purcase_request b WHERE a.id_karyawan = '$id' AND b.id_karyawan = '$id'");
		return $query;
	}

	public function edit($id, $data)
	{
	
		$this->db->update('tbl_karyawan', $data, $id);
		
	}

}

?>