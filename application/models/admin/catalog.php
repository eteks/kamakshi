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
}