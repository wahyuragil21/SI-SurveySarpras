<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{


    public function index()
    {
        $this->load->view('mahasiswa/header');
        $this->load->view('mahasiswa/sidebar');
        $this->load->view('profil_jurusan/view_struktur');
        $this->load->view('mahasiswa/footer');
    }
}
