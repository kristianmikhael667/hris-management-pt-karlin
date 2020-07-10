<?php

class Dashboard_manajemen extends CI_Controller{

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'management/setuju_dinas/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manager/wrapper', $data, FALSE);
    }
}