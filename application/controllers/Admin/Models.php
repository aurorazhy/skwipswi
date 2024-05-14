<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$this->db->select('models.*, brands.name as brand_name');
		$this->db->from('models');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/models/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Nama Model', 'required');
		$this->form_validation->set_rules('brand_id', 'Merk', 'required');
		// $this->form_validation->set_rules('code', 'Kode Model', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'name' => $this->input->post('name'),
				'brand_id' => $this->input->post('brand_id'),
				// 'code' => $this->input->post('code'),
			];

			$this->db->insert('models', $data);
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('admin/models');
		}

		$data['brands'] = $this->db->get('brands')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/models/add', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Nama Model', 'required');
		$this->form_validation->set_rules('brand_id', 'Merk', 'required');
		// $this->form_validation->set_rules('code', 'Kode Model', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'name' => $this->input->post('name'),
				'brand_id' => $this->input->post('brand_id'),
				// 'code' => $this->input->post('code'),
			];

			$this->db->where('id', $id);
			$this->db->update('models', $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/models');
		}

		$data['data'] = $this->db->get_where('models', ['id' => $id])->row();
		$data['brands'] = $this->db->get('brands')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/models/edit', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('models');
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/models');
	}
}
