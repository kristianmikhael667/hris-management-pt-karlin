<?php

class Setujuuang extends CI_Controller{

	public function __construct(){
        parent::__construct();
		//$this->load->model('models_manajemen/Uang_transport_m', 'uang_transport');
		//$this->load->model('models_user/Uang_transport_m', 'uang_transport');
		$this->load->model('models_hrd/Uang_transport_m', 'uang_transport');
		$this->load->model('models_hrd/Karyawan', 'karyawan');
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
					  'content' => 'manajemen/setujuuangtr/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
	}
	
	public function editt($id){
		$where = array('id_karyawan' => $id);
		$data['karyawan'] = $this->uang_transport->edit($where, 'tbl_transportasi')->result();
		$data = array('title' => '',
					  'content' => 'manajemen/setujuuangtr/list',
					  'list' => $this->uang_transport->hitunguang()
                     );
                     
					 $this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);;
	}

	public function update(){
		$id = $this->input->post('id_karyawan');
		$status = $this->input->post('status');

		$data = array(
			'id_karyawan'		=> $id,
			'status'		=> $status
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->uang_transport->update_data($where,$data, 'tbl_transportasi');
		redirect('manajemen/setujuuang/index');
	}

	public function updatee(){
		$id = $this->input->post('id_karyawan');
		$uang_bensin = $this->input->post('uang_bensin');
		$uang_parkir = $this->input->post('uang_parkir');

		$data = array(
			'id_karyawan'		=> $id,
			'uang_bensin'		=> $uang_bensin,
			'uang_parkir'		=> $uang_parkir
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->uang_transport->update_data($where,$data, 'tbl_transportasi');
		redirect('manajemen/setujuuang/index');
	}

	public function excel(){
		$data = array( 'title' => 'Laporan Excel Persetujuan Uang Transportasi',
		'list' => $this->uang_transport->hitunguang());
		$this->load->view('manajemen/setujuuangtr/excel',$data);
	}

	public function delete(){
		$data = array('title' => 'Data Karyawan',
					  'content' => 'manajemen/setujuuangtr/list'
					 );
		$id = $this->input->get('id');
		$where = array('id_karyawan' => $id);
		$this->uang_transport->delete($where);
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);	
	}

}