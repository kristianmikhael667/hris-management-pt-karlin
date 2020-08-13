<?php

class Setujupurchase extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/manajemenbarang_m', 'manajemenbarang');
        $this->load->model('models_hrd/karyawan', 'karyawan');
		$this->load->model('models_user/formpurchase_m', 'formpurchase');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 1) ){
			redirect('login/login');
		}
	}

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'manajemen/setujupurchase/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
	}
	
	public function update(){
		$id_purchase_request = $this->input->post('id_purchase_request');
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$status = $this->input->post('status');

		$data = array(
			'id_purchase_request'			=> $id_purchase_request,
			'id_barang'		=> $id_barang,
			'nama_barang'		=> $nama_barang,
			'harga'		=> $harga,
			'status'   => $status
		);

		$where = array(
			'id_purchase_request' => $id_purchase_request
		);

		$this->manajemenbarang->update_data($where,$data, 'tbl_manage_barang');
		redirect('manajemen/setujupurchase/index');
	}
}