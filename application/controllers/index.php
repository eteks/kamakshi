<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    session_start(); 
    class Index extends CI_Controller
    {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register');
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');

        
        // Load session library
        $this->load->library('session');
        
    }
    public function new_user_registration()
    {
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_reg', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password_reg', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data   = array(
                'user_name' => $this->input->post('username'),
                'user_email' => $this->input->post('email_reg'),
                'user_password' => md5($this->input->post('password_reg')),
                'user_status' => '1'
            );
            $result = $this->register->registration_insert($data);
            echo $result;
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('register', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('register', $data);
            }
        }
    }
    // Check for user login process
    public function user_login_process()
    {
        // echo "user_login_process";
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
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
                // echo "error".$error;
                if ($error) {
                    if (strpos($error, "field is required.") !== false) {
                        $empty_errors = $error;
                        break;
                    } else
                        $errors_array[$field] = $error;
                }
            }
            if (strpos($empty_errors, "field is required.") !== false) {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	  $data['giftstore_category'] = $this->register->get_register();
	  // $data['giftstore_subcategory'] = $this->register->get_register();
	  $this->load->view('index',$data);
	}
	public function register()
	{ 
		$categories['giftstore_category'] = $this->register->get_register();
		// $categories['giftstore_subcategory'] = $this->register->get_category();
		$this->load->view('register',$categories);

	}
	public function detail()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		// $categories['giftstore_subcategory'] = $this->register->get_category();
		$this->load->view('detail',$categories);
	}
    public function category()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		$categories['gift_recipient'] = $this->register->get_recipient();
		$category_values = $this->register->get_category();
		$categories['cat_name'] = $category_values['cat_name'];
		$categories['gift_subcategory'] = $category_values['gift_subcategory'];
		$categories['sub_count'] = $category_values['sub_count'];
		
		// print_r($category_values);
		if($categories['cat_name']!=null && $categories['gift_subcategory']!=null && $categories['sub_count']!=null) {
			$this->load->view('category',$categories);
		}
		else {
			$this->load->view('no_products',$categories);
		}
	}
	public function contact()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		// $categories['giftstore_subcategory'] = $this->register->get_category();
		$this->load->view('contact',$categories);
	}
	public function reg_form()
	{
		 $this->register->get_reg_form();

		 $this->load->view('register');
	}
	public function basket()
	{
		$this->load->view('basket');
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
        $categories['giftstore_category']    = $this->register->get_register();
        $categories['giftstore_subcategory'] = $this->register->get_category();
        $this->load->view('customer_account', $categories);
    }
    public function customer_wishlist()
    {
        $categories['giftstore_category']    = $this->register->get_register();
        $categories['giftstore_subcategory'] = $this->register->get_category();
        $this->load->view('customer_wishlist', $categories);
    }
    public function customer_orders()
    {
        $categories['giftstore_category']    = $this->register->get_register();
        $categories['giftstore_subcategory'] = $this->register->get_category();
        $this->load->view('customer_orders', $categories);
    }
    public function customer_order()
    {
        $this->load->view('customer_order');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */