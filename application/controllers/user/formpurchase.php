<?php

class Formpurchase extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('models_user/formpurchase_m', 'formpurchase');
        $this->load->model('models_hrd/Karyawan', 'karyawan');
    }
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/formpurchase/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
    }

    public function add()
	{
        $id_karyawan = $this->input->post('id_karyawan');
		$id_purchase_request = $this->input->post('id_purchase_request');
		$tgl_permintaan = $this->input->post('tgl_permintaan');
        $keterangan = $this->input->post('keterangan');

		$data = array(
            'id_karyawan'	            => $id_karyawan,
			'id_purchase_request'	    => $id_purchase_request,
			'tgl_permintaan'            => $tgl_permintaan,
			'keterangan'		        => $keterangan
			);
		$this->formpurchase->input_data($data,'tbl_purcase_request');
		redirect('user/formpurchase/index');
	}
}