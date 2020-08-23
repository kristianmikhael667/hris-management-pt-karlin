<?php

class Uangtransport extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Uang_transport_m', 'uang_transport');
		$this->load->model('models_hrd/Karyawan', 'karyawan');
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
					  'content' => 'hrd/uang_transport/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);
	}

	public function add()
	{
		$id_karyawan = $this->input->post('id_karyawan');
		$tanggal = $this->input->post('tanggal');
		$uang_bensin = $this->input->post('uang_bensin');
		$uang_parkir = $this->input->post('uang_parkir');
		$status = $this->input->post('status');
		$data = array(
			'id_karyawan'	=> $id_karyawan,
			'tanggal'		=> $tanggal,
			'uang_bensin'   => $uang_bensin,
			'uang_parkir'	=> $uang_parkir,
			'status'		=> 'Menunggu'
			);
		$this->uang_transport->add_transportasi($data,'tbl_transportasi');
		redirect('hrd/uangtransport/index');
	}

	function add_transportasi($data){
		$this->db->insert('tbl_transportasi',$data);
	}

	public function update(){
		$id = $this->input->post('id_karyawan');
		$tanggal = $this->input->post('tanggal');
		$uang_bensin = $this->input->post('uang_bensin');
		$uang_parkir = $this->input->post('uang_parkir');

		$data = array(
			'id_karyawan'		=> $id,
			'tanggal'			=> $tanggal,
			'uang_bensin'		=> $uang_bensin,
			'uang_parkir'		=> $uang_parkir
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->uang_transport->update_data($where,$data, 'tbl_transportasi');
		redirect('hrd/uangtransport/index');
	}

	public function delete()
	{
		$id = $this->input->get('id');
		$where = array('id_karyawan' => $id);
		$this->uang_transport->delete($where);
		$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);	
		redirect('hrd/uangtransport/index');
	}
}