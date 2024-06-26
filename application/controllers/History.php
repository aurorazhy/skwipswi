<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
	public function index()
	{
		$this->db->select('appointments.*, series.brand_id, cars.series_id, brands.name as brand_name, series.name as model_name');
		$this->db->from('appointments');
		$this->db->join('cars', 'cars.bpkb_number = appointments.car_id');
		$this->db->join('series', 'series.id = cars.series_id');
		$this->db->join('brands', 'brands.id = series.brand_id');
		$this->db->order_by('appointments.id', 'desc');
		$this->db->where('appointments.user_id', $this->session->userdata('user')->id);
		$data['appointments'] = $this->db->get()->result();

		$this->db->select('sale_histories.*, series.brand_id, cars.series_id, brands.name as brand_name, series.name as model_name');
		$this->db->from('sale_histories');
		$this->db->join('cars', 'cars.bpkb_number = sale_histories.car_id');
		$this->db->join('series', 'series.id = cars.series_id');
		$this->db->join('brands', 'brands.id = series.brand_id');
		$this->db->order_by('sale_histories.id', 'desc');
		$this->db->where('sale_histories.user_id', $this->session->userdata('user')->id);
		$data['sale_histories'] = $this->db->get()->result();

		$this->db->select('sell_requests.*, series.brand_id as brand_id, series.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sell_requests');
		$this->db->join('series', 'series.id = sell_requests.series_id');
		$this->db->join('brands', 'brands.id = series.brand_id');
		$this->db->join('users', 'users.id = sell_requests.user_id');
		$this->db->order_by('sell_requests.id', 'desc');
		$this->db->where('sell_requests.user_id', $this->session->userdata('user')->id);
		$data['sell_requests'] = $this->db->get()->result();

		function get_brand_name($model_id) {
			$CI =& get_instance();
			$CI->db->select('brand_id');
			$CI->db->where('id', $model_id);
			$query = $CI->db->get('series');
			$model = $query->row();
		
			$brand = $CI->db->get_where('brands', ['id' => $model->brand_id])->row();
		
			return $brand->name;
		}

		$data['activities'] = [];
		foreach ($data['appointments'] as $appointment) {
			
			$data['activities'][] = "Mengajukan janji temu untuk bertemu " .  get_brand_name($appointment->model_id) . ' ' . $appointment->model_name . " pada tanggal " . $appointment->meet_date . " pukul " . $appointment->meet_time;
		}

		foreach ($data['sale_histories'] as $sale_history) {
			$data['activities'][] = "Membeli " .  get_brand_name($sale_history->model_id) . ' ' . $sale_history->model_name;
		}

		foreach ($data['sell_requests'] as $sell_request) {
			$data['activities'][] = "Mengajukan penjualan " .  get_brand_name($sell_request->model_id) . ' ' . $sell_request->model_name . " tahun " . $sell_request->prod_year;
		}

		$this->load->view('templates/header');
		$this->load->view('history', $data);
		$this->load->view('templates/footer');
	}
}
