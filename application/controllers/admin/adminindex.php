<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminindex extends CI_Controller {

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
		$this->load->view('admin/index');
	}
	public function category()
	{	
		$this->load->view('admin/category');
	}
	public function add_category()
	{	
		$this->load->view('admin/add_category');
	}
	public function edit_category()
	{	
		$this->load->view('admin/edit_category');
	}
	public function subcategory()
	{	
		$this->load->view('admin/subcategory');
	}
	public function add_subcategory()
	{	
		$this->load->view('admin/add_subcategory');
	}
	public function edit_subcategory()
	{	
		$this->load->view('admin/edit_subcategory');
	}
	public function recipient()
	{	
		$this->load->view('admin/recipient');
	}
	public function add_recipient()
	{	
		$this->load->view('admin/add_recipient');
	}
	public function edit_recipient()
	{	
		$this->load->view('admin/edit_recipient');
	}
		public function giftproduct()
	{	
		$this->load->view('admin/giftproduct');
	}
	public function add_giftproduct()
	{	
		$this->load->view('admin/add_giftproduct');
	}
	public function edit_giftproduct()
	{	
		$this->load->view('admin/edit_giftproduct');
	}
	public function area()
	{	
		$this->load->view('admin/area');
	}
	public function add_area()
	{	
		$this->load->view('admin/add_area');
	}
	public function edit_area()
	{	
		$this->load->view('admin/edit_area');
	}
	public function city()
	{	
		$this->load->view('admin/city');
	}
	public function add_city()
	{	
		$this->load->view('admin/add_city');
	}
	public function edit_city()
	{	
		$this->load->view('admin/edit_city');
	}
	public function state()
	{	
		$this->load->view('admin/state');
	}
	public function add_state()
	{	
		$this->load->view('admin/add_state');
	}
	public function edit_state()
	{	
		$this->load->view('admin/edit_state');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */