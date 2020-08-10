<?php

class Pengajuancuti_m extends CI_Model{


    function list(){
		return $this->db->get('tbl_jumlah_cuti');
	}

	public function add_cuti($id){	
		return  $this->db->insert('tbl_jumlah_cuti', $id); 
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_jumlah_cuti');
	}
}

?>