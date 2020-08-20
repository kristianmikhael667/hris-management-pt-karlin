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
	
	public function kosongkan_jumlah_cuti(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'hrd/kehadiran/list'
		);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
		$id = $this->input->get('id');
		$id_karyawan = $id;
		$data_kehadiran = array(
			'jumlah_cuti_tahunan'					=> 0,
			'jumlah_cuti_melahirkan'				=> 0,
		   	'jumlah_cuti_keluarga_meninggal'		=> 0,
		  	'jumlah_cuti_menikahkan_anak'			=> 0,
		    'jumlah_cuti_anak_khitan'				=> 0,
		    'jumlah_cuti_pembaptisan_anak'			=> 0,
			'jumlah_izin'							=> 0,
			'jumlah_sakit'							=> 0
		);
		
		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->kehadiran->update_jumlah_cuti($where, $data_kehadiran);
		redirect('hrd/kehadiran');
	}

	public function kosongkan_sisa_cuti(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'hrd/kehadiran/list'
		);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
		$id = $this->input->get('id');
		$id_karyawan = $id;
		$data_sisa_cuti = array(
			'jumlah_cuti_cuti_tahunan'					=> 0,
			'jumlah_cuti_cuti_melahirkan'				=> 0,
		   	'jumlah_cuti_cuti_keluarga_meninggal'		=> 0,
		  	'jumlah_cuti_cuti_menikahkan_anak'			=> 0,
		    'jumlah_cuti_cuti_anak_khitan'				=> 0,
		    'jumlah_cuti_cuti_pembaptisan_anak'			=> 0
		);
		
		$where = array(
			'id_karyawan' => $id_karyawan
		);

		$this->kehadiran->update_sisa_cuti($where, $data_sisa_cuti);
		redirect('hrd/kehadiran');
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

		//jumlah kehadiran pada tale kehadiran
		$jumlah_hadir		 			= $this->input->post('jumlah_hadir');
		$jumlah_cuti_tahunan 			= $this->input->post('jumlah_cuti_tahunan');
		$jumlah_cuti_melahirkan 		= $this->input->post('jumlah_cuti_melahirkan');
		$jumlah_cuti_keluarga_meninggal = $this->input->post('jumlah_cuti_keluarga_meninggal');
		$jumlah_cuti_menikahkan_anak	= $this->input->post('jumlah_cuti_menikahkan_anak');
		$jumlah_cuti_anak_khitan		= $this->input->post('jumlah_cuti_anak_khitan');
		$jumlah_cuti_pembaptisan_anak	= $this->input->post('jumlah_cuti_pembaptisan_anak');
		$jumlah_izin					= $this->input->post('jumlah_izin');
		$jumlah_sakit					= $this->input->post('jumlah_sakit');
		
		//jumlah sisa cuti pada table jumlah cuti
		$jumlah_cuti_cuti_tahunan 				= $this->input->post('jumlah_cuti_cuti_tahunan');
		$jumlah_cuti_cuti_melahirkan 			= $this->input->post('jumlah_cuti_cuti_melahirkan');
		$jumlah_cuti_cuti_keluarga_meninggal 	= $this->input->post('jumlah_cuti_cuti_keluarga_meninggal');
		$jumlah_cuti_cuti_menikahkan_anak		= $this->input->post('jumlah_cuti_cuti_menikahkan_anak');
		$jumlah_cuti_cuti_anak_khitan			= $this->input->post('jumlah_cuti_cuti_anak_khitan');
		$jumlah_cuti_cuti_pembaptisan_anak		= $this->input->post('jumlah_cuti_cuti_pembaptisan_anak');

		$data_kehadiran = array(
			'jumlah_hadir'							=> $jumlah_hadir,
			'jumlah_cuti_tahunan'					=> $jumlah_cuti_tahunan,
			'jumlah_cuti_melahirkan'				=> $jumlah_cuti_melahirkan,
		   	'jumlah_cuti_keluarga_meninggal'		=> $jumlah_cuti_keluarga_meninggal,
		  	'jumlah_cuti_menikahkan_anak'			=> $jumlah_cuti_menikahkan_anak,
		    'jumlah_cuti_anak_khitan'				=> $jumlah_cuti_cuti_anak_khitan,
		    'jumlah_cuti_pembaptisan_anak'			=> $jumlah_cuti_cuti_pembaptisan_anak,
			'jumlah_izin'							=> $jumlah_izin,
			'jumlah_sakit'							=> $jumlah_sakit
		);

		$data_sisa_cuti = array(
			'jumlah_cuti_cuti_tahunan'					=> $jumlah_cuti_cuti_tahunan,
			'jumlah_cuti_cuti_melahirkan'				=> $jumlah_cuti_cuti_melahirkan,
		   	'jumlah_cuti_cuti_keluarga_meninggal'		=> $jumlah_cuti_cuti_keluarga_meninggal,
		  	'jumlah_cuti_cuti_menikahkan_anak'			=> $jumlah_cuti_cuti_menikahkan_anak,
		    'jumlah_cuti_cuti_anak_khitan'				=> $jumlah_cuti_cuti_anak_khitan,
		    'jumlah_cuti_cuti_pembaptisan_anak'			=> $jumlah_cuti_cuti_pembaptisan_anak
		);
		
		$where = array(
			'id_karyawan' => $id_karyawan
		);


		$this->kehadiran->update_jumlah_cuti($where, $data_kehadiran);
		$this->kehadiran->update_sisa_cuti($where, $data_sisa_cuti);

		
	}
    
}