<?php

class Medicalreimbust extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Medical_m', 'medical');
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
					  'content' => 'hrd/medical_reimburstment/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
	}
	
	public function delete()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'hrd/medical_reimburstment/list'
					 );				
		//  //$where = array('id_karyawan' => $id);
		//  $this->karyawan->delete($id);
					 
		$id = $this->input->get('id');
				
		$this->karyawan->delete($id);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);	
	}

	public function edit(){
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
				$klaim_id			= $this->input->post('klaim_id');
				$tanggal_pengajuan	= $this->input->post('tanggal_pengajuan');
				$status_pengajuan	= $this->input->post('status_pengajuan');
				$tanggal_disetujui	= $this->input->post('tanggal_disetujui');
				$jumlah_diajukan	= $this->input->post('jumlah_diajukan');
				$jumlah_disetujui	= $this->input->post('jumlah_disetujui');
				$ket				= $this->input->post('ket');
				
				$config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$foto 					= $gbr['file_name'];
				$data_medical_reimburstment = array(
					'id_karyawan'		=> $id_karyawan,
					'klaim_id'			=> $klaim_id,
					'tanggal_pengajuan'	=> $tanggal_pengajuan,
					'status_pengajuan'	=> $status_pengajuan,
					'tanggal_disetujui'	=> $tanggal_disetujui,
					'jumlah_diajukan'	=> $jumlah_diajukan,
					'jumlah_disetujui'	=> $jumlah_disetujui,
					'struck'			=> $foto,
					'ket'				=> $ket
				);
				$where = array(
					'id_karyawan' => $id_karyawan
				);
				$this->karyawan->edit($where, $data_medical_reimburstment);
				//echo "<script>alert('Berhasil mengupload data')</script>";
			
			}
		}
		else{
			
			$id_karyawan		= $this->input->post('id_karyawan');
			$klaim_id			= $this->input->post('klaim_id');
			$tanggal_pengajuan	= $this->input->post('tanggal_pengajuan');
			$status_pengajuan	= $this->input->post('status_pengajuan');
			$tanggal_disetujui	= $this->input->post('tanggal_disetujui');
			$jumlah_diajukan	= $this->input->post('jumlah_diajukan');
			$jumlah_disetujui	= $this->input->post('jumlah_disetujui');
			$ket				= $this->input->post('ket');
			
			$config['image_library']='gd2';
			$config['source_image']='./assets/images/'.$gbr['file_name'];
			$config['new_image']= './assets/images/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$foto 					= $gbr['file_name'];
			$data_medical_reimburstment = array(
				'id_karyawan'		=> $id_karyawan,
				'klaim_id'			=> $klaim_id,
				'tanggal_pengajuan'	=> $tanggal_pengajuan,
				'status_pengajuan'	=> $status_pengajuan,
				'tanggal_disetujui'	=> $tanggal_disetujui,
				'jumlah_diajukan'	=> $jumlah_diajukan,
				'jumlah_disetujui'	=> $jumlah_disetujui,
				'struck'			=> $foto,
				'ket'				=> $ket
			);
			$where = array(
				'id_karyawan' => $id_karyawan
			);
			$this->karyawan->edit($where, $data_medical_reimburstment);
			//echo "<script>alert('Berhasil mengupload data')</script>";
			
		}
		
	}


}