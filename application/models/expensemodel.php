<?php

/**
 * 
 */
class Expensemodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function duplicateexpensechecker($expense_name) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('expense_name', $expense_name);
        $query_results = $this->db->get();
        $results = $query_results->row();

        if (count($results) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
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

    public function insertheadofexpense($data) {
        $this->db->insert('expense', $data);

        return true;
    }

    public function queryheadofexpense() {
        $this->db->select('*');
        $this->db->from('expense');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

//    public function queryheadofexpensehistory($id) {
//        $this->db->select('*');
//        $this->db->from('expense');
////        $this->db->where('expense_id =!',$id);
//        $this->db->where('expense_id !=', $id);
//        $query_results = $this->db->get();
//        $results = $query_results->result();
//        return $results;
//    }

    public function duplicateSubExpenseChecker($expense_id, $sub_expense_name) {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->where('expense_id', $expense_id);
        $this->db->where('sub_expense_name', $sub_expense_name);
        $query_results = $this->db->get();
        $results = $query_results->row();

        if (count($results) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insertSubExpenseInfo($data) {
        $this->db->insert('sub_expense', $data);

        return true;
    }

    public function queryheadofexpensebyid($expense_id) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('expense_id', $expense_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function editheadbyexpid($id) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function editsubheadbyexpid($id) {
        $this->db->select('sub_expense.*,expense.expense_id,expense.expense_name');
        $this->db->from('sub_expense');
        $this->db->join('expense', 'sub_expense.expense_id = expense.expense_id', 'left');
        $this->db->where('sub_expense.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateExpenseInfo($expense_id, $data) {
        $this->db->where('expense_id', $expense_id);
        $this->db->update('expense', $data);
        return TRUE;
    }

    public function deleteheadofexpense($expense_id) {
        $this->db->where('expense_id', $expense_id);
        $this->db->delete('expense');
    }

    public function querysubheadofexpense() {
        $this->db->select('sub_expense.*,expense.expense_id,expense.expense_name');
        $this->db->from('sub_expense');
        $this->db->join('expense', 'sub_expense.expense_id = expense.expense_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysubheadofexpensebyid($sub_expense_id) {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->where('sub_expense_id', $sub_expense_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function updateSubExpenseInfo($sub_expense_id, $data) {
        $this->db->where('sub_expense_id', $sub_expense_id);
        $this->db->update('sub_expense', $data);
        return TRUE;
    }

    public function deletesubheadofexpense($sub_expense_id) {
        $this->db->where('sub_expense_id', $sub_expense_id);
        $this->db->delete('sub_expense');
    }

    public function getbankdetails() {
        $this->db->select("id,CONCAT(b_name,',',acc_no) as b_acc_name", FALSE);
        $this->db->from('bank_details');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function bankavailableblances($bid) {
        $this->db->select('SUM(tr_amount) as bavbalance', FALSE);
        $this->db->from('transaction_summary');
        $this->db->where('b_id', $bid);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function getttlavbalances($method) {
        $this->db->select('SUM(tr_amount) as ttlbalance', FALSE);
        $this->db->from('transaction_summary');
        $this->db->where('tr_method', $method);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function avbalance($id) {
        $this->db->select('SUM(tr_amount) as totalbalance');
        $this->db->from('transaction_summary');
        $this->db->where('b_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function getSubHeadofExpenseById($expense_id) {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->where('expense_id', $expense_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function insertexpense($data) {
        $this->db->insert('expense_history', $data);

        return true;
    }

    public function inserttranssummary($data) {
        $this->db->insert('transaction_summary', $data);

        return true;
    }

    public function updateexpensehistory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('expense_history', $data);
        return TRUE;
    }

    public function updatetransactionhistory($trans_id, $data) {
        $this->db->where('trans_id', $trans_id);
        $this->db->update('transaction_summary', $data);
        return TRUE;
    }

    public function queryexpensehistory() {
        $this->db->select('expense_history.*,expense.expense_id,expense.expense_name,sub_expense.sub_expense_id,sub_expense.sub_expense_name,bank_details.id as bid,bank_details.b_name,bank_details.acc_no');
        $this->db->from('expense_history');
        $this->db->join('expense', 'expense_history.expense_id = expense.expense_id', 'left');
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $this->db->join('bank_details', 'expense_history.exp_bank_id = bank_details.id', 'left');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();

        return $results;
    }

    public function queryexpensehistorybytrid($trtans_id) {
        $this->db->select('expense_history.*,expense.expense_id,expense.expense_name,sub_expense.sub_expense_id,sub_expense.sub_expense_name,bank_details.id as bid,bank_details.b_name,bank_details.acc_no');
        $this->db->from('expense_history');
        $this->db->join('expense', 'expense_history.expense_id = expense.expense_id', 'left');
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $this->db->join('bank_details', 'expense_history.exp_bank_id = bank_details.id', 'left');
        $this->db->where('expense_history.trans_id', $trtans_id);
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->row();

        return $results;
    }

    public function deleteexpensehistory($trans_id) {

        $this->db->where('trans_id', $trans_id);
        $this->db->delete('expense_history');
        $this->db->where('trans_id', $trans_id);
        $this->db->delete('transaction_summary');
    }

}
