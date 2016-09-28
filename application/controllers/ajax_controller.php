<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');

		// Load session library
        $this->load->library('session');

        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 3;
	}

    // function ajaxPaginationData(){
    //     $page = $this->input->post('page');
    //     if(!$page){
    //         $offset = 0;
    //     }else{
    //         $offset = $page;
    //     }
        
    //     //total rows count
    //     $totalRec = count($this->post->getRows());
        
    //     //pagination configuration
    //     $config['target']      = '#postList';
    //     $config['base_url']    = base_url().'posts/ajaxPaginationData';
    //     $config['total_rows']  = $totalRec;
    //     $config['per_page']    = $this->perPage;
    //     $this->ajax_pagination->initialize($config);
        
    //     //get the posts data
    //     $data['posts'] = $this->post->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
    //     //load the view
    //     $this->load->view('posts/ajax-pagination-data', $data, false);
    // }



    // public function index(){
    //     $data = array();
        
    //     //total rows count
    //     $totalRec = count($this->post->getRows());
        
    //     //pagination configuration
    //     $config['target']      = '#postList';
    //     $config['base_url']    = base_url().'posts/ajaxPaginationData';
    //     $config['total_rows']  = $totalRec;
    //     $config['per_page']    = $this->perPage;
    //     $this->ajax_pagination->initialize($config);
        
    //     //get the posts data
    //     $data['posts'] = $this->post->getRows(array('limit'=>$this->perPage));
        
    //     //load the view
    //     $this->load->view('posts/index', $data);
    // }
    


	
	// Filtering for products
	public function filtering_product()
	{	
		$data['products_subcategory'] = $this->ajax_model->get_filtering_product();
		$products_subcategory_list = $this->load->view('products_ajax',$data);
		echo $products_subcategory_list;		
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
		// echo $remove_status;	
		echo $remove_status;	
	}
} // end of the class 