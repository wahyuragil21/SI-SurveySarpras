<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Semester extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('semester_model');
    }

    public function index()
    {
        $title['title'] = 'Data User';
        $data['semester'] = $this->semester_model->get_data('tbsemester')->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('semester/view_semester', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah semester';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('semester/tambah_semester', $data);
        $this->load->view('template/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'semester' => $this->input->post('semester'),
            );
            $this->semester_model->insert_data($data, 'tbsemester');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> semester Berhasil Di Tambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('semester');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('semester', 'semester', 'required', array(
            'required' => '%s Harus di isi !!'
        ));
    }
    public function edit($id)
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'semester' => $this->input->post('semester'),
                'status' => $this->input->post('status'),
            );
            $this->semester_model->update_data($data, 'tbsemester');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			<strong>semester Berhasil Diubah!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span></button></div>');
            redirect('semester');
        }
    }
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->semester_model->delete($where, 'tbsemester');
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  			<strong> semester Berhasil Dihapus!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span></button></div>');
        redirect('semester');
    }
}
