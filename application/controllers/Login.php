<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('form_login');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username  Wajib Diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password  Wajib Diisi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('form_login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = $password;

            $cek = $this->Login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0) {

                foreach ($cek->result() as $ck) {
                    $sess_data['id'] = $ck->id;
                    $sess_data['username'] = $ck->username;
                    $sess_data['nama'] = $ck->nama;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'Admin') {
                    redirect('Dashboard_admin');
                } elseif ($sess_data['level'] == 'Mahasiswa') {
                    redirect('Dashboard_user');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Username atau Password salah.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> Username atau Password salah.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('login');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
