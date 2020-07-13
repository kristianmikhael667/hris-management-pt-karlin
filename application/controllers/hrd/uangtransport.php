<?php

class Uangtransport extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Uang_transport_m', 'uang_transport');
		
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/uang_transport/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
	}

	public function add()
	{
		$id_karyawan = $this->input->post('id_karyawan');
		$uang_bensin = $this->input->post('uang_bensin');
		$uang_parkir = $this->input->post('uang_parkir');

		$data = array(
			'id_karyawan'	=> $id_karyawan,
			'uang_bensin'   => $uang_bensin,
			'uang_parkir'	=> $uang_parkir
			);
		$this->formcuti->input_data($data,'tbl_transportasi');
		redirect('hrd/uangtransport/index');
	}
}