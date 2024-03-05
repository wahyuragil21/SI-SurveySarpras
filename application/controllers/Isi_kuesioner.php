<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Isi_kuesioner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('isi_kuesioner_model');
    }
    public function index()
    {
        $join = 'tbsemester.id=tbfasilitas.id_semester';
        $model_fasilitas = $this->isi_kuesioner_model->join_data('tbfasilitas', array('tbsemester.status' => 'Aktif'), 'tbsemester', $join)->result();

        $a = [];
        foreach ($model_fasilitas as $key => $value) :
            $d = $this->isi_kuesioner_model->get_data('tbpernyataan', array('id_fasilitas' => $value->id_fasilitas))->result();
            $a[$value->fasilitas] = $d;
        endforeach;
        $data['model_fasilitas'] = $a;

        // $data = array(
        //     'id_fasilitas' => $id,
        //     'pernyataan' => $this->load->view('pernyataan'),
        // );
        // $this->isi_kuesioner_model->get_data($data, 'tbpernyataan');

        // $data = array(
        //     'id_semester' => $id,
        //     'fasilitas' => $this->load->view('fasilitas'),
        // );
        // $this->isi_kuesioner_model->get_data($data, 'tbfasilitas');


        $this->load->view('mahasiswa/header');
        $this->load->view('mahasiswa/sidebar');
        $this->load->view('kuesioner/view_isi_kuesioner', $data);
        $this->load->view('mahasiswa/footer');
    }
    public function simpan()
    {
        $a = $this->input->post('a');
        $id = $this->session->id;
        // print_r($a);
        // echo '<br>';
        // print_r($a[2]);
        foreach ($a as $key => $value) {
            $data = array(
                'id_responden' => $id,
                'id_pernyataan' => $key,
                'nilai' => $value,
            );

            $this->isi_kuesioner_model->insert_data($data, 'tbkuesioner');
        }
        redirect('dashboard_user');
    }
}
