<?php

class Profile extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '3'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda Belum Login HRD!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('auth/login');
		}
		$this->load->model('models_user/Karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 3) ){
			redirect('login/login');
		}
    }

    public function index()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'user/profile/profile'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}
	
	public function edit(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'user/profile/profile'
		);
		$this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
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
				$password			= sha1($this->input->post('password'));
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