<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); 

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
        // Load form validation library
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
        $this->session->set_userdata("login_status","1");
        $this->session->set_userdata("login_id","3");

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
		$category_values = $this->index_model->get_category();
		$categories['cat_name'] = $category_values['cat_name'];
		$categories['gift_subcategory'] = $category_values['gift_subcategory'];
		$categories['cat_pro_count'] = $category_values['cat_pro_count'];
		$categories['product_category'] = $category_values['product_category'];
		// print_r($categories);
		if($categories['cat_name']!=null && $categories['gift_subcategory']!=null && $categories['cat_pro_count']!=null && $categories['product_category']!=null) {
			$this->load->view('category',$categories);
		}
		else {
			$this->load->view('no_products',$categories);
		}
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
    //REGISTRATION FORM//
    //SIGNUP//
    public function new_user_registration()
    {   
        // $categories['giftstore_category']    = $this->index_model->get_register();
        // $categories['giftstore_subcategory'] = $this->index_model->get_category();
        // $this->load->view('register', $categories);
        // print_r($_POST);
        $status = array();//array is initialized
        $errors='';
        $errors_array=array();
        $validation_rules = array(
           array(
                 'field'   => 'user_name',
                 'label'   => 'User Name',
                 'rules'   => 'trim|required|is_unique[giftstore_users.user_name]|xss_clean'
              ),
           array(
                 'field'   => 'user_email',
                 'label'   => 'User Email',
                 'rules'   => 'trim|required|valid_email|is_unique[giftstore_users.user_email]|xss_clean'
              ),
            array(
                 'field'   => 'user_password',
                 'label'   => 'User Password',
                 'rules'   => 'trim|required|xss_clean'
              )   
        );
        $this->form_validation->set_rules($validation_rules);
        // $this->form_validation->set_rules('user_email', 'Email', 'callback_rolekey_exists');
        if ($this->form_validation->run() == FALSE) {
            foreach($validation_rules as $row){
                $field = $row['field'];          //getting field name
                $error = form_error($field);    //getting error for field name
                                                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                // echo "error".$error;
                if($error){
                    if (strpos($error,"field is required.") !== false){
                        $errors = $error; 
                        break;
                    }
                    else{
                        // echo "else";
                        $errors = $error;
                    }
                }
            }
            if (strpos($errors,"field is required.") !== false){  
                 $status = array(
                    'error_message' => 'Please fill out all mandatory fields'
                 );
            }
            else{
                $status = array(
                    'error_message' => $errors
                 );
            }
        }
        else{
            if(!empty($_POST)){
                if (!empty($errors)) {
                    $status = array(
                        'error_message' => strip_tags($errors)
                    );
                }
                else{
                    $data = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_email' => $this->input->post('user_email'),
                    'user_password' => md5($this->input->post('user_password'))
                    );
                    $result = $this->index_model->insert_user_registration($data);
                    if($result)
                        $status = array(
                            'error_message' => "Registration Success!"
                    );
                }       
            }
        }
        // print_r($status);    
        $this->load->view('register',$status);
    }
//SIGNUP END//
//LOGIN FORM START//

    // Check for user login process
    public function user_login_process()
    {   
        // $categories['giftstore_category']    = $this->index_model->get_register();
        // $categories['giftstore_subcategory'] = $this->index_model->get_category();
        // $this->load->view('header', $categories);
        // print_r($_POST);
        $status = array();//array is initialized
        $errors='';
        $errors_array=array();
        $validation_rules = array(
           array(
                 'field'   => 'user_email',
                 'label'   => 'User Email',
                 'rules'   => 'trim|required|valid_email|is_unique[giftstore_users.user_email]|xss_clean'
              ),
            array(
                 'field'   => 'user_password',
                 'label'   => 'User Password',
                 'rules'   => 'trim|required|xss_clean'
              )   
        );
        $this->form_validation->set_rules($validation_rules);
        // $this->form_validation->set_rules('user_email', 'Email', 'callback_rolekey_exists');
        if ($this->form_validation->run() == FALSE) {
            foreach($validation_rules as $row){
                $field = $row['field'];          //getting field name
                $error = form_error($field);    //getting error for field name
                                                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                // echo "error".$error;
                if($error){
                    if (strpos($error,"field is required.") !== false){
                        $errors = $error; 
                        break;
                    }
                    else{
                        // echo "else";
                        $errors = $error;
                    }
                }
            }
            if (strpos($errors,"field is required.") !== false){  
                 $status = array(
                    'error_message_login' => 'Please fill out all mandatory fields'
                 );
            }
            else{
                $status = array(
                    'error_message_login' => $errors
                 );
            }
        }
        else{
            if(!empty($_POST)){
                if (!empty($errors)) {
                    $status = array(
                        'error_message_login' => strip_tags($errors)
                    );
                }
                else{
                    $data = array(
                    'user_email' => $this->input->post('user_email'),
                    'user_password' => md5($this->input->post('user_password'))
                    );
                    $result = $this->index_model->insert_user_registration($data);
                    if($result)
                        $status = array(
                            'error_message_login' => "Login Success!"
                    );
                }       
            }
        }
        // print_r($status);    
        $this->load->view('register',$status);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */