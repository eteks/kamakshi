<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('index_model');
        // Load session library
        $this->load->library('session');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
        $this->session->set_userdata("login_status","1");
        $this->session->set_userdata("login_id","3");
        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 3;
    }

    // Index page
    public function index()
	{
      $categories_values_reg = $this->index_model->get_register();
      $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
      $categories['order_details'] = $categories_values_reg['order_details'];
      $categories['order_count'] = $categories_values_reg['order_count'];
      $categories['giftstore_product'] = $this->index_model->get_latestproduct();
      $categories['recipient_list'] = $this->index_model->get_recipient_list();
      $categories['category_recipient_list'] = $this->index_model->get_category_recipient();
	  $this->load->view('index',$categories);
    }
	
	public function register()
	{ 
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
		// $categories['giftstore_subcategory'] = $this->index_model->get_category();
		$this->load->view('register',$categories);
	}

    // Listing page with pagination
    public function category()
	{
		$categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
		$categories['gift_recipient'] = $this->index_model->get_recipient();
    	$category_values = $this->index_model->get_category($this->perPage);
		$categories['cat_name'] = $category_values['cat_name'];
		$categories['gift_subcategory'] = $category_values['gift_subcategory'];
		$categories['cat_pro_count'] = $category_values['cat_pro_count'];
		$categories['product_category'] = $category_values['product_category'];
		// print_r($categories);
		if($categories['cat_name']!=null && $categories['gift_subcategory']!=null && $categories['cat_pro_count']!=null && $categories['product_category']!=null) {
    	    //pagination configuration
            $config['target']      = '#all_products_section';
            $config['base_url']    = base_url().'index.php/ajax_controller/filtering_product';
            $config['total_rows']  = $categories['cat_pro_count'];
            $config['per_page']    = $this->perPage;
            $this->ajax_pagination->initialize($config);
            $this->load->view('category',$categories);
		}
		else {
			$this->load->view('no_products',$categories);
		}
	}

    //  Product details page with attribute
	public function detail()
	{
		$categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];

		$categories_values = $this->index_model->get_product_details();
		$categories['product_image_details'] = $categories_values['product_image_details'];
		$categories['product_details'] = $categories_values['product_details'];
		$categories['recommanded_products'] = $categories_values['recommanded_products'];
		$categories['product_default_image'] = $categories_values['product_default_image'];
        $categories['attribute_array'] = $categories_values['attribute_array'];
		// print_r($categories['attribute_array']);
		$this->load->view('detail',$categories);
	}

    //  Checkout page
    public function checkout()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories_values_basket = $this->index_model->get_cart_details();
        $categories['basket_details'] = $categories_values_basket['basket_details'];
        $categories['basket_count'] = $categories_values_basket['basket_count'];
        // print_r($categories['basket_details']);
        $categories['state'] = $this->index_model->get_state();
        $this->load->view('checkout',$categories);

    }

	public function contact()
	{
		$categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
		// $categories['giftstore_subcategory'] = $this->index_model->get_category();
		$this->load->view('contact',$categories);
	}

	public function reg_form()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->index_model->get_reg_form();
        $this->load->view('register', $categories);
    }

	public function basket()
	{
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories_values_basket = $this->index_model->get_cart_details();
        $categories['basket_details'] = $categories_values_basket['basket_details'];
        $categories['basket_count'] = $categories_values_basket['basket_count'];
        // print_r($categories['basket_details']);
		$this->load->view('basket',$categories);
	}




  


	public function checkout1()
	{
		$this->load->view('checkout1');
	}
	public function checkout2()
	{
		$this->load->view('checkout2');
	}
    public function checkout3()
    {
        $this->load->view('checkout3');
    }
    public function checkout4()
    {
        $this->load->view('checkout4');
    }
    public function customer_account()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->load->view('customer_account', $categories);
    }
    public function customer_wishlist()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->load->view('customer_wishlist', $categories);
    }
    public function customer_orders()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->load->view('customer_orders', $categories);
    }

    public function customer_order()
    {
        $this->load->view('customer_order');
    }

    public function rolekey_exists($key) 
    {
        $this->index_model->mail_exists($key);
    }
  
}
/* End of file welcome.php */
