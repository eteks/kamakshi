<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');

		// Load session library
        $this->load->library('session');
	}
	// Subcategory products
	public function ajax_subcategory_products()
	{	
		$data['products_subcategory'] = $this->ajax_model->get_products_subcategory();
		$products_subcategory_list = $this->load->view('products_ajax',$data);
		echo $products_subcategory_list;		
	}
	// Recipient products
	public function ajax_recipient_products()
	{	
		$data['products_subcategory'] = $this->ajax_model->get_products_recipient();
		$products_subcategory_list = $this->load->view('products_ajax',$data);
		echo $products_subcategory_list;		
	}
	// Add to cart- add items in cart
	public function add_to_cart_details()
	{	
		$data_values = $this->ajax_model->get_add_to_cart_count();
		$data['add_to_cart_status'] = $data_values['add_to_cart_status'];
		$data['order_count'] = $data_values['order_count'];
		echo json_encode($data);		
	}
	// Remove products in basket
	public function remove_baseket_product()
	{	
		$remove_status = $this->ajax_model->get_remove_product();
		echo $remove_status;		
	}
	// Update products in basket
	public function update_baseket_product()
	{	
		$remove_status = $this->ajax_model->get_update_product();
		// echo $remove_status;	
		echo $remove_status;	
	}

} // end of the class 