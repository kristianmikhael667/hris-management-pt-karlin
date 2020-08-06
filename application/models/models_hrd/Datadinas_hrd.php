<?php

class Datadinas_hrd extends CI_Model{

    function tampil_data(){
		return $this->db->get('tbl_dinas');
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