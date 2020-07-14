<?php

class Auth extends CI_Controller{
    public function login()
    {
        $this->form_validation->set_rules('id_karyawan','id_karyawan','required',['required' => 'Id Karyawan wajib diisi!']);
        $this->form_validation->set_rules('password','password','required',['required' => 'Password wajib diisi!']);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('form_login');
        }else{
            $auth = $this->model_auth->cek_login();

            if($auth == FALSE){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Id Karyawan atau Password Anda Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('auth/login');
            }else{
                $this->session->set_userdata('id_karyawan',$auth->id_karyawan);
                $this->session->set_userdata('role_id',$auth->role_id);

                switch($auth->role_id){
                    case 1 : redirect('manajemen/dashboard_manajemen');
                        break;
                    case 2 : redirect('hrd/dashboard_hrd');
                        break;
                    case 3 : redirect('user/dashboard_user');
                        break;
                    default:
                        break;
                }
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}