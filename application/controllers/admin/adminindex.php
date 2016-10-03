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
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'category_name',
	             'label'   => 'Category',
	             'rules'   => 'trim|required|xss_clean'
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
	             );
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
					$status = array(
	                	'error_message' => strip_tags($errors)
	             	);
				}
				else{
					$data = array(
					'category_name' => $this->input->post('category_name'),
					'category_image' => $category_image,
					'category_status' => $this->input->post('category_status'),
					);
					$result = $this->catalog->insert_category($data);
					if($result)
						$status = array(
	                		'error_message' => "Category Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "Category Already Exists!"
	             		);
				}		
			}
    	}
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
			$status = '';//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_category_name',
		             'label'   => 'Category',
		             'rules'   => 'trim|required|xss_clean'
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
		            // echo "error".$error;
		            if($error){
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
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
					$status = strip_tags($errors);
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
						$status = "Category Updated Successfully!";
					else
						$status = "Category Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$data['category_data'] = $this->catalog->get_category_data($id);
		// print_r($data);
		$this->load->view('admin/edit_category',$data);
	}
	public function subcategory()
	{	
		//get list of category from database and store it in array variable 'category' with key 'category_list'
		$subcategory['subcategory_list'] = $this->catalog->get_subcategories();
		
		//call the category views i.e rendered page and pass the category data in the array variable 'category'
		$this->load->view('admin/subcategory',$subcategory);
	}
	public function add_subcategory()
	{	
		$status = array();//array is initialized
		$errors='';
		$validation_rules = array(
	       array(
	             'field'   => 'subcategory_name',
	             'label'   => 'Sub Category',
	             'rules'   => 'trim|required|xss_clean'
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
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
						'subcategory_name' => $this->input->post('subcategory_name'),
						'subcategory_status' => $this->input->post('subcategory_status'),
					);
					$category_data = $this->input->post('select_category');
					$result = $this->catalog->insert_subcategory($data,$category_data);
					if($result)
						$status = array(
	                		'error_message' => "SubCategory Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "SubCategory Already Exists!"
	             		);
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
			$status = '';//array is initialized
			$errors = '';
			$validation_rules = array(
		       array(
		             'field'   => 'edit_subcategory_name',
		             'label'   => 'Sub Category',
		             'rules'   => 'trim|required|xss_clean'
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
		            // echo "error".$error;
		            if($error){
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
		        }
    		}
    		else{
				if (!empty($errors)) {
					$status = strip_tags($errors);
				}
				else{
					$data = array(
					'subcategory_id' => $id,
					'subcategory_name' => $this->input->post('edit_subcategory_name'),
					'subcategory_status' => $this->input->post('edit_subcategory_status'),
					);
					$result = $this->catalog->update_subcategory($data);
					if($result)
						$status = "SubCategory Updated Successfully!";
					else
						$status = "SubCategory Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$subcatgory_return = $this->catalog->get_subcategory_data($id);
		$data['subcategory_data'] = $subcatgory_return['subcategory_data'];
		$data['subcategory_category'] = $subcatgory_return['subcategory_category'];
		$data['category_list'] = $this->catalog->get_categories();
		// print_r($data);
		$this->load->view('admin/edit_subcategory',$data);
	}
	public function recipient()
	{	
		//get list of recipient from database and store it in array variable 'recipient' with key 'recipient_list'
		$recipient['recipient_list'] = $this->catalog->get_recipient();
		
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
	             'rules'   => 'trim|required|xss_clean'
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
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
					'recipient_type' => $this->input->post('recipient_name'),
					'recipient_status' => $this->input->post('recipient_status'),
					);
					$category_data = $this->input->post('select_category');
					$result = $this->catalog->insert_recipient($data,$category_data);
					if($result)
						$status = array(
	                		'error_message' => "Recipient Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "Recipient Already Exists!"
	             		);
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
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       // array(
	        //      'field'   => 'select_category[]',
	        //      'label'   => 'Select Category',
	        //      'rules'   => 'required'
	        //    ),  
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
		            // echo "error".$error;
		            if($error){
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
		        }
    		}
    		else{
				if (!empty($errors)) {
					$status = strip_tags($errors);
				}
				else{
					$data = array(
					'recipient_id' => $id,
					'recipient_type' => $this->input->post('edit_recipient_name'),
					'recipient_status' => $this->input->post('edit_recipient_status'),
					);
					$result = $this->catalog->update_recipient($data);
					if($result)
						$status = "Recipient Updated Successfully!";
					else
						$status = "Recipient Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$recipient_return = $this->catalog->get_recipient_data($id);
		$data['recipient_data'] = $recipient_return['recipient_data'];
		$data['recipient_category'] = $recipient_return['recipient_category'];
		$data['category_list'] = $this->catalog->get_categories();
		// print_r($data);
		$this->load->view('admin/edit_recipient',$data);
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
		$validation_rules = array(
	       array(
	             'field'   => 'product_title',
	             'label'   => 'Product Title',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'product_description',
	             'label'   => 'Product Description',
	             'rules'   => 'trim|required|xss_clean'
	          ), 
	       array(
	             'field'   => 'select_category[]',
	             'label'   => 'Category',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	       array(
	             'field'   => 'select_subcategory[]',
	             'label'   => 'SubCategory',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	       array(
	             'field'   => 'select_recipient[]',
	             'label'   => 'Recipient',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	        array(
	             'field'   => 'product_price',
	             'label'   => 'Product Price',
	             'rules'   => 'trim|required|xss_clean'
	        ),
	        array(
	             'field'   => 'product_totalitems',
	             'label'   => 'Totalitems',
	             'rules'   => 'trim|required|xss_clean'
	        ),   
	        array(
	             'field'   => 'product_status',
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
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
	             );
	        }
    	}
    	else{
    		if(!empty($_POST)){
				$attribute_value_merge = array_map(null,$_POST['select_attribute'],$_POST['attribute_value']);

				$pieces = array_chunk($attribute_value_merge, ceil(count($attribute_value_merge) / $_POST['group_values']));


				$attribute_group = array_map(null,$pieces,$_POST['product_attribute_price'],$_POST['product_attribute_totalitems']);

				// echo count($_POST['select_attribute']);
				// print_r($_FILES['product_image']['name']);
				//Check whether user upload picture
				if(!empty($_FILES['product_image']['name'])){
					$filesCount = count($_FILES['product_image']['name']);
					for($i = 0; $i < $filesCount; $i++){
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
					$status = array(
	                	'error_message' => strip_tags($errors)
	             	);
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
						$status = array(
	                		'error_message' => "Product Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "Product Already Exists!"
	             		);
				}		
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
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
					'product_attribute' => $this->input->post('product_attribute'),
					'product_attribute_inputtags' => $this->input->post('product_attribute_inputtags'),
					'product_attribute_status' => $this->input->post('product_attribute_status'),
					);
					$result = $this->catalog->insert_product_attributes($data);
					if($result)
						$status = array(
	                		'error_message' => "Product Attribute Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "Product Attribute Already Exists!"
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
			$status = '';//array is initialized
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
		            // echo "error".$error;
		            if($error){
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
		        }
    		}
    		else{
				if (!empty($errors)) {
					$status = strip_tags($errors);
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
						$status = "Product Attribute Updated Successfully!";
					else
						$status = "Product Attribute Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$data['attribute_data'] = $this->catalog->get_product_attribute_data($id);
		$this->load->view('admin/edit_product_attributes',$data);
	}
	public function adminusers()
	{	
		$this->load->view('admin/adminusers');
	}
	public function add_adminusers()
	{	
		$this->load->view('admin/add_adminusers');
	}
	public function edit_adminusers()
	{	
		$this->load->view('admin/edit_adminusers');
	}
	public function endusers()
	{	
		$this->load->view('admin/endusers');
	}
	public function edit_endusers()
	{	
		$this->load->view('admin/edit_endusers');
	}
	public function area()
	{	
		$area['area'] = $this->location->get_areas();
		$city['area_list'] = $this->location->get_area();
		$this->load->view('admin/area',$area);
	}
	public function ajax_area()
	{
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
	             );
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
	                		'error_message' => "Area Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "Area Already Exists!"
	             		);
				}		
			}
    	}
		// print_r($status);
		// $data_values = $this->location->get_area_data($id);
		// $data['area_add']	= $data_values['state_city'];
		// $data['states']	= $data_values['states'];	
		$status['area_list'] = $this->location->get_area();
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
		             'field'   => 'area_name',
		             'label'   => 'City',
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
		            // echo "error".$error;
		            if($error){
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
		        }
    		}
    		else{
				if (!empty($errors)) {
					$status = strip_tags($errors);
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
						$status = "Area Updated Successfully!";
					else
						$status = "Area Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$data_values = $this->location->get_area_data($id);
		$data['area_edit']	= $data_values['state_city'];
		$data['states']	= $data_values['states'];
		$data['cities']	= $data_values['cities'];
		$this->load->view('admin/edit_area',$data);	
	}
	public function city()
	{	
		$city['city'] = $this->location->get_cities();
		$city['city_list'] = $this->location->get_city();
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
	             );
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
						'city_name' => $this->input->post('city_name'),
						'city_state_id' => $this->input->post('state_name'),
						'city_status' => $this->input->post('city_status'),
					);
					$result = $this->location->insert_city($data);
					if($result)
						$status = array(
	                		'error_message' => "City Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "City Already Exists!"
	             		);
				}		
			}
    	}
		// print_r($status);	
		$status['city_list'] = $this->location->get_city();
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
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
		        }
    		}
    		else{
				if (!empty($errors)) {
					$status = strip_tags($errors);
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
						$status = "City Updated Successfully!";
					else
						$status = "City Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$data_values = $this->location->get_city_data($id);
		$data['city_edit']	= $data_values['state_city'];
		$data['states']	= $data_values['states'];
		$this->load->view('admin/edit_city',$data);
	}
	public function state()
	{	
		$state['state_list'] = $this->location->get_state();
		$this->load->view('admin/state',$state);
	}
	public function edit_order()
	{	
		$this->load->view('admin/edit_order');
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
		$this->load->view('admin/transaction');
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
	            // echo "error".$error;
	            if($error){
	                if (strpos($error,"field is required.") !== false){
	                    $errors = $error; 
	                    break;
	                }
	                else
	                    $errors[$field] = $error; 
	            }
        	}
	        if (strpos($errors,"field is required.") !== false){  
	             $status = array(
	                'error_message' => 'Please fill out all mandatory fields'
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
						'state_name' => $this->input->post('state_name'),
						'state_status' => $this->input->post('state_status'),
					);
					$result = $this->location->insert_state($data);
					if($result)
						$status = array(
	                		'error_message' => "State Inserted Successfully!"
	             		);
					else
						$status = array(
	                		'error_message' => "State Already Exists!"
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
		            // echo "error".$error;
		            if($error){
		                if (strpos($error,"field is required.") !== false){
		                    $errors = $error; 
		                    break;
		                }
		                else
		                    $errors[$field] = $error; 
		            }
	        	}
		        if (strpos($errors,"field is required.") !== false){  
		             $status = 'Please fill out all mandatory fields';
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
						$status = "State Updated Successfully!";
					else
						$status = "State Already Exists!";
				}
    		$data['status'] = $status;
		}
		$data['state_data'] = $this->location->get_state_data($id);
		// print_r($data);
		$this->load->view('admin/edit_state',$data);
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
		$this->load->view('admin/order');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */