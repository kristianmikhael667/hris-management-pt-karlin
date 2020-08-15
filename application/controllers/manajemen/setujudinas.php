<?php

class Setujudinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_manajemen/Perjalanan_dinas_m', 'perjalanan_dinas');
		$this->load->model('models_hrd/Datadinas_hrd', 'datadinas');
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
					  'content' => 'manajemen/setujudinas/list',
					  'list' => $this->datadinas->tampil_data()
                     );
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
	}

	public function delete(){
		$id = $this->input->get('id');
		$this->datadinas->hapus($id);
		redirect('manajemen/setujudinas/index');
	}
	
	public function update(){
		$id_karyawan = $this->input->post('id_karyawan');
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tgl_keberangkatan = $this->input->post('tgl_keberangkatan');
		$bln_keberangkatan = $this->input->post('bln_keberangkatan');
		$tujuan = $this->input->post('tujuan');
		$alasan = $this->input->post('alasan');
		$status = $this->input->post('status');

		$data = array(
			'id_karyawan'			=> $id_karyawan,
			'nomor_sppd'		=> $nomor_sppd,
			'tgl_keberangkatan'		=> $tgl_keberangkatan,
			'bln_keberangkatan'		=> $bln_keberangkatan,
			'tujuan'   => $tujuan,
			'alasan'	=> $alasan,
			'status' => $status
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->datadinas->update_data($where,$data, 'tbl_dinas');
		redirect('manajemen/setujudinas/index');
	}

	public function updatetotal(){
		$id_karyawan = $this->input->post('id_karyawan');
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tgl_keberangkatan = $this->input->post('tgl_keberangkatan');
		$bln_keberangkatan = $this->input->post('bln_keberangkatan');
		$tujuan = $this->input->post('tujuan');
		$alasan = $this->input->post('alasan');
		$status = $this->input->post('status');

		$data = array(
			'id_karyawan'			=> $id_karyawan,
			'nomor_sppd'		=> $nomor_sppd,
			'tgl_keberangkatan'		=> $tgl_keberangkatan,
			'bln_keberangkatan'		=> $bln_keberangkatan,
			'tujuan'   => $tujuan,
			'alasan'	=> $alasan,
			'status' => $status
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->datadinas->update_data($where,$data, 'tbl_dinas');
		redirect('manajemen/setujudinas/index');
	}

	public function excel(){
		$data = array( 'title' => 'Laporan Excel Persetujuan Dinas',
		'list' => $this->datadinas->tampil_data());
		$this->load->view('manajemen/setujudinas/excel',$data);
	}
}