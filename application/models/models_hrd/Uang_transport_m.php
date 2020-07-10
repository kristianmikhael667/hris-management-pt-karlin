<?php define('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan_dinas_m extends CI_Model
{
    private $_table = "tbl_transportasi";

    public $id_tr;
    public $uang_bensin;
    public $uang_parkir;

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
    
    public function getById($id_tr)
    {
        return $this->db->get_where($this->_table, ["id_karyawan" => $id_tr])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_tr = uniqid();
        $this->uang_bensin = $post["uang_bensin"];
        $this->uang_parkir = $post["uang_parkir"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_tr = $post["id_tr"];
        $this->uang_bensin = $post["uang_bensin"];
        $this->uang_parkir = $post["uang_parkir"];
        return $this->db->update($this->_table, $this, array('id_tr' => $post['id_tr']));
    }

    public function delete($id_tr)
    {
        return $this->db->delete($this->_table, array("id_tr" => $id_tr));
    }
}