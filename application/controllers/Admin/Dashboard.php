<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $admin = null;
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) {
			if ($this->input->post('email')) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$admin = $this->db->get_where('admins', ['email' => $email])->row();

				if ($admin) {
					if ($password == $admin->password) {
						$this->session->set_userdata('admin', $admin);
						$this->session->set_flashdata('success', 'Login berhasil');
					} else {
						$this->session->set_flashdata('error', 'Login gagal');
					}
				} else {
					$this->session->set_flashdata('error', 'Login gagal');
				}
				redirect('admin');
			}

			return $this->load->view('admin/login');
		} else {
			$this->admin = $this->session->userdata('admin');
		}
	}

	public function index()
	{
		if (!$this->admin) return false;
		// users
		$this->db->select('*');
		$this->db->from('users');
		$data['users'] = $this->db->get()->result();

		$this->db->select('cars.*, models.brand_id as brand_id, models.name as model_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->where('cars.is_sold', 0);
		$data['katalog_aktif'] = $this->db->get()->result();

		$this->db->select('cars.*, models.brand_id as brand_id, models.name as model_name, brands.name as brand_name');
		$this->db->from('cars');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$data['katalog'] = $this->db->get()->result();

		$this->db->select('*');
		$this->db->from('sale_histories');
		$this->db->where('MONTH(buy_date)', date('m'));
		$this->db->where('YEAR(buy_date)', date('Y'));
		$this->db->where('status', 'SUCCESS');
		$data['penjualan_perbulan'] = $this->db->get()->result();

		$this->db->select('sale_histories.*, users.name as user_name, users.email as email, payment_options.name as payment_option_name, cars.name as car_name, cars.price as car_price, cars.number_plate as car_number_plate, cars.color as car_color, cars.year as car_year, cars.kilometers as car_kilometers, cars.cc_engine as car_cc_engine, cars.transmission as car_transmission, cars.fuel as car_fuel, cars.tax_exp_date as car_tax_exp_date, cars.registration_area as car_registration_area, cars.description as car_description, cars.img_link as car_image, cars.is_sold as car_is_sold, models.brand_id as brand_id, models.name as model_name, brands.name as brand_name');
		$this->db->from('sale_histories');
		$this->db->join('payment_options', 'payment_options.id = sale_histories.payment_id');
		$this->db->join('cars', 'cars.id = sale_histories.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('users', 'users.id = sale_histories.user_id');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		$data['penjualan_terakhir'] = $this->db->get()->result();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function profile()
	{
		if (!$this->admin) return false;
		$data['data'] = $this->admin;

		if ($this->input->post('name')) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$d = [
				'name' => $name,
				'email' => $email,
			];

			if ($password) {
				$d['password'] = $password;
			}

			$config['upload_path']          = './assets/img/admins/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2048 * 5;
			$config['encrypt_name']         = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('img_link')) {
				$data_upload = $this->upload->data();
				$d['img_link'] = $data_upload['file_name'];
			}

			$this->db->where('id', $this->admin->id);
			$this->db->update('admins', $d);

			$this->session->set_flashdata('success', 'Berhasil mengubah profil');
			$this->admin = $this->db->get_where('admins', ['id' => $this->admin->id])->row();
			$this->session->set_userdata('admin', $this->admin);
			redirect('admin/profile');
		}
		$this->load->view('admin/templates/header');
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}
