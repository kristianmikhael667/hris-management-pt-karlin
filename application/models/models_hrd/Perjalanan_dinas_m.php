<?php define('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan_dinas_m extends CI_Model
{
    private $_table = "tbl_perjalanan_dinas";

    public $id_karyawan;
    public $lampiran;
    public $tanggal;
    public $biaya_transportasi;
    public $ket;
    public $uang_makan;

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
        $this->lampiran = $post["lampiran"];
        $this->tanggal = $post["tanggal"];
        $this->biaya_transportasi = $post["biaya_transportasi"];
        $this->ket = $post["description"];
        $this->uang_makan = $post["uang_makan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_karyawan = $post["id_karyawan"];
        $this->lampiran = $post["lampiran"];
        $this->tanggal = $post["tanggal"];
        $this->biaya_transportasi = $post["biaya_transportasi"];
        $this->ket = $post["description"];
        $this->uang_makan = $post["uang_makan"];
        return $this->db->update($this->_table, $this, array('id_karyawan' => $post['id_karyawan']));
    }

    public function delete($id_karyawan)
    {
        return $this->db->delete($this->_table, array("id_karyawan" => $id_karyawan));
    }
}