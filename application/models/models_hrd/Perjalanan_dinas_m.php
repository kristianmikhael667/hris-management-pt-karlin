<?php

class Perjalanan_dinas_m extends CI_Model{

    function tampil_data(){
		return $this->db->get('tbl_perjalanan_dinas');
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_perjalanan_dinas');
	}
	
}

?>