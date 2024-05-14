<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_options extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$data['data'] = $this->db->get('payment_options')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/payment_options/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('number', 'Nomor', 'required');
		$this->form_validation->set_rules('type', 'Jenis', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'name' => $this->input->post('name'),
				'number' => $this->input->post('number'),
				'type' => $this->input->post('type'),
			];
			$this->db->insert('payment_options', $data);
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('admin/payment_options');
		}

		$this->load->view('admin/templates/header');
		$this->load->view('admin/payment_options/add');
		$this->load->view('admin/templates/footer');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('number', 'Nomor', 'required');
		$this->form_validation->set_rules('type', 'Jenis', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'name' => $this->input->post('name'),
				'number' => $this->input->post('number'),
				'type' => $this->input->post('type'),
			];
			$this->db->where('id', $id);
			$this->db->update('payment_options', $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/payment_options');
		}

		$data['data'] = $this->db->get_where('payment_options', ['id' => $id])->row();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/payment_options/edit', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('payment_options');
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/payment_options');
	}
}
