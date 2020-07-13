<?php

class Databarang extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/manajemenbarang_m', 'manajemenbarang');
        $this->load->model('models_hrd/karyawan', 'karyawan');
        $this->load->model('models_user/formpurchase_m', 'formpurchase');
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/tabelbarang/list'
                     );
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
    }
    

}