<?php

class Dinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Perjalanan_dinas_m', 'perjalanan_dinas');
        $this->load->model('models_hrd/Karyawan', 'karyawan');
        $this->load->model('models_hrd/Datadinas_hrd', 'datadinas');
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
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
    }
	
	public function add()
	{	
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tanggal = $this->input->post('tanggal');
		$biaya_transportasi = $this->input->post('biaya_transportasi');
		$ket = $this->input->post('ket');
		$uang_makan = $this->input->post('uang_makan');

		$data = array(
			'nomor_sppd' => $nomor_sppd,
			'tanggal' => $tanggal,
			'biaya_transportasi' => $biaya_transportasi,
			'ket' => $ket,
			'uang_makan' => $uang_makan
			);
		$this->perjalanan_dinas->input_data($data,'tbl_perjalanan_dinas');
		redirect('hrd/dinas/index');
	}

	public function update(){
		$id_karyawan		= $this->input->post('id_karyawan');
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tgl_keberangkatan = $this->input->post('tgl_keberangkatan');
		$bln_keberangkatan = $this->input->post('bln_keberangkatan');
		$tujuan = $this->input->post('tujuan');
		$alasan = $this->input->post('alasan');

		$data = array(
			'id_karyawan' => $id_karyawan,
			'nomor_sppd' => $nomor_sppd,
			'tgl_keberangkatan' => $tgl_keberangkatan,
			'bln_keberangkatan' => $bln_keberangkatan,
			'tujuan' => $tujuan,
			'alasan'	=> $alasan
			);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->datadinas->edit($where,$data, 'tbl_dinas');
		redirect('hrd/dinas/index');
	}
    
}