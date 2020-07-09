<?php

class Setujuuang extends CI_Controller{

    public function index()
    {
        $this->load->view('template_manajemen/header');
        $this->load->view('template_manajemen/sidebar');
        $this->load->view('manajemen/setuju_uang');
        $this->load->view('template_manajemen/footer');
    }
}