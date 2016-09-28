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
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
        $this->session->set_userdata("login_status","1");
        $this->session->set_userdata("login_id","3");
        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 3;

    }
	public function index()
	{
      $categories_values_reg = $this->index_model->get_register();
      $categories['giftstore_category'] = $categories_values_reg['giftstore_category'];
      $categories['order_details'] = $categories_values_reg['order_details'];
      $categories['order_count'] = $categories_values_reg['order_count'];
      $categories['giftstore_product'] = $this->index_model->get_latestproduct();
	  // $data['giftstore_subcategory'] = $this->index_model->get_register();
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
            $config['base_url']    = base_url().'index/ajaxPaginationData';
            $config['total_rows']  = $categories['cat_pro_count'];
            $config['per_page']    = $this->perPage;
            $this->ajax_pagination->initialize($config);
            $this->load->view('category',$categories);
		}
		else {
			$this->load->view('no_products',$categories);
		}
	}





 function ajaxPaginationData(){


    echo "test";
        // $page = $this->input->post('page');
        // if(!$page){
        //     $offset = 0;
        // }else{
        //     $offset = $page;
        // }
        
        // //total rows count
        // $totalRec = count($this->post->getRows());
        
        // //pagination configuration
        // $config['target']      = '#postList';
        // $config['base_url']    = base_url().'posts/ajaxPaginationData';
        // $config['total_rows']  = $totalRec;
        // $config['per_page']    = $this->perPage;
        // $this->ajax_pagination->initialize($config);
        
        // //get the posts data
        // $data['posts'] = $this->post->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        // //load the view
        // $this->load->view('posts/ajax-pagination-data', $data, false);
    }








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
		// print_r($categories['product_details']);
		$this->load->view('detail',$categories);
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
        $this->register->mail_exists($key);
    }
    // Check for user login process
    public function user_login_process()
    {
        $validation_rules = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|xss_clean'
            )
        );
        $this->form_validation->set_rules($validation_rules); //through this statement rules are set
        $errors_array = array(); //array is initialized
        $empty_errors = ''; //array is initialized
        
        // $errors_array = $this->validation_errors_to_array($validation_rules);
        if ($this->form_validation->run() == FALSE) {
            foreach ($validation_rules as $row) {
                $field = $row['field']; //getting field name
                $error = form_error($field); //getting error for field name
                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                 echo "error".$error;
                if ($error) {
                    if (strpos($error, "field is required.") !== false) {
                        $empty_errors = $error;
                        break;
                    } else
                        $errors_array[$field] = $error;
                }
            }
            if (strpos($empty_errors, "field is required.") !== false) {
                $data = array(
                    'error_message' => 'Please fill out all mandatory fields'
                );
            }
            else if (array_key_exists("email",$errors_array) && strpos($errors_array['email'],"The username field must contain a valid email address.") !== false){
                $data = array(
                'error_message' => 'Please enter valid email address'
                );
            } 
             // echo print_r($errors_array);
            // if (isset($this->session->userdata['logged_in'])) {
            //     $this->load->view('register');
            // } else {
            //     if (empty($errors_array) && $empty_errors == '')
            //         $this->load->view('index');
            //     else
            //         $this->load->view('index', $data);
            // }
        } else {
            $data   = array(
                'user_name' => $this->input->post('username'),
                'user_password' => $this->input->post('password')
            );
            }
    } // Logout from admin page
    public function logout()
    {
        
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('templates/header', $data);
    }


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */