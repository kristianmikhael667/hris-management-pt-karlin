<?php

class Laporan_kehadiran_pdf extends CI_Controller{

    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/kehadiran/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);
    }
	
    public function pdf(){

		$data['data'] = $this->db->get('tbl_kehadiran')->result();

		$this->load->library('pdf');
		$customPaper = 'A4';
		$this->pdf->setPaper($customPaper, 'landscape');
		$this->pdf->load_view('user/laporan_kehadiran', $data);
	}
}