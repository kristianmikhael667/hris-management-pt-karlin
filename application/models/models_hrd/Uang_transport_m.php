<?php

class Uang_transport_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_transportasi');
		$query = $this->db->get();
        
        return $query;
	}

	public function check_transportasi($id){
		$this->db->select('*');
		$this->db->from('tbl_transportasi');
		$this->db->where('id_tr', $id);
		$query = $this->db->get();
        return $query;
	}

	public function hitunguang()
	{
		$this->db->select('*');
 		$this->db->from('tbl_transportasi');
 		$this->db->join('tbl_kehadiran','tbl_kehadiran.jumlah_hadir = tbl_transportasi.id_tr');
 		$this->db->order_by('tbl_transportasi.id_tr', 'desc');	
	    $query = $this->db->get();
	    if($query->num_rows()>0)
	      {return $query->result();}
	    else{return null;}
	}

	public function add_transportasi($id){	
		return  $this->db->insert('tbl_transportasi', $id); 
	}
}

?>