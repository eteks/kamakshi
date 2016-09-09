<?php
class Todos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		
		$this->load->model('todo_model');
	}
	public function index()
	{
		$data['title'] = 'To-Dos List';
		$data['todos'] = $this->todo_model->get_todos();
		echo print_r($data['todos']);
		
		// $this->load->view('templates/header', $data);
		// $this->load->view('todos/index', $data);
		// $this->load->view('templates/footer');
		$this->load->view('index', $data);

	}

	public function view()
	{
	
		$id = $this->uri->segment(2);
	
		// if (empty($id))
		// {
		// 	show_404();
		// }
		
		$data['title'] = 'View a To-do item';
		$data['todo'] = $this->todo_model->get_todos($id);
	
		// $this->load->view('templates/header', $data);
		$this->load->view('view', $data);
		// $this->load->view('templates/footer');

	}

}
