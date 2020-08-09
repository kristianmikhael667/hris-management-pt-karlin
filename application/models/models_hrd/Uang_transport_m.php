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
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function hitunguang()
	{
		$this->db->select('*');
         $this->db->from('tbl_transportasi t_transport');
         $this->db->join('tbl_kehadiran t_hadir', 't_transport.id_karyawan = t_hadir.id_karyawan');
       //  $this->db->where('id_karyawan', $id);
	    $query = $this->db->get();
	    return $query;
	}

	public function add_transportasi($data){	
		return  $this->db->insert('tbl_transportasi',$data); 
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_transportasi');
	}
}

?>