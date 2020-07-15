<?php

class Manajemenbarang extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_user/manajemenbarang_m', 'manajemenbarang');
        $this->load->model('models_hrd/karyawan', 'karyawan');
		$this->load->model('models_user/formpurchase_m', 'formpurchase');
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
					  'content' => 'user/formpurchase/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
	}

	public function datapurchase()
	{
		$data = array('title' => '',
					  'content' => 'user/manajemenbarang/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
	}

	public function add()
	{
		$id_purchase_request = $this->input->post('id_purchase_request');
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');

		$data = array(
			'id_purchase_request'   => $id_purchase_request,
			'id_barang'   			=> $id_barang,
			'nama_barang'           => $nama_barang,
			'harga'                 => $harga
			);
		$this->manajemenbarang->input_data($data,'tbl_manage_barang');
		redirect('user/manajemenbarang/index');
	}

	public function delete()
	{
		$data = array('title' => 'Data Karyawan',
					  'content' => 'user/tabelbarang/list'
					 );
					
					$id = $this->input->get('id');
					$where = array('id_purchase_request' => $id);
					$this->manajemenbarang->deletecase($where);
					$this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
	}

	public function deletepurchase()
	{	
		$id = $this->input->get('id');

		$data1 = $this->manajemenbarang->jumlahdatabarang($id);
		$data2 = $this->db->last_query($data1);
		if (!($data2))
        {	
			$data = array('title' => 'Data Karyawan',
					  'content' => 'user/tabelbarang/list'
					 );
            $id = $this->input->get('id');
			$where = array('id_karyawan' => $id);

			$this->manajemenbarang->delete($where);
			$this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);

		}
		else{
			echo "<script>alert('Hapus Seluruh Data Barang Terlebih Dahulu')</script>";
            redirect('user/databarang/index', 'refresh');
		}
	}

	public function edit_purchase($id){
		$where = array('id_karyawan' => $id);
		$data['karyawan'] = $this->manajemenbarang->edit_barang($where, 'tbl_purcase_request')->result();
		$data = array('title' => '',
					  'content' => 'user/formpurchase/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
	}

	public function update(){
		$id = $this->input->post('id_karyawan');
		$tgl_permintaan = $this->input->post('tgl_permintaan');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_karyawan'		=> $id,
			'tgl_permintaan'	=> $tgl_permintaan,
			'keterangan'		=> $keterangan
		);

		$where = array(
			'id_karyawan' => $id
		);

		$this->manajemenbarang->update_data($where,$data, 'tbl_purcase_request');
		redirect('user/databarang/index');
	}
}