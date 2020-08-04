<?php

class Kehadiran extends CI_Controller{

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
	
	
	public function absen(){
		$id = $this->session->userdata('id_karyawan');
		$jumlah_hadir = $this->input->post('jumlah_hadir');

		$update_hadir = $this->kehadiran->chack_kehadiran($id);
		$data_hadir  =	$update_hadir->row_array();

		//$update_hadir = chack_kehadiran($id);
		//$data_hadir = row_array();

		$tgl_sekarang=date("Y-m-d");//tanggal sekarang
            $tgl_mulai=date("Y-m-d");// tanggal launching aplikasi
            $jangka_waktu = strtotime('+1 days', strtotime($tgl_mulai));// jangka waktu + 365 hari
            $tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired
            if (($tgl_sekarang > $tgl_exp ))
            {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show alert-mt-3" role="alert">
							Anda Sudah Absen GBLK
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
		redirect('user/absen/index');
		}
		else{
			
		$update = $data_hadir['jumlah_hadir']+1;
		$data = array(
			'jumlah_hadir'		=> $update
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->kehadiran->update_data($where,$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show alert-mt-3" role="alert">
							Absensi Berhasil, Silahkan Cek di Record Kehadiran. Jumlah Hadir : ' . $data_hadir['jumlah_hadir'] . '
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>');
			redirect('user/absen/index');
		}
	}
    
}