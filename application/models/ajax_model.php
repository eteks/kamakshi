<?php
class Ajax_Model extends CI_Model {
    public function __construct()
    {
         $this->load->database();
    }


    //  To get products after filtering (filtering)
    public function get_filtering_product($data) {

        $start_price= $this->input->post('s_val');
        $end_price= $this->input->post('e_val');
        $start = $data['offset'];
        $limit = $data['limit'];
        if($this->input->post('cat_id')) {
            if($this->input->post('sub_id') && $this->input->post('rec_id')) {
                if( $this->input->post('rec_id') == 0) {
                    $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_subcategory_id="'.$this->input->post('sub_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
                }
                else {
                   $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_subcategory_id="'.$this->input->post('sub_id').'" and cp.product_recipient_id="'.$this->input->post('rec_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
                }
            }
            else if($this->input->post('sub_id')) {
               $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_subcategory_id="'.$this->input->post('sub_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
            }
            else if($this->input->post('rec_id')) {
                if( $this->input->post('rec_id') == 0) {
                    $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';  
                }
                else {
                   $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_recipient_id="'.$this->input->post('rec_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
                }
            }
            else {
                $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
            }
            $sub_product=$this->db->select('*');
            $sub_product=$this->db->from('giftstore_product cp');
            $sub_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
            $sub_product=$this->db->where($where);
            $sub_product=$this->db->limit( $limit, $start);
            $sub_product=$this->db->group_by('cp.product_id');

            if($this->input->post('sort') == "pricel") {
                $query['product_category'] = $sub_product->order_by('cp.product_price','asc')->get()->result_array();
            }
            else if($this->input->post('sort') == "priceh") {
                $query['product_category'] = $sub_product->order_by('cp.product_price','desc')->get()->result_array();
            }
            else if($this->input->post('sort') == 'newest') {
                $query['product_category'] = $sub_product->order_by('cp.product_id','desc')->get()->result_array();
            }
            else {
                $query['product_category'] = $sub_product->order_by('cp.product_title','asc')->get()->result_array();
            }

            // count1 
            $sub_product1=$this->db->select('*');
            $sub_product1=$this->db->from('giftstore_product cp');
            $sub_product1=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
            $sub_product1=$this->db->where($where);
            $sub_product1=$this->db->group_by('cp.product_id');
            $query1 = $sub_product1->get()->result_array();
            $query['product_count'] = count($query1);

        }
        return $query;
    }

     //  To get products after filtering (filtering)
    public function get_filtering_search_product($data) {

        $start = $data['offset'];
        $limit = $data['limit'];

        $cat_product=$this->db->select('*');
        $cat_product=$this->db->from('giftstore_product cp');
        $cat_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
        $where1 = '(cp.product_status=1 and cp.product_totalitems!=0)';
        $cat_product=$this->db->like('cp.product_title',$this->input->post('keyword'));
        $cat_product=$this->db->where($where1);
        $cat_product=$this->db->limit($limit, $start);
        $cat_product=$this->db->group_by('cp.product_id');
        $cat_product=$this->db->order_by('product_price', 'asc');
        $query['product_list'] = $this->db->get()->result_array();
        
        $cat_product1=$this->db->select('*');
        $cat_product1=$this->db->from('giftstore_product cp');
        $cat_product1=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
        $where1 = '(cp.product_status=1 and cp.product_totalitems!=0)';
        $cat_product1=$this->db->like('cp.product_title',$this->input->post('keyword'));
        $cat_product1=$this->db->where($where1);
        $cat_product1=$this->db->group_by('cp.product_id');
        $cat_product1=$this->db->order_by('product_price', 'asc');
        $query1 = $this->db->get()->result_array();
        $query['cat_pro_count'] = count($query1);  
        return $query;
    }


