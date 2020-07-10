<?php define('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan_dinas_m extends CI_Model
{
    private $_table = "tbl_kehadiran";

    public $id_kehadiran;
    public $jumlah_hadir;
    public $jumlah_cuti;
    public $jumlah_izin;
    public $jumlah_sakit;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();  
    }
    
    public function getById($id_kehadiran)
    {
        return $this->db->get_where($this->_table, ["id_kehadiran" => $id_kehadiran])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kehadiran = uniqid();
        $this->jumlah_hadir = $post["jumlah_hadir"];
        $this->jumlah_cuti = $post["jumlah_cuti"];
        $this->jumlah_izin = $post["jumlah_izin"];
        $this->jumlah_sakit = $post["jumlah_sakit"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kehadiran = $post["id_kehadiran"];
        $this->jumlah_hadir = $post["jumlah_hadir"];
        $this->jumlah_cuti = $post["jumlah_cuti"];
        $this->jumlah_izin = $post["jumlah_izin"];
        $this->jumlah_sakit = $post["jumlah_sakit"];
        return $this->db->update($this->_table, $this, array('id_kehadiran' => $post['id_kehadiran']));
    }

    public function delete($id_tr)
    {
        return $this->db->delete($this->_table, array("id_kehadiran" => $id_tr));
    }
}