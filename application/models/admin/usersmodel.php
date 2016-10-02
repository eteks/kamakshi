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
	public function update_adminusers($data)
	{	
		$condition = "adminuser_username =" . "'" . $data['adminuser_username'] . "' AND adminuser_id NOT IN (". $data['adminuser_id'].")";
		$this->db->select('*');
		$this->db->from('giftstore_adminusers');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		}
		else{
			$this->db->where('adminuser_id', $data['adminuser_id']);
			$this->db->update('giftstore_adminusers', $data);
			return true;
		}	
	}	
}