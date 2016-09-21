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
	public function get_recipient()
	{	
		if($this->uri->segment(2)) {
			$this->db->select('*');
            $this->db->from('giftstore_recipient_category rc'); 
            $this->db->join('giftstore_recipient r', 'rc.recipient_mapping_id=r.recipient_id', 'inner');
            $this->db->where(array('rc.category_mapping_id' => $this->uri->segment(2), 'r.recipient_status' => '1'));
            $query = $this->db->get()->result_array();

        }
        return $query;
	}
	public function get_category()
	{	
		if($this->uri->segment(2)){
			$where = '(category_id="'.$this->uri->segment(2).'")';
			$cat_query=$this->db->get_where('giftstore_category',$where);
			$query['cat_name'] = $cat_query->row();
        	$this->db->select('*');
            $this->db->from('giftstore_subcategory_category cs'); 
            $this->db->join('giftstore_subcategory s', 'cs.subcategory_mapping_id=s.subcategory_id', 'inner');
            $this->db->where(array('cs.category_mapping_id' => $this->uri->segment(2), 's.subcategory_status' => '1'));
            $query['gift_subcategory'] = $this->db->get()->result_array();
            $query['sub_count'] = count($query['gift_subcategory']);
   		}
	    return $query;
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