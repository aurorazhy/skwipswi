<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars extends CI_Controller
{

	public function index()
	{
		$this->db->select('cars.*, series.brand_id as brand_id, series.name as series_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('series', 'series.id = cars.series_id');
		$this->db->join('brands', 'brands.id = series.brand_id');
		$this->db->where('cars.is_sold', '0');
		$data['cars'] = $this->db->get()->result();
		$this->load->view('templates/header');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$this->db->select('cars.*, series.brand_id as brand_id, series.name as series_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('series', 'series.id = cars.series_id');
		$this->db->join('brands', 'brands.id = series.brand_id');
		$this->db->where('cars.bpkb_number', $id);
		$data['car'] = $this->db->get()->row();
		$data['payment_options'] = $this->db->get('payment_options')->result();
		$this->load->view('templates/header');
		$this->load->view('detail', $data);
		$this->load->view('templates/footer');
	}

	public function submit_appointment()
	{
		$data = [
			'phone' => $this->input->post('phone'),
			'meet_date' => date('Y-m-d', strtotime($this->input->post('date'))),
			'meet_time' => date('H:i:s', strtotime($this->input->post('date'))),
			'car_bpkb_number' => $this->input->post('car_bpkb_number'),
			'user_id' => $this->session->userdata('user')->id,
		];
		$this->db->insert('appointments', $data);
		$this->session->set_flashdata('success', 'Berhasil membuat janji temu, silahkan tunggu konfirmasi dari kami!');
		redirect('cars/detail/' . $this->input->post('car_bpkb_number'));
	}

	public function submit_buy_car()
	{
		$data = [
			'phone' => $this->input->post('phone'),
			'payment_id' => $this->input->post('payment_option'),
			'car_id' => $this->input->post('car_id'),
			'user_id' => $this->session->userdata('user')->id,
		];
		$this->db->insert('sale_histories', $data);
		$this->session->set_flashdata('success', 'Berhasil melakukan pembelian mobil, silahkan tunggu konfirmasi dari kami!');
		redirect('cars/detail/' . $this->input->post('car_id'));
	}

	public function submit_sell_car()
	{
		// if (substr($this->input->post('prod_year'), 0, 4) != date('Y')) {
		// if (substr($this->input->post('prod_year'), 0, 4) < date('Y')) {
		// 	$this->session->set_flashdata('error', 'Tahun produksi harus kurang dari tahun saat ini!');
		// 	$back = $_SERVER['HTTP_REFERER'];
		// 	header('Location: ' . $back);
		// }
		$data = [
			'phone' => $this->input->post('phone'),
			'brand_id' => $this->input->post('brand_id'),
			'series_id' => $this->input->post('series_id'),
			'user_id' => $this->session->userdata('user')->id,
			'prod_year' => substr($this->input->post('prod_year'), 0, 4),
		];
		$this->db->insert('sell_requests', $data);
		$this->session->set_flashdata('success', 'Berhasil membuat permintaan penjualan mobil, silahkan tunggu konfirmasi dari kami!');
		redirect('cars');
	}
}
