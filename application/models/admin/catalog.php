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
		$this->db->select('*');
		$this->db->from('giftstore_category');
		$this->db->order_by('category_createddate','desc');	
		$query = $this->db->get();
		
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_category($data)
	{	
		// Query to insert data in database
		$this->db->insert('giftstore_category', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}	
	public function update_category($data)
	{	
		$this->db->where('category_id', $data['category_id']);
		$this->db->update('giftstore_category', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}	
	public function get_category_data($id)
	{	
		$query = $this->db->get_where('giftstore_category', array('category_id' => $id));
		return $query->row_array();
	}
	public function get_subcategories()
	{	
		//get list of subcategories from database using mysql query 
		// $query = $this->db->query("SELECT * FROM giftstore_subcategory order 
		// 	by subcategory_createddate desc");	

		$this->db->select('sub.*,cat.category_name');
		$this->db->from('giftstore_subcategory AS sub');
		$this->db->join('giftstore_subcategory_category AS subcat', 'subcat.subcategory_mapping_id = sub.subcategory_id', 'inner');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = subcat.category_mapping_id', 'inner');
		// $this->db->group_by('subcategory_id');
		$this->db->order_by('subcategory_createddate','desc');
		
		$query = $this->db->get();
		// echo "<pre>";
		// print_r(array_merge_recursive($query->result_array()));
		// echo "</pre>";
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
		$category = $data['post_category'];
		$subcategory_data = $data['post_subcategory'];
		$condition = "subcategory_name =" . "'" . $subcategory_data['subcategory_name'] . "' AND subcategory_id NOT IN (". $subcategory_data['subcategory_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_subcategory');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			if(!empty($category['removed_category_data'])){
				$condition = "subcategory_mapping_id =". $subcategory_data['subcategory_id'] ." AND category_mapping_id IN(".$category['removed_category_data'].")";
				$this->db->from('giftstore_subcategory_category');
				$this->db->where($condition);
				$this->db->delete();
			}
			foreach($category['category_data'] as $value) {
				$subcategory_category_map_data = array(
					'subcategory_mapping_id' => $subcategory_data['subcategory_id'],
					'category_mapping_id' => $value,
				);
				$this->db->select('*');
				$this->db->from('giftstore_subcategory_category');
				$this->db->where($subcategory_category_map_data);
				$query = $this->db->get();
				if($query->num_rows() == 0)
					$this->db->insert('giftstore_subcategory_category', $subcategory_category_map_data);
			}
			$this->db->where('subcategory_id', $subcategory_data['subcategory_id']);
			$this->db->update('giftstore_subcategory', $subcategory_data);
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
		$this->db->select('rec.*,cat.category_name');
		$this->db->from('giftstore_recipient AS rec');
		$this->db->join('giftstore_recipient_category AS reccat', 'reccat.recipient_mapping_id = rec.recipient_id', 'inner');
		$this->db->join('giftstore_category AS cat', 'cat.category_id = reccat.category_mapping_id', 'inner');
		// $this->db->group_by('subcategory_id');
		$this->db->order_by('recipient_createddate','desc');
		
		$query = $this->db->get();

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

		$condition = "reccat.category_mapping_id =".$id;
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
	public function insert_product($data)
	{	
		$data_product_basic = $data['product_basic'];
		$data_product_files = $data['product_files'];
		$data_product_attributes = $data['product_attributes'];
		// Query to check whether category name already exist or not
		$condition = "product_title =" . "'" . $data_product_basic['product_title'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_product');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_product', $data_product_basic);
			//get inserted subcategory id to map in subcategory category relationship table
			$product_id = $this->db->insert_id();
			foreach($data_product_files as $key => $value) {
				$product_image_map = array(
	                					'product_mapping_id' => $product_id,
	                					'product_upload_image' => $value,
	             						);
				$this->db->insert('giftstore_product_upload_image', $product_image_map);
			}
			// echo sizeof($data_product_attributes);
			foreach($data_product_attributes as $key=>$value){
				$attributes = $data_product_attributes[$key][0];
				$price = $data_product_attributes[$key][1];
				$items = $data_product_attributes[$key][2];
				$product_attribute_inserted_id = array();
				foreach ($attributes as $key => $value) {
					$product_attribute_id = $attributes[$key][0];
					$product_attribute_value = $attributes[$key][1];
					$product_attributes_data = array(
						'product_attribute_id' => $product_attribute_id ,
						'product_attribute_value' => $product_attribute_value 
					);
					$this->db->insert('giftstore_product_attribute_value', $product_attributes_data);
					array_push($product_attribute_inserted_id,$this->db->insert_id());
				}
				$product_attributes_group = array(
						'product_mapping_id' => $product_id ,
						'product_attribute_group_price' => $price ,
						'product_attribute_group_totalitems' => $items,
						'product_attribute_value_combination_id' => implode(",", $product_attribute_inserted_id)
				);
				$this->db->insert('giftstore_product_attribute_group', $product_attributes_group);
			}
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
}