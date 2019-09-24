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
		$this->load->view('product/index');
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

	
}
