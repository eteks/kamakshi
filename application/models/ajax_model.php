<?php
class Ajax_Model extends CI_Model {
    public function __construct()
    {
         $this->load->database();
    }

    public function get_products_subcategory() {
        if($this->input->post('sub_id') && $this->input->post('cat_id')) {
            $sub_product=$this->db->select('*');
            $sub_product=$this->db->from('giftstore_product cp');
            $sub_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','left');
            $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_subcategory_id="'.$this->input->post('sub_id').'" and cp.product_status=1 and cp.product_totalitems!=0)';
            $sub_product=$this->db->where($where);
            $sub_product=$this->db->group_by('cp.product_id');
            $query = $sub_product->get()->result_array();
        }
        return $query;
    }
    public function get_products_recipient() {
        if($this->input->post('rec_id') && $this->input->post('cat_id')) {
            $sub_product=$this->db->select('*');
            $sub_product=$this->db->from('giftstore_product cp');
            $sub_product=$this->db->join('giftstore_product_upload_image cpi','cp.product_id=cpi.product_mapping_id','left');
            $where = '(cp.product_category_id="'.$this->input->post('cat_id').'" and cp.product_recipient_id="'.$this->input->post('rec_id').'" and cp.product_status=1 and cp.product_totalitems!=0)';
            $sub_product=$this->db->where($where);
            $sub_product=$this->db->group_by('cp.product_id');
            $query = $sub_product->get()->result_array();
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
 
}