<?php
class Register extends CI_Model
{
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
    
    // public function get_reg_form()
    // {
    //  $name=$this->input->post('name');
    //  $email=$this->input->post('email_reg');
    //  $password=md5($this->input->post('password_reg'));
    //  $data = array(
    //  'user_status'=>'1',
    //  'user_name'=>$name,
    //  'user_email'=>$email,
    //  'user_password'=>$password
    //  );
    //  $where = '(user_email="'.$email.'" or user_name = "'.$name.'")';
    //  $query=$this->db->get_where('giftstore_users',$where);
    //      if ($query->num_rows() > 0){
    //              // echo "aleardy exists";
    //  }
    //  else {
    //      $this->db->insert('giftstore_users',$data);
    //      // echo "new";
    //  }
    // }
    public function registration_insert($data)
    {
        
        // Query to check whether username already exist or not
        $where = '(user_name="'.$data['user_name'].'" or user_email="'.$data['user_email'].'")';
        $this->db->select('*');
        $this->db->from('giftstore_users');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return false;            
        }
        else {
            $this->db->insert('giftstore_users', $data);
            return true;
        }
    }
    
    // Read data using username and password
    public function login($data)
    {
        
        $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('giftstore_users');
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
    public function read_user_information($username)
    {
        
        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('giftstore_users');
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