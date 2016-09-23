<?php
class Catalog extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}
	public function get_categories()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM giftstore_category WHERE category_status = 1");
		// $query = $this->db->get_where('giftstore_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_category order 
			by category_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_category($data)
	{	
		// Query to check whether category name already exist or not
		$condition = "category_name =" . "'" . $data['category_name'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_category');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_category', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function update_category($data)
	{	
		$condition = "category_name =" . "'" . $data['category_name'] . "' AND category_id NOT IN (". $data['category_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_category');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('category_id', $data['category_id']);
			$this->db->update('giftstore_category', $data);
			return true;
		}	
	}	
	public function get_category_data($id)
	{	
		$query = $this->db->get_where('giftstore_category', array('category_id' => $id));
		return $query->row_array();
	}
	public function get_subcategories()
	{	
		//get list of subcategories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_subcategory order 
			by subcategory_createddate desc");		
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_subcategory($data,$category_data)
	{	
		// Query to check whether category name already exist or not
		$condition = "subcategory_name =" . "'" . $data['subcategory_name'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_subcategory');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_subcategory', $data);
			//get inserted subcategory id to map in subcategory category relationship table
			$subcategory_id = $this->db->insert_id();
			foreach($category_data as $key => $value) {
				$subcategory_category_map = array(
	                					'subcategory_mapping_id' => $subcategory_id,
	                					'category_mapping_id' => $value,
	             						);
				$this->db->insert('giftstore_subcategory_category', $subcategory_category_map);
			}
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function update_subcategory($data)
	{	
		$condition = "subcategory_name =" . "'" . $data['subcategory_name'] . "' AND subcategory_id NOT IN (". $data['subcategory_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_subcategory');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('subcategory_id', $data['subcategory_id']);
			$this->db->update('giftstore_subcategory', $data);
			return true;
		}	
	}	
	public function get_subcategory_data($id)
	{	
		$query['subcategory_data'] = $this->db->get_where('giftstore_subcategory', array('subcategory_id' => $id))->row_array();
		// $query['subcategory_category'] = $this->db->get_where('giftstore_subcategory_category', array('subcategory_mapping_id' => $id))->result_array();
		$this->db->select('category_mapping_id');
		$this->db->from('giftstore_subcategory_category');
		$this->db->where('subcategory_mapping_id',$id);
		$get_data = $this->db->get()->result();
		$query['subcategory_category'] = array();
		foreach($get_data as $row){
            array_push($query['subcategory_category'],$row->category_mapping_id);
        }
		return $query;
	}
	public function get_recipient()
	{	
		//get list of subcategories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_recipient order 
			by recipient_createddate desc");		
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_recipient($data,$category_data)
	{	
		// Query to check whether category name already exist or not
		$condition = "recipient_type =" . "'" . $data['recipient_type'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_recipient');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_recipient', $data);
			//get inserted recipient id to map in recipient category relationship table
			$recipient_id = $this->db->insert_id();
			foreach($category_data as $key => $value) {
				$recipient_category_map = array(
	                					'recipient_mapping_id' => $recipient_id,
	                					'category_mapping_id' => $value,
	             						);
				$this->db->insert('giftstore_recipient_category', $recipient_category_map);
			}
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}
	public function get_recipient_data($id)
	{	
		$query['recipient_data'] = $this->db->get_where('giftstore_recipient', array('recipient_id' => $id))->row_array();
		// $query['subcategory_category'] = $this->db->get_where('giftstore_subcategory_category', array('subcategory_mapping_id' => $id))->result_array();
		$this->db->select('category_mapping_id');
		$this->db->from('giftstore_recipient_category');
		$this->db->where('recipient_mapping_id',$id);
		$get_data = $this->db->get()->result();
		$query['recipient_category'] = array();
		foreach($get_data as $row){
            array_push($query['recipient_category'],$row->category_mapping_id);
        }
		return $query;
	}	
	public function update_recipient($data)
	{	
		$condition = "recipient_type =" . "'" . $data['recipient_type'] . "' AND recipient_id NOT IN (". $data['recipient_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_recipient');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('recipient_id', $data['recipient_id']);
			$this->db->update('giftstore_recipient', $data);
			return true;
		}	
	}
	public function get_product_attributes()
	{	
		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_product_attribute order 
			by product_attribute_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_product_attributes($data)
	{	
		// print_r($data);
		// Query to check whether category name already exist or not
		$condition = "product_attribute =" . "'" . $data['product_attribute'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_product_attribute');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_product_attribute', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function update_product_attribute($data)
	{	
		// print_r($data);
		$condition = "product_attribute =" . "'" . $data['product_attribute'] . "' AND product_attribute_id NOT IN (". $data['product_attribute_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_product_attribute');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('product_attribute_id', $data['product_attribute_id']);
			$this->db->update('giftstore_product_attribute', $data);
			return true;
		}	
	}
	public function get_product_attribute_data($id)
	{	
		$query = $this->db->get_where('giftstore_product_attribute', array('product_attribute_id' => $id));
		return $query->row_array();
	}
	public function get_products()
	{	
		//get list of products from database using mysql query 
		// $query = $this->db->query("SELECT * FROM giftstore_product order 
		// 	by product_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		$this->db->select('pro.*,cat.category_name,subcat.subcategory_name,rec.recipient_type');
		$this->db->from('giftstore_product AS pro');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = pro.product_category_id', 'Left');
		$this->db->join('giftstore_subcategory AS subcat', 'subcat.subcategory_id = pro.product_subcategory_id', 'Left');
		$this->db->join('giftstore_recipient AS rec', 'rec.recipient_id = pro.product_recipient_id', 'Left');
		$this->db->order_by('product_createddate','desc');
		$query['product_result'] = $this->db->get()->result_array();

		$this->db->select('*');
		$this->db->from('giftstore_product AS pro');
		$this->db->join('giftstore_product_upload_image AS img', 'img.product_mapping_id = pro.product_id', 'inner');
		$this->db->order_by('product_createddate','desc');
		$query['product_image'] = $this->db->get()->result_array();

		//return all records in array format to the controller
		return $query;
	}
	public function get_category_reference($id)
	{	
		$condition = "subcat.category_mapping_id =".$id;
		$this->db->select('sub.subcategory_id,sub.subcategory_name');
		$this->db->from('giftstore_subcategory AS sub');
		$this->db->join('giftstore_subcategory_category AS subcat', 'subcat.subcategory_mapping_id = sub.subcategory_id', 'left');
		$this->db->where($condition);
		$this->db->order_by('subcategory_name','asc');
		$this->db->group_by('subcategory_name');
		$query['subcategory_category'] = $this->db->get()->result_array();

		// $query = $this->db->get()->result_array();

		$condition = "reccat.recipient_mapping_id =".$id;
		$this->db->select('rec.recipient_id,rec.recipient_type');
		$this->db->from('giftstore_recipient AS rec');
		$this->db->join('giftstore_recipient_category AS reccat', 'reccat.recipient_mapping_id = rec.recipient_id', 'left');
		$this->db->where($condition);
		$this->db->order_by('recipient_type','asc');
		$this->db->group_by('recipient_type');
		$query['recipient_category'] = $this->db->get()->result_array();

		//return all records in array format to the controller
		return $query;
	}
}