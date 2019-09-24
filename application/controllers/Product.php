<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	
	/*
	!=============================
	! Add Product
	!=============================
	*/
	public function index()
	{	
		$this->db->order_by('product_name');
		$data['products'] = $this->db->get('tbl_product')->result_object();
		//echo "<pre>";
		//print_r($data); exit;


		$this->load->view('lib/header',$data);
		$this->load->view('product/index');
		$this->load->view('lib/footer');
	}

	/*
	!=============================
	! Add Product
	!=============================
	*/
	public function add_product()
	{
		$this->load->view('lib/header');
		$this->load->view('product/add_product');
		$this->load->view('lib/footer');
	}

	/*
	!=============================
	! Save Product
	!=============================
	*/
	public function save_product()
	{
		//echo $this->input->post('product_name')[0]; 
		//echo '<pre>';
		//print_r($_POST);
		//exit;

		$array_size =$this->input->post('product_name'); 

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

		$this->session->set_flashdata('success', 'Product added successfully');

	}

	

	
}
