<?php

class User_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($user_id)
    {
        $this->db->select();
        $this->db->from('tbl_karyawan as tbl_karyawan');
        $this->db->where('tbl_karyawan.id_karyawan != ', $user_id);
        $this->db->where('tbl_karyawan.id_karyawan != 0');
        return $this->db->get();
    }

    public function getOne($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->get('tbl_karyawan');
    }

    public function logged($user_id)
    {
        $this->db->where('id_karyawan', $user_id);
        $this->db->update('tbl_karyawan', ['is_logged_in' => 1, 'last_login' => date('Y-m-d')]);

        return 1;
    }
}