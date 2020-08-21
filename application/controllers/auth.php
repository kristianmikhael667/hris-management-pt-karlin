<?php


class Auth extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('models_login/Login_akses', 'login_user');
        $this->load->model('models_hrd/Karyawan', 'login_user');
		$this->load->library('session');
		$this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function login()
    {
        $this->form_validation->set_rules('id_karyawan','id_karyawan','required',['required' => 'Id Karyawan wajib diisi!']);
        $this->form_validation->set_rules('password','password','required',['required' => 'Password wajib diisi!']);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('form_login');
        }else{
            $auth = $this->model_auth->cek_login();
            //$auth1 = $this->model_auth->status();
            $status_karyawan = $auth->status;

            if($auth == FALSE){
                $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Id Karyawan atau Password Anda Salah
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('auth/login');
            }
            
            else{
                $this->session->set_userdata('id_karyawan',$auth->id_karyawan);
                $this->session->set_userdata('role_id',$auth->role_id);
                $status_karyawan = $auth->status;
                $auth1 = $this->model_auth->cek_login();
                $cek_query=$this->login_user->check_employe('id_karyawan');     
                    $data=$cek_query->row_array();
                    $this->session->set_userdata('nama_karyawan', $data['nama_karyawan']);

                    $status_karyawan = $auth1->status;
                    $role = $auth1->role_id;

                    if(($role == '1') && ($status_karyawan=="AKTIF")){
                        redirect('manajemen/dashboard_manajemen');
                    }
                    else if(($role == '2') && ($status_karyawan=="AKTIF")){
                        redirect('hrd/utama_hrd');
                    }
                    else if(($role == '3') && ($status_karyawan=="AKTIF")){
                        redirect('user/dashboard_user');
                    }
                    else{
                        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Akun Anda DiNoneAktifkan
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
               
                        redirect('auth/login');
                    }
                    

                    // switch($auth1->role_id){
                    // case 1 :
                    //     if(($status_karyawan='AKTIF'))   { redirect('manajemen/dashboard_manajemen');}   
                    //     if(($status_karyawan='NONE')){ 
                    //         $this->session->set_flashdata('pesan1','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    //     DINONAKTIFKAN
                    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //     <span aria-hidden="true">&times;</span>
                    //     </button>
                    // </div>');
                    // redirect('auth/login');
                    //      }  
                    //     break;
                    // case 2 : 
                    //     if(($status_karyawan='AKTIF'))   { redirect('hrd/dashboard_hrd');}   
                    //     if(($status_karyawan='NONE')){
                    //         $this->session->set_flashdata('pesan1','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    //     DINONAKTIFKAN
                    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //     <span aria-hidden="true">&times;</span>
                    //     </button>
                    // </div>');
                    // redirect('auth/login');
                    //      }
                    //     break;
                    // case 3 : 
                    //     if(($status_karyawan='AKTIF'))   { redirect('user/dashboard_user');}   
                    //     if(($status_karyawan='NONE')){
                    //         $this->session->set_flashdata('pesan1','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    //     DINONAKTIFKAN
                    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //     <span aria-hidden="true">&times;</span>
                    //     </button>
                    // </div>');
                    // redirect('auth/login');
                    //     }
                    //     break;
                    // default:
                    //     break;
               // }

                
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}