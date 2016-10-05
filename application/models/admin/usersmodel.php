<?php
class Usersmodel extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}
	public function get_adminusers()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('giftstore_adminusers');
		$this->db->order_by('adminuser_create_date','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_adminusers_data($id)
	{	
		//get full data of specific admin users by their passing id
		$query = $this->db->get_where('giftstore_adminusers', array('adminuser_id' => $id));
		//Here row_array() represents to pass only one row of data for their particular user
		return $query->row_array();
	}
	// public function update_adminusers($data)
	// {	
	// 	$condition = "adminuser_username =" . "'" . $data['adminuser_username'] . "' AND adminuser_id NOT IN (". $data['adminuser_id'].")";
	// 	$this->db->select('*');
	// 	$this->db->from('giftstore_adminusers');
	// 	$this->db->where($condition);
	// 	$query = $this->db->get();
	// 	if ($query->num_rows() > 0) {
	// 		return false;
	// 	}
	// 	else{
	// 		$this->db->where('adminuser_id', $data['adminuser_id']);
	// 		$this->db->update('giftstore_adminusers', $data);
	// 		return true;
	// 	}	
	// }
	
	// Customize the above code like below because of used some validation function in controller itself
	public function update_adminusers($data)
	{	
		$this->db->where('adminuser_id', $data['adminuser_id']);
		$this->db->update('giftstore_adminusers', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}
	//Get area data based on state
	public function get_ajax_user_data()
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
	public function get_endusers()
	{	
		//get list of adminusers from database using mysql query 
		$this->db->select('*');
		$this->db->from('giftstore_users');
		$this->db->order_by('user_createddate','desc');	
		$query = $this->db->get();

		//return all records in array format to the controller
		return $query->result_array();
	}
	public function get_endusers_data($id)
	{	
		$where = '(user_id="'.$id.'")';
		$query['state_city'] = $this->db->get_where('giftstore_users', $where)->row_array();
		$where1 = '(user_status=1)';
		$query['states'] = $this->db->get_where(' `giftstore_users', $where1)->result_array();
		$query['cities'] = $this->db->get_where(' `giftstore_users', $where1)->result_array();

		return $query;
	}
	public function update_endusers($data)
	{	
		$this->db->where('user_id', $data['user_id']);
		$this->db->update('giftstore_users', $data);
		// trans_complete() function is used to check whether updated query successfully run or not
		if ($this->db->trans_complete() == false) {
			return false;
		}
		return true;	
	}	
}