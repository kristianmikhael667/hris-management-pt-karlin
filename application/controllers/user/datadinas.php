<?php

class Datadinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/datadinas_m', 'datadinas');
        $this->load->model('models_hrd/karyawan', 'karyawan');
		$this->load->model('models_user/formpurchase_m', 'formpurchase');
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
					  'content' => 'user/datadinas/list'
                     );
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
    }
    

}