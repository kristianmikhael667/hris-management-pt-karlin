<?php

class Kehadiran extends CI_Controller{

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/kehadiran/list'
                     );
                     
		$this->load->view('template_bootstrap/wrapper', $data, FALSE);
    }
    
    
}