<?php

class Formpurchase_m extends CI_Model
{
	function list(){
		return $this->db->get('tbl_purcase_request');
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	
	public function delete($id)
	{
		$query=$this->db->query("DELETE a.*, b.* FROM tbl_manage_barang a, tbl_purcase_request b WHERE a.id_purchase_request = '$id' AND b.id_purchase_request = '$id'");
		return $query; 
	}
}