<?php

class Medicalreimbust extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Medical_m', 'medical');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 2) ){
			redirect('login/login');
		}
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'hrd/medical_reimburstment/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
	}
	
	public function delete()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'hrd/medical_reimburstment/list'
					 );				
		//  //$where = array('id_karyawan' => $id);
		//  $this->karyawan->delete($id);
					 
		$id = $this->input->get('id');
		$where = array('id_karyawan' => $id);
		$this->medical->delete($where);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);	
	}

	public function update(){
		$id_karyawan = $this->input->post('id_karyawan');
		$klaim_id = $this->input->post('klaim_id');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$status_pengajuan = $this->input->post('status_pengajuan');
		$tanggal_disetujui = $this->input->post('tanggal_disetujui');
		$jumlah_diajukan = $this->input->post('jumlah_diajukan');
		$jumlah_disetujui = $this->input->post('jumlah_disetujui');
		$struck = $this->input->post('struck');
		$ket = $this->input->post('ket');

		$data = array(
			'id_karyawan'			=> $id_karyawan,
			'klaim_id'				=> $klaim_id,
			'tanggal_pengajuan'		=> $uang_bensin,
			'status_pengajuan'		=> $uang_parkir,
			'tanggal_disetujui'		=> $tanggal_disetujui,
			'jumlah_diajukan'		=> $jumlah_diajukan,
			'jumlah_disetujui'		=> $jumlah_disetujui,
			'struck'				=> $struck,
			'ket'					=> $ket
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->medical->update_data($where,$data, 'tbl_medical');
		redirect('hrd/medicalreimbust/index');
	}


}