<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');

		// Load session library
        $this->load->library('session');
	}

	public function ajax_subcategory_products()
	{	
		$data['products_subcategory'] = $this->ajax_model->get_products_subcategory();
		$products_subcategory_list = $this->load->view('products_ajax',$data);
		echo $products_subcategory_list;		
	}
	public function ajax_recipient_products()
	{	
		$data['products_subcategory'] = $this->ajax_model->get_products_recipient();
		$products_subcategory_list = $this->load->view('products_ajax',$data);
		echo $products_subcategory_list;		
	}
	public function add_to_cart_details()
	{	
		$data_values = $this->ajax_model->get_add_to_cart_count();
		$data['add_to_cart_status'] = $data_values['add_to_cart_status'];
		$data['order_count'] = $data_values['order_count'];
		echo json_encode($data);		
	}

} // end of the class 