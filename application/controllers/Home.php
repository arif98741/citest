<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	/*
	!=============================
	! Add Product
	!=============================
	*/
	public function index()
	{
		
		$this->load->view('lib/header');
		$this->load->view('home');
		$this->load->view('lib/footer');
	}
}
