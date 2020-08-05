<?php

class Model_auth extends CI_Model{
    public function cek_login()
    {
        $id_karyawan    = set_value('id_karyawan');
        $password       = set_value('password');

        $result         = $this->db->where('id_karyawan',$id_karyawan)
                                    ->where('password',$password)
                                    ->limit(1)
                                    ->get('tbl_karyawan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function check_employe($id){
        $this->db->select('*');
        $this->db->from('tbl_karyawan');
        $this->db->where('id_karyawan', $id);
        $query = $this->db->get();
        return $query;
    }

    public function kehadiran($id){
        $this->db->select('*');
        $this->db->from('tbl_kehadiran');
        $this->db->where('id_karyawan', $id);
        $query = $this->db->get();
        return $query;
    }

    public function transport($id){
        $this->db->select('*');
        $this->db->from('tbl_transportasi');
        $this->db->where('id_karyawan', $id);
        $query = $this->db->get();
        return $query;
    }

    public function hitunguang($id)
	{
		$this->db->select('*');
         $this->db->from('tbl_transportasi t_transport');
         $this->db->join('tbl_kehadiran t_hadir', 't_transport.id_karyawan = t_hadir.id_karyawan');
         $this->db->where('id_karyawan', $id);
	    $query = $this->db->get();
	    return $query;
	}

    public function nama(){
		$this->db->select('nama_karyawan');
		$this->db->from('tbl_karyawan');
		$query = $this->db->get();
        return $query;
    }
    
    public function hadir($id){
		$this->db->select('*');
		$this->db->from('tbl_absen');
		$query = $this->db->get();    
        return $query;
	}
}