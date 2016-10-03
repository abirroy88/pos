<?php

/**
 * 
 */
class Inventorymodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function itemlist() {
        $this->db->select('product.*,stock_moves.quantity,stock_moves.unit_cost,tax_class.rate,category.name AS cname');
        $this->db->from('product');
        $this->db->join('stock_moves', 'product.tr_id = stock_moves.tr_id', 'left');
        $this->db->join('tax_class', 'product.tax_class_id = tax_class.id', 'left');
        $this->db->join('category', 'product.cat_id = category.id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function itemdetails($tr_id) {
        $this->db->select('product.*,stock_moves.quantity,stock_moves.unit_cost,stock_moves.vendor_id,manufacturers.name AS mname,tax_class.name AS tname,tax_class.rate AS trate,discount.name AS dname,discount.rate AS drate,vendors.name AS vname,category.name AS cname');
        $this->db->from('product');
        $this->db->join('stock_moves', 'product.tr_id = stock_moves.tr_id', 'left');
        $this->db->join('category', 'product.cat_id = category.id', 'left');
        $this->db->join('manufacturers', 'product.manufacture_id = manufacturers.id', 'left');
        $this->db->join('tax_class', 'product.tax_class_id = tax_class.id', 'left');
        $this->db->join('discount', 'product.discount_percentage = discount.id', 'left');
        $this->db->join('vendors', 'stock_moves.vendor_id = vendors.id', 'left');
        $this->db->where('product.tr_id', $tr_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function getcatnames($q) {
        $this->db->select('*');
        $this->db->like('name', $q);
        $query = $this->db->get('category');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row['id'] = htmlentities(stripslashes($row['id']));
                $row['value'] = htmlentities(stripslashes($row['name']));
                $row_set[] = $row;
            }
            echo json_encode($row_set);
        }
    }

    public function insertinventory($data, $data2) {
        $this->db->insert('product', $data);
        $this->db->insert('stock_moves', $data2);
        return true;
    }

    public function updateinventory($data, $data2, $tr_id) {
        $this->db->where('tr_id', $tr_id);
        $this->db->update('product', $data);
        $this->db->update('stock_moves', $data2);
        return TRUE;
    }

    public function deleteproductbyid($tr_id) {
        $this->db->where('tr_id', $tr_id);
        $this->db->delete('product');
        $this->db->where('tr_id', $tr_id);
        $this->db->delete('stock_moves');
    }

    public function viewmanufacturer() {
        $this->db->select('*');
        $this->db->from('manufacturers');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function insertmanufacturer($data) {
        $this->db->insert('manufacturers', $data);

        return true;
    }

    public function updatemanufacturer($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('manufacturers', $data);
        return TRUE;
    }
    
    public function deletemanufacturerbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('manufacturers');
    }

    public function viewvendors() {
        $this->db->select('*');
        $this->db->from('vendors');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function insertvendors($data) {
        $this->db->insert('vendors', $data);
        return true;
    }

    public function editvendor($id) {
        $this->db->select('*');
        $this->db->from('vendors');
        $this->db->where('id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function updatevendor($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('vendors', $data);
        return TRUE;
    }

    public function deletevendorbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('vendors');
    }

    public function category() {
        $this->db->select('*');
        $this->db->from('category');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function manufacturer() {
        $this->db->select('*');
        $this->db->from('manufacturers');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function taxclass() {
        $this->db->select('*');
        $this->db->from('tax_class');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function discount() {
        $this->db->select('*');
        $this->db->from('discount');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function vendor() {
        $this->db->select('*');
        $this->db->from('vendors');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

}
