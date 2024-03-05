<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_persemester extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_semester_model');
    }

    public function index()
    {
        $title['title'] = 'Data User';
        $data['semester'] = $this->laporan_semester_model->get_data('tbsemester', array())->result();
        $nilaisemester = [];
        $nilaisemester2 = [];
        foreach ($data['semester'] as $keysemester => $valuesemester) {

            $data['fasilitas'] = $this->laporan_semester_model->get_data('tbfasilitas', array('id_semester' => $valuesemester->id))->result();
            // $data['semester'] = $id;
            $nilaifasilitas = [];
            foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
                // print_r($valuefasilitas);
                // echo '<br>';
                # code...
                $data['pernyataan'] = $this->laporan_semester_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
                // print_r($data['pernyataan']);
                // break;
                $nilai = [];
                foreach ($data['pernyataan'] as $key => $value) : #2
                    // print_r($value);
                    // echo '<br>';
                    $kuisioner = $this->laporan_semester_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
                    // 1
                    $d = [];
                    foreach ($kuisioner as $key2 => $value2) {
                        $d[] = $value2->nilai;
                        // print_r($value2);
                        // echo $value2->nilai;
                        // echo '<br>';
                    }
                    // echo $value->id_pernyataan;
                    $rata = @(array_sum($d) / count($d));
                    $nilai[$value->id_pernyataan] = $rata;
                // echo $rata;
                // print_r($value);
                // echo '<br>';
                // echo '<br>';
                endforeach;
                // print_r($nilai);
                // echo 'test';
                $rata = @(array_sum($nilai) / count($nilai)); #4
                $nilaifasilitas[$valuefasilitas->id_fasilitas] = $rata;
                // break;
            }
            $rata = @(array_sum($nilaifasilitas) / count($nilaifasilitas)); #4
            // print_r($nilaifasilitas);
            $nilaisemester[$valuesemester->id] = $rata;
            $nilaisemester2[$valuesemester->id] = $nilaifasilitas;
            // break;
        }
        // print_r($nilaisemester2);
        $data['nilai'] = $nilaisemester; #5
        foreach ($nilaisemester2 as $key => $value) {
            // echo $key;
            if (isset($value[19])) {
                // echo $value['19'];
                // echo '<br>';
            }
        }


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('hasil_kuesioner_admin/view_persemester', $data);
        $this->load->view('template/footer');
    }
}
