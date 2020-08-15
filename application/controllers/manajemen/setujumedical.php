<?php

class Setujumedical extends CI_Controller{


	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Medical_m', 'medical');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		if( ($this->session->userdata('id_karyawan') == null) && ($this->session->userdata('role_id') != 1) ){
			redirect('login/login');
		}
	}

    public function index()
	{
		
		$data = array('title' => 'Setuju Medical',
					  'content' => 'manajemen/setujumedical/list'
                     );
                     
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
	}
	
	public function editt($id){
		$where = array('id_karyawan' => $id);
		$data['karyawan'] = $this->uang_transport->edit($where, 'tbl_transportasi')->result();
		$data = array('title' => '',
					  'content' => 'manajemen/setujuuangtr/list',
					  'list' => $this->medical->list()
                     );
                     
					 $this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);;
	}

	public function update(){
		$id = $this->input->post('id_karyawan');
		$tanggal_disetujui = $this->input->post('tanggal_disetujui');
		$jumlah_disetujui = $this->input->post('jumlah_disetujui');
		$status_pengajuan = $this->input->post('status_pengajuan');

		$data = array(
			'id_karyawan'		=> $id,
			'tanggal_disetujui'		=> $tanggal_disetujui,
			'jumlah_disetujui'		=> $jumlah_disetujui,
			'status_pengajuan'		=> $status_pengajuan
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->medical->update_data($where,$data, 'tbl_medical');
		redirect('manajemen/setujumedical/index');
	}

	public function excel(){
		$data = array( 'title' => 'Laporan Excel Persetujuan Medical',
		'list' => $this->medical->list());
		$this->load->view('manajemen/setujumedical/excel',$data);
	}

	public function edit(){
		$data = array('title' => 'Edit Medical',
					  'content' => 'manajemen/setujumedical/list'
		);
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);
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
				$klaim_id		= $this->input->post('klaim_id');
				$tanggal_pengajuan		= $this->input->post('tanggal_pengajuan');
				$jumlah_diajukan				= $this->input->post('jumlah_diajukan');
				$config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$gbr['file_name'];
	            $config['new_image']= './assets/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$foto 				= $gbr['file_name'];
				$ket				= $this->input->post('ket');
				$data_user1 = array(
					'klaim_id'				=> $klaim_id,
					'tanggal_pengajuan'		=> $tanggal_pengajuan,
					'jumlah_diajukan'		=> $jumlah_diajukan,
					'struck'				=> $foto,
					'ket'					=> $ket
				);
				$where = array(
					'id_karyawan' => $id_karyawan
				);
				$this->medical->edita($where, $data_user1);
				//echo "<script>alert('Berhasil mengupload data')</script>";
			
			}
		}
		else{
			$id_karyawan		= $this->input->post('id_karyawan');
			$klaim_id			= $this->input->post('klaim_id');
			$tanggal_pengajuan	= $this->input->post('tanggal_pengajuan');
			$jumlah_diajukan	= $this->input->post('jumlah_diajukan');
			$ket				= $this->input->post('ket');

			$data_user1 = array(
				'klaim_id'				=> $klaim_id,
				'tanggal_pengajuan'		=> $tanggal_pengajuan,
				'jumlah_diajukan'		=> $jumlah_diajukan,
				'ket'					=> $ket
			);
			$where = array(
				'id_karyawan' => $id_karyawan
			);
			$this->medical->edita($where, $data_user1);
			//echo "<script>alert('Berhasil mengupload data')</script>";
		}
	}

	public function delete(){
		$data = array('title' => 'Data Karyawan',
					  'content' => 'manajemen/setujumedical/list'
					 );
		$id = $this->input->get('id');
		$where = array('id_karyawan' => $id);
		$this->medical->delete($where);
		$this->load->view('tamplate_bootstrap_manajemen/wrapper', $data, FALSE);	
	}
}