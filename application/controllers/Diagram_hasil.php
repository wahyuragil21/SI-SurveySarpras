<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagram_hasil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_diagram_model');
        $this->load->database();
    }

    public function index()
    {
        // $title['title'] = 'Data master';
        // $data['data_master'] = $this->data_master_model->get_data('tbdata_master')->result();

        $data['semester'] = $this->laporan_diagram_model->get_data('tbsemester', array())->result();
        $nilaisemester = [];
        $nilaisemester2 = [];
        foreach ($data['semester'] as $keysemester => $valuesemester) {

            $data['fasilitas'] = $this->laporan_diagram_model->get_data('tbfasilitas', array('id_semester' => $valuesemester->id))->result();
            // $data['semester'] = $id;
            $nilaifasilitas = [];
            foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
                # code...
                $data['pernyataan'] = $this->laporan_diagram_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
                $nilai = [];
                foreach ($data['pernyataan'] as $key => $value) : #2
                    $kuisioner = $this->laporan_diagram_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
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
                $rata = @(array_sum($nilai) / count($nilai)); #4
                $nilaifasilitas[$valuefasilitas->id_fasilitas] = $rata;
            }
            $rata = @(array_sum($nilaifasilitas) / count($nilaifasilitas)); #4
            // print_r($nilaifasilitas);
            $nilaisemester[$valuesemester->id] = $rata;
            $nilaisemester2[$valuesemester->id] = $nilaifasilitas;
        }
        // print_r($nilaisemester2);
        $data['nilai'] = $nilaisemester; #5
        foreach ($nilaisemester2 as $key => $value) {
            // echo $key;
            // echo $value['19'];
            // echo '<br>';
        }


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('hasil_kuesioner_admin/view_diagram');
        $this->load->view('template/footer');
    }

    public function chart_data($nama_fasilitas)
    {
        // $id = '1';
        $nama_fasilitas = str_replace('%20', ' ', $nama_fasilitas);
        // echo $nama_fasilitas;
        // $nama_fasilitas = 'FASILITAS UMUM GEDUNG KULIAH';
        // $data = $this->laporan_diagram_model->chart_database();
        // print_r($data);
        // echo '<br>';
        // echo '<br>';
        // // echo json_encode($data);
        // echo '<br>';
        // echo '<br>';

        $join = 'tbsemester.id=tbfasilitas.id_semester';
        $data['fasilitas'] = $this->laporan_diagram_model->join_data('tbfasilitas', array('tbfasilitas.fasilitas' => $nama_fasilitas), 'tbsemester', $join)->result();
        // $data['semester'] = $id;
        $nilaifasilitas = [];
        foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
            $data['pernyataan'] = $this->laporan_diagram_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
            // print_r($data['pernyataan']);
            $nilai = [];
            foreach ($data['pernyataan'] as $key => $value) : #2
                $kuisioner = $this->laporan_diagram_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
                // 1
                $d = [];
                foreach ($kuisioner as $key2 => $value2) {
                    $d[] = $value2->nilai;
                    // print_r($value2);
                    // echo $value2->nilai;
                    // echo '<br>';
                }
                // echo $value->id_pernyataan;
                $rata = array_sum($d) / count($d);
                $nilai[$value->id_pernyataan] = $rata / 5 * 100;
            // echo $rata;
            // print_r($value);
            // echo '<br>';
            // echo '<br>';
            endforeach;
            // print_r($nilai);
            // echo '<br>';
            $rata = array_sum($nilai) / count($nilai); #4
            $nilaifasilitas[$valuefasilitas->semester] = $rata;
        }
        $data['nilai'] = $nilaifasilitas; #5
        // print_r($nilaifasilitas);
        $arr = [];
        foreach ($nilaifasilitas as $key => $value) {
            $object = new stdClass();
            $object->semester = $key;
            $object->hasil = $value;
            $arr[] = $object;
        }



        // $object = new stdClass();
        // $object->semester = '2021';
        // $object->hasil = '70';
        // $arr[] = $object;
        // print_r($arr);
        // echo '<br>';
        // echo '<br>';
        echo json_encode($arr);
        // echo '<br>';
        // echo '<br>';
    }

    public function pdf()
    {
        $data['semester'] = $this->laporan_diagram_model->get_data('tbsemester', array())->result();
        $nilaisemester = [];
        $nilaisemester2 = [];
        foreach ($data['semester'] as $keysemester => $valuesemester) {

            $data['fasilitas'] = $this->laporan_diagram_model->get_data('tbfasilitas', array('id_semester' => $valuesemester->id))->result();
            // $data['semester'] = $id;
            $nilaifasilitas = [];
            foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
                # code...
                $data['pernyataan'] = $this->laporan_diagram_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
                $nilai = [];
                foreach ($data['pernyataan'] as $key => $value) : #2
                    $kuisioner = $this->laporan_diagram_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
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
                $rata = @(array_sum($nilai) / count($nilai)); #4
                $nilaifasilitas[$valuefasilitas->id_fasilitas] = $rata;
            }
            $rata = @(array_sum($nilaifasilitas) / count($nilaifasilitas)); #4
            // print_r($nilaifasilitas);
            $nilaisemester[$valuesemester->id] = $rata;
            $nilaisemester2[$valuesemester->id] = $nilaifasilitas;
        }
        // print_r($nilaisemester2);
        $data['nilai'] = $nilaisemester; #5
        foreach ($nilaisemester2 as $key => $value) {
            // echo $key;
            // echo $value['19'];
            // echo '<br>';
        }

        $this->load->library('dompdf_gen');


        $this->load->view('print/print_laporan_diagram', $data);

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
