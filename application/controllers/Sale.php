<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	
	/*
	!=============================
	! Add Product
	!=============================
	*/
	public function index()
	{	
		$this->db->order_by('customer_name');
		$data['customers'] = $this->db->get('tbl_customer')->result_object();
		//echo "<pre>";
		//print_r($data); exit;

		$this->load->view('lib/header',$data);
		$this->load->view('customer/index');
		$this->load->view('lib/footer');
	}

	/*
	!=============================
	! Sale Product
	!=============================
	*/
	public function sale_product()
	{
		$this->db->order_by('customer_name');
		$data['customers'] = $this->db->get('tbl_customer')->result_object();
		$this->load->view('lib/header',$data);
		$this->load->view('sale/sale_product');
		$this->load->view('lib/footer');
	}

	/*
	!=============================
	! Save Product
	!=============================
	*/
	public function save_customer()
	{
		$data = array(
			'customer_id' 	=> $this->input->post('customer_id'),
			'customer_name' 	=> $this->input->post('customer_name'),
			'contact_no' 	 => $this->input->post('contact_no'),
			'email' => $this->input->post('email')
		);

		$this->db->insert('tbl_customer',$data); //insert data
		$this->session->set_flashdata('success', 'Customer added successfully');
		redirect('customer/index','refresh');
	}
	
}
