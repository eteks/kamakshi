<?php
class Ajax_Model extends CI_Model {
    public function __construct()
    {
         $this->load->database();
    }


    //  To get products after filtering (filtering)
    public function get_filtering_product($data) {

        $start_price= $this->input->post('s_val');
        $end_price= $this->input->post('e_val');





        $start = $data['offset'];
        $limit = $data['limit'];
        if($this->input->post('cat_id')) {
            if($this->input->post('sub_id') && $this->input->post('rec_id')) {
                $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_subcategory_id="'.$this->input->post('sub_id').'" and cp.product_recipient_id="'.$this->input->post('rec_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
            }
            else if($this->input->post('sub_id')) {
               $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_subcategory_id="'.$this->input->post('sub_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
            }
            else if($this->input->post('rec_id')) {
                $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_recipient_id="'.$this->input->post('rec_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
            }
            else {
                $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_status=1 and cp.product_totalitems!=0 and (cp.product_price BETWEEN "'.$start_price.'" and "'.$end_price.'"))';
            }
            $sub_product=$this->db->select('*');
            $sub_product=$this->db->from('giftstore_product cp');
            $sub_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
            $sub_product=$this->db->where($where);
            $sub_product=$this->db->limit( $limit, $start);
            $sub_product=$this->db->group_by('cp.product_id');

            if($this->input->post('sort') == "pricel") {
                $query['product_category'] = $sub_product->order_by('cp.product_price','asc')->get()->result_array();
            }
            else if($this->input->post('sort') == "priceh") {
                $query['product_category'] = $sub_product->order_by('cp.product_price','desc')->get()->result_array();
            }
            else if($this->input->post('sort') == 'newest') {
                $query['product_category'] = $sub_product->order_by('cp.product_id','desc')->get()->result_array();
            }
            else {
                $query['product_category'] = $sub_product->order_by('cp.product_title','asc')->get()->result_array();
            }





            // count1 
            $sub_product1=$this->db->select('*');
            $sub_product1=$this->db->from('giftstore_product cp');
            $sub_product1=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','inner');
            $sub_product1=$this->db->where($where);
            $sub_product1=$this->db->group_by('cp.product_id');
            $query1 = $sub_product1->get()->result_array();
            $query['product_count'] = count($query1);

        }


         

