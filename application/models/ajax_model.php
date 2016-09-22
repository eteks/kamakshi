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
 
}