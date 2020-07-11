<?php

class Medical_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_medical');
		$query = $this->db->get();
        
        return $query;
	}

	public function check_medical($id){
		$this->db->select('*');
		$this->db->from('tbl_medical');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add_medical($id){	
		return  $this->db->insert('tbl_medical', $id); 
	}
	
}

?>