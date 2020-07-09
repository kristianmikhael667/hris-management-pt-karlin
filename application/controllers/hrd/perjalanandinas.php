<?php

class Perjalanandinas extends CI_Controller{

    public function index()
    {
        $this->load->view('template_hrd/header');
        $this->load->view('template_hrd/sidebar');
        $this->load->view('hrd/perjalanan_dinas');
        $this->load->view('template_hrd/footer');
    }
}