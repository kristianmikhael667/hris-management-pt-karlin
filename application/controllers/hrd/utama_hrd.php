<?php

class Utama_hrd extends CI_Controller{
	
    public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda Belum Login HRD!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('auth/login');
		}
		$this->load->model('models_hrd/Karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 2) ){
			redirect('login/login');
		}
	}
	
	public function index()
	{
		$data = array('title' => 'Data HRD',
					  'content' => 'hrd/dashboard_hrd/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
	}
}