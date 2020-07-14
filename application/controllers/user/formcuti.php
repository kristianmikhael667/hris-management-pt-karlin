<?php

class Formcuti extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/formcuti_m', 'formcuti');
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
					  'content' => 'user/formcuti/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
    }

    public function add()
	{
		$mulai_cuti = $this->input->post('mulai_cuti');
		$akhir_cuti = $this->input->post('akhir_cuti');
		$jenis_cuti = $this->input->post('jenis_cuti');
		$alasan = $this->input->post('alasan');

		$data = array(
			'mulai_cuti'	=> $mulai_cuti,
			'akhir_cuti'    => $akhir_cuti,
			'jenis_cuti' 	=> $jenis_cuti,
			'alasan'		=> $alasan
			);
		$this->formcuti->input_data($data,'tbl_cuti');
		redirect('user/formcuti/index');
	}
	
    
}