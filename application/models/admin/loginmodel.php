<?php
class Loginmodel extends CI_Model {
	public function __construct()
	{
		//$this->load->database();
	}	
	// Read data using username and password
	public function user_login($data) {
		$condition = "adminuser_username =" . "'" . $data['username'] . "' AND " . "adminuser_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('giftstore_adminusers');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return true;
		} else {
		return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {
		$condition = "adminuser_username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('giftstore_adminusers');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
		return false;
		}
	}
}