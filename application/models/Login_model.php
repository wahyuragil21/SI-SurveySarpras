<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function cek_login($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('tbuser');
    }
    public function getLoginData($user, $pass)
    {
        $u = $user;
        $p = $pass;

        $query_ceklogin = $this->db->get_where('tbuser', array('username' => $u, 'password' => $p));

        if (count($query_ceklogin->result()) > 0) {
            foreach ($query_ceklogin->result() as $qck) {
                foreach ($query_ceklogin->result() as $ck) {
                    $sess_data['logged_in'] = TRUE;
                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                    $sess_data['level'] = $ck->level;
                    $this->session->set_userdata($sess_data);
                }
                redirect('Dashboard_admin');
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
