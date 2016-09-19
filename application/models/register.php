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
		'user_status'=>'1',
		'user_name'=>$name,
		'user_email'=>$email,
		'user_password'=>$password
		);


		// $where = "user_name='$name' AND user_email='$email' AND user_status='1'";
		// $query = $this->db->get_where("giftstore_users", array("user_email" => $email,"user_name"=> $name));
	
		//     $query = $this->db->get_where("giftstore_users",array('user_email' => $email));
		//     $query = $this->db->get_where("giftstore_users",array('user_name' => $name));
		//     if ($query->num_rows() > 0){
  //       return true;
		// }
		//     else{
		//     	$this->db->insert('giftstore_users',$data);
		//     }



		//  $query = $this->db->or_where('giftstore_users' ,array('user_email' => $email  ,'user_name'=> $name));
		// // echo $query->num_rows();
		//     if ($query->num_rows() > 0){
  //       		return true;
		//  }
		//     else{
		//      	$this->db->insert('giftstore_users',$data);
		//      }
		$where = '(user_email="'.$email.'" or user_name = "'.$name.'")';
		$query=$this->db->get_where('giftstore_users',$where);
		// print_r($query->result_array());
	  	if ($query->num_rows() > 0){
       		echo "aleardy exists";
		}
		else {
			$this->db->insert('giftstore_users',$data);
			// echo "new";
		}
	}


}