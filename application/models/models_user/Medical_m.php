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

	public function check_claim_id($id){
		$this->db->select('*');
		$this->db->from('tbl_medical');
		$this->db->where('klaim_id', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add($data){	
		return  $this->db->insert('tbl_medical', $data); 
	}

	public function edit($id, $data)
	{
		$this->db->update('tbl_medical', $data, $id);	
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_medical');

	}
	
}

?>