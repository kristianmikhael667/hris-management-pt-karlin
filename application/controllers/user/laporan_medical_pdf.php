<?php

class Laporan_medical_pdf extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/Kehadiran_m', 'kehadiran');
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
					  'content' => 'user/kehadiran/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
    }

	public function pdfmedical(){

		$data['data'] = $this->db->get('tbl_medical')->result();

		$this->load->library('pdfmedical');
		$customPaper = 'A4';
		$this->pdfmedical->setPaper($customPaper, 'landscape');
		$this->pdfmedical->load_view('user/laporan_medical', $data);
	}
}