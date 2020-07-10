<?php

class Setujumedical extends CI_Controller{

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'management/setuju_medical/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manager/wrapper', $data, FALSE);
    }
}