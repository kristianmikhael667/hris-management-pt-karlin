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
		$this->db->where($id);
		$this->db->delete('tbl_karyawan');
	}

	public function edit($id){		
		return $this->db->get_where('tbl_karyawan',$id);
	}

}

?>