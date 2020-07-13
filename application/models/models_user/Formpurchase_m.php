<?php

class Formpurchase_m extends CI_Model
{
	function list(){
		return $this->db->get('tbl_purcase_request');
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}