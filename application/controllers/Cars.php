<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars extends CI_Controller
{

	public function index()
	{
		$this->db->select('cars.*, models.brand_id as brand_id, models.name as model_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->where('cars.is_sold', '0');
		$data['cars'] = $this->db->get()->result();
		$this->load->view('templates/header');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$this->db->select('cars.*, models.brand_id as brand_id, models.name as model_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->where('cars.id', $id);
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
			'car_id' => $this->input->post('car_id'),
			'user_id' => $this->session->userdata('user')->id,
		];
		$this->db->insert('appointments', $data);
		$this->session->set_flashdata('success', 'Berhasil membuat janji temu');
		redirect('cars/detail/' . $this->input->post('car_id'));
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
			'model_id' => $this->input->post('model_id'),
			'user_id' => $this->session->userdata('user')->id,
			'prod_year' => substr($this->input->post('prod_year'), 0, 4),
		];
		$this->db->insert('sell_requests', $data);
		$this->session->set_flashdata('success', 'Berhasil membuat permintaan penjualan mobil, silahkan tunggu konfirmasi dari kami!');
		redirect('cars');
	}
}
