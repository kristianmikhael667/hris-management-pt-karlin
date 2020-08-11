<?php

class Datadinas extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/datadinas_m', 'datadinas');
        $this->load->model('models_hrd/karyawan', 'karyawan');
		$this->load->model('models_user/formpurchase_m', 'formpurchase');
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
					  'content' => 'user/datadinas/list'
                     );
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
    }
	
	
	public function edit_datadinas($id){
		$where = array('id_karyawan' => $id);
		$data['karyawan'] = $this->datadinas->edit_dinas($where, 'tbl_dinas')->result();
		$data = array('title' => '',
					  'content' => 'user/formpurchase/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
	}

	public function update(){
		$id = $this->input->post('id_karyawan');
		$nomor_sppd = $this->input->post('nomor_sppd');
		$tgl_keberangkatan = $this->input->post('tgl_keberangkatan');
		$bln_keberangkatan = $this->input->post('bln_keberangkatan');
		$tujuan = $this->input->post('tujuan');
		$alasan = $this->input->post('alasan');

		$data = array(
			'id_karyawan'		=> $id,
			'nomor_sppd'	=> $nomor_sppd,
			'tgl_keberangkatan'		=> $tgl_keberangkatan,
			'bln_keberangkatan'		=> $bln_keberangkatan,
			'tujuan'				=> $tujuan,
			'alasan'				=> $alasan
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->datadinas->update_data($where,$data, 'tbl_dinas');
		redirect('user/datadinas/index');
	}

	public function delete()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'user/datadinas/list'
					 );
					 
					 $id = $this->input->get('id');
					 $where = array('id_karyawan' => $id);
					 $this->datadinas->delete($where);

					$this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);	
	}

}