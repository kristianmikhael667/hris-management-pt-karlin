<?php

class Formpurchase_m extends CI_Model
{
	function list(){
		return $this->db->get('tbl_purcase_request');
	}
	
	function input_data($data){
		$this->db->insert('tbl_purcase_request',$data);
	}

	
	public function delete($id)
	{
		// $query=$this->db->query("DELETE a.*, b.* FROM tbl_manage_barang a, tbl_purcase_request b WHERE a.id_purchase_request = '$id' AND b.id_purchase_request = '$id'");
		// return $query; 
		$query=$this->db->query("DELETE tbl_manage_barang, tbl_purcase_request
		 FROM tbl_manage_barang LEFT JOIN tbl_purcase_request ON tbl_manage_barang.id_purchase_request = tbl_purcase_request.id_purchase_request
		 WHERE tbl_manage_barang.id_purchase_request='$id'
		");
		return $query;
	}
}