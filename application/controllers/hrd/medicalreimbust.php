<?php

class Medicalreimbust extends CI_Controller{

    public function index()
    {
        $this->load->view('template_hrd/header');
        $this->load->view('template_hrd/sidebar');
        $this->load->view('hrd/medical_reimbust');
        $this->load->view('template_hrd/footer');
    }
}