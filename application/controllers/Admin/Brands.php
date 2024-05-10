<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brands extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$data['data'] = $this->db->get('brands')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/brands/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Nama Merk', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'name' => $this->input->post('name')
			];

			$this->db->insert('brands', $data);
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('admin/brands');
		}

		$this->load->view('admin/templates/header');
		$this->load->view('admin/brands/add');
		$this->load->view('admin/templates/footer');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Nama Merk', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'name' => $this->input->post('name')
			];

			$this->db->where('id', $id);
			$this->db->update('brands', $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/brands');
		}

		$data['data'] = $this->db->get_where('brands', ['id' => $id])->row();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/brands/edit', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('brands');
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/brands');
	}
}
