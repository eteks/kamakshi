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
}