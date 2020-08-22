<?php

class Datadinas_hrd extends CI_Model{

    public function tampil_data(){
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$query = $this->db->get();    
        return $query;
	    if($query->num_rows()>0)
	      {return $query->result();}
	    else{return null;}
	}

	public function tampil_dataaa(){
		$this->db->select('*');
		$this->db->from('tbl_perjalanan_dinas');
		$query = $this->db->get();    
        return $query;
	    if($query->num_rows()>0)
	      {return $query->result();}
	    else{return null;}
	}

	function tampil_dataa($id){
		$this->db->select('*');
		$this->db->from('tbl_dinas');
		$this->db->where('id_karyawan', $id);	
		$query = $this->db->get();    
        return $query;
	    if($query->num_rows()>0)
	      {return $query->result();}
	    else{return null;}
	}
	
	function input_data($data){
		$this->db->insert('tbl_perjalanan_dinas',$data);
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_perjalanan_dinas');
	}

	public function hapus($id)
	{
		$query=$this->db->query("DELETE tbl_perjalanan_dinas, tbl_dinas
		 FROM tbl_perjalanan_dinas LEFT JOIN tbl_dinas ON tbl_perjalanan_dinas.nomor_sppd = tbl_dinas.nomor_sppd
		 WHERE tbl_perjalanan_dinas.nomor_sppd='$id'
		");
		return $query;
	}

	public function edit($id, $data)
	{
		$this->db->update('tbl_dinas', $data, $id);	
	}
	
}

?>