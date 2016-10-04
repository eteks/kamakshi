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
	public function get_city()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM giftstore_category WHERE category_status = 1");
		// $query = $this->db->get_where('giftstore_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_city order 
			by city_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
	public function insert_city($data)
	{	
		// Query to check whether state name already exist or not
		$condition = "city_name =" . "'" . $data['city_name'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_city');
		$this->db->join('giftstore_state', 'giftstore_state.state_id = giftstore_city.city_state_id','inner');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_city', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}
	// public function insert_city($data)
	// {	

	// 	$condition = '(city_name="'.$data['city_name'].'" and city_state_id="'.$data['city_state_id'].'")';

	// 	$query = $this->db->get_where('giftstore_city',$condition);

	// 	if ($query->num_rows() == 0) {
	// 		// Query to insert data in database
	// 		$this->db->insert('giftstore_city', $data);
	// 		// if ($this->db->affected_rows() > 0) {
	// 		// 	return true;
	// 		// }
	// 		return true;
	// 	}
	// 	else {
	// 		return false;
	// 	}
	// }
	public function update_city($data)
	{	
		$condition = "city_name =" . "'" . $data['city_name'] . "' AND city_id NOT IN (". $data['city_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_city');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('city_id', $data['city_id']);
			$this->db->update('giftstore_city', $data);
			return true;
		}	
	}	
	public function get_city_data($id)
	{	
		// echo $id;
		$where = '(city_id="'.$id.'")';
		$query['state_city'] = $this->db->get_where('giftstore_city', $where)->row_array();

		$where1 = '(state_status=1)';
		$query['states'] = $this->db->get_where(' `giftstore_state', $where1)->result_array();

		return $query;
	}
	// public function get_city_data($id)
	// {	
	// 	$query = $this->db->get_where('giftstore_city', array('city_id' => $id));
	// 	return $query->row_array();
	// }
	public function get_cities()
	{
		$this->db->select('*');
		$this->db->from('giftstore_city city');
		$this->db->join('giftstore_state state', 'state.state_id = city.city_state_id', 'inner');
		$this->db->order_by('state.state_name','desc');
		return $this->db->get()->result_array();
	}
	public function get_area()
	{	
		// just for sample
		// $query = $this->db->query("SELECT * FROM giftstore_category WHERE category_status = 1");
		// $query = $this->db->get_where('giftstore_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_area order 
			by area_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	}
//Get area data based on state
	public function get_ajax_area_data()
	 {
// just for sample
		// $query = $this->db->query("SELECT * FROM giftstore_category WHERE category_status = 1");
		// $query = $this->db->get_where('giftstore_category', array('category_status' => 1));
		// echo $query->num_rows();
		// return $query->row_array();

		//get list of categories from database using mysql query 
		$query = $this->db->query("SELECT * FROM giftstore_city order 
			by city_createddate desc");		
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		//return all records in array format to the controller
		return $query->result_array();
	 }
	public function insert_area($data)
	{
		print_r($data);	
		// Query to check whether area name already exist or not
		$condition = "area_name =" . "'" . $data['area_name'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_area');
		$this->db->join('giftstore_state', 'giftstore_state.state_id = giftstore_area.area_state_id','inner');
		$this->db->join('giftstore_city', 'giftstore_city.city_id = giftstore_area.area_city_id','inner');
		$this->db->where($condition);
		// $this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('giftstore_area', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}
	public function update_area($data)
	{
		$condition = "area_name =" . "'" . $data['area_name'] . "' AND area_id NOT IN (". $data['area_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_area');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('area_id', $data['area_id']);
			$this->db->update('giftstore_area', $data);
			return true;
		}	
	}
	public function get_area_data($id)
	{	
		// echo $id;
		$where = '(area_id="'.$id.'")';
		$query['state_city'] = $this->db->get_where('giftstore_area', $where)->row_array();
		$where1 = '(area_status=1)';
		$query['states'] = $this->db->get_where(' `giftstore_area', $where1)->result_array();
		$query['cities'] = $this->db->get_where(' `giftstore_area', $where1)->result_array();

		return $query;
	}
	public function get_areas()
	{
		$this->db->select('*');
		$this->db->from('giftstore_area area');
		$this->db->join('giftstore_state state', 'state.state_id = area.area_state_id', 'inner');
		$this->db->join('giftstore_city city', 'city.city_id = area.area_city_id', 'inner');
		$this->db->order_by('state.state_name','desc');
		$this->db->order_by('city.city_name','desc');
		return $this->db->get()->result_array();
	}
}