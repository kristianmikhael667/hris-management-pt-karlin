<?php

class Formdinas_m extends CI_Model
{
	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$query = $this->db->get();    
        return $query;
	}

    function input_data($data){
		$this->db->insert('tbl_dinas',$data);
	}

	public function delete($id_karyawan)
	{
		$this->db->where($id_karyawan);
		$this->db->delete('tbl_dinas');
	}
}