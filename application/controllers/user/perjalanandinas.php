<?php

class Perjalanandinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Perjalanan_dinas_m', 'perjalanan_dinas');
		
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/perjalanan_dinas/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}

	public function add()
	{
		$id_karyawan = $this->input->post('id_karyawan');
		$lampiran = $this->input->post('lampiran');
		$tanggal = $this->input->post('tanggal');
		$biaya_transportasi = $this->input->post('biaya_transportasi');
		$ket = $this->input->post('ket');
		$uang_makan = $this->input->post('uang_makan');

		$data = array(
			'id_karyawan' 			=> $id_karyawan,
			'lampiran' 				=> $lampiran,
			'tanggal'				=> $tanggal,
			'biaya_transportasi' 	=> $biaya_transportasi,
			'ket' 					=> $ket,
			'uang_makan'			=> $uang_makan
			);
		$this->perjalanan_dinas->input_data($data,'tbl_perjalanan_dinas');
		redirect('user/perjalanandinas/index');
	}
}