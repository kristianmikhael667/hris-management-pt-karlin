<?php

class Formcuti_m extends CI_Model{

	public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_cuti');
		$query = $this->db->get();    
        return $query;
	}

    function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function update_kehadiran($id, $data)
	{
		$this->db->update('tbl_kehadiran', $data, $id);
	}

	
}

?>