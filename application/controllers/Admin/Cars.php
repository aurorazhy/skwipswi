<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$this->db->select('cars.*, models.brand_id as brand_id, models.name as model_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('admins', 'admins.id = cars.admin_id');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/cars/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Nama Mobil', 'required');
		// $this->form_validation->set_rules('brand_id', 'Merk', 'required');
		$this->form_validation->set_rules('model_id', 'Model', 'required');
		$this->form_validation->set_rules('number_plate', 'Plat Nomor', 'required');
		$this->form_validation->set_rules('transmission', 'Transmisi', 'required');
		$this->form_validation->set_rules('fuel', 'Bahan Bakar', 'required');
		$this->form_validation->set_rules('tax_exp_date', 'Pajak Terakhir', 'required');
		$this->form_validation->set_rules('year', 'Tahun', 'required');
		$this->form_validation->set_rules('color', 'Warna', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'admin_id' => $this->session->userdata('admin')->id,
				'name' => $this->input->post('name'),
				// 'brand_id' => $this->input->post('brand_id'),
				'model_id' => $this->input->post('model_id'),
				'number_plate' => $this->input->post('number_plate'),
				'transmission' => $this->input->post('transmission'),
				'fuel' => $this->input->post('fuel'),
				'tax_exp_date' => $this->input->post('tax_exp_date'),
				'year' => $this->input->post('year'),
				'color' => $this->input->post('color'),
				'kilometers' => $this->input->post('kilometers'),
				'registration_area' => $this->input->post('registration_area'),
				'cc_engine' => $this->input->post('cc_engine'),
				'price' => $this->input->post('price'),
				'is_sold' => $this->input->post('is_sold'),
				'description' => $this->input->post('description')
			];

			$config['upload_path']          = './assets/img/cars/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048 * 5;
			$config['encrypt_name']         = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('img_link')) {
				$data['img_link'] = $this->upload->data('file_name');
				$this->db->insert('cars', $data);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('admin/cars');
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
			}
		}
		$data['brands'] = $this->db->get('brands')->result();
		$data['models'] = $this->db->get('models')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/cars/add', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Nama Mobil', 'required');
		// $this->form_validation->set_rules('brand_id', 'Merk', 'required');
		$this->form_validation->set_rules('model_id', 'Model', 'required');
		$this->form_validation->set_rules('number_plate', 'Plat Nomor', 'required');
		$this->form_validation->set_rules('transmission', 'Transmisi', 'required');
		$this->form_validation->set_rules('fuel', 'Bahan Bakar', 'required');
		$this->form_validation->set_rules('tax_exp_date', 'Pajak Terakhir', 'required');
		$this->form_validation->set_rules('year', 'Tahun', 'required');
		$this->form_validation->set_rules('color', 'Warna', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'admin_id' => $this->session->userdata('admin')->id,
				'name' => $this->input->post('name'),
				// 'brand_id' => $this->input->post('brand_id'),
				'model_id' => $this->input->post('model_id'),
				'number_plate' => $this->input->post('number_plate'),
				'transmission' => $this->input->post('transmission'),
				'fuel' => $this->input->post('fuel'),
				'tax_exp_date' => $this->input->post('tax_exp_date'),
				'year' => $this->input->post('year'),
				'color' => $this->input->post('color'),
				'kilometers' => $this->input->post('kilometers'),
				'registration_area' => $this->input->post('registration_area'),
				'cc_engine' => $this->input->post('cc_engine'),
				'price' => $this->input->post('price'),
				'is_sold' => $this->input->post('is_sold'),
				'description' => $this->input->post('description')
			];

			$config['upload_path']          = './assets/img/cars/';
			$config['allowed_types'] 	  = 'gif|jpg|png';
			$config['max_size']             = 2048 * 5;
			$config['encrypt_name']         = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('img_link')) {
				$data['img_link'] = $this->upload->data('file_name');
			}

			$this->db->where('id', $id);
			$this->db->update('cars', $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/cars');
		}

		$data['data'] = $this->db->get_where('cars', ['id' => $id])->row();
		$data['brands'] = $this->db->get('brands')->result();
		$data['models'] = $this->db->get('models')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/cars/edit', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cars');
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/cars');
	}
}
