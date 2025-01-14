<?php

class Perjalanandinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Perjalanan_dinas_m', 'perjalanan_dinas');
		$this->load->model('models_hrd/Datadinas_hrd', 'dinas');
		$this->load->model('models_hrd/Karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 2) ){
			redirect('login/login');
		}
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/data_hadir/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);;
	}

	public function add()
	{
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tanggal = $this->input->post('tanggal');
		$biaya_transportasi = $this->input->post('biaya_transportasi');
		$ket = $this->input->post('ket');
		$uang_makan = $this->input->post('uang_makan');
		$status	= $this->input->post('status');

		$data = array(
			'nomor_sppd' => $nomor_sppd,
			'tanggal' => $tanggal,
			'biaya_transportasi' => $biaya_transportasi,
			'ket' => $ket,
			'uang_makan' => $uang_makan,
			'status' => 'MENUNGGU'
			);
		$this->perjalanan_dinas->input_data($data,'tbl_perjalanan_dinas');
		redirect('hrd/perjalanandinas/index');
	}

	public function delete()
	{
		$id = $this->input->get('id');
		$this->perjalanan_dinas->delete($id);
		redirect(base_url('hrd/dinas/index'));
	}
}