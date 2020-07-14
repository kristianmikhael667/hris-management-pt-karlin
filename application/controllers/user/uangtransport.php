<?php

class Uangtransport extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/Uang_transport_m', 'uang_transport');
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
					  'content' => 'user/uang_transport/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}
}