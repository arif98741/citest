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
		$data['customers'] = $this->db->order_by('customer_name')->get('tbl_customer')->result_object();
		$data['products'] = $this->db->order_by('product_name')->get('tbl_product')->result_object();
		

		$this->load->view('lib/header',$data);
		$this->load->view('sale/sale_product');
		$this->load->view('lib/footer');
	}

	/*
	!=============================
	! Save Product
	!=============================
	*/
	public function save_sale()
	{
		echo '<pre>';
		print_r($_POST); exit;
		$invoice_number = str_pad(1, 6, 0, STR_PAD_LEFT); 
		$invoice = $this->db->order_by('serial')->get('tbl_invoice')->row();
		if (!empty($row)) {
			$invoice_number = $invoice->invoice_number + 1;
		}

		$this->db->insert('tbl_product',array(

		));

		$array_size =$this->input->post('product_id'); 

		for($i= 0; $i< count($array_size); $i++)
		{	
			$data = array(
				'product_id' 	=> $this->input->post('product_id')[$i],
				'product_name' 	=> $this->input->post('product_name')[$i],
				'sale_price' 	 => $this->input->post('sale_price')[$i],
				'purchase_price' => $this->input->post('purchase_price')[$i]
			);

			$this->db->insert('tbl_product',$data); //insert data
		}

		$this->db->insert('tbl_customer',$data); //insert data
		$this->session->set_flashdata('success', 'Customer added successfully');
		redirect('customer/index','refresh');
	}
	
}
