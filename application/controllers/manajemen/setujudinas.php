<?php

class Setujudinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_manajemen/Perjalanan_dinas_m', 'perjalanan_dinas');
		
	}

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'management/setuju_dinas/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manager/wrapper', $data, FALSE);
    }
}