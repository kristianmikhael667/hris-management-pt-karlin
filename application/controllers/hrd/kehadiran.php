<?php

class Kehadiran extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Kehadiran_m', 'kehadiran');
		$this->load->model('model_auth', 'modelauth');
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
					  'content' => 'hrd/kehadiran/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
    }
	
	public function delete()
	{		
			//$data = array('title' => 'Data Karyawan',
					  //'content' => 'user/tabelbarang/list'
					 //);
            //$id = $this->input->get('id');
			//$where = array('id_karyawan' => $id);

			//$this->manajemenbarang->jumlahdatabarang($where);
			//$this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
			$id = $this->input->get('id');
			$this->kehadiran->delete($id);
			//$this->manajemenbarang->deletecase($id);

		//	$this->session->set_flashdata('success','Item Berhasil Di Hapus');
			redirect(base_url('hrd/kehadiran/index'));
			// redirect buat pindah ke halaman awalnya

			//atau bisa juga make

			redirect($_SERVER['HTTP_REFERER']);
	}
    
}