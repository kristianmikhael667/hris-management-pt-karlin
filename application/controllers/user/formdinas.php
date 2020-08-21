<?php

class Formdinas extends CI_Controller
{
    public function __construct(){
        parent::__construct();
		$this->load->model('models_user/formdinas_m', 'formdinas');
		$this->load->model('models_hrd/Perjalanan_dinas_m', 'perjalanan_dinas');
		$this->load->model('models_hrd/Karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 3) ){
			redirect('login/login');
		}
    }
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/formdinas/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
    }

    public function add()
	{
		$id_karyawan = $this->input->post('id_karyawan');
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tgl_keberangkatan = $this->input->post('tgl_keberangkatan');
        $bln_keberangkatan = $this->input->post('bln_keberangkatan');
        $tujuan = $this->input->post('tujuan');
		$alasan = $this->input->post('alasan');
		$status = $this->input->post('status');
		$data = array(
			'id_karyawan'	        => $id_karyawan,
			'nomor_sppd'	        => $nomor_sppd,
			'tgl_keberangkatan'     => $tgl_keberangkatan,
            'bln_keberangkatan' 	=> $bln_keberangkatan,
            'tujuan' 	            => $tujuan,
			'alasan'		        => $alasan,
			'status'				=> 'MENUNGGU'
			);
		$this->formdinas->input_data($data,'tbl_dinas');
		redirect('user/formdinas/index');
	}

}