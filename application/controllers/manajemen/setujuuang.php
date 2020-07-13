<?php

class setujuuang extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_manajemen/Uang_transport_m', 'uang_transport');
		
	}

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'management/setuju_uang/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manager/wrapper', $data, FALSE);
    }
}