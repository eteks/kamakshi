<?php

class Index_Model extends CI_Model {
	
	public function __construct()
	{
		 $this->load->database();
	}
 
	public function get_register()
	{
		$query1 = $this->db->get('giftstore_category');
        $query['giftstore_category'] = $query1->result_array();
        $login_status = $this->session->userdata("login_status");
        $random = uniqid();


        // General session not exists
        if(!$this->session->userdata("general_session_id")) {
            $this->session->set_userdata("general_session_id",$random);
        }

        // Session exists
        if($this->session->userdata("user_session_id")) {
            // echo $this->session->userdata("user_session_id");
            $session_id = explode('_',$this->session->userdata("user_session_id"));  
            if($login_status == 1) {
                $user_id = $this->session->userdata("login_id");
                if($user_id != $session_id[2]) {
                    $this->session->unset_userdata('user_session_id');
                }
            }
            else {
                $user_id = 0;
                if($user_id != $session_id[2]) {
                   $this->session->unset_userdata('user_session_id');
                } 
            }
        }

        // Session not exists
        if(!$this->session->userdata("user_session_id")) {
            $general_session_id = $this->session->userdata("general_session_id");
            if($login_status == 1) {
                $user_id = $this->session->userdata("login_id");
                $this->session->set_userdata("user_session_id","reg_user_".$user_id."_".$general_session_id);
            }
            else {
                $user_id = 0;
                $this->session->set_userdata("user_session_id","reg_user_".$user_id."_".$general_session_id);
            }
        }

        $order_where = '(orderitem_session_id="'.$this->session->userdata('user_session_id').'" and orderitem_status=1)';
        $order_query = $this->db->get_where('giftstore_orderitem',$order_where);
        $query['order_details'] =  $order_query->result_array();
        $query['order_count'] = count($query['order_details']);

    	return $query;
	}

    public function get_latestproduct()
    {
        $this->db->order_by('product_createddate', 'DESC');
        $this->db->limit('10');
        $query = $this->db->get('giftstore_product');
        // $query = $this->db->get('giftstore_subcategory');
        return $query->result_array();
    }

    public function get_recipient()
    {
        if ($this->uri->segment(2)) {
            $this->db->select('*');
            $this->db->from('giftstore_recipient_category rc');
            $this->db->join('giftstore_recipient r', 'rc.recipient_mapping_id=r.recipient_id', 'inner');
            $this->db->where(array(
                'rc.category_mapping_id' => $this->uri->segment(2),
                'r.recipient_status' => '1'
            ));
            $query = $this->db->get()->result_array();
            
        }
        return $query;
    }
    
