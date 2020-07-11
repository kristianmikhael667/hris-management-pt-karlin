<?php

class Medicalreimbust extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Medical_m', 'medical');
		
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/medical_reimburstment/list'
                     );
                     
		$this->load->view('template_bootstrap_hrd/wrapper', $data, FALSE);
    }
}