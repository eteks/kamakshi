<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('insert_order_details')){
   function insert_order_details($data=array()){
        //get main CodeIgniter object
        $ci =& get_instance();
       
        //load databse library
        $ci->load->database();
       
        // payment details
        $status = $data[0];
        $firstname = $data[1];
        $address1 = $data[2];
        $address2 = $data[3];
        $city = $data[4];
        $area = $data [5];
        $mobile = $data [6];
        $zipcode = $data [7];
        $order_session = $data[8];
        $state = $data[9];
        $amount = $data [10];
        $email = $data[11];

        $user_id_session = explode('_',$order_session); 
        $user_id = $user_id_session[2];
        $overall_total_items = 0;
        $orderitem_id = array();
        $orderitem_value = array();
        $delivery_date = date("Y-m-d", strtotime("+2 day"));
        $delivery_time = date('H:i a');

        //  To get cart details in orderitem table
        $order_item_details = $ci->db->get_where('giftstore_orderitem',array('orderitem_session_id' => $order_session))->result_array(); 

        // To update product total in product table and product attribute group table
        foreach ($order_item_details as $product_value) {
          // To update sold items in product group table
          if(!empty($product_value['orderitem_product_attribute_group_id'])) {
            $product_group_details = $ci->db->get_where('giftstore_product_attribute_group',array('product_attribute_group_id' => $product_value['orderitem_product_attribute_group_id']))->row_array(); 
            $group_total_items =  $product_group_details['product_attribute_group_totalitems'] - $product_value['orderitem_quantity'];
            $group_sold_items =  $product_group_details['product_attribute_group_totalitems'] + $product_value['orderitem_quantity'];
            $product_group_update_data = array(
                                            'product_attribute_group_totalitems' => $group_total_items,
                                            'product_attribute_group_sold' => $group_sold_items
                                          );
            $product_update_group_where = '(product_attribute_group_id="'.$product_group_details['product_attribute_group_id'].'")';
            $ci->db->set($product_group_update_data);
            $ci->db->where($product_update_group_where);
            $ci->db->update('giftstore_product_attribute_group',$product_group_update_data);
          }

          // To update sold items in product table
          $product_details = $ci->db->get_where('giftstore_product',array('product_id' => $product_value['orderitem_product_id']))->row_array(); 
          $product_total_items =  $product_details['product_totalitems'] - $product_value['orderitem_quantity'];
          $product_sold_items =  $product_details['product_sold'] + $product_value['orderitem_quantity'];
          $product_update_data = array(
                                    'product_totalitems' => $product_total_items,
                                    'product_sold' => $product_sold_items
                                  );
          $product_update_where = '(product_id="'.$product_details['product_id'].'")';
          $ci->db->set($product_update_data);
          $ci->db->where($product_update_where);
          $ci->db->update('giftstore_product',$product_update_data);

          $overall_total_items += $product_value['orderitem_quantity'];
          $orderitem_id[] = $product_value['orderitem_id'];
        }
       
        //insert data to order table in database
        if($user_id==0) {
          $payment_order_data = array(
                                'order_total_items' => $overall_total_items,
                                'order_customer_name' => $firstname,
                                'order_shipping_line1' => $address1,
                                'order_shipping_line2' => $address2,
                                'order_shipping_state_id' => $state,
                                'order_shipping_city_id' => $city,
                                'order_shipping_area_id' => $area,
                                'order_shipping_email' => $email,
                                'order_shipping_mobile' => $mobile,
                                'order_delivery_status' => "processing",
                                'order_delivery_date' => $delivery_date,
                                'order_delivery_time' => $delivery_time,
                                'order_total_amount' => $amount,
                                'order_zipcode' => $zipcode,
                                'order_status' => '1'
                              );
        }
        else {
          // To get user details
          $user_details = $ci->db->get_where('giftstore_users',array('user_id' => $user_id))->row_array();

          $payment_order_data = array(
                                'order_user_id' => $user_id,
                                'order_total_items' => $overall_total_items,
                                'order_customer_email' => $user_details['user_email'],
                                'order_customer_name' => $firstname,
                                'order_shipping_line1' => $address1,
                                'order_shipping_line2' => $address2,
                                'order_shipping_state_id' => $state,
                                'order_shipping_city_id' => $city,
                                'order_shipping_area_id' => $area,
                                'order_shipping_email' => $email,
                                'order_shipping_mobile' => $mobile,
                                'order_delivery_status' => "processing",
                                'order_delivery_date' => $delivery_date,
                                'order_delivery_time' => $delivery_time,
                                'order_total_amount' => $amount,
                                'order_zipcode' => $zipcode,
                                'order_status' => '1'
                              );
        }
      $ci->db->insert('giftstore_order',$payment_order_data);
      $order_id = $ci->db->insert_id();

      // To update order_id in orderitem table
      foreach ($orderitem_id as $orderitem_val) {
        $orderitem_value[] = array(
                              'orderitem_id' => $orderitem_val,
                              'orderitem_order_id' => $order_id,
                            );
      }
      $ci->db->update_batch('giftstore_orderitem', $orderitem_value, 'orderitem_id');
      // To set order_id in flashdata
      // Flash storage is used to stored value and we can retrieve data from flash storage only once. then it will be removed automatically. 
      ini_set('display_errors', 1);
      $ci->session->unset_userdata('user_session_id');
      $ci->session->unset_userdata('general_session_id');
      $ci->session->set_flashdata('order_id',$order_id); 
      /*Payment success email added by thangam*/
               $config['protocol'] = 'smtp';
               $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                 $config['smtp_port'] = 25;
               $config['smtp_user'] = "thangamgold45@gmail.com";
               $config['smtp_pass'] = '********';          
                  $ci->load->library('email', $config);   
            $ci->email->from('thangamgold45@gmail.com', 'head');
            $ci->email->to($config['smtp_user']);           
            $ci->email->subject('Get your OrderID');
            // $this->email->message('Please go to this link to get your password.
            //        http://localhost/kamakshi/');
            $ci->email->message("Your OrderID is ".$order_id);
            $ci->email->send();
            /*Payment success email ended by thangam*/
      redirect('success');
    }
}
