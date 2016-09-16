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

	public function get_reg_form()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email_reg');
		$password=md5($this->input->post('password_reg'));
		$data = array(
		'user_name'=>$name,
		'user_email'=>$email,
		'user_password'=>$password
		);

		$this->db->insert('giftstore_users',$data);
		
	}

}