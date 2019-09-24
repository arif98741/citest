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
	
		//echo '<pre>';
		//print_r($_POST); exit;
		$invoice_number = str_pad(1, 6, 0, STR_PAD_LEFT); 
		$invoice = $this->db->order_by('serial','desc')->limit(1)->get('tbl_invoice')->row();
		if ($invoice) {
			$invoice_number = $invoice->invoice_number + 1;
		}

		$this->db->insert('tbl_invoice',array(
			'invoice_number' 	=> str_pad($invoice_number, 6, 0, STR_PAD_LEFT),
			'customer_id' 		=> $this->input->post('customr_id'),
			'quantity' 	 		=> $this->array_sum($this->input->post('quantity')),
			'total' 	 		=> $this->array_sum($this->input->post('total')),
			'invoice_discount'  => 0,
			'paid_amount	'  	=> 0,
			'due_amount	'  		=> 0,
			'total' 	 		=> $this->array_sum($this->input->post('total')),
			'date' 	 	 		=> date('Y-m-d H:i:s'),
			'status' 	 		=> 'unpaid'
		));

		$array_size = $this->input->post('product_id');

		for($i= 0; $i< count($array_size); $i++)
		{	
			$data = array(
				'invoice_number' => str_pad($invoice_number, 6, 0, STR_PAD_LEFT),
				'product_id' 	=> $this->input->post('product_id')[$i],
				'price' 	 	=> $this->input->post('sale_price')[$i],
				'quantity' 		=> $this->input->post('quantity')[$i],
				'discount' 		=> $this->input->post('discount	')[$i],
				'total' 		=> $this->input->post('total	')[$i],
			);

			$this->db->insert('tbl_invoice_products',$data); //insert data
		}

		//$this->db->insert('tbl_customer',$data); //insert data
		//$this->session->set_flashdata('success', 'Customer added successfully');
		//redirect('customer/index','refresh');
	}

	/*
	!-------------
	!
	!-------------
	*/
	private function array_sum($array)
	{
		//echo "<pre>";
		//print_r($array); exit;

		$sum = 0;
		foreach ($array as $value) {
			$sum += $value;
		}
		return $sum;
	}
	
}
