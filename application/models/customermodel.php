<?php

/**
 * 
 */
class Customermodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getcustomername($q) {
        $this->db->select('cst_id,cst_company');
        $this->db->like('cst_company', $q);
        $query = $this->db->get('customer');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['cst_id'] . '-' . $row['cst_company'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }
    
    public function inserthostingdetails($data) {
        $this->db->insert('hosting_info', $data);

        return true;
    }
    
    public function updatehosting($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('hosting_info', $data);
        return TRUE;
    }

    public function insertcustomer($data) {
        $this->db->insert('customer', $data);

        return true;
    }

    public function ck_existing($cst_id,$cst_email) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('cst_email', $cst_email);
        $this->db->where('cst_id !=', $cst_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ck_cst_existing($cst_id) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('cst_id', $cst_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function querycustomerbyid($cst_id) {
        $this->db->select('invoice.*,customer.cst_name,customer.cst_name,customer.cst_mobile');
        $this->db->from('invoice');
        $this->db->where('invoice.cst_id', $cst_id);
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryinvoiceditembyinvoiceid($invoice_id) {
        $this->db->select('*');
        $this->db->from('invoiced_item');
        $this->db->where('invoice_id', $invoice_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function customerinvoicebyid($id) {
        $this->db->select('SUM(invoice.due_amount) AS cstdue,SUM(invoice.net_total) AS cstnet');
        $this->db->from('invoice');
        $this->db->where('cst_id', $id);
        $this->db->group_by("cst_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function customerinvoice() {
        $this->db->select('customer.*,source.src_name,SUM(invoice.due_amount) AS cstdue,SUM(invoice.net_total) AS cstnet,invoice.cst_id as icstid');
        $this->db->from('customer');
        $this->db->join('source', 'customer.src_id = source.id', 'left');
        $this->db->join('invoice', 'customer.cst_id = invoice.cst_id', 'left');
        $this->db->order_by("customer.id", "desc");
        $this->db->group_by("customer.id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function getquerycustomerid($id) {
        $this->db->select('*');
        $this->db->from('customer');
        
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatecustomer($cst_id, $data) {
        $this->db->where('cst_id', $cst_id);
        $this->db->update('customer', $data);
        return TRUE;
    }

    public function querycstreportbydaterange($cst_id) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.cst_id', $cst_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function cstcompany($cst_id) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where("cst_id", $cst_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function storeInfo() {
        $this->db->select('*');
        $this->db->from('app_config');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }
    
    public function querycstdetails($id) {
        $this->db->select('customer.*,source.src_name');
        $this->db->from('customer');
        $this->db->join('source', 'customer.src_id = source.id', 'left');
        $this->db->where("cst_id", $id);
        $this->db->order_by("id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryhostingdetails($id) {
        $this->db->select('hosting_info.*,customer.cst_company,server.srv_name');
        $this->db->from('hosting_info');
        $this->db->join('customer', 'hosting_info.cst_id = customer.cst_id', 'left');
        $this->db->join('server', 'hosting_info.srv_id = server.id', 'left');        
        $this->db->where("hosting_info.cst_id", $id);
        $this->db->order_by("hosting_info.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function queryinvoicehistory($id) {
        $this->db->select('invoice.*,customer.*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where("invoice.cst_id", $id);
        $this->db->order_by("invoice.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function updateinvoiceduebyid($duedata, $invoice_id) {
        $this->db->where('invoice_id', $invoice_id);
        $this->db->update('invoice', $duedata);
        return TRUE;
    }
    
    public function updateduepaymentbyid($data, $trans_id) {
        $this->db->where('trans_id', $trans_id);
        $this->db->update('dues', $data);
        return true;
    }
    
    public function updateduetranssummary($data, $trans_id) {
        $this->db->where('trans_id', $trans_id);
        $this->db->update('transaction_summary', $data);
        return true;
    }
    
    public function queryinvoicepaymenthistory($id) {
        $this->db->select('invoice.*,customer.*,dues.*,bank_details.*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->join('dues', 'invoice.invoice_id = dues.invoice_id', 'left');
        $this->db->join('bank_details', 'dues.bank_id = bank_details.id', 'left');
        $this->db->where("invoice.cst_id", $id);
        $this->db->order_by("invoice.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryvatrate() {
        $this->db->select('*');
        $this->db->from('vat_info');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function activatecustomer($id, $info_data) {
        $this->db->where('id', $id);
        $this->db->update('customer', $info_data);
        return TRUE;
    }

    public function inactivatecustomer($id, $info_data) {
        $this->db->where('id', $id);
        $this->db->update('customer', $info_data);
        return TRUE;
    }

    public function customer_name() {
        $this->db->select('*');
        $this->db->from('customer');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function server_name() {
        $this->db->select('*');
        $this->db->from('server');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function source_name() {
        $this->db->select('*');
        $this->db->from('source');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querycurrencytag() {
        $this->db->select('currency_tag');
        $this->db->from('currency_info');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function deletecustomerbyid($cst_id) {
        $this->db->where('cst_id', $cst_id);
        $this->db->delete('customer');
    }
    
    public function deletepaymentbyid($trans_id) {
        $this->db->where('trans_id', $trans_id);
        $this->db->delete('dues');
        $this->db->where('trans_id', $trans_id);
        $this->db->delete('transaction_summary');
    }
    
    public function getduebyinvoiceid($id) {
        $this->db->select('due_amount,cst_id');
        $this->db->from('invoice');
        $this->db->where('invoice_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function updatepaymentbyid($duedata, $invoice_id) {
        $this->db->where('invoice_id', $invoice_id);
        $this->db->update('invoice', $duedata);
        return TRUE;
    }

}
