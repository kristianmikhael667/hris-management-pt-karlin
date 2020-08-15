<?php

class Medical_m extends CI_Model{


    public function list()
	{
		$this->db->select('*');
		$this->db->from('tbl_medical');
		$query = $this->db->get();
		return $query;
		if($query->num_rows()>0)
	      {return $query->result();}
	    else{return null;}
	}

	public function check_medical($id){
		$this->db->select('*');
		$this->db->from('tbl_medical');
		$this->db->where('id_karyawan', $id);
		$query = $this->db->get();
        return $query;
	}

	public function add_medical($id){	
		return  $this->db->insert('tbl_medical', $id); 
	}

	public function delete($id)
	{
		$this->db->where($id);
		$this->db->delete('tbl_medical');
	}
	
	public function edit($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function edita($id, $data)
	{
	
		$this->db->update('tbl_medical', $data, $id);
		
	}
	
}

?>