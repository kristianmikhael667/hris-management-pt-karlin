<?php

class Login extends CI_Controller{


    public function __construct(){
        parent::__construct();
		$this->load->model('models_login/Login_akses', 'login_user');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
    }

    public function index()
	{
		$this->load->view('form_login');
    }

    
    public function proses(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
            $cek_query=$this->login_user->check_employe($username);     
            $data=$cek_query->row_array();
            if(password_verify($password, $data['password'])){
                $this->session->set_userdata('id_karyawan', $data['id_karyawan']);
                $this->session->set_userdata('password', $data['password']);
                $this->session->set_userdata('role_id', $data['role_id']);

                if($data['role_id'] == 1){
                    reditect('manajemen/dashboard_manajemen');
                }

                else if($data['role_id'] = 2){
                    redirect('/hrd/dashboard_hrd');
                }

                else if($data['role_id'] == 3){
                    reditect('/user/dashboard_user');
                }
               
                      
                $this->input->set_cookie('id_karyaawan', $username, 450);
                $this->input->set_cookie('Nama', $data['nama'], 450);      
            }        
            else{  
                echo "<script>alert('data yang anda insert salah, pastikan lagi')</script>";
                return $this->load->view('login.php');
            }       
      }
}