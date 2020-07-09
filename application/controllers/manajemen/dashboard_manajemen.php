<?php

class Dashboard_manajemen extends CI_Controller{

    public function index()
    {
        $this->load->view('template_manajemen/header');
        $this->load->view('template_manajemen/sidebar');
        $this->load->view('manajemen/dashboard_manajemen');
        $this->load->view('template_manajemen/footer');
    }
}