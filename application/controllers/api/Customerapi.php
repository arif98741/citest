<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customerapi extends CI_Controller {

	
	/*
	!=============================
	! Add Product
	!=============================
	*/
	public function get_customer($id)
	{	
		$this->db->where('serial',$id);
		$data['customer'] = $this->db->get('tbl_customer')->row();
		echo json_encode($data['customer']);
	}

	/*
	!=============================
	! Add Product
	!=============================
	*/
	public function add_customer()
	{
		$this->load->view('lib/header');
		$this->load->view('customer/add_customer');
		$this->load->view('lib/footer');
	}

	
}
