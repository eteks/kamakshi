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

	public function get_category()
	{
	    $query = $this->db->get('giftstore_subcategory');
	    return $query->result_array();
	}

}