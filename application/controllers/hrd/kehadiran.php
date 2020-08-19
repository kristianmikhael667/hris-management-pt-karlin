<?php

class Kehadiran extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Kehadiran_m', 'kehadiran');
		$this->load->model('model_auth', 'modelauth');
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
					  'content' => 'hrd/kehadiran/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
    }
	
	// public function delete()
	// {		
	// 		//$data = array('title' => 'Data Karyawan',
	// 				  //'content' => 'user/tabelbarang/list'
	// 				 //);
    //         //$id = $this->input->get('id');
	// 		//$where = array('id_karyawan' => $id);

	// 		//$this->manajemenbarang->jumlahdatabarang($where);
	// 		//$this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	// 		$id = $this->input->get('id');
	// 		$this->kehadiran->delete($id);
	// 		//$this->manajemenbarang->deletecase($id);

	// 	//	$this->session->set_flashdata('success','Item Berhasil Di Hapus');
	// 		redirect(base_url('hrd/kehadiran/index'));
	// 		// redirect buat pindah ke halaman awalnya

	// 		//atau bisa juga make

	// 		redirect($_SERVER['HTTP_REFERER']);
	// }


	public function edit(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'hrd/kehadiran/edit'
		);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
		$id = $this->input->get('id');

		$id_karyawan = $this->input->post('id_karyawan');
		$jumlah_cuti = $this->input->post('jumlah_cuti');
		$jumlah_izin = $this->input->post('jumlah_izin');
		$jumlah_sakit = $this->input->post('jumlah_sakit');
		$jumlah_sisa_cuti = $this->input->post('jumlah_cuti_cuti');
		$jumlah_sisa_sakit = $this->input->post('jumlah_cuti_sakit');
		$jumlah_sisa_izin = $this->input->post('jumlah_cuti_izin');

		$data_jumlah_cuti = array(
			'jumlah_cuti'		=> $jumlah_cuti,
			'jumlah_izin'		=> $jumlah_izin,
			'jumlah_sakit'		=> $jumlah_sakit
		);

		$data_sisa_cuti = array(
			'jumlah_cuti_cuti'		=> $jumlah_sisa_cuti,
			'jumlah_cuti_izin'		=> $jumlah_sisa_izin,
			'jumlah_cuti_sakit'		=> $jumlah_sisa_sakit
		);

		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->kehadiran->update_jumlah_cuti($where, $data_jumlah_cuti);
		$this->kehadiran->update_sisa_cuti($where, $data_sisa_cuti);
	}
    
}