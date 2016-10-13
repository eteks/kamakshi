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
        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 14;
        date_default_timezone_set('Asia/Kolkata');
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
      // $categories['login_url'] = $this->login();
	  $this->load->view('index',$categories);

    }
	
	public function register()
	{ 
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
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
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
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
        $categories['recipient_list'] = $this->index_model->get_recipient_list();

		$categories_values = $this->index_model->get_product_details();
		$categories['product_image_details'] = $categories_values['product_image_details'];
        $categories['product_attributes'] = $categories_values['product_attributes'];
		$categories['product_details'] = $categories_values['product_details'];
		$categories['recommanded_products'] = $categories_values['recommanded_products'];
		$categories['product_default_image'] = $categories_values['product_default_image'];
  		$this->load->view('detail',$categories);
	}

    //  Checkout page
    public function checkout()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
        $categories_values_basket = $this->index_model->get_cart_details();
        $categories['basket_details'] = $categories_values_basket['basket_details'];
        $categories['basket_count'] = $categories_values_basket['basket_count'];
        $categories['orderitem_session_id_checkout'] = $categories_values_basket['orderitem_session_id_checkout'];
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
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
		// $categories['giftstore_subcategory'] = $this->index_model->get_category();
		$this->load->view('contact',$categories);
	}

    // Profile for registered users
    public function profile()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
        $categories_profile = $this->index_model->get_user_profile_details();
        $categories['user_profile_details'] = $categories_profile['user_profile_details'];
        $categories['profile_get_state'] = $categories_profile['profile_get_state'];
        $categories['profile_get_city'] = $categories_profile['profile_get_city'];
        $categories['profile_get_area'] = $categories_profile['profile_get_area'];
        // $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->load->view('profile',$categories);
    }
    // My orders for registered users   
    public function my_orders()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
        $categories['my_orders'] = $this->index_model->get_my_orders();
        // $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->load->view('my_orders', $categories);
    }
	public function reg_form()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
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
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
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

    // Payment gateway
    public function payumoney()
    {
        $this->load->view('payu/PayUMoney_form');
    }

    // Payment gateway sucess
    public function pay_success()
    {
        $this->load->view('payu/success');
    }

    // Payment gateway failure
    public function pay_failure()
    {
        $this->load->view('payu/failure');
    }

    // Payment gateway cancellation
    public function pay_cancel()
    {
        $this->load->view('payu/cancel');
    }

    // Success page for after payment
    public function success()
    {
        $this->load->view('payu/payment_success');
    }

    public function customer_wishlist()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
        // $categories['giftstore_subcategory'] = $this->index_model->get_category();
        $this->load->view('customer_wishlist', $categories);
    }
   

    public function customer_order()
    {
        $this->load->view('customer_order');
    }

    public function rolekey_exists($key) 
    {
        $this->index_model->mail_exists($key);
    }

    public function recipient_category()
    {
        $categories_values_reg = $this->index_model->get_register();
        $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
        $categories['order_details'] = $categories_values_reg['order_details'];
        $categories['order_count'] = $categories_values_reg['order_count'];
        $categories['recipient_list'] = $this->index_model->get_recipient_list();
        $categories_val_details = $this->index_model->get_recipients_category();
        $categories['recipients_category_list'] = $categories_val_details['recipients_category_list'];
        $categories['recipient_name'] = $categories_val_details['recipient_name'];
        if($categories['recipients_category_list']!=null && $categories['recipient_name']!=null)
        {
            $this->load->view('recipient_category',$categories);
        }
        else {
            $this->load->view('no_products',$categories);
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('login_status');
        $this->session->unset_userdata('login_session');
        redirect(base_url()); 
    }
    public function nopage()
    {
        $this->load->view('404');
    }
    public function track_order()
    {
        $this->load->view('track_order');
    }
}
/* End of file welcome.php */
