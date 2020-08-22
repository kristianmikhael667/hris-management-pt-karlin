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
		
		$ketentuan_cuti_tahunan					= $data_pengajuan['jumlah_cuti_cuti_tahunan'] <= 0;
		$ketentuan_cuti_melahirkan				= $data_pengajuan['jumlah_cuti_cuti_melahirkan'] <= 0;
		$ketentuan_cuti_keluarga_meninggal 		= $data_pengajuan['jumlah_cuti_cuti_keluarga_meninggal'] <= 0;
		$ketentuan_cuti_menikahkan_anak			= $data_pengajuan['jumlah_cuti_cuti_menikahkan_anak'] <= 0;
		$ketentuan_cuti_anak_khitan				= $data_pengajuan['jumlah_cuti_cuti_anak_khitan'] <= 0;
		$ketentuan_cuti_cuti_pembaptisan_anak	= $data_pengajuan['jumlah_cuti_cuti_pembaptisan_anak'] <= 0;
		if($ketentuan_cuti_tahunan || $ketentuan_cuti_melahirkan || $ketentuan_cuti_keluarga_meninggal || $ketentuan_cuti_menikahkan_anak || $ketentuan_cuti_anak_khitan || $ketentuan_cuti_cuti_pembaptisan_anak){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf Jumlah Cuti Anda Sudah Melebihi 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
			redirect('user/formcuti/index');
		}

		// else if($data_pengajuan['jumlah_cuti_cuti_melahirkan'] <= 0){
		// 	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_melahirkan'] . '
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>');
		// 	redirect('user/formcuti/index');
		// }

		// else if($data_pengajuan['jumlah_cuti_cuti_keluarga_meninggal'] <= 0){
		// 	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_melahirkan'] . '
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>');
		// 	redirect('user/formcuti/index');
		// }

		// else if($data_pengajuan['jumlah_cuti_cuti_menikahkan_anak'] <= 0){
		// 	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_melahirkan'] . '
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>');
		// 	redirect('user/formcuti/index');
		// }

		// else if($data_pengajuan['jumlah_cuti_cuti_anak_khitan'] <= 0){
		// 	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_melahirkan'] . '
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>');
		// 	redirect('user/formcuti/index');
		// }

		// else if($data_pengajuan['jumlah_cuti_cuti_pembaptisan_anak'] <= 0){
		// 	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 Maaf Jumlah Cuti Anda Sudah Melebihi ' . $data_pengajuan['jumlah_cuti_cuti_melahirkan'] . '
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>');
		// 	redirect('user/formcuti/index');
		// }



		else{
			
			
			if($jenis_cuti == "Cuti Tahunan"){ //cuti Tahunan
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
					
					
					$sisa_cuti_tahunan 	= $data_pengajuan['jumlah_cuti_cuti_tahunan'] - $days;
					$update_sisa_cuti_tahunan 	= array(
						'jumlah_cuti_cuti_tahunan' => $sisa_cuti_tahunan
					);

					$cuti_tahunan 	= $data['jumlah_cuti_tahunan'] + $days;
					$tambah_cuti_tahunan 	= array(
						'jumlah_cuti_tahunan' => $cuti_tahunan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_sisa_pengajuan($where, $update_sisa_cuti_tahunan);
					$this->formcuti->update_kehadiran($where, $tambah_cuti_tahunan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

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

			if($jenis_cuti == "Cuti Keluarga Meninggal"){ //cuti keluarga meninggal
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
					
					
					$sisa_cuti_melahirkan 	= $data_pengajuan['jumlah_cuti_cuti_keluarga_meninggal'] - $days;
					$update_sisa_cuti_melahirkan 	= array(
						'jumlah_cuti_cuti_keluarga_meninggal' => $sisa_cuti_melahirkan
					);

					$cuti_melahirkan 	= $data['jumlah_cuti_keluarga_meninggal'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_cuti_keluarga_meninggal' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_sisa_pengajuan($where, $update_sisa_cuti_melahirkan);
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			if($jenis_cuti == "Cuti Menikahkan Anak"){ //cuti pernikahan anak
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
					
					
					$sisa_cuti_melahirkan 	= $data_pengajuan['jumlah_cuti_cuti_menikahkan_anak'] - $days;
					$update_sisa_cuti_melahirkan 	= array(
						'jumlah_cuti_cuti_menikahkan_anak' => $sisa_cuti_melahirkan
					);

					$cuti_melahirkan 	= $data['jumlah_cuti_menikahkan_anak'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_cuti_menikahkan_anak' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_sisa_pengajuan($where, $update_sisa_cuti_melahirkan);
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			if($jenis_cuti == "Cuti Anak Khitan"){ //cuti anak sunatan
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
					
					
					$sisa_cuti_melahirkan 	= $data_pengajuan['jumlah_cuti_cuti_anak_khitan'] - $days;
					$update_sisa_cuti_melahirkan 	= array(
						'jumlah_cuti_cuti_anak_khitan' => $sisa_cuti_melahirkan
					);

					$cuti_melahirkan 	= $data['jumlah_cuti_anak_khitan'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_cuti_anak_khitan' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_sisa_pengajuan($where, $update_sisa_cuti_melahirkan);
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			if($jenis_cuti == "Cuti Pembaptisan Anak"){ //cuti anak baptisan
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
					
					
					$sisa_cuti_melahirkan 	= $data_pengajuan['jumlah_cuti_cuti_pembaptisan_anak'] - $days;
					$update_sisa_cuti_melahirkan 	= array(
						'jumlah_cuti_cuti_pembaptisan_anak' => $sisa_cuti_melahirkan
					);

					$cuti_melahirkan 	= $data['jumlah_cuti_pembaptisan_anak'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_cuti_pembaptisan_anak' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_sisa_pengajuan($where, $update_sisa_cuti_melahirkan);
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			if($jenis_cuti == "Izin"){ //izin
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

					$cuti_melahirkan 	= $data['jumlah_izin'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_izin' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}

			if($jenis_cuti == "Sakit"){ //izin
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

					$cuti_melahirkan 	= $data['jumlah_sakit'] + $days;
					$tambah_cuti_melahirkan 	= array(
						'jumlah_sakit' => $cuti_melahirkan
					);

					$where = array(
						'id_karyawan' => $id_karyawan
					);
	
					$this->formcuti->update_kehadiran($where, $tambah_cuti_melahirkan);
					$this->formcuti->input_data($data_cuti,'tbl_cuti');
					redirect('user/formcuti/index');
			}
			
			
		}

		
	
	
	
	}

	
	
    
}