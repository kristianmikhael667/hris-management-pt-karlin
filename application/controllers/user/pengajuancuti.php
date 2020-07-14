<?php

class Pengajuancuti extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model('models_hrd/Pengajuancuti_m', 'pengajuancuti');
        $this->load->model('models_hrd/Karyawan', 'karyawan');
        $this->load->model('models_hrd/Kehadiran_m', 'kehadiran');
	}
	
    public function index()
	{
		$data = array('title' => '',
					  'content' => 'user/pengajuan_cuti/list'
                     );
                     
					 $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);;
    }
    
    public function delete()
	{
		$data = array('title' => 'Pengajuan Cuti',
					  'content' => 'hrd/pengajuan_cuti/list'
					 );
					
					$id = $this->input->get('id');
					$where = array('id_karyawan' => $id);
					$this->kehadiran->delete($where);
					$this->load->view('tamplate_bootstrap_hrd/wrapper', $data, FALSE);	
    }
    
    public function ajukan()
	{   
        $data = array('title' => 'Pengajuan Cuti',
					  'content' => 'user/pengajuan_cuti/list'
                     );
        $id = $this->input->get('id');
        $cek_query=$this->kehadiran->check_employe($id);
        foreach ($cek_query->result_array() as $row)
        {
            if($row['jumlah_izin'] > 4){
                echo "<script>alert('Jumlah Izin".$row['jumlah_izin']." sudah tidak dapat diajukan ')</script>";
                $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);	
            }
            else{
                echo "<script>alert('Jumlah Izin".$row['jumlah_izin']." Disetujui ')</script>";
                $this->load->view('tamplate_bootstrap_user/wrapper', $data, FALSE);	
            }
        }
    }
    
    public function ajukan_sakit()
	{   
        
	}
}