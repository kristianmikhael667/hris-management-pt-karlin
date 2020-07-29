<?php

class Absen extends CI_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->model('models_hrd/karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 3) ){
			redirect('login/login');
		}
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/absensi/js_face_recognition'
                     );
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
    }
    

}