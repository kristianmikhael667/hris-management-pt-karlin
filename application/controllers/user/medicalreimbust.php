<?php

class Medicalreimbust extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/Medical_m', 'medical');
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
					  'content' => 'user/medical_reimburstment/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}

		
	
	public function add(){
		
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
				$klaim_id			= $this->input->post('klaim_id');			
                date_default_timezone_set('Asia/Jakarta');
				$tanggal_pengajuan	=  date("Y-m-j");
				$status_pengajuan	= "menunggu";    
				$tanggal_disetujui 	= "-";       
				$jumlah_diajukan	= $this->input->post('jumlah_diajukan');
				$jumlah_disetujui	= "-";
				$ket				= $this->input->post('keterangan');
				$struck 				= $gbr['file_name'];
				$cek_claim_id 		= $this->medical->check_claim_id($klaim_id);
				$cek_data_claim_id 	= $cek_claim_id->num_rows();
					if($cek_data_claim_id > 0){
						foreach($cek_claim_id->result_array() as $row){
							echo "<script>alert('NOMOR CLAIM ID ".$row['klaim_id']." sudah digunakan ')</script>";
						}
					}
					else{
						$data_user = array(
							'id_karyawan'		=> $id_karyawan,
							'klaim_id'			=> $klaim_id,
							'tanggal_pengajuan'	=> $tanggal_pengajuan,
							'status_pengajuan'	=> $status_pengajuan,
							'tanggal_disetujui'	=> $tanggal_disetujui,
							'jumlah_diajukan'	=> $jumlah_diajukan,
							'jumlah_disetujui'	=> $jumlah_disetujui,
							'struck'			=> $struck,
							'ket'				=> $ket
						);
						$this->medical->add($data_user);
						echo "<script>alert('UPLOAD DATA BERHASIL')</script>";
					}
			}
		}
	}
}