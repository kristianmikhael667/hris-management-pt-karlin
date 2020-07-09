<?php

class Uangtransport extends CI_Controller{

    public function index()
    {
        $this->load->view('template_hrd/header');
        $this->load->view('template_hrd/sidebar');
        $this->load->view('hrd/uang_transport');
        $this->load->view('template_hrd/footer');
    }
}