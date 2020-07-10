<?php

class Perjalanandinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Perjalanan_dinas_m');
		
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/perjalanan_dinas/list'
                     );
                     
		$this->load->view('template_bootstrap_hrd/wrapper', $data, FALSE);
    }
}