    //  To get add to cart status and count
    public function get_add_to_cart_count() {
        if($this->input->post('pro_id')) {
            $pro_id = $this->input->post('pro_id');
            $order_session_id = $this->session->userdata('user_session_id');
    
            if($this->input->post('grp_id')) {
                $grp_id = $this->input->post('grp_id');
                $add_to_cart_where = '(product_attribute_group_id="'.$grp_id.'")';
                $add_to_cart_query = $this->db->get_where('giftstore_product_attribute_group',$add_to_cart_where);
                $add_to_cart_query_array =  $add_to_cart_query->row_array();
                $price = $add_to_cart_query_array['product_attribute_group_price'];
            }
            else {
                $grp_id=0;
                $add_to_cart_where = '(product_id="'.$pro_id.'")';
                $add_to_cart_query = $this->db->get_where('giftstore_product',$add_to_cart_where);
                $add_to_cart_query_array =  $add_to_cart_query->row_array();
                $price = $add_to_cart_query_array['product_price'];
            }


            
            $add_to_cart_product_where = '( orderitem_product_id="'.$pro_id.'" and  orderitem_session_id="'.$order_session_id.'")';
            $add_to_cart_product_query = $this->db->get_where('giftstore_orderitem',$add_to_cart_product_where);
            $add_to_cart_product_query_array =  $add_to_cart_product_query->row_array();
            $orderitem_count = count($add_to_cart_product_query_array);

            if($orderitem_count > 0) {
                $unique_id = $add_to_cart_product_query_array['orderitem_id'];
                $order_update_data = array( 
                    'orderitem_product_attribute_group_id' => $grp_id,
                    'orderitem_price' => $price,
                    'orderitem_quantity' => '1',
                    'orderitem_status' => '1',
                    'orderitem_session_id' => $order_session_id,
                    'orderitem_product_id' => $pro_id
                );
                $order_update_where = '( orderitem_id="'.$unique_id.'")'; 
                $this->db->set($order_update_data); 
                $this->db->where($order_update_where); 
                $this->db->update("giftstore_orderitem", $order_update_data);
                $data['add_to_cart_status'] = "Updated successfully";
            }
            else {
                $order_insert_data = array(
                        'orderitem_product_id' => $pro_id,
                        'orderitem_product_attribute_group_id' => $grp_id,
                        'orderitem_price' => $price,
                        'orderitem_quantity' => '1',
                        'orderitem_session_id' => $order_session_id,
                        'orderitem_status' => '1'
                    );
                $this->db->insert('giftstore_orderitem', $order_insert_data);
                $data['add_to_cart_status'] = "Added successfully";
            } 
        }
        else {
            $data['add_to_cart_status'] = "Error : something went wrong";  
        }

        $order_select_where = '(orderitem_session_id="'.$order_session_id.'" and orderitem_status=1)';
        $order_select_query = $this->db->get_where('giftstore_orderitem',$order_select_where);
        $order_select_query_array =  $order_select_query->result_array();
        $data['order_count'] =count($order_select_query_array);

        return $data;
    }

    //  Remove products in basket
    public function get_remove_product() {
        if($this->input->post('bas_pro_id')) {
            $order_session_id = $this->session->userdata('user_session_id');
            $basket_remove_where='(orderitem_product_id="'.$this->input->post('bas_pro_id').'" and orderitem_session_id= "'.$order_session_id.'")';
            $this->db->where($basket_remove_where);
            $this->db->delete('giftstore_orderitem');
            $query_status="success";
        }
        return $query_status;
    }


    //  Update quantity in basket
    public function get_update_product() {
        if($this->input->post('updation_det')) {
            $order_session_id = $this->session->userdata('user_session_id');
            $updation_det = $this->input->post('updation_det');
            foreach ($updation_det as $key => $value) {
                $update_quantity_where = '(product_id="'.$key.'")';
                $update_quantity_query = $this->db->get_where('giftstore_product',$update_quantity_where);
                $update_quantity_array =  $update_quantity_query->row_array();
                if($update_quantity_array['product_totalitems'] >= $value) {

                    $basket_update_data = array( 
                        'orderitem_quantity' => $value,
                    ); 
                    
                    $basket_update_where = '(orderitem_product_id="'.$key.'" and orderitem_session_id="'.$order_session_id.'")'; 
                    $this->db->set($basket_update_data); 
                    $this->db->where($basket_update_where); 
                    $this->db->update("giftstore_orderitem", $basket_update_data);
                    $query_status="success";
                }
                else {
                    $query_status="".$update_quantity_array['product_title']." is not available. Available only ".$update_quantity_array['product_totalitems']; 
                    return $query_status;
                }
            }

           // $basket_update_where='(orderitem_product_id="'.$this->input->post('bas_pro_id').'" and orderitem_session_id= "'.$order_session_id.'")';

            // $this->db->where($basket_update_where);
            // $this->db->delete('giftstore_orderitem');
            // $query_status="success";

        }
        return $query_status;
    }