        return $query;
    }



    //  To get add to cart status and count
    public function get_add_to_cart_count() {
        if($this->input->post('pro_id')) {
            $pro_id = $this->input->post('pro_id');
            $order_session_id = $this->session->userdata('user_session_id');
            if($this->input->post('grp_id')) {
                $grp_id = $this->input->post('grp_id');
                $add_to_cart_where = '(product_attribute_group_id="'.$grp_id.'" and     product_attribute_group_totalitems!=0)';
                $add_to_cart_query = $this->db->get_where('giftstore_product_attribute_group',$add_to_cart_where);
                $add_to_cart_query_array =  $add_to_cart_query->row_array();
                $price = $add_to_cart_query_array['product_price'];
            }
            else {
                $grp_id=0;
                $add_to_cart_where = '(product_id="'.$pro_id.'" and  product_totalitems!=0)';
                $add_to_cart_query = $this->db->get_where('giftstore_product',$add_to_cart_where);
                $add_to_cart_query_array =  $add_to_cart_query->row_array();
                $price = $add_to_cart_query_array['product_price'];
            }
            
            $add_to_cart_product_where = '( orderitem_product_id="'.$pro_id.'" and  orderitem_session_id="'.$order_session_id.'")';
            $add_to_cart_product_query = $this->db->get_where('giftstore_orderitem',$add_to_cart_product_where);
            $add_to_cart_product_query_array =  $add_to_cart_product_query->row_array();
            $orderitem_count = count($add_to_cart_product_query_array);

            if($orderitem_count > 0) {
                $unique_id = $add_to_cart_product_query_array['orderitem_id'];
                if($grp_id) {
                    $order_update_data = array( 
                        'orderitem_product_attribute_group_id' => $grp_id,
                        'orderitem_price' => $price,
                        'orderitem_quantity' => '1',
                        'orderitem_status' => '1',
                        'orderitem_session_id' => $order_session_id,
                        'orderitem_product_id' => $pro_id
                    );
                }
                else {
                    $order_update_data = array( 
                        'orderitem_price' => $price,
                        'orderitem_quantity' => '1',
                        'orderitem_status' => '1',
                        'orderitem_session_id' => $order_session_id,
                        'orderitem_product_id' => $pro_id
                    ); 
                }
                $order_update_where = '( orderitem_id="'.$unique_id.'")'; 
                $this->db->set($order_update_data); 
                $this->db->where($order_update_where); 
                $this->db->update("giftstore_orderitem", $order_update_data);
                $data['add_to_cart_status'] = "Updated successfully";
            }

            else {
                if($grp_id) {
                    $order_insert_data = array(
                        'orderitem_product_id' => $pro_id,
                        'orderitem_product_attribute_group_id' => $grp_id,
                        'orderitem_price' => $price,
                        'orderitem_quantity' => '1',
                        'orderitem_session_id' => $order_session_id,
                        'orderitem_status' => '1'
                    );
                }
                else {
                    $order_insert_data = array(
                        'orderitem_product_id' => $pro_id,
                            'orderitem_price' => $price,
                        'orderitem_quantity' => '1',
                        'orderitem_session_id' => $order_session_id,
                        'orderitem_status' => '1'
                    );
                }
                $data['add_to_cart_status'] = "Inserted successfully";
                $this->db->insert('giftstore_orderitem', $order_insert_data);
            } 
        }
        else {
            $data['add_to_cart_status'] = "Error : something went wrong";  
        }
        $order_select_where = '(orderitem_session_id="'.$order_session_id.'" and orderitem_status=1)';
        $order_select_query = $this->db->get_where('giftstore_orderitem',$order_select_where);
        $order_select_query_array =  $order_select_query->result_array();
        $data['order_count'] =count($order_select_query_array);

        return $data;
    }

    //  Remove products in basket
    public function get_remove_product() {
        if($this->input->post('bas_pro_id')) {
            $order_session_id = $this->session->userdata('user_session_id');
            $basket_remove_where='(orderitem_product_id="'.$this->input->post('bas_pro_id').'" and orderitem_session_id= "'.$order_session_id.'")';

            $this->db->where($basket_remove_where);
            $this->db->delete('giftstore_orderitem');
            $query_status="success";
        }
        return $query_status;
    }

    //  Update quantity in basket
    public function get_update_product() {
        if($this->input->post('updation_det')) {
            $order_session_id = $this->session->userdata('user_session_id');
            $updation_det = $this->input->post('updation_det');
            foreach ($updation_det as $key => $value) {
                $update_quantity_where = '(product_id="'.$key.'")';
                $update_quantity_query = $this->db->get_where('giftstore_product',$update_quantity_where);
                $update_quantity_array =  $update_quantity_query->row_array();
                if($update_quantity_array['product_totalitems'] >= $value) {
                  

                    $basket_update_data = array( 
                        'orderitem_quantity' => $value,
                    ); 
                    
                    $basket_update_where = '(orderitem_product_id="'.$key.'" and orderitem_session_id="'.$order_session_id.'")'; 
                    $this->db->set($basket_update_data); 
                    $this->db->where($basket_update_where); 
                    $this->db->update("giftstore_orderitem", $basket_update_data);
                    $query_status="success";
                }
                else {
                    $query_status="".$update_quantity_array['product_title']." is not available. Available only ".$update_quantity_array['product_totalitems']; 
                    return $query_status;
                }
            }

           // $basket_update_where='(orderitem_product_id="'.$this->input->post('bas_pro_id').'" and orderitem_session_id= "'.$order_session_id.'")';

            // $this->db->where($basket_update_where);
            // $this->db->delete('giftstore_orderitem');
            // $query_status="success";

        }
        return $query_status;
    }
 
}
