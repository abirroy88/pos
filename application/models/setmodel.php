<?php

/**
 * 
 */
class Setmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function duplicateItemChecker($code, $name, $supplier) {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('item_name', $name);
        $this->db->where('item_code', $code);
        $this->db->where('supplier_id', $supplier);
        $query_results = $this->db->get();
        $results = $query_results->row();

        if (count($results) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function viewdiscount() {
        $this->db->select('*');
        $this->db->from('discount');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function insertdiscount($data) {
        $this->db->insert('discount', $data);
        return true;
    }
    
    public function updatediscount($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('discount', $data);
        return true;
    }
    
    public function deletediscountbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('discount');        
    }

    public function viewcat() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('parent_id', 0);
        $this->db->order_by("name", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function insertcat($data) {
        $this->db->insert('category', $data);
        return true;
    }

    public function updatecat($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('category', $data);
        return true;
    }

    public function cat_details_by_id($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);
        $this->db->order_by("name", "ASC");
        $this->db->group_by("parent_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function cat_name($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);
        $this->db->order_by("name", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function cat_details_by_parent($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('parent_id', $id);
        $this->db->order_by("name", "ASC");
//        $this->db->group_by("parent_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function deletecatbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('category');
        $this->db->where('parent_id', $id);
        $this->db->delete('category');
    }
    
    public function viewtaxclass() {
        $this->db->select('*');
        $this->db->from('tax_class');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function inserttaxclass($data) {
        $this->db->insert('tax_class', $data);
        return true;
    }
    
    public function updatetaxclass($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tax_class', $data);
        return true;
    }
    
    public function deletetaxclassbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('tax_class');        
    }
    
    public function viewpaymenttype() {
        $this->db->select('*');
        $this->db->from('payment_type');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function insertpaymenttype($data) {
        $this->db->insert('payment_type', $data);

        return true;
    }
    
    public function updatepaymenttype($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('payment_type', $data);
        return TRUE;
    }
    
    public function deletepaymenttypebyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('payment_type');
    }
    
    public function viewpricingrule() {
        $this->db->select('*');
        $this->db->from('pricing_rule');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function insertpricingrule($data) {
        $this->db->insert('pricing_rule', $data);
        return true;
    }
    
    public function updatepricingrule($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('pricing_rule', $data);
        return true;
    }
    
    public function deletepricingrulebyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('pricing_rule');        
    }
    
    public function viewrolegroup() {
        $this->db->select('*');
        $this->db->from('role_group');
        $this->db->where('status', 0);
        $this->db->order_by('name', 'ASC');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewrolegroupname($id) {
        $this->db->select('name');
        $this->db->from('role_group');
        $this->db->where('id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }
    
    public function insertshop($data) {
        $this->db->insert('shop', $data);
        return true;
    }

}
