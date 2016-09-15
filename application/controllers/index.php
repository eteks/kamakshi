<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

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

	 

	    // print_r($data1['giftstore_subcategory']);
	  // $user_name = $this->input->post('name');
	  // $user_email = $this->input->post('email');
	  // $user_type = $this->input->post('user_type');
	  // $user_data = result_array(
	  // 'user_name' => $user_name,
	  // 'user_email' => $user_email,
	  // 'user_password' => $user_password,
	  // 'user_type' => $user_type,
	  // 'user_status' => $user_status
	  // );
	  //  $this->register->post_register($data);
	
		// $this->load->view('header',$data);
		// print_r($giftstore_category);
	}
	public function register()
	{ 
		$this->load->view('register');

	}
	public function detail()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		$categories['giftstore_subcategory'] = $this->register->get_category();
		$this->load->view('detail',$categories);
	}
    public function category()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		$categories['giftstore_subcategory'] = $this->register->get_category();
		$this->load->view('category',$categories);
	}
	public function contact()
	{
		$this->load->view('contact');
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
		$this->load->view('customer_account');
	}
	public function customer_wishlist()
	{
		$this->load->view('customer_wishlist');
	}
	public function customer_orders()
	{
		$this->load->view('customer_orders');
	}
	public function customer_order()
	{
		$this->load->view('customer_order');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */