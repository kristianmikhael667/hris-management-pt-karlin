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
	
    
}