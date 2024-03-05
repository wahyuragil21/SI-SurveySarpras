<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pernyataan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pernyataan_model');
    }

    public function fasilitas($id, $id_semester)
    {
        $data['pernyataan'] = $this->pernyataan_model->get_data('tbpernyataan', array('id_fasilitas' => $id))->result();
        $data['id_semester'] = $id_semester;
        $data['fasilitas'] = $id;


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pernyataan/view_pernyataan', $data);
        $this->load->view('template/footer');
    }
    public function tambah($fasilitas, $id_semester)
    {
        $data['title'] = 'Tambah pernyataan';
        $data['fasilitas'] = $fasilitas;
        $data['id_semester'] = $id_semester;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pernyataan/tambah_pernyataan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            // $this->tambah();
        } else {
            $data = array(
                'pernyataan' => $this->input->post('pernyataan'),
                'id_fasilitas' => $this->input->post('id_fasilitas'),
            );

            $this->pernyataan_model->insert_data($data, 'tbpernyataan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> pernyataan Berhasil Di Tambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('pernyataan/fasilitas/' . $this->input->post('id_fasilitas') . '/' . $this->input->post('id_semester'));
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('pernyataan', 'pernyataan', 'required', array(
            'required' => '%s Harus di isi !!'
        ));
    }
    public function edit($id)
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            // $this->fasilitas($id);
        } else {
            $data = array(
                'id_pernyataan' => $id,
                'pernyataan' => $this->input->post('pernyataan'),
            );
            $this->pernyataan_model->update_data($data, 'tbpernyataan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			    <strong>pernyataan Berhasil Diubah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('pernyataan/fasilitas/' . $this->input->post('id_fasilitas') . '/' . $this->input->post('id_semester'));
        }
    }
    public function delete($id, $id_fasilitas, $id_semester)
    {
        $data['fasilitas'] = $this->pernyataan_model->get_data('tbfasilitas', array('id_semester' => $id_semester))->result();
        $data['pernyataan'] = $this->pernyataan_model->get_data('tbpernyataan', array('id_fasilitas' => $id_fasilitas))->result();
        $id_fasilitas = $data['pernyataan'][0]->id_fasilitas;
        $id_semester = $data['fasilitas'][0]->id_semester;

        $where = array('id_pernyataan' => $id);
        $this->pernyataan_model->delete($where, 'tbpernyataan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> pernyataan Berhasil Dihapus!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('pernyataan/fasilitas/' . $id_fasilitas . '/' . $id_semester);
    }
}
