<?php

class Dashboard_hrd extends CI_Controller{

    public function index()
	{
		$data = array('title' => 'Dashboard HRD',
					  'content' => 'hrd/karyawan/list'
                     );
                     
		$this->load->view('template_bootstrap/wrapper', $data, FALSE);
    }
    
    
}