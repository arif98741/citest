<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productapi extends CI_Controller {

	
	/*
	!=============================
	! Get Product
	!=============================
	*/
	public function get_product($id)
	{	
		$this->db->where('product_id',$id);
		$data['product'] = $this->db->get('tbl_product')->row();
		echo json_encode($data['product']);
	}
}
