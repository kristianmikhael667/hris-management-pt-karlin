<?php

class Setujumedical extends CI_Controller{


	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Medical_m', 'medical');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 1) ){
			redirect('login/login');
		}
	}

    public function index()
	{
		
		$data = array('title' => 'Setuju Medical',
					  'content' => 'manajemen/setujumedical/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
	}
	
	public function editt($id){
		$where = array('id_karyawan' => $id);
		$data['karyawan'] = $this->uang_transport->edit($where, 'tbl_transportasi')->result();
		$data = array('title' => '',
					  'content' => 'manajemen/setujuuangtr/list',
					  'list' => $this->medical->list()
                     );
                     
					 $this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);;
	}

	public function update(){
		$id = $this->input->post('id_karyawan');
		$tanggal_disetujui = $this->input->post('tanggal_disetujui');
		$jumlah_disetujui = $this->input->post('jumlah_disetujui');
		$status_pengajuan = $this->input->post('status_pengajuan');

		$data = array(
			'id_karyawan'		=> $id,
			'tanggal_disetujui'		=> $tanggal_disetujui,
			'jumlah_disetujui'		=> $jumlah_disetujui,
			'status_pengajuan'		=> $status_pengajuan
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->medical->update_data($where,$data, 'tbl_medical');
		redirect('manajemen/setujumedical/index');
	}

	public function excel(){
		$data = array( 'title' => 'Laporan Excel Persetujuan Medical',
		'list' => $this->medical->list());
		$this->load->view('manajemen/setujumedical/excel',$data);
	}
}