<?php
class Location extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}
	public function get_state()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM giftstore_category WHERE category_status = 1");
		// $query = $this->db->get_where('giftstore_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_state order 
			by state_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_state($data)
	{	
		// Query to check whether state name already exist or not
		$condition = "state_name =" . "'" . $data['state_name'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_state');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_state', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}	
	public function update_state($data)
	{	
		$condition = "state_name =" . "'" . $data['state_name'] . "' AND state_id NOT IN (". $data['state_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_state');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('state_id', $data['state_id']);
			$this->db->update('giftstore_state', $data);
			return true;
		}	
	}	
	public function get_state_data($id)
	{	
		$query = $this->db->get_where('giftstore_state', array('state_id' => $id));
		return $query->row_array();
	}
	
}
