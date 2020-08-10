<?php

class Dashboard_hrd extends CI_Controller{

	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda Belum Login HRD!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('auth/login');
		}
		$this->load->model('models_hrd/Karyawan', 'karyawan');
		$this->load->model('models_hrd/Kehadiran_m', 'kehadiran');
		$this->load->model('models_hrd/Medical_m', 'medical');
		$this->load->model('models_hrd/Pengajuancuti_m', 'cuti');
		$this->load->model('models_hrd/Perjalanan_dinas_m', 'perjalanandinas');
		$this->load->model('models_hrd/Uang_transport_m', 'uang');
		$this->load->model('models_user/Formcuti_m', 'formcuti');
		$this->load->model('models_user/Formdinas_m', 'formdinas');
		$this->load->model('models_user/manajemenbarang_m', 'manage');
		$this->load->model('models_user/Formpurchase_m', 'purch');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 2) ){
			redirect('login/login');
		}
		
    }

    public function index()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'hrd/karyawan/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
	}

	public function delete()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'hrd/karyawan/list'
					 );
					
					
					//  //$where = array('id_karyawan' => $id);
					//  $this->karyawan->delete($id);

					 
					$id = $this->input->get('id');
				
					$this->karyawan->delete($id);
					$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);	
	}

	public function add(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'hrd/karyawan/add'
		);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
		$config['max_size']             = 7000;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$this->upload->initialize($config);

		if(!empty($_FILES['filefoto']['name'])){
			if ($this->upload->do_upload('filefoto')){ //nama fiel yg ada diview
				$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/karyawan/'.$gbr['file_name'];
	            $config['new_image']= './assets/images/karyawan/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
				$id_karyawan		= $this->input->post('id_karyawan');
				//$nomor_sppd			= $this->input->post('nomor_sppd');
				$nama_karyawan		= $this->input->post('nama_karyawan');
				$jenis_kelamin		= $this->input->post('jenis_kelamin');
				$kode_bagian		= $this->input->post('kode_bagian');
				$alamat				= $this->input->post('alamat');
				$nomor_telepon		= $this->input->post('nomor_telepon');
				$email				= $this->input->post('email');
				$tanggal_lahir		= $this->input->post('tanggal_lahir');
				$password			= $this->input->post('password');
				$status				= $this->input->post('status');
				$role_id			= 3;
				$foto 				= $gbr['file_name'];
				$cek_employe 		= $this->karyawan->check_employe($id_karyawan);
				$cek_data_employe 	= $cek_employe->num_rows();
					if($cek_data_employe > 0){
						foreach($cek_employe->result_array() as $row){
							echo "<script>alert('ID KARYAWAN".$row['id_karyawan']." sudah didaftarkan ')</script>";
						}
					}
					else{
						$data_user = array(
							'id_karyawan'		=> $id_karyawan,
							'nama_karyawan'		=> $nama_karyawan,
							'jenis_kelamin'		=> $jenis_kelamin,
							'kode_bagian'		=> $kode_bagian,
							'alamat'			=> $alamat,
							'nomor_telepon'		=> $nomor_telepon,
							'email'				=> $email,
							'tanggal_lahir'		=> $tanggal_lahir,
							'password'			=> $password,
							'status'			=> $status,
							'role_id'			=> 3,
							'foto'				=> $foto
						);
						$this->karyawan->add_employe($data_user);  //tbl_karyawan

						// // $datasetuju = array(
						// // 	'status'	=> $status
						// // );
						// // $this->karyawan->persetujuan('tbl_karyawan',$datasetuju);

						 $data_hadir = array(
						 	'id_karyawan'		=> $id_karyawan,
						 	'jumlah_hadir'		=> 0,
						 	'jumlah_cuti'		=> 0,
						 	'jumlah_izin'		=> 0,
						 	'jumlah_sakit'		=> 0
						 );
						 $this->kehadiran->add_kehadiran($data_hadir); //tbl_kehadiran

						// $data_medical = array(
						// 	'id_karyawan'		=> $id_karyawan,
						// 	'klaim_id'		=> '',
						// 	'tanggal_pengajuan'		=> '',
						// 	'status_pengajuan'		=> '',
						// 	'tanggal_disetujui'		=> '',
						// 	'jumlah_diajukan'		=> 0,
						// 	'jumlah_disetujui'		=> 0,
						// 	'struck'		=> '',
						// 	'ket'		=> ''
						// );
						// $this->medical->add_medical($data_medical); //tbl_medical

						$data_jml_cuti = array(
						 	'id_karyawan'		=> $id_karyawan,
						 	'jumlah_cuti_cuti'		=> 7,
						 	'jumlah_cuti_izin'		=> 7,
						 	'jumlah_cuti_sakit'		=> 7
						 );
						 $this->cuti->add_cuti($data_jml_cuti); //tbl_jumlah_cuti

						// // $perjalanan_dinas = array(
						// // 	'nomor_sppd'		=> $nomor_sppd,
						// // 	'tanggal'		=> '',
						// // 	'biaya_transportasi'		=> 0,
						// // 	'ket'	=> '',
						// // 	'uang_makan'		=> 0,
						// // 	'status'	=> ''
						// // );
						// // $this->perjalanandinas->input_data($perjalanan_dinas); //tbl_perjalanan_dinas

						// $uang_tr = array(
						// 	'id_karyawan'		=> $id_karyawan,
						// 	'uang_bensin'		=> 0,
						// 	'uang_parkir'		=> 0,
						// 	'status'	=> ''
						// );
						// $this->uang->add_transportasi($uang_tr); //tbl_transportasi

						// // $form = array(
						// // 	'mulai_cuti'		=> '',
						// // 	'akhir_cuti'		=> '',
						// // 	'jenis_cuti'		=> '',
						// // 	'alasan'	=> ''
						// // );
						// // $this->formcuti->input_data($form); //tbl_cuti

						// $forum = array(
						// 	'id_karyawan'		=> $id_karyawan,
						// 	'nomor_sppd'		=> 0,
						// 	'tgl_keberangkatan'		=> '',
						// 	'bln_keberangkatan'		=> '',
						// 	'tujuan'		=> '',
						// 	'alasan'	=> '',
						// 	'status'		=> ''
						// );
						// $this->formdinas->input_data($forum); //tbl_dinas

						// // $manage = array(
						// // 	'id_purchase_request'		=> $id_purchase_request,
						// // 	'id_barang'		=> $id_barang,
						// // 	'nama_barang'		=> '',
						// // 	'harga'		=> '',
						// // 	'status'		=> ''
						// // );
						// // $this->manage->input_data($manage); //tbl_manage_barang

						// $purcase = array(
						// 	'id_karyawan'		=> $id_karyawan,
						// 	'id_purchase_request'		=> 0,
						// 	'tgl_permintaan'		=> '',
						// 	'keterangan'		=> ''

						// );
						// $this->purch->input_data($purcase); //tbl_purcase_request

						// $absen = array(
						// 	'id_karyawan'		=> $id_karyawan,
						// 	'tanggal_masuk'		=> '',
						// 	'jam_masuk'		=> '',
						// 	'lokasi'		=> ''
						// );
						// $this->kehadiran->hadir($absen); //tbl_absen

						echo "<script>alert('UPLOAD DATA BERHASIL')</script>";
					}
			}
		}
		
	}
	
	public function edit(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'hrd/karyawan/edit'
		);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
		$id = $this->input->get('id');
		


		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
		$config['max_size']             = 7000;
		$config['max_width']            = 0;
		$config['max_height']           = 0;

		

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
			if ($this->upload->do_upload('filefoto')){
				$gbr = $this->upload->data();
				$id_karyawan		= $this->input->post('id_karyawan');
				$nama_karyawan		= $this->input->post('nama_karyawan');
				$jenis_kelamin		= $this->input->post('jenis_kelamin');
				$kode_bagian		= $this->input->post('kode_bagian');
				$alamat				= $this->input->post('alamat');
				$nomor_telepon		= $this->input->post('nomor_telepon');
				$email				= $this->input->post('email');
				$tanggal_lahir		= $this->input->post('tanggal_lahir');
				$password			= $this->input->post('password');
				$status				= $this->input->post('status');
				$role_id			= $this->input->post('role_id');
				$config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$foto 				= $gbr['file_name'];
				$data_user1 = array(
					'nama_karyawan'		=> $nama_karyawan,
					'jenis_kelamin'		=> $jenis_kelamin,
					'kode_bagian'		=> $kode_bagian,
					'alamat'			=> $alamat,
					'nomor_telepon'		=> $nomor_telepon,
					'email'				=> $email,
					'tanggal_lahir'		=> $tanggal_lahir,
					'password'			=> $password,
					'status'			=> $status,
					'role_id'			=> $role_id,
					'foto'				=> $foto
				);
				$where = array(
					'id_karyawan' => $id_karyawan
				);
				$this->karyawan->edit($where, $data_user1);
				//echo "<script>alert('Berhasil mengupload data')</script>";
			
			}
		}
		else{
			
		$id_karyawan		= $this->input->post('id_karyawan');
		$nama_karyawan		= $this->input->post('nama_karyawan');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$kode_bagian		= $this->input->post('kode_bagian');
		$alamat				= $this->input->post('alamat');
		$nomor_telepon		= $this->input->post('nomor_telepon');
		$email				= $this->input->post('email');
		$tanggal_lahir		= $this->input->post('tanggal_lahir');
		$password			= sha1($this->input->post('password'));
		$status				= $this->input->post('status');
		$role_id			= $this->input->post('role_id');	
			$data_user1 = array(
				'nama_karyawan'		=> $nama_karyawan,
				'jenis_kelamin'		=> $jenis_kelamin,
				'kode_bagian'		=> $kode_bagian,
				'alamat'			=> $alamat,
				'nomor_telepon'		=> $nomor_telepon,
				'email'				=> $email,
				'tanggal_lahir'		=> $tanggal_lahir,
				'password'			=> $password,
				'status'			=> $status,
				'role_id'			=> $role_id
			);
			$where = array(
				'id_karyawan' => $id_karyawan
			);
			$this->karyawan->edit($where, $data_user1);
			//echo "<script>alert('Berhasil mengupload data')</script>";
			
		}

	        
				
	}

	
}