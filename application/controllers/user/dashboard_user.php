<?php

class Dashboard_user extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Karyawan', 'karyawan');
		$this->load->library('session');
		$this->load->library('upload');
    }

    public function index()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'user/karyawan/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}
	
	public function add(){
		$data = array('title' => 'Add Karyawan',
					  'content' => 'user/karyawan/add'
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
				$nama_karyawan		= $this->input->post('nama_karyawan');
				$jenis_kelamin		= $this->input->post('jenis_kelamin');
				$kode_bagian		= $this->input->post('kode_bagian');
				$alamat				= $this->input->post('alamat');
				$nomor_telepon		= $this->input->post('nomor_telepon');
				$email				= $this->input->post('email');
				$tanggal_lahir		= $this->input->post('tanggal_lahir');
				$password			= sha1($this->input->post('password'));
				$role_id			= $this->input->post('role_id');
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
							'role_id'			=> $role_id,
							'foto'				=> $foto
						);
						$this->karyawan->add_employe($data_user);
						echo "<script>alert('UPLOAD DATA BERHASIL')</script>";
					}
			}
		}
		
	}

	
}