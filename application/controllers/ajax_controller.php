<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');

		// Load session library
        $this->load->library('session');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));

        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 3;
	}

	// Filtering for products
	public function filtering_product()
	{	
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        $input['offset'] = $offset;
        $input['limit'] = $this->perPage;
        //get the posts data
        $data_values = $this->ajax_model->get_filtering_product($input);
        $data['product_category'] =  $data_values['product_category'];
        $data['product_count'] =  $data_values['product_count'];
        //pagination configuration
        $config['target']      = '#all_products_section';
        $config['base_url']    = base_url().'index.php/ajax_controller/filtering_product';
        $config['total_rows']  = $data['product_count'];
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        $this->load->view('category',$data,false);
        // $this->load->view('products_ajax',$data,false);
    	// echo $products_subcategory_list;		
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
		echo $remove_status;	
	}

	// Get city based on state
	public function get_city()
	{	
		$data = $this->ajax_model->get_city_data();
		echo json_encode($data);
	}

	// Get area based on city
	public function get_area()
	{	
		$data = $this->ajax_model->get_area_data();
		echo json_encode($data);
	}

	// Get shipping amount based on area
	public function get_area_shipping()
	{	
		$data = $this->ajax_model->get_area_shipping_amount();
		echo $data;
	}

	// Registration
	public function registeration()
	{	
		$data = $this->ajax_model->get_registeration_status();
		echo $data;
	}

	// Login - registration
	public function register_login()
	{	
		$data = $this->ajax_model->get_register_login_status();
		echo $data;
	}

	// Login - popup
	public function popup_login()
	{	
		$data = $this->ajax_model->get_popup_login_status();
		echo $data;
	}

} // end of the class
