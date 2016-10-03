<?php

/**
 * 
 */
class Dashboardmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function hash($string) {
        return hash('sha512', $string);
    }

    public function viewuserlist() {
        $this->db->select('*');
        $this->db->from('user');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function activateuser($id, $info_data) {
        $this->db->where('id', $id);
        $this->db->update('user', $info_data);
        return TRUE;
    }

    public function inactivateuser($id, $info_data) {
        $this->db->where('id', $id);
        $this->db->update('user', $info_data);
        return TRUE;
    }

    public function changepassword($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('user', $data);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function querytotalsale() {
        $this->db->select('SUM(net_total) as grand_total', FALSE);
        $this->db->from('invoice');
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function querytotaldue() {
        $this->db->select('SUM(due_amount) as due_amount', FALSE);
        $this->db->from('invoice');
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function querytotaloverdue($enddate) {
        $this->db->select('SUM(due_amount) as due_amount', FALSE);
        $this->db->from('invoice');
        $this->db->where('due_date <', $enddate);
        $query_results = $this->db->get();
        $results = $query_results->row();
//        $results = $this->db->last_query();
//        print_r($results);
        return $results;
    }

    public function querycurrenttotalsale($first_date, $last_date) {
        $this->db->select('SUM(net_total) as grand_total', FALSE);
        $this->db->from('invoice');
        $this->db->where('due_date >=', $first_date);
        $this->db->where('due_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function querycurrenttotaldue($first_date, $last_date) {
        $this->db->select('SUM(due_amount) as due_amount', FALSE);
        $this->db->from('invoice');
        $this->db->where('due_date >=', $first_date);
        $this->db->where('due_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function querytotalinvoicehistory($first_date, $last_date) {
        $this->db->select('invoice.*,customer.cst_company');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.due_date >=', $first_date);
        $this->db->where('invoice.due_date <=', $last_date);
        $this->db->order_by("invoice.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querytotalinvoicehistory2() {
        $this->db->select('invoice.*,customer.cst_company');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->order_by("invoice.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function sourcelist() {
        $this->db->select('*');
        $this->db->from('source');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function serverlist() {
        $this->db->select('*');
        $this->db->from('server');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function companylist() {
        $this->db->select('*');
        $this->db->from('company');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function payablelist() {
        $this->db->select('*');
        $this->db->from('payable');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function ck_existing_src($id,$name) {
        $this->db->select('*');
        $this->db->from('source');
        $this->db->where('src_name', $name);
        if($id != ''){
            $this->db->where('id !=', $id);
        }
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function insert_source($data) {
        $this->db->insert('source', $data);

        return true;
    }
    
    public function update_source($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('source', $data);
        return TRUE;
    }
    
    public function ck_existing_srv($id,$name) {
        $this->db->select('*');
        $this->db->from('server');
        $this->db->where('srv_name', $name);
        if($id != ''){
            $this->db->where('id !=', $id);
        }
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function insert_server($data) {
        $this->db->insert('server', $data);

        return true;
    }
    
    public function update_server($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('server', $data);
        return TRUE;
    }
    
    public function ck_existing_com($id,$name) {
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('com_name', $name);
        if($id != ''){
            $this->db->where('id !=', $id);
        }
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    
    public function insert_company($data) {
        $this->db->insert('company', $data);

        return true;
    }
    public function insert_payable($data) {
        $this->db->insert('payable', $data);

        return true;
    }
    
    public function update_company($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('company', $data);
        return TRUE;
    }
    
    public function update_payable($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('payable', $data);
        return TRUE;
    }
    
    public function ck_com_existing($id) {
//        $this->db->select('*');
//        $this->db->from('employee');
//        $this->db->where('dep_id', $id);
//        $query_results = $this->db->get();
//        $results = $query_results->row();
//        if (count($results) > 0) {
//            return FALSE;
//        } else {
//            return TRUE;
//        }
    }
    
    public function deletesource_byid($id) {
        $this->db->where('id', $id);
        $this->db->delete('source');        
    }
    
    public function deletepayable_byid($id) {
        $this->db->where('id', $id);
        $this->db->delete('payable');        
    }
    
    public function deleteserver_byid($id) {
        $this->db->where('id', $id);
        $this->db->delete('server');        
    }
    
    public function deletecompany_byid($id) {
        $this->db->where('id', $id);
        $this->db->delete('company');        
    }

    public function duplicateUserChecker($name) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('name', $name);
        $query_results = $this->db->get();
        $results = $query_results->row();

        if (count($results) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insertUserInfo($data) {
        $this->db->insert('user', $data);

        return true;
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

    public function insertstoreinfo($data) {
        $this->db->insert('app_config', $data);

        return true;
    }

    public function viewstoreinfo() {
        $this->db->select('*');
        $this->db->from('app_config');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function bankavailableblance($bid) {
        $this->db->select('SUM(tr_amount) as bavbalance', FALSE);
        $this->db->from('transaction_summary');
        $this->db->where('b_id', $bid);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function viewbankbalanceinfo() {
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewclientinfo() {
        $this->db->select('*');
        $this->db->from('customer');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewactiveclientinfo() {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('statuss', 0);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function viewbankinfo() {
        $this->db->select('*');
        $this->db->from('bank_details');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function viewbankname($id) {
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->where('id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function viewbankstatementinfo($id) {
        $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.b_branch,bank_details.acc_no');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.b_id', $id);
        $this->db->order_by("transaction_summary.id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function noninvoicecompany($id) {
        $this->db->select('company.*');
        $this->db->from('company');
        $this->db->join('transaction_summary', 'company.id = transaction_summary.non_c_id', 'left');
        $this->db->where('transaction_summary.trans_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }
    
    public function noninvoice($id) {
        $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.b_branch,bank_details.acc_no');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.trans_id', $id);
        $this->db->order_by("transaction_summary.id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function viewbankinfo2() {
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->where('status', 0);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function cashbalance() {
        $this->db->select('SUM(tr_amount) as cashbalance');
        $this->db->from('transaction_summary');
        $this->db->where('tr_method', 'Cash');
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function ckbank_existing($bank, $acc_no) {
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->where('acc_no', $acc_no);
        $this->db->where('b_name', $bank);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function insertbankinfo($data) {
        $this->db->insert('bank_details', $data);

        return true;
    }

    public function updatebankinfo($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bank_details', $data);
        return TRUE;
    }

    public function ck_existing_use($id) {
        $this->db->select('*');
        $this->db->from('transaction_summary');
        $this->db->where('b_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function deletebankinfo($id) {
        $this->db->where('id', $id);
        $this->db->delete('bank_details');
    }

    public function getbankdetail() {
        $this->db->select("id,CONCAT(b_name,',',acc_no) as b_acc_name", FALSE);
        $this->db->from('bank_details');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function getbankinfo($b_id) {
        $this->db->select("CONCAT(b_name,',',acc_no) as b_acc_name", FALSE);
        $this->db->from('bank_details');
        $this->db->where('bank_details.id', $b_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function viewbalanceinfo($first_date, $last_date, $method, $b_id) {
        $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.b_branch,bank_details.acc_no');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        if ($first_date != '') {
            $this->db->where('transaction_summary.tr_date >=', $first_date);
            $this->db->where('transaction_summary.tr_date <=', $last_date);
        }
        if ($method != '') {
            $this->db->where('transaction_summary.tr_method', $method);
        }
        if ($b_id != '') {
            $this->db->where('transaction_summary.b_id', $b_id);
        }
        $this->db->order_by("transaction_summary.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
//        $results = $this->db->last_query();
//        print_r($results);
        return $results;
    }

    public function viewtransferbalanceinfo() {
        $values = array(4,5,6);
        $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.b_branch,bank_details.acc_no');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where_in('transaction_summary.tr_type', $values);
        $this->db->order_by("transaction_summary.id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
//        $results = $this->db->last_query();
//        print_r($results);
        return $results;
    }

    public function viewopeningbalanceinfo() {
        $values = array(0,8);
        $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.b_branch,bank_details.acc_no,company.com_name');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->join('company', 'transaction_summary.non_c_id = company.id', 'left');
        $this->db->where_in('transaction_summary.tr_type', $values);
        $this->db->order_by("transaction_summary.id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function updatebankobl($b_id, $bdata) {
        $this->db->where('id', $b_id);
        $this->db->update('bank_details', $bdata);
        return TRUE;
    }

    public function duplicatecashob($tr_type, $tr_method) {
        $this->db->select('*');
        $this->db->from('transaction_summary');
        $this->db->where('tr_type', $tr_type);
        $this->db->where('tr_method', $tr_method);
        $query_results = $this->db->get();
        $results = $query_results->row();

        if (count($results) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function inserttrnsinfo($data) {
        $this->db->insert('transaction_summary', $data);
        return true;
    }
    
    public function updatetrnsinfo($transid, $bdata) {
        $this->db->where('trans_id', $transid);
        $this->db->update('transaction_summary', $bdata);
        return TRUE;
    }

    public function deletestoreinfo($id) {
        $this->db->where('id', $id);
        $this->db->delete('app_config');
    }

    public function insertvat($data) {
        $this->db->insert('vat_info', $data);

        return true;
    }

    public function viewvatinfo() {
        $this->db->select('*');
        $this->db->from('vat_info');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function deletevatinfo($id) {
        $this->db->where('id', $id);
        $this->db->delete('vat_info');
    }
    
    public function deletenoninvinfo($id) {
        $this->db->where('trans_id', $id);
        $this->db->delete('transaction_summary');
    }

    public function insertcurrencyinfo($data) {
        $this->db->insert('currency_info', $data);

        return true;
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

}
