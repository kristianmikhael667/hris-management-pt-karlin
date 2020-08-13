<?php

class Manajemenbarang_m extends CI_Model{

	function tampil($id){
		$this->db->select('*');
		$this->db->from('tbl_purcase_request');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();    
        return $query;
	}

    function tampil_data($id){
		$this->db->select('*');
		$this->db->from('tbl_manage_barang');
		$this->db->where('id_purchase_request', $id);
		$query = $this->db->get();    
        return $query;
	}

	function tampil_dat(){
		$this->db->select('*');
		$this->db->from('tbl_manage_barang');
		$query = $this->db->get();    
		return $query;
		if($query->num_rows()>0)
	      {return $query->result();}
	    else{return null;}
	}
	
	function input_data($data){
		$this->db->insert('tbl_manage_barang',$data);
	}

	public function edit_barang($where,$table){
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
		$this->db->delete('tbl_purcase_request'); 
	}

	public function deletecase($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_manage_barang'); 
	}

	public function databarang()
	{
		$this->db->select('count(*)');
		$this->db->from('tbl_manage_barang');
		$query = $this->db->get();    
        return $query;
	}

	public function jumlahdatabarang($id)
	{
		$query = $this->db->query("SELECT COUNT(id_purchase_request) FROM tbl_manage_barang");   
        return $query;
	}
}

?>