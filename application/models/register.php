<?php

class Register extends CI_Model {
	
	public function __construct()
	{
		 $this->load->database();
	}
 
	public function get_register()
	{
		$query = $this->db->get('giftstore_category');
		// $query = $this->db->get('giftstore_subcategory');
		return $query->result_array();
	}
    public function get_product()
    {
        $this->db->order_by('product_createddate', 'DESC');
        $this->db->limit('10');
        $query = $this->db->get('giftstore_product');
        // $query = $this->db->get('giftstore_subcategory');
        return $query->result_array();
    }
	public function get_recipient()
	{	
		if($this->uri->segment(2)) {
			$this->db->select('*');
            $this->db->from('giftstore_recipient_category rc'); 
            $this->db->join('giftstore_recipient r', 'rc.recipient_mapping_id=r.recipient_id', 'inner');
            $this->db->where(array('rc.category_mapping_id' => $this->uri->segment(2), 'r.recipient_status' => '1'));
            $query = $this->db->get()->result_array();

        }
        return $query;
	}

    public function registration_insert($data)
    {
        
        // Query to check whether username already exist or not
        $where = '(user_name="'.$data['user_name'].'" or user_email="'.$data['user_email'].'")';
        $this->db->select('*');
        $this->db->from('giftstore_users');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return false;            
        }
        return $query;
	}

	public function get_category()
	{	
		if($this->uri->segment(2)){
			$where = '(category_id="'.$this->uri->segment(2).'")';
			$cat_query=$this->db->get_where('giftstore_category',$where);
			$query['cat_name'] = $cat_query->row();
        	$sub_cat = $this->db->select('*');
            $sub_cat = $this->db->from('giftstore_subcategory_category cs'); 
            $sub_cat = $this->db->join('giftstore_subcategory s', 'cs.subcategory_mapping_id=s.subcategory_id', 'inner');
            $sub_cat = $this->db->where(array('cs.category_mapping_id' => $this->uri->segment(2), 's.subcategory_status' => '1'));
            $query['gift_subcategory'] = $sub_cat->get()->result_array();
            $cat_product=$this->db->select('*');
            $cat_product=$this->db->from('giftstore_product cp');
            $cat_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
            $where = '(cp.product_category_id="'.$this->uri->segment(2).'" and cp.product_status=1 and cp.product_totalitems!=0)';
            $cat_product=$this->db->where($where);
            $cat_product=$this->db->group_by('cp.product_id');
            $query['product_category'] = $cat_product->get()->result_array();
            $query['cat_pro_count'] = count($query['product_category']);
   		}


   		
	    return $query;
	}

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
            $subcategory_id = $query['product_details']->subcategory_id;
            $recipient_id = $query['product_details']->product_recipient_id;
            
            //  Recommanded products start
            $recommanded_where_sub = '(rp.product_id!="'.$this->uri->segment(2).'" and rp.product_subcategory_id="'.$subcategory_id.'" and rp.product_status=1)';
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
        		$recommanded_where_rec = '(rrp.product_id!="'.$this->uri->segment(2).'" and rrp.product_subcategory_id!="'.$subcategory_id.'" and rrp.product_status=1 and rrp.product_recipient_id="'.$recipient_id.'")';
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
		        
		        	$recommanded_where_cat = '(crp.product_id!="'.$this->uri->segment(2).'" and crp.product_subcategory_id!="'.$subcategory_id.'" and crp.product_recipient_id!="'.$recipient_id.'" and crp.product_status=1)';
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