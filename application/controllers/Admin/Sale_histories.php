<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale_histories extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$this->db->select('sale_histories.*, CONCAT(brands.name, " | ", models.name) as car_name, payment_options.name as payment_option_name, cars.price as car_price, cars.number_plate as car_number_plate, cars.color as car_color, cars.year as car_year, cars.kilometers as car_kilometers, cars.cc_engine as car_cc_engine, cars.transmission as car_transmission, cars.fuel as car_fuel, cars.tax_exp_date as car_tax_exp_date, cars.registration_area as car_registration_area, cars.description as car_description, cars.img_link as car_image, cars.is_sold as car_is_sold, brands.name as brand_name, models.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sale_histories');
		$this->db->join('payment_options', 'payment_options.id = sale_histories.payment_id');
		$this->db->join('cars', 'cars.id = sale_histories.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('users', 'users.id = sale_histories.user_id');
		$this->db->order_by('sale_histories.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/sale_histories/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function finish($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sale_histories', ['status' => 'SUCCESS']);

		$sale_history = $this->db->get_where('sale_histories', ['id' => $id])->row();
		$this->db->where('id', $sale_history->car_id);
		$this->db->update('cars', ['is_sold' => 1]);

		$this->session->set_flashdata('success', 'Berhasil menyelesaikan pembelian');
		redirect('admin/sale_histories');
	}

	public function cancel($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sale_histories', ['status' => 'CANCEL']);
		$this->session->set_flashdata('success', 'Berhasil membatalkan pembelian');
		redirect('admin/sale_histories');
	}

	public function pdf()
	{
		$this->db->select('sale_histories.*, CONCAT(brands.name, " ", models.name, " | ", cars.name) as car_name, payment_options.name as payment_option_name, cars.price as car_price, cars.number_plate as car_number_plate, cars.color as car_color, cars.year as car_year, cars.kilometers as car_kilometers, cars.cc_engine as car_cc_engine, cars.transmission as car_transmission, cars.fuel as car_fuel, cars.tax_exp_date as car_tax_exp_date, cars.registration_area as car_registration_area, cars.description as car_description, cars.img_link as car_image, cars.is_sold as car_is_sold, brands.name as brand_name, models.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sale_histories');
		$this->db->join('payment_options', 'payment_options.id = sale_histories.payment_id');
		$this->db->join('cars', 'cars.id = sale_histories.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('users', 'users.id = sale_histories.user_id');
		$this->db->order_by('sale_histories.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/sale_histories/print', $data);
	}

	public function filtered()
	{
		$start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
		$this->db->select('sale_histories.*, CONCAT(brands.name, " ", models.name, " | ", cars.name) as car_name, payment_options.name as payment_option_name, cars.price as car_price, cars.number_plate as car_number_plate, cars.color as car_color, cars.year as car_year, cars.kilometers as car_kilometers, cars.cc_engine as car_cc_engine, cars.transmission as car_transmission, cars.fuel as car_fuel, cars.tax_exp_date as car_tax_exp_date, cars.registration_area as car_registration_area, cars.description as car_description, cars.img_link as car_image, cars.is_sold as car_is_sold, brands.name as brand_name, models.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sale_histories');
		$this->db->join('payment_options', 'payment_options.id = sale_histories.payment_id');
		$this->db->join('cars', 'cars.id = sale_histories.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('users', 'users.id = sale_histories.user_id');
		$this->db->where("buy_date BETWEEN '$start_date' AND '$end_date'");
		$this->db->order_by('sale_histories.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/sale_histories/data_filtered', $data);
		$this->load->view('admin/templates/footer');
	}

	public function pdf_filtered()
	{
		$start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
		$this->db->select('sale_histories.*, CONCAT(brands.name, " ", models.name, " | ", cars.name) as car_name, payment_options.name as payment_option_name, cars.price as car_price, cars.number_plate as car_number_plate, cars.color as car_color, cars.year as car_year, cars.kilometers as car_kilometers, cars.cc_engine as car_cc_engine, cars.transmission as car_transmission, cars.fuel as car_fuel, cars.tax_exp_date as car_tax_exp_date, cars.registration_area as car_registration_area, cars.description as car_description, cars.img_link as car_image, cars.is_sold as car_is_sold, brands.name as brand_name, models.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sale_histories');
		$this->db->join('payment_options', 'payment_options.id = sale_histories.payment_id');
		$this->db->join('cars', 'cars.id = sale_histories.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('users', 'users.id = sale_histories.user_id');
		$this->db->where("buy_date BETWEEN '$start_date' AND '$end_date'");
		$this->db->order_by('sale_histories.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/sale_histories/print_filtered', $data);
	}
}