    public function registration_insert($data)
    {
        
        // Query to check whether username already exist or not
        $where = '(user_name="' . $data['user_name'] . '" or user_email="' . $data['user_email'] . '")';
        $this->db->select('*');
        $this->db->from('giftstore_users');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return false;
        }
        return $query;
    }
    public function mail_exists($key)
    {
        $this->db->where('user_email', $key);
        $query = $this->db->get('giftstore_users');
        if ($query->num_rows() > 0) {
            // print_r("Email already exists");
            return true;
        } else {
            // print_r("Email registered");
            return false;
        }
    }
    public function get_category()
    {
        if ($this->uri->segment(2)) {
            $where                     = '(category_id="' . $this->uri->segment(2) . '")';
            $cat_query                 = $this->db->get_where('giftstore_category', $where);
            $query['cat_name']         = $cat_query->row();
            $sub_cat                   = $this->db->select('*');
            $sub_cat                   = $this->db->from('giftstore_subcategory_category cs');
            $sub_cat                   = $this->db->join('giftstore_subcategory s', 'cs.subcategory_mapping_id=s.subcategory_id', 'inner');
            $sub_cat                   = $this->db->where(array(
                'cs.category_mapping_id' => $this->uri->segment(2),
                's.subcategory_status' => '1'
            ));
            $query['gift_subcategory'] = $sub_cat->get()->result_array();
            $cat_product=$this->db->select('*');
            $cat_product=$this->db->from('giftstore_product cp');
            $cat_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
            $where = '(cp.product_category_id="'.$this->uri->segment(2).'" and cp.product_status=1 and cp.product_totalitems!=0)';
            $cat_product=$this->db->where($where);
            $cat_product=$this->db->group_by('cp.product_id');
            $query['product_category'] = $cat_product->get()->result_array();
            $query['cat_pro_count'] = count($query['product_category']);
            if($this->uri->segment(3)){	
            	$cat_product=$this->db->select('*');
	            $cat_product=$this->db->from('giftstore_product cp');
	            $cat_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
	            $where = '(cp.product_category_id="'.$this->uri->segment(2).'" and cp.product_status=1 and cp.product_totalitems!=0 and cp.product_subcategory_id="'.$this->uri->segment(3).'")';
	            $cat_product=$this->db->where($where);
	            $cat_product=$this->db->group_by('cp.product_id');
	            $query['product_category'] = $cat_product->get()->result_array();
            }
   		}
	
        return $query;
    }

    //  Get product details
	public function get_product_details()
	{	
		if($this->uri->segment(2)){
			$limit = 15;
            $product_image=$this->db->select('*');
            $product_image=$this->db->from('giftstore_product p');
            $product_image=$this->db->join('giftstore_product_upload_image pui','p.product_id=pui.product_mapping_id','inner');
            $where = '(p.product_id="'.$this->uri->segment(2).'" and p.product_status=1)';
            $product_image=$this->db->where($where);
            $query['product_image_details'] = $product_image->get()->result_array();
            $query['product_default_image'] = $query['product_image_details'][0]['product_upload_image'];
            $product_details=$this->db->select('*');
            $product_details=$this->db->from('giftstore_product p');
            $product_details=$this->db->join('giftstore_category c','p.product_category_id=c.category_id','inner');
            $product_details=$this->db->join('giftstore_subcategory s','p.product_subcategory_id=s.subcategory_id','inner');
            $where = '(p.product_id="'.$this->uri->segment(2).'" and p.product_status=1)';
            $product_details=$this->db->where($where);
            $query['product_details'] = $product_details->get()->row();
            $category_id = $query['product_details']->category_id;
            $subcategory_id = $query['product_details']->subcategory_id;
            $recipient_id = $query['product_details']->product_recipient_id;

            //  Recommanded products start
            $recommanded_where_sub = '(rp.product_id!="'.$this->uri->segment(2).'" and rp.product_subcategory_id="'.$subcategory_id.'" and rp.product_category_id="'.$category_id.'" and rp.product_status=1)';
            $recommanded_products_sub = $this->db->select('*');
            $recommanded_products_sub = $this->db->from('giftstore_product rp');
            $recommanded_products_sub = $this->db->join('giftstore_product_upload_image rpu','rp.product_id=rpu.product_mapping_id','inner');
            $recommanded_products_sub = $this->db->where($recommanded_where_sub);
            $recommanded_products_sub = $this->db->limit($limit, '0');
            $recommanded_products_sub = $this->db->group_by('rp.product_id');
        	$query['recommanded_products'] = $recommanded_products_sub->get()->result_array();
        	$sub_pro_count = count($query['recommanded_products']);
        	if($sub_pro_count < $limit) {
        		$limit_rec = $limit - $sub_pro_count;
        		$recommanded_where_rec = '(rrp.product_id!="'.$this->uri->segment(2).'" and rrp.product_subcategory_id!="'.$subcategory_id.'" and rrp.product_category_id="'.$category_id.'" and rrp.product_status=1 and rrp.product_recipient_id="'.$recipient_id.'")';
        		$recommanded_products_rec = $this->db->select('*');
        		$recommanded_products_rec = $this->db->from('giftstore_product rrp');
        		$recommanded_products_rec = $this->db->join('giftstore_product_upload_image rrpu','rrp.product_id=rrpu.product_mapping_id','inner');
        		$recommanded_products_rec = $this->db->where($recommanded_where_rec);
        		$recommanded_products_rec = $this->db->limit($limit_rec, '0');
        		$recommanded_products_rec = $this->db->group_by('rrp.product_id');
        		$query['recommanded_products_rec'] = $recommanded_products_rec->get()->result_array();
        		$rec_pro_count = count($query['recommanded_products_rec']) + $sub_pro_count;
        		$query['recommanded_products'] = array_merge($query['recommanded_products'],$query['recommanded_products_rec']);
	        	if($rec_pro_count && $rec_pro_count < $limit) {
		        	$limit_cat = $limit - $rec_pro_count;
		        
		        	$recommanded_where_cat = '(crp.product_id!="'.$this->uri->segment(2).'" and crp.product_subcategory_id!="'.$subcategory_id.'" and crp.product_category_id="'.$category_id.'" and crp.product_recipient_id!="'.$recipient_id.'" and crp.product_status=1)';
		        	$recommanded_products_cat = $this->db->select('*');
		        	$recommanded_products_cat = $this->db->from('giftstore_product crp');
		        	$recommanded_products_cat = $this->db->join('giftstore_product_upload_image crpu','crp.product_id=crpu.product_mapping_id','inner');
		         	$recommanded_products_cat = $this->db->where($recommanded_where_cat);
		         	$recommanded_products_cat = $this->db->limit($limit_cat, '0');
		         	$recommanded_products_cat = $this->db->group_by('crp.product_id');
		         	$query['recommanded_products_cat'] = $recommanded_products_cat->get()->result_array();
		        	$query['recommanded_products'] = array_merge($query['recommanded_products'],$query['recommanded_products_cat']);
	        	}
       		}
            //  Recommanded products end 
        }
        return $query;
    }
    
    //  Get cart details
    public function get_cart_details() {

        $basket_where =  '(bo.orderitem_session_id="'.$this->session->userdata('user_session_id').'" and bo.orderitem_status=1)';
        $basket_query = $this->db->select('*');
        $basket_query = $this->db->from('giftstore_orderitem bo');
        $basket_query = $this->db->join('giftstore_product bp','bo.orderitem_product_id=bp.product_id','inner');
        $basket_query = $this->db->join('giftstore_product_upload_image bpu','bp.product_id=bpu.product_mapping_id','inner');
        $basket_query = $this->db->where($basket_where);
        $basket_query = $this->db->group_by('bo.orderitem_id');



        $query['basket_details'] = $basket_query->get()->result_array();
        $query['basket_count'] = count($query['basket_details']);
        
        return $query;
    }




    // Read data from database to show data in admin page
    public function read_user_information($username)
    {
        
        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('giftstore_users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    // Read data using username and password
    public function login($data)
    {
        $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('giftstore_users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }   
}
