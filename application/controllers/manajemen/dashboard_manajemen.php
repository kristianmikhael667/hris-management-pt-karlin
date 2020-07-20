<?php

class Dashboard_manajemen extends CI_Controller{
	
    public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda Belum Login Manajemen!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('auth/login');
		}
		$this->load->model('models_manajemen/Karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 1) ){
			redirect('login/login');
		}
	}
	
	public function index()
	{
		$data = array('title' => 'Data Manajer',
					  'content' => 'manajemen/dashboard/dashboardmanajemen'
                     );
                     
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
	}
}