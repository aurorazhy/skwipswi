<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointments extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$this->db->select('appointments.*, CONCAT(brands.name, " | ", models.name) as car_name, admins.name as admin_name, users.name as user_name, users.email as user_email');
		$this->db->from('appointments');
		$this->db->join('cars', 'cars.id = appointments.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('admins', 'admins.id = appointments.admin_id', 'left');
		$this->db->join('users', 'users.id = appointments.user_id');
		$this->db->order_by('appointments.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/appointments/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function finish($id)
	{
		$this->db->where('id', $id);
		$this->db->update('appointments', ['status' => 'SUCCESS']);
		$this->session->set_flashdata('success', 'Berhasil menyelesaikan janji temu');
		redirect('admin/appointments');
	}

	public function cancel($id)
	{
		$this->db->where('id', $id);
		$this->db->update('appointments', ['status' => 'CANCEL']);
		$this->session->set_flashdata('success', 'Berhasil membatalkan janji temu');
		redirect('admin/appointments');
	}

	public function filtered()
	{
		$start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
		$this->db->select('appointments.*, CONCAT(brands.name, " ", models.name, " | ", cars.name) as car_name, admins.name as admin_name, users.name as user_name, users.email as user_email');
		$this->db->from('appointments');
		$this->db->join('cars', 'cars.id = appointments.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('admins', 'admins.id = appointments.admin_id', 'left');
		$this->db->join('users', 'users.id = appointments.user_id');
		$this->db->where("meet_date BETWEEN '$start_date' AND '$end_date'");
		$this->db->order_by('appointments.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/appointments/data_filtered', $data);
		$this->load->view('admin/templates/footer');
	}

	public function pdf()
	{
		$this->db->select('appointments.*, CONCAT(brands.name, " ", models.name, " | ", cars.name) as car_name, admins.name as admin_name, users.name as user_name, users.email as user_email');
		$this->db->from('appointments');
		$this->db->join('cars', 'cars.id = appointments.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('admins', 'admins.id = appointments.admin_id', 'left');
		$this->db->join('users', 'users.id = appointments.user_id');
		$this->db->order_by('appointments.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/appointments/print', $data);
	}

	public function pdf_filtered()
	{
		$start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
		$this->db->select('appointments.*, CONCAT(brands.name, " ", models.name, " | ", cars.name) as car_name, admins.name as admin_name, users.name as user_name, users.email as user_email');
		$this->db->from('appointments');
		$this->db->join('cars', 'cars.id = appointments.car_id');
		$this->db->join('models', 'models.id = cars.model_id');
		$this->db->join('brands', 'brands.id = models.brand_id');
		$this->db->join('admins', 'admins.id = appointments.admin_id', 'left');
		$this->db->join('users', 'users.id = appointments.user_id');
		$this->db->where("meet_date BETWEEN '$start_date' AND '$end_date'");
		$this->db->order_by('appointments.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/appointments/print_filtered', $data);
	}
}
