<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
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
		$this->load->view('index');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function detail()
	{
		$this->load->view('detail');
	}
    public function category()
	{
		$this->load->view('category');
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