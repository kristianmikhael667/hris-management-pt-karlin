<?php

class Kehadiran extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Kehadiran_m', 'kehadiran');
		
    }
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/kehadiran/list'
                     );
                     
		$this->load->view('template_bootstrap_hrd/wrapper', $data, FALSE);
    }
	
    
}