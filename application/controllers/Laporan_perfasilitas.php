<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_perfasilitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_fasilitas_model');
    }
    public function semester($id)
    {
        $data['fasilitas'] = $this->laporan_fasilitas_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $data['semester'] = $id;
        $nilaifasilitas = [];
        foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
            # code...
            $data['pernyataan'] = $this->laporan_fasilitas_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
            // print_r($data['pernyataan']);
            $nilai = [];
            foreach ($data['pernyataan'] as $key => $value) : #2
                $kuisioner = $this->laporan_fasilitas_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
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
            $nilaifasilitas[$valuefasilitas->id_fasilitas] = $rata;
        }
        $data['nilai'] = $nilaifasilitas; #5

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('hasil_kuesioner_admin/view_perfasilitas', $data);
        $this->load->view('template/footer');
    }
    public function pdf($id)
    {
        $data['fasilitas'] = $this->laporan_fasilitas_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $id_semester = $data['fasilitas'][0]->id_semester;

        $data['fasilitas'] = $this->laporan_fasilitas_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $data['semester'] = $id;
        $nilaifasilitas = [];
        foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
            # code...
            $data['pernyataan'] = $this->laporan_fasilitas_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
            // print_r($data['pernyataan']);
            $nilai = [];
            foreach ($data['pernyataan'] as $key => $value) : #2
                $kuisioner = $this->laporan_fasilitas_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
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
            $nilaifasilitas[$valuefasilitas->id_fasilitas] = $rata;
        }
        $data['nilai'] = $nilaifasilitas; #5

        $this->load->library('dompdf_gen');


        $this->load->view('print/print_pdf_fasilitas', $data);

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

    public function excel($id)
    {
        $data['fasilitas'] = $this->laporan_fasilitas_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $id_semester = $data['fasilitas'][0]->id_semester;

        $data['fasilitas'] = $this->laporan_fasilitas_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $data['semester'] = $id;
        $nilaifasilitas = [];
        foreach ($data['fasilitas'] as $keyfasilitas => $valuefasilitas) { #3
            # code...
            $data['pernyataan'] = $this->laporan_fasilitas_model->get_data('tbpernyataan', array('id_fasilitas' => $valuefasilitas->id_fasilitas))->result();
            // print_r($data['pernyataan']);
            $nilai = [];
            foreach ($data['pernyataan'] as $key => $value) : #2
                $kuisioner = $this->laporan_fasilitas_model->get_data('tbkuesioner', array('id_pernyataan' => $value->id_pernyataan))->result();
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
            $nilaifasilitas[$valuefasilitas->id_fasilitas] = $rata;
        }
        $data['nilai'] = $nilaifasilitas; #5

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Jurusan Ilmu Komputer");
        $object->getProperties()->setLastModifiedBy("Jurusan Ilmu Komputer");
        $object->getProperties()->setTitle("Jurusan Ilmu Komputer");

        $object->setActiveSheetIndex(0);
        $object->setActiveSheetIndex()->setCellValue('A1', 'No');
        $object->setActiveSheetIndex()->setCellValue('B1', 'Fasilitas');
        $object->setActiveSheetIndex()->setCellValue('C1', 'Hasil');
        $object->setActiveSheetIndex()->setCellValue('D1', 'Ket');

        $baris = 2;
        $no = 1;
        foreach ($fasilitas as $flt) :
            $hasil = $nilaifasilitas[$flt->id_fasilitas];
            if ($hasil >= 80) {
                $ket = 'Sangat Memuaskan';
            } elseif ($hasil >= 60) {
                $ket = 'Memuaskan';
            } elseif ($hasil >= 40) {
                $ket = 'Cukup';
            } elseif ($hasil >= 20) {
                $ket = 'Kurang';
            } else {
                $ket = 'Sangat Kurang';
            }
            $object->setActiveSheetIndex()->setCellValue('A' . $baris, $no++);
            $object->setActiveSheetIndex()->setCellValue('B' . $baris, $flt->fasilitas);
            $object->setActiveSheetIndex()->setCellValue('C' . $baris, round($hasil));
            $object->setActiveSheetIndex()->setCellValue('D' . $baris, $ket);

            $baris++;
        endforeach;
        $filename = "Data_perfasilitas" . '.xlsx';
        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        ob_end_clean();
        header('Content-Type: application/vnd.openx,lformats-officedocument.spreadsheetml.sheet');
        // header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        // header('Cache-Control: max-age=0');
        $this->load->view('print/print_excel.php', $data);
        $writer->save('php://output');

        exit;
    }
}
