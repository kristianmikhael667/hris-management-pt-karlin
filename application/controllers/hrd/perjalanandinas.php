<?php

class Perjalanandinas extends CI_Controller{

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/perjalanan_dinas/list'
                     );
                     
		$this->load->view('template_bootstrap_hrd/wrapper', $data, FALSE);
    }
}