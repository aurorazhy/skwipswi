<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function login()
	{
		if ($this->session->userdata('user'))
			redirect(base_url());

		if ($this->input->post('email')) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('users', ['email' => $email])->row();

			if ($user) {
				if ($password == $user->password) {
					$this->session->set_userdata('user', $user);
					$this->session->set_flashdata('success', 'Login berhasil');
					redirect(base_url());
				} else {
					$this->session->set_flashdata('error', 'Login gagal');
				}
			} else {
				$this->session->set_flashdata('error', 'Login gagal');
			}
		}

		$this->load->view('login');
	}

	public function register()
	{
		if ($this->session->userdata('user'))
			redirect(base_url());

		if ($this->input->post('email')) {
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			];
			$this->db->insert('users', $data);
			$this->session->set_flashdata('success', 'Registrasi berhasil, silahkan login');
			redirect('auth/login');
		}

		$this->load->view('register');
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->set_flashdata('success', 'Logout berhasil');
		redirect(base_url());
	}
}
