<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');

		// Load session library
        $this->load->library('session');
		$this->load->library('email');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));

        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 4;
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
       	// $config['base_url']    = base_url().'index.php/oauth_login/test';
        $config['target']      = '#all_products_section';
        $config['base_url']    = base_url().'index.php/ajax_controller/filtering_product';
        $config['total_rows']  = $data['product_count'];
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        $this->load->view('category',$data,false);
        // $this->load->view('products_ajax',$data,false);
    	// echo $products_subcategory_list;		
	}

	// Filtering for search products
	public function filtering_search_product()
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
        $category_values = $this->ajax_model->get_filtering_search_product($input);
        $categories['product_list'] = $category_values['product_list'];
        $categories['cat_pro_count'] = $category_values['cat_pro_count'];

        //pagination configuration
        		// $config['base_url']    = base_url().'index.php/oauth_login/test';
        $config['target']      = '#all_products_section';
        $config['base_url']    = base_url().'index.php/ajax_controller/filtering_search_product';
        $config['total_rows']  = $categories['cat_pro_count'];
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        $this->load->view('search',$categories,false);
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
	//forgot -Pwd
	public function popup_forgot_pwd()
	{
		$validation_rules = array(
            array(
                 'field'   => 'popup_forgot_email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean|callback_email_check'
              ), 
        );
        $this->form_validation->set_rules($validation_rules);
        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field);  
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
		else {
			
					$status = $this->ajax_model->get_popup_forgot_pwd_status($this->input->post('popup_forgot_email'));
		}
		echo $status;
	}

	// Profile details form
	public function profile_details_form()
	{	
		$data = $this->ajax_model->get_profile_details_form_status();
		echo $data;
	}

	// Profile password change
	public function profile_password_form()
	{	
		$data = $this->ajax_model->get_profile_password_form_status();
		echo $data;
	}

	// Product attributes combination
	public function attribute_price()
	{	
		$data = $this->ajax_model->get_attribute_price();
		echo json_encode($data);
	}

	// Get myorders list
	public function myorders_list()
	{	
		$data = $this->ajax_model->get_myorders_list();
		echo json_encode($data);
	}

} // end of the class
