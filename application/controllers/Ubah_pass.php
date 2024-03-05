<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubah_pass extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ubah_pass_model');
    }

    public function index()
    {

        $this->load->view('mahasiswa/header');
        $this->load->view('mahasiswa/sidebar');
        $this->load->view('ubah_pass/view_ubah_pass');
        $this->load->view('mahasiswa/footer');

        // $data['user'] = $this->ubah_pass_model->get_data('tbuser')->result();

        // $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', array('required' => '%s Harus di isi !!'));
        // $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|matches[password_baru2]', array('required' => '%s Harus di isi !!'));
        // $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru1]', array('required' => '%s Harus di isi !!'));

        // if ($this->form_validation->run() == false) {
        //     $this->load->view('mahasiswa/header', $data);
        //     $this->load->view('mahasiswa/sidebar', $data);
        //     $this->load->view('ubah_pass/view_ubah_pass', $data);
        //     $this->load->view('mahasiswa/footer');
        // } else {
        //     $password_lama = $this->input->post('password_lama');
        //     $password_baru = $this->input->post('password_baru1');

        //     if (!password_verify($password_lama, $data['user']['password'])) {
        //         $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        // 		<strong>Password lama yang anda ketikkan salah</strong>
        // 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        // 			<span aria-hidden="true">&times;</span>
        // 		</button>
        // 		</div>');
        //         redirect('ubah_pass');
        //     } else {
        //         if ($password_lama == $password_baru) {
        //             $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        //             <strong>Password baru tidak boleh sama dengan password lama</strong>
        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //             </button>
        //             </div>');
        //             redirect('ubah_pass');
        //         } else {
        //             $this->db->set('password');
        //             $this->db->where('id', $this->session->userdata('id'));
        //             $this->db->update_data('tbuser');

        //             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //             <strong>Password berhasil diubah</strong>
        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //             </button>
        //             </div>');
        //             redirect('ubah_pass');
        //         }
        //     }
        // }
    }

    public function ubah_pass_aksi()
    {

        // $pass_baru = $this->input->post('tbuser');
        // $ulangiPass = $this->input->post('ulangi_pass');

        $this->form_validation->set_rules('password', 'password baru', 'required|matches[ulangi_pass]');
        $this->form_validation->set_rules('password', 'ulangi password', 'required');
        // $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'password' => $this->input->post('password'),
            );
            $this->ubah_pass_model->update_password($data, 'tbuser');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> Password Berhasil Diubah! | Silahkan Login Ulang.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('login');
        }
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('pass_baru', 'password baru', 'required|matches[ulangiPass]');
        // $this->form_validation->set_rules('ulangi_pass', 'ulangi password', 'required');
    }
}
