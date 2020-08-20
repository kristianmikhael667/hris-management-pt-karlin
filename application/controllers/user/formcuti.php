<?php

class Formcuti extends CI_Controller{

	public function __construct(){
        parent::__construct();
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

		$chek_pengajuan	= $this->formcuti->check_sisa_pengajuan($id_karyawan);
		$data_pengajuan			=	$chek_pengajuan->row_array();

		if($data['jumlah_cuti_pertahun'] >= $data_pengajuan['jumlah_cuti_cuti_tahunan']){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_tahunan'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
			redirect('user/formcuti/index');
		}

		if($data['jumlah_cuti_melahirkan'] >= $data_pengajuan['jumlah_cuti_cuti_melahirkan']){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_melahirkan'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
			redirect('user/formcuti/index');
		}

		else{
			
			

			if($jenis_cuti == "Cuti Melahirkan"){ //cuti melahirkan
				$data_cuti = array(
					'mulai_cuti'	=> $mulai_cuti,
					'akhir_cuti'    => $akhir_cuti,
					'jenis_cuti' 	=> $jenis_cuti,
					'alasan'		=> $alasan,
					'id_karyawan'	=> $id_karyawan
					);
	
					
					$date1				= $mulai_cuti; //tanggal mulai
					$date2				= $akhir_cuti; //tanggal akhir
					$diff 				= abs(strtotime($date2) - strtotime($date1));
					$years				= floor($diff / (365*60*60*24));
					$months 			= floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days 				= floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					
					
					$sisa_cuti_melahirkan 	= $data_pengajuan['jumlah_cuti_cuti_melahirkan'] - $days;
					$update_sisa_cuti_melahirkan 	= array(
						'jumlah_cuti_cuti_melahirkan' => $sisa_cuti_melahirkan
					);

					$cuti_melahirkan 	= $data['jumlah_cuti_melahirkan'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_cuti_melahirkan' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_sisa_pengajuan($where, $update_sisa_cuti_melahirkan);
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			
			
			
		}

		
	
	
	
	}

	
	
    
}