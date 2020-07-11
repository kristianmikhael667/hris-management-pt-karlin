<?php

class Uangtransport extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Uang_transport_m', 'uang_transport');
		
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/uang_transport/list'
                     );
                     
		$this->load->view('template_bootstrap_hrd/wrapper', $data, FALSE);
	}
}