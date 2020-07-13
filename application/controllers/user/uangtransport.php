<?php

class Uangtransport extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/Uang_transport_m', 'uang_transport');
		
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/uang_transport/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}
}