<?php

class Formcuti extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/formcuti_m', 'formcuti');
		$this->load->model('models_user/formcuti_m', 'formcuti');
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
					  'content' => 'user/formcuti/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
    }

    public function add()
	{
		$id_karyawan = $this->input->post('id_karyawan');
		$mulai_cuti  = $this->input->post('mulai_cuti');
		$akhir_cuti  = $this->input->post('akhir_cuti');
		$jenis_cuti  = $this->input->post('jenis_cuti');
		$alasan 	 = $this->input->post('alasan');

		

		$chek_kehadiran	= $this->kehadiran->chack_kehadiran($id_karyawan);
		$data			=	$chek_kehadiran->row_array();
		if($data['jumlah_cuti'] >= 6){
			echo "<script>alert('batas cuti anda sudah habis')</script>"; //belum kebaca
			redirect('user/formcuti/index');
		}

		else{

			if($jenis_cuti = 1){ //cuti
				$data = array(
					'mulai_cuti'	=> $mulai_cuti,
					'akhir_cuti'    => $akhir_cuti,
					'jenis_cuti' 	=> $jenis_cuti,
					'alasan'		=> $alasan,
					'id_karyawan'	=> $id_karyawan
					);
	
					$chek_kehadiran1	= $this->kehadiran->chack_kehadiran($id_karyawan);
					$data1				= $chek_kehadiran->row_array();

					$date1				= $mulai_cuti; //tanggal mulai
					$date2				= $akhir_cuti; //tanggal akhir
					$diff 				= abs(strtotime($date2) - strtotime($date1));
					$years				= floor($diff / (365*60*60*24));
					$months 			= floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days 				= floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					
					$cuti 				= $data1['jumlah_cuti'] + $days;
					$update_cuti = array(
						'jumlah_cuti' => $cuti
					);
					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_kehadiran($where, $update_cuti);
	
					$this->formcuti->input_data($data,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			else if($jenis_cuti = 2){ //jika cuti izin
				$data = array(
					'mulai_cuti'	=> $mulai_cuti,
					'akhir_cuti'    => $akhir_cuti,
					'jenis_cuti' 	=> $jenis_cuti,
					'alasan'		=> $alasan,
					'id_karyawan'	=> $id_karyawan
					);
	
					$chek_kehadiran1	= $this->kehadiran->chack_kehadiran($id_karyawan);
					$data1				= $chek_kehadiran->row_array();

					$chek_kehadiran1	= $this->kehadiran->chack_kehadiran($id_karyawan);
					$data1				= $chek_kehadiran->row_array();

					$date1				= $mulai_cuti; //tanggal mulai
					$date2				= $akhir_cuti; //tanggal akhir
					$diff 				= abs(strtotime($date2) - strtotime($date1));
					$years 				= floor($diff / (365*60*60*24));
					$months 			= floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days 				= floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					
					$cuti 	= 	$data1['jumlah_izin'] + $days;
					$update_cuti = array(
						'jumlah_cuti' => $cuti
					);
					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_kehadiran($where, $update_cuti);
	
					$this->formcuti->input_data($data,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			else if($jenis_cuti = 3){ //jika cuti sakit
				$data = array(
					'mulai_cuti'	=> $mulai_cuti,
					'akhir_cuti'    => $akhir_cuti,
					'jenis_cuti' 	=> $jenis_cuti,
					'alasan'		=> $alasan,
					'id_karyawan'	=> $id_karyawan
					);
	
					$chek_kehadiran1	= $this->kehadiran->chack_kehadiran($id_karyawan);
					$data1				=	$chek_kehadiran->row_array();

					$date1				= $mulai_cuti; //tanggal mulai
					$date2				= $akhir_cuti; //tanggal akhir
					$diff 				= abs(strtotime($date2) - strtotime($date1));
					$years 				= floor($diff / (365*60*60*24));
					$months 			= floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days 				= floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

					$cuti = $data1['jumlah_sakit'] + $days;
					$update_cuti = array(
						'jumlah_cuti' => $cuti
					);
					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_kehadiran($where, $update_cuti);
	
					$this->formcuti->input_data($data,'tbl_cuti');
					redirect('user/formcuti/index');
			}
			
			
		}

		
	
	
	
	}

	
	
    
}