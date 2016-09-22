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
	}
	public function register()
	{ 
		$categories['giftstore_category'] = $this->register->get_register();
		// $categories['giftstore_subcategory'] = $this->register->get_category();
		$this->load->view('register',$categories);

	}
    public function category()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		$categories['gift_recipient'] = $this->register->get_recipient();
		$category_values = $this->register->get_category();
		$categories['cat_name'] = $category_values['cat_name'];
		$categories['gift_subcategory'] = $category_values['gift_subcategory'];
		$categories['cat_pro_count'] = $category_values['cat_pro_count'];
		$categories['product_category'] = $category_values['product_category'];
		// print_r($categories);
		if($categories['cat_name']!=null && $categories['gift_subcategory']!=null && $categories['cat_pro_count']!=null) {
			$this->load->view('category',$categories);
		}
		else {
			$this->load->view('no_products',$categories);
		}
	}
	public function detail()
	{
		$categories['giftstore_category'] = $this->register->get_register();
		$categories_values = $this->register->get_product_details();
		$categories['product_image_details'] = $categories_values['product_image_details'];
		$categories['product_details'] = $categories_values['product_details'];
		$categories['recommanded_products'] = $categories_values['recommanded_products'];
		$categories['product_default_image'] = $categories_values['product_default_image'];
		// print_r($categories['product_details']);
		$this->load->view('detail',$categories);
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