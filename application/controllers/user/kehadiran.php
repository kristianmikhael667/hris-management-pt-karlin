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

		date_default_timezone_set('Asia/Jakarta');
		$tanggal_absen = date('Y-m-d');
		$jam_absen = date('H:i:s');
		$update_hadir = $this->kehadiran->chack_kehadiran($id);
		$data_hadir  =	$update_hadir->row_array();

		$ip_address = $_SERVER['REMOTE_ADDR'];
		//get user ip address details with geoplugin.net
		$geopluginURL = 'http://www.geoplugin.net/php.gp?id='.$ip_address;
		$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
		//get city name by return array
		$city = $addrDetailsArr['geoplugin_city'];
		//get country name by return array
		$country = $addrDetailsArr['geoplugin_countryName'];

		$cek_absensi = $this->kehadiran->cek_data_hadir($id, $tanggal_absen);
		$cek_data_absensi = $cek_absensi->num_rows();
		if($cek_data_absensi > 0){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show alert-mt-3" role="alert">
							Anda Sudah Absen Hari Ini
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


			$data_insert_absen = array(
				'id_karyawan'	        => $id,
				'tanggal_masuk'	        => $tanggal_absen,
				'jam_masuk'   			=> $jam_absen,
				'lokasi'			 	=> $addrDetailsArr['geoplugin_city'].$addrDetailsArr['geoplugin_region'].$country
				);

			$this->kehadiran->insert_absen($data_insert_absen, 'tbl_absen');
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