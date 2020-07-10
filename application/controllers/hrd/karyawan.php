<?php

class Karyawan extends CI_Controller{

    public function index()
    {
        $this->load->view('template_hrd/header');
        $this->load->view('template_hrd/sidebar');
        $this->load->view('hrd/karyawan');
        $this->load->view('template_hrd/footer');
    }
}