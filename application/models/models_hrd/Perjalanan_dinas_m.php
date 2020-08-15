<?php

class Perjalanan_dinas_m extends CI_Model{

    function tampil_data(){
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$query = $this->db->get();    
        return $query;
	}

	function dataku(){
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$query = $this->db->get();    
        return $query;
	}
	
	function input_data($data){
		$this->db->insert('tbl_perjalanan_dinas',$data);
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_perjalanan_dinas');
	}
	
}

?>