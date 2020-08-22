<?php

class Perjalanan_dinas_m extends CI_Model{

    function tampil_data(){
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$query = $this->db->get();    
        return $query;
	}

	function tampil_dataa($id){
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$this->db->where('nomor_sppd', $id);	
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
		$query=$this->db->query("DELETE tbl_perjalanan_dinas, tbl_dinas
		 FROM tbl_perjalanan_dinas LEFT JOIN tbl_dinas ON tbl_perjalanan_dinas.nomor_sppd = tbl_dinas.nomor_sppd
		 WHERE tbl_perjalanan_dinas.nomor_sppd='$id'
		");
		return $query;
	}
	
}

?>