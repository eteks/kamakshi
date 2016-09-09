<?php
class Todo_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_todos($id = 0)
	{
		if ($id === 0)
		{
			$query = $this->db->get_where('todos',array('completed' => 0));
			return $query->result_array();
		}
		
		$query = $this->db->get_where('todos', array('id' => $id));
		return $query->row_array();
	}

}