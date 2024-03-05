<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_perpernyataan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_pernyataan_model');
    }

    public function index($id, $id_semester)
    {
        $data['fasilitas'] = $this->laporan_pernyataan_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $data['semester'] = $id_semester;
        // echo $id_semester;
        $data['pernyataan'] = $this->laporan_pernyataan_model->get_data('tbpernyataan', array('id_fasilitas' => $id))->result();
        $data['fasilitas'] = $id;
        $nilai = [];
        foreach ($data['pernyataan'] as $key => $value) :
            $kuisioner = $this->laporan_pernyataan_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
            $d = [];
            foreach ($kuisioner as $key2 => $value2) {
                $d[] = $value2->nilai;
                // print_r($value2);
                // echo $value2->nilai;
                // echo '<br>';
            }
            // echo $value->id_pernyataan;
            $rata = array_sum($d) / count($d);
            $nilai[$value->id_pernyataan] = $rata;
        // echo $rata;
        // // print_r($value);
        // echo '<br>';
        // echo '<br>';
        endforeach;
        // print_r($nilai);
        $data['nilai'] = $nilai;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('hasil_kuesioner_admin/view_perpernyataan', $data);
        $this->load->view('template/footer');
    }

    public function cetak($id)
    {
        // $data['pernyataan'] = $this->laporan_pernyataan_model->get_data("tbpernyataan")->result();
        $data['pernyataan'] = $this->laporan_pernyataan_model->get_data('tbpernyataan', array('id_fasilitas' => $id))->result();
        $this->load->view('print/print_laporan_pernyataan', $data);
    }

    public function pdf($id, $id_semester)
    {
        $data['fasilitas'] = $this->laporan_pernyataan_model->get_data('tbfasilitas', array('id_semester' => $id_semester))->result();
        $data['pernyataan'] = $this->laporan_pernyataan_model->get_data('tbpernyataan', array('id_fasilitas' => $id))->result();
        $id_fasilitas = $data['pernyataan'][0]->id_fasilitas;
        $id_semester = $data['fasilitas'][0]->id_semester;

        $data['fasilitas'] = $this->laporan_pernyataan_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $data['semester'] = $id_semester;
        // echo $id_semester;
        $data['pernyataan'] = $this->laporan_pernyataan_model->get_data('tbpernyataan', array('id_fasilitas' => $id))->result();
        $data['fasilitas'] = $id;
        $nilai = [];
        foreach ($data['pernyataan'] as $key => $value) :
            $kuisioner = $this->laporan_pernyataan_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
            $d = [];
            foreach ($kuisioner as $key2 => $value2) {
                $d[] = $value2->nilai;
                // print_r($value2);
                // echo $value2->nilai;
                // echo '<br>';
            }
            // echo $value->id_pernyataan;
            $rata = array_sum($d) / count($d);
            $nilai[$value->id_pernyataan] = $rata;
        // echo $rata;
        // // print_r($value);
        // echo '<br>';
        // echo '<br>';
        endforeach;
        // print_r($nilai);
        $data['nilai'] = $nilai;

        $this->load->library('dompdf_gen');


        $this->load->view('print/print_pdf_pernyataan', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        // $html = '';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_pdf_perpernyataan.pdf', array('Attachment' => 0));
        // exit;
    }
}
