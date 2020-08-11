<?php

class Datadinas_m extends CI_Model{

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$query = $this->db->get();    
        return $query;
	}

	public function datadinass($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();    
        return $query;
	}
	
	public function edit_dinas($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_dinas');
	}

}

?>