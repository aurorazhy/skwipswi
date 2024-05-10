<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
	public function index()
	{
		$this->db->select('appointments.*, models.brand_id, cars.model_id, brands.name as brand_name, models.name as model_name');
		$this->db->from('appointments');
		$this->db->join('cars', 'cars.id = appointments.car_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->order_by('appointments.id', 'desc');
		$this->db->where('appointments.user_id', $this->session->userdata('user')->id);
		$data['appointments'] = $this->db->get()->result();

		$this->db->select('sale_histories.*, models.brand_id, cars.model_id, brands.name as brand_name, models.name as model_name');
		$this->db->from('sale_histories');
		$this->db->join('cars', 'cars.id = sale_histories.car_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->order_by('sale_histories.id', 'desc');
		$this->db->where('sale_histories.user_id', $this->session->userdata('user')->id);
		$data['sale_histories'] = $this->db->get()->result();

		$this->db->select('sell_requests.*, models.brand_id as brand_id, models.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sell_requests');
		$this->db->join('models', 'models.id = sell_requests.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->order_by('sell_requests.id', 'desc');
		$this->db->where('sell_requests.user_id', $this->session->userdata('user')->id);
		$data['sell_requests'] = $this->db->get()->result();

		$data['activities'] = [];
		foreach ($data['appointments'] as $appointment) {
			$data['activities'][] = "Mengajukan janji temu untuk bertemu " . $appointment->brand_name . ' ' . $appointment->model_name . " pada tanggal " . $appointment->meet_date . " pukul " . $appointment->meet_time;
		}

		foreach ($data['sale_histories'] as $sale_history) {
			$data['activities'][] = "Membeli " . $sale_history->brand_name . ' ' . $sale_history->model_name;
		}

		foreach ($data['sell_requests'] as $sell_request) {
			$data['activities'][] = "Mengajukan penjualan " . $sell_request->brand_name . ' ' . $sell_request->model_name . " tahun " . $sell_request->prod_year;
		}

		$this->load->view('templates/header');
		$this->load->view('history', $data);
		$this->load->view('templates/footer');
	}
}
