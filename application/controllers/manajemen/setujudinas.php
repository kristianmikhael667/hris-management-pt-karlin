<?php

class Setujudinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_manajemen/Perjalanan_dinas_m', 'perjalanan_dinas');
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
					  'content' => 'manajemen/setujudinas/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
    }
}