    //  Get city data based on state
    public function get_city_data() {
        if($this->input->post('state_id')) {
            $city_where='(city_state_id="'.$this->input->post('state_id').'" and city_status= 1)';
            $query = $this->db->get_where('giftstore_city',$city_where)->result_array();
        }
        return $query;
    }

    //  Get area data based on city
    public function get_area_data() {
        if($this->input->post('city_id') && $this->input->post('state_id')) {
            $area_where='(area_state_id="'.$this->input->post('state_id').'" and area_city_id="'.$this->input->post('city_id').'" and area_status= 1)';
            $query = $this->db->get_where('giftstore_area',$area_where)->result_array();
        }
        return $query;
    }

    //  Get shipiing amount data based on area
    public function get_area_shipping_amount() {
        if($this->input->post('area_id')) {
            $area_where='(area_id="'.$this->input->post('area_id').'")';
            $query = $this->db->get_where('giftstore_area',$area_where)->row_array();
        }
        return $query['area_delivery_charge'];
    }

    //  Get registration status
    public function get_registeration_status() {

        $validation_rules = array(
            array(
                 'field'   => 'user_name',
                 'label'   => 'User Name',
                 'rules'   => 'trim|required|xss_clean|is_unique[giftstore_users.user_name]'
              ),
            array(
                 'field'   => 'user_email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean|is_unique[giftstore_users.user_email]'
              ),
            array(
                 'field'   => 'user_password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         //getting field name
                $error = form_error($field);    //getting error for field name
                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $reg_data = array(
                'user_name' => $this->input->post('user_name'),
                'user_password' => $this->input->post('user_password'),
                'user_email' => $this->input->post('user_email'),
                'user_status' => '1'
                );
            $this->db->insert('giftstore_users', $reg_data);
            $check_login_where = '(user_email="'.$this->input->post('user_email').'" and  user_status=1 and user_password="'.$this->input->post('user_password').'")';
            $check_login_data = $this->db->get_where('giftstore_users',$check_login_where);
            $this->session->set_userdata("login_status","1");   
            $user_session_details = $check_login_data->row_array();
            $this->session->set_userdata("login_session",$user_session_details);
            $status = "success";
        }
        echo $status;
    }

    //  Get registration login status
    public function get_register_login_status() {
        $validation_rules = array(
            array(
                 'field'   => 'email_log',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean'
              ),
            array(
                 'field'   => 'password_log',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field);  
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $check_login_where = '(user_email="'.$this->input->post('email_log').'" and    user_status=1 and user_password="'.$this->input->post('password_log').'")';
            $check_login_data = $this->db->get_where('giftstore_users',$check_login_where);
            if($check_login_data->num_rows() > 0) {
                $this->session->set_userdata("login_status","1");   
                $user_session_details = $check_login_data->row_array();
                $this->session->set_userdata("login_session",$user_session_details);
                // Commented by siva
                // $condition = "email_log =" . "'" . $data. "'";             
                // $this->db->select('*');
                // $this->db->from('giftstore_users');
                // $this->db->where($condition);
                // $this->db->limit(1);

                // $query = $this->db->get();
                // // echo $query->num_rows();
                // if($query->num_rows() == 1)
                // {
                //     // echo "test2";
                //      // ini_set('display_errors', 1);
                //      $config['protocol'] = 'smtp';
                //      $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                //      $config['smtp_port'] = 25;
                //      $config['smtp_user'] = $data;
                //      $config['smtp_pass'] = '********';          
                //       $this->load->library('email', $config);       
                //         $this->email->from('thangamgold45@gmail.com', 'header');
                //         $this->email->to($config['smtp_user']);                     
                //         $this->email->subject('Get your Registered Mail Id');
                //         // $this->email->message('Please go to this link to get your password.
                //         //        http://localhost/kamakshi/');
                //         $user_result = $query->row_array();
                //         $this->email->message("Your registered mail is ".$user_result['email_log']);
                //         $this->email->send();
                //         echo "Registration success Please Check Your mail For Confirmation.";
                // }
                $status = "success";
            }
            else {
                $status = "Please enter valid details";  
            }
        }
        echo $status;
    }

    //  Get popup login status
    public function get_popup_login_status() {
        $validation_rules = array(
            array(
                 'field'   => 'popup_email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean'
              ),
            array(
                 'field'   => 'popup_password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field);  
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $check_login_where = '(user_email="'.$this->input->post('popup_email').'" and    user_status=1 and user_password="'.$this->input->post('popup_password').'")';
            $check_login_data = $this->db->get_where('giftstore_users',$check_login_where);
            if($check_login_data->num_rows() > 0) {
                $this->session->set_userdata("login_status","1");   
                $user_session_details = $check_login_data->row_array();
                $this->session->set_userdata("login_session",$user_session_details);
                $status = "success";
            }
            else {
                $status = "Please enter valid details";  
            }
        }
        echo $status;
    }

	//  Get product attribute price
    public function get_attribute_price() {
        $attribute_details = array();
        if($this->input->post('atribute_combination') && $this->input->post('product_id')) {
            $attribute_where = '(product_mapping_id="'.$this->input->post('product_id').'" and  product_attribute_group_totalitems!=0)';
            $this->db->where($attribute_where); 
            $this->db->where_in('product_attribute_value_combination_id',$this->input->post('atribute_combination'));
            $attribute_query = $this->db->get('giftstore_product_attribute_group');

            if($attribute_query->num_rows() > 0) {
                $attribute_details = $attribute_query->row_array();
                // $attribute_price = $query['product_attribute_group_price'];
            }
        }
        return $attribute_details;
    }
	
	//  Get popup login status
    public function get_profile_details_form_status() {
        $current_user_session = $this->session->userdata("login_session");
        $profile_insert_where = '(user_id="'.$current_user_session['user_id'].'")';
        $profile_data = array(
            'first_name' => $this->input->post('profile_firstname'),
            'last_name' => $this->input->post('profile_lastname'),
            'shipping_default_addr1' => $this->input->post('profile_address1'),
            'shipping_default_addr2' => $this->input->post('profile_address2'),
            'user_state_id' => ($this->input->post('profile_state'))?$this->input->post('profile_state'):NULL,
            'user_city_id' => ($this->input->post('profile_city'))?$this->input->post('profile_city'):NULL,
            'user_area_id' => ($this->input->post('profile_area'))?$this->input->post('profile_area'):NULL,
            'user_zip' => $this->input->post('profile_zip'),
            'user_mobile' => $this->input->post('profile_mobile'),
            'user_email' => $this->input->post('profile_email'),
            'user_status' => '1'
        );
        $this->db->set($profile_data);
        $this->db->where($profile_insert_where);
        $this->db->update('giftstore_users', $profile_data);
        echo "Updated successfully";
    }

	//  Get profile password change status
    public function get_profile_password_form_status() {

        $validation_rules = array(
            array(
                 'field'   => 'profile_old',
                 'label'   => 'Old password',
                 'rules'   => 'trim|required|xss_clean|callback_password_checking'
              ),
            array(
                 'field'   => 'profile_new',
                 'label'   => 'New password',
                 'rules'   => 'trim|required|xss_clean'
              ),
            array(
                 'field'   => 'profile_renew',
                 'label'   => 'Confirm password',
                 'rules'   => 'trim|required|matches[profile_new]'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field);  
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $current_user_session = $this->session->userdata("login_session");
            $profile_insert_where = '(user_id="'.$current_user_session['user_id'].'" and user_password="'.$this->input->post('profile_old').'")';
            $profile_password_query = $this->db->get_where('giftstore_users',$profile_insert_where);
            if ( $profile_password_query->num_rows() > 0 )
            {
                $profile_password_where =  '(user_id="'.$current_user_session['user_id'].'")';
                $profile_password_data = array(
                                            'user_password' => $this->input->post('profile_new'),
                                            'user_status' => '1'
                                        );
                $this->db->set($profile_password_data);
                $this->db->where($profile_password_where);
                $this->db->update('giftstore_users',$profile_password_data);
                $status = "Password updated successfully";
            } 
            else
            {
                $status = "Invalid password";
            }
        }
        echo $status;
    }
	public function get_popup_forgot_pwd_status($data) {
			// echo "$data";
				$condition = "user_email =" . "'" . $data. "'";				
                $this->db->select('*');
                $this->db->from('giftstore_users');
                $this->db->where($condition);
                $this->db->limit(1);

                $query = $this->db->get();
				// echo $query->num_rows();
                if($query->num_rows() == 1)
                {
                    $config = $this->config->load('email', true);
                    $this->load->library('email', $config);       
                    $this->email->from($config['smtp_user'], 'Kamakshi');
                    $this->email->to($data);                			
					$this->email->subject('Get your forgotten Password');
                    $user_result = $query->row_array();
					$this->email->message("Your registered password is ".$user_result['user_password']);
					$this->email->send();
					echo "Please check your email for Password.";
                }
                else
                {
            		echo('Failed');
                    return FALSE;
                }
   	}

    // Get myorders list based on order id
    public function get_myorders_list() {
        $myorders_array = array();
        if($this->input->post('order_id')) {
            $myorders_where = '(order_id="'.$this->input->post('order_id').'")';
            $myorders_array = $this->db->get_where('giftstore_order',$myorders_where)->row_array();
        }
        return $myorders_array;    
    }

    // Get profile details in checkout page
    public function get_checkout_profile_detail() {
    	$profile_details['profile_get_city'] = array();
    	$profile_details['profile_get_area'] = array();
        $profile_details['shipping_amount'] = array();
        if($this->input->post('user_value')) {
        	$current_session = $this->session->userdata("login_session");
            $profile_user_where = '(user_id="'.$current_session['user_id'].'")';
            $profile_details['profile_details'] = $this->db->get_where('giftstore_users',$profile_user_where)->row_array();
        	$profile_state_where = '(state_status=1)';
        	$profile_details['state'] = $this->db->get_where('giftstore_state',$profile_state_where)->result_array();

        	if(!empty($profile_details['profile_details']['user_state_id']) && !empty($profile_details['profile_details']['user_city_id'])) {
	            $profile_area_where = '(area_state_id="'.$profile_details['profile_details']['user_state_id'].'" and area_city_id="'.$profile_details['profile_details']['user_city_id'].'" and area_status=1)';
	            $profile_details['profile_get_area'] = $this->db->get_where('giftstore_area',$profile_area_where)->result_array();
        	}
	        if(!empty($profile_details['profile_details']['user_state_id'])) {
	            $profile_city_where = '(city_state_id="'.$profile_details['profile_details']['user_state_id'].'" and city_status=1)';
	            $profile_details['profile_get_city'] = $this->db->get_where('giftstore_city',$profile_city_where)->result_array(); 

            }
            if(!empty($profile_details['profile_details']['user_area_id'])) {
                $profile_shipping_where = '(area_id="'.$profile_details['profile_details']['user_area_id'].'" and area_status=1)';
                $profile_details['shipping_amount'] = $this->db->get_where('giftstore_area',$profile_shipping_where)->row_array();

            }

            



        }
        return $profile_details;    
    }
    public function check_product_in_city(){
        $res_json = array();
        $status = 0;
        foreach ($_POST['product_id'] as $value) {
            $city_product_where = '(product_mapped_id="'.$value.'")';
            $resultant_query = $this->db->get_where('giftstore_product_city',$city_product_where)->result_array();
            if(count($resultant_query) > 0) {
                $data_where = '(product_mapped_id="'.$value.'" and city_mapped_id="'.$_POST['city_id'].'")';
                $dec_query = $this->db->get_where('giftstore_product_city',$data_where)->row_array();
                if(count($dec_query) > 0) 
                    $status = 1;
                else{
                    $status = 0;
                    $order_session_id = $this->session->userdata('user_session_id');
                    $basket_remove_where='(orderitem_product_id="'.$value.'" and orderitem_session_id= "'.$order_session_id.'")';
                    $this->db->where($basket_remove_where);
                    $this->db->delete('giftstore_orderitem');
                }
                $data_json = array('product_id' => $value,'status' => $status);
                array_push($res_json, $data_json);
            }
            else{
                $status = 1;
                $data_json = array('product_id' => $value,'status' => $status);
                array_push($res_json, $data_json);
            }
        }
        // return json_encode($res_json);
        return $res_json;
    }
}
