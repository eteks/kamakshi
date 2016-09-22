<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');
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

} // end of the class 