<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$title['title'] = 'Data User';
		$data['user'] = $this->user_model->get_data('tbuser')->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('user/view_user', $data);
		$this->load->view('template/footer');
	}
	public function tambah()
	{
		$data['title'] = 'Tambah User';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('user/tambah_user', $data);
		$this->load->view('template/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'prodi' => $this->input->post('prodi'),
				'angkatan' => $this->input->post('angkatan'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level'),
			);

			$this->user_model->insert_data($data, 'tbuser');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong> User Berhasil Di Tambahkan.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('user');
		}
	}

	public function edit($id)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id' => $id,
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'prodi' => $this->input->post('prodi'),
				'angkatan' => $this->input->post('angkatan'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level'),
			);
			$this->user_model->update_data($data, 'tbuser');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			<strong> Data User Berhasil Diubah!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span></button></div>');
			redirect('user');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nim', 'Nim', 'required', array(
			'required' => '%s Harus di isi !!'
		));
		$this->form_validation->set_rules('nama', 'Nama', 'required', array(
			'required' => '%s Harus di isi !!'
		));
		$this->form_validation->set_rules('prodi', 'Prodi', 'required', array(
			'required' => '%s Harus di isi !!'
		));
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required', array(
			'required' => '%s Harus di isi !!'
		));
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => '%s Harus di isi !!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus di isi !!'
		));
		$this->form_validation->set_rules('level', 'Level', 'required', array(
			'required' => '%s Harus di isi !!'
		));
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->user_model->delete($where, 'tbuser');
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  			<strong> User Berhasil Dihapus!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			 <span aria-hidden="true">&times;</span></button></div>');
		redirect('user');
	}
}
