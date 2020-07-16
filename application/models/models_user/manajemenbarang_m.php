<?php

class Manajemenbarang_m extends CI_Model{

	function tampil(){
		return $this->db->get('tbl_purcase_request');
	}

    function tampil_data(){
		return $this->db->get('tbl_manage_barang');
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
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