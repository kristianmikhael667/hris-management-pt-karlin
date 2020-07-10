<?php define('BASEPATH') OR exit('No direct script access allowed');

class Medical_m extends CI_Model
{
    private $_table = "tbl_medical";

    public $id_karyawan;
    public $klaim_id;
    public $tanggal_pengajuan;
    public $status_pengajuan;
    public $tanggal_disetujui;
    public $jumlah_diajukan;
    public $jumlah_disetujui;
    public $struck;
    public $ket;

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
    
    public function getById($id_karyawan)
    {
        return $this->db->get_where($this->_table, ["id_karyawan" => $id_karyawan])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_karyawan = uniqid();
        $this->klaim_id = $post["klaim_id"];
        $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
        $this->status_pengajuan = $post["status_pengajuan"];
        $this->tanggal_disetujui = $post["tanggal_disetujui"];
        $this->jumlah_diajukan = $post["jumlah_diajukan"];
        $this->jumlah_disetujui = $post["jumlah_disetujui"];
        $this->struck = $post["struck"];
        $this->ket = $post["ket"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_karyawan = $post["id_karyawan"];
        $this->klaim_id = $post["klaim_id"];
        $this->tanggal_pengajuan = $post["tanggal_pengajuan"];
        $this->status_pengajuan = $post["status_pengajuan"];
        $this->tanggal_disetujui = $post["tanggal_disetujui"];
        $this->jumlah_diajukan = $post["jumlah_diajukan"];
        $this->jumlah_disetujui = $post["jumlah_disetujui"];
        $this->struck = $post["struck"];
        $this->ket = $post["ket"];
        return $this->db->update($this->_table, $this, array('id_karyawan' => $post['id_karyawan']));
    }

    public function delete($id_karyawan)
    {
        return $this->db->delete($this->_table, array("id_karyawan" => $id_karyawan));
    }
}