<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sell_requests extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) redirect('admin');
	}

	public function index()
	{
		$this->db->select('sell_requests.*, brands.name as brand_name, models.name as model_name, users.name as user_name, users.email as user_email');
		$this->db->from('sell_requests');
		$this->db->join('brands', 'brands.id = sell_requests.brand_id');
		$this->db->join('models', 'models.id = sell_requests.model_id');
		$this->db->join('users', 'users.id = sell_requests.user_id');
		$this->db->order_by('sell_requests.id', 'desc');
		$data['data'] = $this->db->get()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/sell_requests/data', $data);
		$this->load->view('admin/templates/footer');
	}

	public function finish($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sell_requests', ['status' => 'SUCCESS']);
		$this->session->set_flashdata('success', 'Berhasil menyelesaikan penjualan');
		redirect('admin/sell_requests');
	}

	public function cancel($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sell_requests', ['status' => 'CANCEL']);
		$this->session->set_flashdata('success', 'Berhasil membatalkan penjualan');
		redirect('admin/sell_requests');
	}
}
