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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/catalog');
		$this->load->model('admin/location');
		$this->load->library('upload');
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
	}
	function edit_unique($value, $params) 
	{
		//get main CodeIgniter object
	    $CI =& get_instance();
	    //load database library
	    $CI->load->database();    
	    $CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");
	    list($table, $id, $field, $current_id) = explode(".", $params);    
	    $query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();    
	    if ($query->row() && $query->row()->$id != $current_id)
	    {
	        return FALSE;
	    }
	}
	public function dashboard()
	{	
		if($this->session->userdata('logged_in'))
			$this->load->view('admin/index');
		else
			redirect('admin');
	}
	public function category()
	{	
		//get list of category from database and store it in array variable 'category' with key 'category_list'
		$category['category_list'] = $this->catalog->get_categories();
		
		//call the category views i.e rendered page and pass the category data in the array variable 'category'
		$this->load->view('admin/category',$category);
	}
	public function add_category()
	{	
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       array(
	             'field'   => 'category_name',
	             'label'   => 'Category',
	             'rules'   => 'trim|required|xss_clean|is_unique[giftstore_category.category_name]'
	          ),
	       array(
	             'field'   => 'category_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	            foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    	}
    	else{
    		if(!empty($_POST)){
				//Check whether user upload picture
				if(!empty($_FILES['category_image']['name'])){
					// echo $_FILES['category_image']['name'];
					$category_image = $_FILES['category_image']['name'];
					// FCPATH is the codeigniter default variable to get our application location path and ADMIN_MEDIA_PATH is the constant variable which is defined in constants.php file
					$config['upload_path'] = FCPATH.ADMIN_MEDIA_PATH; 
					$config['allowed_types'] = FILETYPE_ALLOWED;//FILETYPE_ALLOWED which is defined constantly in constants file
					$config['file_name'] = $_FILES['category_image']['name'];
					$config['max_size']  = '1000';
					$config['max_width'] = '450';
					$config['max_height'] = '600';

					$this->upload->initialize($config);
					if($this->upload->do_upload('category_image')){
					    $uploadData = $this->upload->data();
					    $category_image = ADMIN_MEDIA_PATH.$uploadData['file_name'];
					}else{
						$errors = $this->upload->display_errors();
					    $category_image = '';
					}
				}else{
					$errors = "Please Upload Category Image";
					$category_image = '';
				}	
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'category_name' => $this->input->post('category_name'),
					'category_image' => $category_image,
					'category_status' => $this->input->post('category_status'),
					);
					$result = $this->catalog->insert_category($data);
					if($result)
						$status['error_message'] = "Category Inserted Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['category_data'] = array(
					'category_name' => $this->input->post('category_name'),
					'category_image' => isset($_FILES['category_image'])?$_FILES['category_image']:'',
					'category_status' => $this->input->post('category_status'),
					);
		// print_r($status);	
		$this->load->view('admin/add_category',$status);
	}
	public function edit_category()
	{	
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array();//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_category_name',
		             'label'   => 'Category',
		             'rules'   => 'trim|required|xss_clean|callback_edit_unique[giftstore_category.category_id.category_name.'.$id.']'
		          ),
		       array(
		             'field'   => 'edit_category_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
    			// $old_path_name = $_POST["old_path_name"];
				//Check whether user upload picture
				if(!empty($_FILES['edit_category_image']['name'])){
					// echo $_FILES['edit_category_image']['name'];
					$category_image = $_FILES['edit_category_image']['name'];
					// FCPATH is the codeigniter default variable to get our application location path and ADMIN_MEDIA_PATH is the constant variable which is defined in constants.php file
					$config['upload_path'] = FCPATH.ADMIN_MEDIA_PATH; 
					$config['allowed_types'] = FILETYPE_ALLOWED;//FILETYPE_ALLOWED which is defined constantly in constants file
					$config['file_name'] = $_FILES['edit_category_image']['name'];
					$config['max_size']  = '1000';
					$config['max_width'] = '450';
					$config['max_height'] = '600';
					$this->upload->initialize($config);
					if($this->upload->do_upload('edit_category_image')){
					    $uploadData = $this->upload->data();
					    $category_image = ADMIN_MEDIA_PATH.$uploadData['file_name'];
					}else{
						$errors = $this->upload->display_errors();
					    $category_image = '';
					}
				}else{
					// $errors = "Please Upload Category Image";
					// $category_image = '';
					$category_image = $_POST["hidden_category_image"];
				}	
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'category_id' => $id,
					'category_name' => $this->input->post('edit_category_name'),
					'category_image' => $category_image,
					'category_status' => $this->input->post('edit_category_status'),
					);
					$result = $this->catalog->update_category($data);
					if($result)
						$status['error_message'] = "Category Updated Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
    		}
		}
		$status['category_data'] = $this->catalog->get_category_data($id);
		// print_r($data);
		$this->load->view('admin/edit_category',$status);
	}
	public function get_arrayvalues_bykeyvalue($array, $key, $key2, $v2)
	{
	    $ret = array();
	    foreach($array as $arr)
	    {
	        foreach($arr as $k => $v)
	        {
	            if($arr[$key2] == $v2)
	            {
	                if($k == $key)
	                    $ret[] = $v;   
	            }
	        }
	    }
	    $u = array_unique($ret);
	    return (sizeof($u) == 1) ? $u[0] : $u;
	}
	public function subcategory()
	{	
		//get list of category from database and store it in array variable 'category' with key 'category_list'
		// $subcategory['subcategory_list'] = $this->catalog->get_subcategories();
		$subcategory = $this->catalog->get_subcategories();
		
		$res = array();
		foreach($subcategory as $arr)
		{
		    foreach($arr as $k => $v)
		    {
		        if($k == 'category_name')
		            $res[$arr['subcategory_id']][$k] = $this->get_arrayvalues_bykeyvalue($subcategory, $k, 'subcategory_id', $arr['subcategory_id']);
		        else
		            $res[$arr['subcategory_id']][$k] = $v;
		    }
		}
		$subcategory['subcategory_list'] = $res;
		//call the category views i.e rendered page and pass the category data in the array variable 'category'
		$this->load->view('admin/subcategory',$subcategory);
	}
	public function add_subcategory()
	{	
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       array(
	             'field'   => 'subcategory_name',
	             'label'   => 'Sub Category',
	             'rules'   => 'trim|required|xss_clean|is_unique[giftstore_subcategory.subcategory_name]'
	          ),
	       array(
	             'field'   => 'select_category[]',
	             'label'   => 'Select Category',
	             'rules'   => 'required'
	          ),  
	       array(
	             'field'   => 'subcategory_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),       
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
        }
    	else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
						'subcategory_name' => $this->input->post('subcategory_name'),
						'subcategory_status' => $this->input->post('subcategory_status'),
					);
					$category_data = $this->input->post('select_category');
					$result = $this->catalog->insert_subcategory($data,$category_data);
					if($result)
						$status['error_message'] = "SubCategory Inserted Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
		// print_r($status);	
		$status['category_list'] = $this->catalog->get_categories();
		$this->load->view('admin/add_subcategory',$status);
	}
	public function edit_subcategory()
	{	
		// print_r($_POST);
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array(); //array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_subcategory_name',
		             'label'   => 'Sub Category',
		             'rules'   => 'trim|required|xss_clean|callback_edit_unique[giftstore_subcategory.subcategory_id.subcategory_name.'.$id.']'
		          ),
		       array(
	             'field'   => 'select_category[]',
	             'label'   => 'Select Category',
	             'rules'   => 'required'
	           ),  
		       array(
		             'field'   => 'edit_subcategory_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data =array();
					$data['post_subcategory'] = array(
					'subcategory_id' => $id,
					'subcategory_name' => $this->input->post('edit_subcategory_name'),
					'subcategory_status' => $this->input->post('edit_subcategory_status'),
					);
					$data['post_category'] = array(
					'category_data' => $this->input->post('select_category'),
					'removed_category_data' => $this->input->post('removed_category')
					);
					$result = $this->catalog->update_subcategory($data);
					if($result)
						$status['error_message'] = "SubCategory Updated Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
    		}
		}
		$subcatgory_return = $this->catalog->get_subcategory_data($id);
		$status['subcategory_data'] = $subcatgory_return['subcategory_data'];
		$status['subcategory_category'] = $subcatgory_return['subcategory_category'];
		$status['category_list'] = $this->catalog->get_categories();
		// print_r($data);
		$this->load->view('admin/edit_subcategory',$status);
	}
	public function recipient()
	{	
		//get list of recipient from database and store it in array variable 'recipient' with key 'recipient_list'
		$recipient = $this->catalog->get_recipient();

		$res = array();
		foreach($recipient as $arr)
		{
		    foreach($arr as $k => $v)
		    {
		        if($k == 'category_name')
		            $res[$arr['recipient_id']][$k] = $this->get_arrayvalues_bykeyvalue($recipient, $k, 'recipient_id', $arr['recipient_id']);
		        else
		            $res[$arr['recipient_id']][$k] = $v;
		    }
		}
		$recipient['recipient_list'] = $res;
		
		//call the recipeint views i.e rendered page and pass the recipient data in the array variable 'recipient'
		$this->load->view('admin/recipient',$recipient);
	}
	public function add_recipient()
	{	
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'recipient_name',
	             'label'   => 'Recipient Name',
	             'rules'   => 'trim|required|xss_clean|is_unique[giftstore_recipient.recipient_type]'
	          ),
	       array(
	             'field'   => 'select_category[]',
	             'label'   => 'Select Category',
	             'rules'   => 'required'
	          ), 
	       array(
	             'field'   => 'recipient_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        }
    	}
    	else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
						'recipient_type' => $this->input->post('recipient_name'),
						'recipient_status' => $this->input->post('recipient_status'),
					);
					$category_data = $this->input->post('select_category');
					$result = $this->catalog->insert_recipient($data,$category_data);
					if($result)
						$status['error_message'] = "Recipient Inserted Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
		// print_r($status);	
		$status['category_list'] = $this->catalog->get_categories();
		$this->load->view('admin/add_recipient',$status);
	}
	public function edit_recipient()
	{	
		// print_r($_POST);
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = '';//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_recipient_name',
		             'label'   => 'Recipient name',
		             'rules'   => 'trim|required|xss_clean|callback_edit_unique[giftstore_recipient.recipient_id.recipient_type.'.$id.']'
		       ),
		       array(
	             'field'   => 'select_category[]',
	             'label'   => 'Select Category',
	             'rules'   => 'required'
	           ),  
		       array(
		             'field'   => 'edit_recipient_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean'
		       ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data =array();
					$data['post_recipient'] = array(
					'recipient_id' => $id,
					'recipient_type' => $this->input->post('edit_recipient_name'),
					'recipient_status' => $this->input->post('edit_recipient_status'),
					);
					$data['post_category'] = array(
					'category_data' => $this->input->post('select_category'),
					'removed_category_data' => $this->input->post('removed_category')
					);
					$result = $this->catalog->update_recipient($data);
					if($result)
						$status['error_message'] = "Recipient Updated Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
    		}
		}
		$recipient_return = $this->catalog->get_recipient_data($id);
		$status['recipient_data'] = $recipient_return['recipient_data'];
		$status['recipient_category'] = $recipient_return['recipient_category'];
		$status['category_list'] = $this->catalog->get_categories();
		// print_r($data);
		$this->load->view('admin/edit_recipient',$status);
	}
	public function giftproduct()
	{	
		//get list of products from database and store it in array variable 'product' with key 'product_list'
		$product_data = $this->catalog->get_products();
		$product['product_list'] = $product_data['product_result'];
		$product['product_image'] = $product_data['product_image'];	
		//call the product views i.e rendered page and pass the product data in the array variable 'product'
		$this->load->view('admin/giftproduct',$product);
	}
	public function add_giftproduct()
	{	
		$status = array();//array is initialized
		$errors='';
		$product_image = array();
		
	    $status['attribute_check_status'] = isset($_POST['attribute_check_status'])?$_POST['attribute_check_status']:"";  

		if(!empty($_POST)){
			$status['check_product_is_unique'] = $this->catalog->check_product_is_unique($this->input->post('product_title'));

			if($status['check_product_is_unique'] == true){
				$attribute_value_merge = array_map(null,$_POST['select_attribute'],$_POST['attribute_value']);

				$pieces = array_chunk($attribute_value_merge, ceil(count($attribute_value_merge) / $_POST['group_values']));


				$attribute_group = array_map(null,$pieces,$_POST['product_attribute_price'],$_POST['product_attribute_totalitems']);

				// echo count($_POST['select_attribute']);
				// print_r($_FILES['product_image']['name']);
				//Check whether user upload picture
				$filesCount = count($_FILES['product_image']['name']);
				if(!empty($_FILES['product_image']['name']) && $filesCount > 1){
					for($i = 0; $i < $filesCount-1; $i++){
						// array_push($product_image,$_FILES['userFiles']['name'][$i]);
						$_FILES['userFile']['name'] = $_FILES['product_image']['name'][$i];
		                $_FILES['userFile']['type'] = $_FILES['product_image']['type'][$i];
		                $_FILES['userFile']['tmp_name'] = $_FILES['product_image']['tmp_name'][$i];
		                $_FILES['userFile']['error'] = $_FILES['product_image']['error'][$i];
		                $_FILES['userFile']['size'] = $_FILES['product_image']['size'][$i];

						$config['upload_path'] = FCPATH.ADMIN_MEDIA_PATH; 
						$config['allowed_types'] = FILETYPE_ALLOWED;//FILETYPE_ALLOWED which is defined constantly in constants file
						$config['file_name'] = $_FILES['product_image']['name'][$i];

						$this->upload->initialize($config);
						if($this->upload->do_upload('userFile')){
						    $uploadData = $this->upload->data();
						    array_push($product_image,ADMIN_MEDIA_PATH.$uploadData['file_name']);
							$product_image[$i] = ADMIN_MEDIA_PATH.$uploadData['file_name'];
						}else{
							$errors = $this->upload->display_errors();
						    // array_push($product_image,'');
						    $product_image[$i] = '';
						}
					}
				}else{
					// echo "else";
					$errors = "Please Upload Product Image";
					$category_image = '';
				}	
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data['product_basic'] = array(
						'product_title' => $this->input->post('product_title'),
						'product_description' => $this->input->post('product_description'),
						'product_category_id' => $this->input->post('select_category'),
						'product_subcategory_id' => $this->input->post('select_subcategory'),
						'product_recipient_id' => $this->input->post('select_recipient'),
						'product_price' => $this->input->post('product_price'),
						'product_totalitems' => $this->input->post('product_totalitems'),
						'product_status' => $this->input->post('product_status'),
					);
					$data['product_files'] = $product_image;
					$data['product_attributes'] = $attribute_group;
					$result = $this->catalog->insert_product($data);
					if($result)
						$status['error_message'] = "Product Inserted Successfully!";
				}	
			}	
			else{
				$status['error_message'] = "Product Title Already Exists!";	
			}		
		}

		// print_r($status);	
		$status['category_list'] = $this->catalog->get_categories();
		$status['attribute_list'] = $this->catalog->get_product_attributes();
		$this->load->view('admin/add_giftproduct',$status);
	}
	public function edit_giftproduct()
	{	
		$this->load->view('admin/edit_giftproduct');
	}
	public function product_attributes()
	{	
		//get list of product attribute from database and store it in array variable 'attribute' with key 'attribute_list'
		$attribute['attribute_list'] = $this->catalog->get_product_attributes();
		
		//call the product attribute views i.e rendered page and pass the product attribute data in the array variable 'attribute'
		$this->load->view('admin/product_attributes',$attribute);
	}
	public function add_product_attributes()
	{	
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'product_attribute',
	             'label'   => 'Product Attribute',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'product_attribute_inputtags',
	             'label'   => 'Input Tags',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'product_attribute_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	    );
	    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
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
					'product_attribute' => $this->input->post('product_attribute'),
					'product_attribute_inputtags' => $this->input->post('product_attribute_inputtags'),
					'product_attribute_status' => $this->input->post('product_attribute_status'),
					);
					$result = $this->catalog->insert_product_attributes($data);
					if($result)
						$status = array(
	                		$status['error_message'] => "Product Attribute Inserted Successfully!"
	             		);
					else
						$status = array(
	                		$status['error_message'] => "Product Attribute Already Exists!"
	             		);
				}		
			}
    	}
		// print_r($status);	
		$this->load->view('admin/add_product_attributes',$status);
	}
	public function edit_product_attributes()
	{	
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array();//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_product_attribute',
		             'label'   => 'Product Attribute',
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       array(
		             'field'   => 'edit_product_attribute_inputtags',
		             'label'   => 'Input Tags',
		             'rules'   => 'trim|required|xss_clean'
		          ), 
		       array(
		             'field'   => 'edit_product_attribute_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
        }
    		else{
				if (!empty($errors)) {
					$status = array(
	                	'error_message' => strip_tags($errors)
	             	);
				}
				else{
					$data = array(
					'product_attribute_id' => $id,
					'product_attribute' => $this->input->post('edit_product_attribute'),
					'product_attribute_inputtags' => $this->input->post('edit_product_attribute_inputtags'),
					'product_attribute_status' => $this->input->post('edit_product_attribute_status'),
					);
					$result = $this->catalog->update_product_attribute($data);
					if($result)
						$status['error_message'] = "Product Attribute Updated Successfully!";
					else
						$status['error_message'] = "Product Attribute Already Exists!";
				}		
    		}
		}
		$status['attribute_data'] = $this->catalog->get_product_attribute_data($id);
		$this->load->view('admin/edit_product_attributes',$status);
	}
	public function area()
	{	
		$area['area'] = $this->location->get_areas();
		$area['state_list'] = $this->location->get_state();
		$area['city_list'] = $this->location->get_state();
		$this->load->view('admin/area',$area);
	}
	public function ajax_area()
	{
		// $city['state_list'] = $this->location->get_state();
		// $city['city_list'] = $this->location->get_state();
		$data = $this->location->get_ajax_area_data();
		echo json_encode($data);
	}
	public function add_area()
	{	
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'state_name',
	             'label'   => 'State',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'city_name',
	             'label'   => 'City',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'area_name',
	             'label'   => 'Area',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'area_delivery_charge',
	             'label'   => 'Area',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'area_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),      
	    );
	    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    	else {
    		if(!empty($_POST)) {
				if (!empty($errors)) {
					$status = array(
	                	'error_message' => strip_tags($errors)
	             	);
				}
				else{
					$data = array(
						'area_name' => $this->input->post('area_name'),
						'area_state_id' => $this->input->post('state_name'),
						'area_city_id' => $this->input->post('city_name'),
						'area_delivery_charge' => $this->input->post('area_delivery_charge'),
						'area_status' => $this->input->post('area_status'),
					);
					$result = $this->location->insert_area($data);
					if($result)
						$status = array(
	                		$status['error_message'] => "Area Inserted Successfully!"
	             		);
					else
						$status = array(
	                		$status['error_message'] => "Area Already Exists!"
	             		);
				}		
			}
    	}
		$status['state_list'] = $this->location->get_state();
		// $status['state_list'] = $this->location->get_state();
		$this->load->view('admin/add_area',$status);
	}
	public function edit_area()
	{
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'state_name',
	             'disabled' => 'disabled',
	             'label'   => 'State',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'city_name',
	             'label'   => 'City',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'area_name',
	             'label'   => 'Area',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'area_delivery_charge',
	             'label'   => 'Area',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'area_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),      
	    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($error);
				}
				else{
					$data = array(
					'area_id' => $id,
					'area_name' => $this->input->post('area_name'),
					'area_delivery_charge' => $this->input->post('area_delivery_charge'),
					'area_state_id' => $this->input->post('state_name'),
					'area_city_id' => $this->input->post('city_name'),
					'area_status' => $this->input->post('area_status'),
					);
					$result = $this->location->update_area($data);
					if($result)
						$status['error_message'] = "Area Updated Successfully!";
					else
						$status['error_message'] = "Area Already Exists!";
				}		
    		}
		}
		$data_values = $this->location->get_area_data($id);
		$status['area_edit']	= $data_values['state_city'];
		$status['state_list'] = $this->location->get_state();
		$status['cities']	= $data_values['cities'];
		$status['city_list'] = $this->location->get_city();
		$this->load->view('admin/edit_area',$status);	
	}
	public function city()
	{	
		$city['city'] = $this->location->get_cities();
		$city['state_list'] = $this->location->get_state();
		$this->load->view('admin/city',$city);
	}
	public function add_city()
	{	
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'state_name',
	             'label'   => 'State',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	        array(
	             'field'   => 'city_name',
	             'label'   => 'City',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'city_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),      
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
        }
    	else {
    		if(!empty($_POST)) {
				if (!empty($errors)) {
					$status = array(
	                	$status['error_message'] => strip_tags($errors)
	             	);
				}
				else{
					$data = array(
						'city_name' => $this->input->post('city_name'),
						'city_state_id' => $this->input->post('state_name'),
						'city_status' => $this->input->post('city_status'),
					);
					$result = $this->location->insert_city($data);
					if($result)
						$status = array(
	                		$status['error_message'] => "City Inserted Successfully!"
	             		);
					else
						$status = array(
	                		$status['error_message'] => "City Already Exists!"
	             		);
				}		
			}
    	}
		// print_r($status);	
		$status['city_list'] = $this->location->get_city();
		$status['state_list'] = $this->location->get_state();
		$this->load->view('admin/add_city',$status);
	}
	public function edit_city()
	{	
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = '';//array is initialized
			$errors = '';
			$validation_rules = array(
				array(
		             'field'   => 'state_name',
		             'label'   => 'State',
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       array(
		             'field'   => 'city_name',
		             'label'   => 'City',
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       array(
		             'field'   => 'city_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            // echo "error".$error;
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($error);
				}
				else{
					$data = array(
					'city_id' => $id,
					'city_name' => $this->input->post('city_name'),
					'city_state_id' => $this->input->post('state_name'),
					'city_status' => $this->input->post('city_status'),
					);
					$result = $this->location->update_city($data);
					if($result)
						$status['error_message'] = "City Updated Successfully!";
					else
						$status['error_message'] = "City Already Exists!";
				}		
    		}
		}
		$data_values = $this->location->get_city_data($id);
		$status['city_edit']	= $data_values['state_city'];
		$status['states']	= $data_values['states'];
		$this->load->view('admin/edit_city',$status);
	}
	public function state()
	{	
		$state['state_list'] = $this->location->get_state();
		$this->load->view('admin/state',$state);
	}
	public function edit_order()
	{
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = array();//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'order_customer_name',
		             'label'   => 'Customer Name',
		             'rules'   => 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_edit_unique[giftstore_users.user_id.user_name.'.$id.']'
		          ),
		       array(
		             'field'   => 'order_shipping_line1',
		             'label'   => 'Address',
		             'rules'   => 'trim|required|xss_clean'
		          ), 
		       array(
		             'field'   => 'order_shipping_line2',
		             'label'   => 'Address',
		             'rules'   => 'trim|required|xss_clean'
		          ), 
		       array(
		             'field'   => 'order_shipping_email',
		             'label'   => 'Email',
		             'rules'   => 'trim|required|xss_clean|valid_email|callback_edit_unique[giftstore_users.user_id.user_email.'.$id.']'
		          ),
	          array(
		             'field'   => 'order_total_items',
		             'label'   => 'Date Of Birth',
		             'rules'   => 'trim|required|xss_clean|date_valid'
		          ),
		      array(
		             'field'   => 'order_shipping_mobile',
		             'label'   => 'Mobile',
		             'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[10]'
		          ),  
		      array(
	             'field'   => 'order_shipping_state_id',
	             'label'   => 'State',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'order_shipping_city_id',
	             'label'   => 'City',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'order_shipping_area_id',
	             'label'   => 'Area',
	             'rules'   => 'trim|required|xss_clean'
	          ), 
	          array(
		             'field'   => 'order_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[10]'
		          ),  
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
    		else{
				$data = array(
				'order_id' => $id,
				'order_customer_name' => $this->input->post('customer_name'),
				'order_shipping_line1' => $this->input->post('order_shipping_line1'),
				'order_shipping_line2' => $this->input->post('order_shipping_line2'),
				'order_shipping_email' => $this->input->post('order_shipping_email'),
				'order_total_items' => $this->input->post('order_total_items'),
				'order_shipping_mobile' => $this->input->post('order_shipping_mobile'),
				'order_shipping_state_id' => $this->input->post('state_name'),
				'order_shipping_city_id' => $this->input->post('city_name'),
				'order_shipping_area_id' => $this->input->post('area_name'),
				);
				$result = $this->usersmodel->update_endusers($data);
				if($result)
					$status['error_message'] = "Order Updated Successfully!";
				else
					$status['error_message'] = "Something Went Wrong!";	
    		}
		}
		$data_values = $this->location->get_order_data($id);
		$status['order_data']	= $data_values['state_city'];
		$status['state_list'] = $this->location->get_state();
		$status['cities']	= $data_values['cities'];
		$status['city_list'] = $this->location->get_city();
		$status['area_list'] = $this->location->get_area();
		$this->load->view('admin/edit_order',$status);	
	}
	public function orderitem()
	{	
		$this->load->view('admin/orderitem');
	}
	public function edit_orderitem()
	{	
		$this->load->view('admin/edit_orderitem');
	}
	public function transaction()
	{
		$transaction['transaction_list'] = $this->location->get_transaction();	
		$this->load->view('admin/transaction',$transaction);
	}
	public function admin_nopage()
	{
			$this->load->view('admin/admin_404');
	}
	public function add_state()
	{	
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'state_name',
	             'label'   => 'State',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'state_status',
	             'label'   => 'Status',
	             'rules'   => 'trim|required|xss_clean'
	          ),       
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	            foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    	}
		else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
						'state_name' => $this->input->post('state_name'),
						'state_status' => $this->input->post('state_status'),
					);
					$result = $this->location->insert_state($data);
					if($result)
						$status = array(
	                		$status['error_message'] => "State Inserted Successfully!"
	             		);
					else
						$status = array(
	                		$status['error_message'] => "State Already Exists!"
	             		);
				}	
			}
		}	
		// print_r($status);	
		$status['state_list'] = $this->location->get_state();
		$this->load->view('admin/add_state',$status);
	}
	public function edit_state()
	{	
		$id = $this->uri->segment(4);
		// echo "id".$id;
		if (empty($id))
		{
			show_404();
		}
		if(!empty($_POST)){
			// print_r($_POST);
			$status = '';//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_state_name',
		             'label'   => 'State',
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       array(
		             'field'   => 'edit_state_status',
		             'label'   => 'Status',
		             'rules'   => 'trim|required|xss_clean'
		          ),   
		    );
		    $this->form_validation->set_rules($validation_rules);
		    if ($this->form_validation->run() == FALSE) {
		    	foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    		}
			else{
					$data = array(
					'state_id' => $id,
					'state_name' => $this->input->post('edit_state_name'),
					'state_status' => $this->input->post('edit_state_status'),
					);
					$result = $this->location->update_state($data);
					if($result)
						$status['error_message'] = "State Updated Successfully!";
					else
						$status['error_message'] = "State Already Exists!";
				}		
		}
		$status['state_data'] = $this->location->get_state_data($id);
		// print_r($data);
		$this->load->view('admin/edit_state',$status);
	}
	public function loadcategory_reference()
	{	
		$category_id=$_POST['category_id'];	
		$category_name = $_POST['category_name'];	
		$category_reference_data = $this->catalog->get_category_reference($category_id);
		echo json_encode($category_reference_data);
	}
	public function order()
	{
		$order['order_list'] = $this->location->get_order();
		$order['state'] = $this->location->get_areas();
		$order['city'] = $this->location->get_areas();	
		$this->load->view('admin/order',$order);
	}
	public function product_attribute_sets()
	{	
		//get list of product attribute from database and store it in array variable 'attribute' with key 'attribute_list'
		$attribute_sets = $this->catalog->get_product_attribute_sets();
		$resatt = array();
		foreach($attribute_sets as $arr)
		{
		    foreach($arr as $k => $v)
		    {
		        if($k == 'product_attribute')
		        	$resatt[$arr['product_attribute_group_id']][$k] = $this->get_arrayvalues_bykeyvalue($attribute_sets, $k, 'product_attribute_group_id', $arr['product_attribute_group_id']);
		        else if($k == 'product_attribute_value')
		        	$resatt[$arr['product_attribute_group_id']][$k] = $this->get_arrayvalues_bykeyvalue($attribute_sets, $k, 'product_attribute_group_id', $arr['product_attribute_group_id']);
		        else
		            $resatt[$arr['product_attribute_group_id']][$k] = $v;

		    }
		}
		// echo "<pre>";
		// print_r($resatt);
		// echo "</pre>";
		$attribute_sets['attribute_sets_list'] = $resatt;
		//call the product attribute views i.e rendered page and pass the product attribute data in the array variable 'attribute'
		$this->load->view('admin/product_attribute_sets',$attribute_sets);
	}
	public function delete(){
		$tablename = $this->input->post('table_name');
		$fieldname = $this->input->post('field_name');
		$id = $this->input->post('id');
		$category_reference_data = $this->catalog->delete_data($tablename,$fieldname,$id);
		echo $category_reference_data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */