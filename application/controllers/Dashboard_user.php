<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{


    public function index()
    {
        $this->load->view('mahasiswa/header');
        $this->load->view('mahasiswa/sidebar');
        $this->load->view('mahasiswa/dashboard');
        $this->load->view('mahasiswa/footer');
    }
}
