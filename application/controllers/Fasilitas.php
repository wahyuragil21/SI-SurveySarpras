<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fasilitas_model');
    }
    public function semester($id)
    {
        $data['fasilitas'] = $this->fasilitas_model->get_data('tbfasilitas', array('id_semester' => $id))->result();
        $data['semester'] = $id;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('fasilitas/view_fasilitas', $data);
        $this->load->view('template/footer');
    }
    public function tambah($semester)
    {
        $data['semester'] = $semester;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('fasilitas/tambah_fasilitas', $data);
        $this->load->view('template/footer');
    }
    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            // $this->tambah();
        } else {
            $data = array(
                'fasilitas' => $this->input->post('fasilitas'),
                'id_semester' => $this->input->post('id_semester'),
            );
            $this->fasilitas_model->insert_data($data, 'tbfasilitas');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> fasilitas Berhasil Di Tambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('fasilitas/semester/' . $this->input->post('id_semester'));
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('fasilitas', 'fasilitas', 'required', array(
            'required' => '%s Harus di isi !!'
        ));
    }
    public function edit($id)
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            // $this->semester($id);
        } else {
            $data = array(
                'id_fasilitas' => $id,
                'fasilitas' => $this->input->post('fasilitas'),
            );
            $this->fasilitas_model->update_data($data, 'tbfasilitas');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			<strong>fasilitas Berhasil Diubah!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span></button></div>');
            redirect('fasilitas/semester/' . $this->input->post('id_semester'));
        }
    }
    public function delete($id)
    {
        $data['fasilitas'] = $this->fasilitas_model->get_data('tbfasilitas', array('id_fasilitas' => $id))->result();
        // $data['semester'] = $id;
        $id_semester = $data['fasilitas'][0]->id_semester;
        // print_r($data['fasilitas'][0]);
        // echo $id_semester;

        $where = array('id_fasilitas' => $id);
        $this->fasilitas_model->delete($where, 'tbfasilitas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  			<strong> fasilitas Berhasil Dihapus!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span></button></div>');
        redirect('fasilitas/semester/' . $id_semester);
    }
}
