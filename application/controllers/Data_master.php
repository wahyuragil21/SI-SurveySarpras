<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_master_model');
    }

    public function index()
    {
        $title['title'] = 'Data master';
        $data['data_master'] = $this->data_master_model->get_data('tbdata_master')->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_master/view_data_master', $data);
        $this->load->view('template/footer');
    }
}
