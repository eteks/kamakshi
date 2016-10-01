<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/usersmodel');
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
	}
	public function adminusers()
	{	
		//get list of admin users from database and store it in array variable 'adminusers' with key 'adminusers_list'
		$adminusers['adminusers_list'] = $this->usersmodel->get_adminusers();
		
		//call the adminusers views i.e rendered page and pass the adminusers data in the array variable 'adminusers'
		$this->load->view('admin/adminusers',$adminusers);
	}
	public function add_adminusers()
	{	
		$this->load->view('admin/add_adminusers');
	}
	public function edit_adminusers()
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
		             'field'   => 'adminuser_username',
		             'label'   => 'Username',
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       array(
		             'field'   => 'adminuser_password',
		             'label'   => 'Password',
		             'rules'   => 'trim|required|xss_clean'
		          ), 
		       array(
		             'field'   => 'adminuser_email',
		             'label'   => 'Email',
		             'rules'   => 'trim|required|xss_clean'
		          ),
		       array(
		             'field'   => 'adminuser_mobile',
		             'label'   => 'Mobile',
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
					'adminuser_id' => $id,
					'adminuser_username' => $this->input->post('adminuser_username'),
					'adminuser_password' => $this->input->post('adminuser_password'),
					'adminuser_email' => $this->input->post('adminuser_email'),
					'adminuser_mobile' => $this->input->post('adminuser_mobile'),
					);
					$result = $this->usersmodel->update_adminusers($data);
					if($result)
						$status = "User Updated Successfully!";
					else
						$status = "User Already Exists!";
				}		
    		}
    		$data['status'] = $status;
		}
		$data['adminuser_data'] = $this->usersmodel->get_adminusers_data($id);
		// print_r($data);
		$this->load->view('admin/edit_adminusers',$data);
	}
	public function endusers()
	{	
		$this->load->view('admin/endusers');
	}
	public function edit_endusers()
	{	
		$this->load->view('admin/edit_endusers');
	}
}