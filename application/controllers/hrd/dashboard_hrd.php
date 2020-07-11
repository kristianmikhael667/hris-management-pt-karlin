<?php

class Dashboard_hrd extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Karyawan', 'karyawan');
		
    }

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/karyawan/list'
                     );
                     
		$this->load->view('template_bootstrap_hrd/wrapper', $data, FALSE);
    }
	
	public function add(){

	}
    
}