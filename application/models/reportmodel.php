<?php

/**
 * 
 */
class Reportmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function queryvatreportbydaterange($first_date, $last_date) {
       $this->db->select('invoice.*,customer.*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.due_date >=', $first_date);
        $this->db->where('invoice.due_date <=', $last_date);
        $this->db->where('invoice.vat_amount >', 0);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysumofsalesreportbydaterange($first_date, $last_date) {
        $this->db->select('SUM(paid_amount) as paid_amount', FALSE);
        $this->db->from('invoice');
        $this->db->where('invoice_date >=', $first_date);
        $this->db->where('invoice_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

//$results = $this->db->last_query();
    public function querysalesreportbydaterange($first_date, $last_date) {
        $this->db->select('invoice.*,customer.*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.due_date >=', $first_date);
        $this->db->where('invoice.due_date <=', $last_date);
//        $this->db->where('invoice.paid_amount >', 0);
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

    public function querycstreportbydaterange($cst_id, $first_date, $last_date) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.cst_id', $cst_id);
        $this->db->where('invoice.due_date >=', $first_date);
        $this->db->where('invoice.due_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryreportbyuser($user, $first_date, $last_date) {
        $this->db->select('dues.*,customer.*,invoice.*');
        $this->db->from('dues');
        $this->db->join('invoice', 'dues.invoice_id = invoice.invoice_id', 'left');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('dues.prepared_by', $user);
        $this->db->where('dues.payment_date >=', $first_date);
        $this->db->where('dues.payment_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->result();
//        $results = $this->db->last_query();
//        print_r($results);
        return $results;
    }

    public function querysalesreportbydaterangebyinvoicedate($first_date, $last_date) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.invoice_date >=', $first_date);
        $this->db->where('invoice.invoice_date <=', $last_date);
        $this->db->where('invoice.paid_amount >', 0);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function querynonreportbydaterangebyinvoicedate($first_date, $last_date) {
        $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.acc_no');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date >=', $first_date);
        $this->db->where('transaction_summary.tr_date <=', $last_date);
        $this->db->where('transaction_summary.tr_type', 8);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

     public function viewdailybankbalanceinfo1($date) {
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date <', $date);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewdailybankbalanceinfo2($date) {
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date =', $date);
        $this->db->where('transaction_summary.tr_type =', 1);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewdailybankbalanceinfo3($date) {
        $aa = array(2,3);
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date =', $date);
        $this->db->where_in('transaction_summary.tr_type', $aa);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewdailybankbalanceinfo4($date) {
        $aa = array(4,5,6);
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date =', $date);
        $this->db->where_in('transaction_summary.tr_type', $aa);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewdailybankbalanceinfo5($date) {
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date <=', $date);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewdailybankbalanceinfo6($date) {
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date =', $date);
        $this->db->where('transaction_summary.tr_type =', 7);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function viewdailybankbalanceinfo7($date) {
        $this->db->select('bank_details.*,SUM(transaction_summary.tr_amount) as ttlbalance');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->where('transaction_summary.tr_date =', $date);
        $this->db->where('transaction_summary.tr_type =', 8);
        $this->db->group_by("transaction_summary.b_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryexpense() {
        $this->db->select('*');
        $this->db->from('expense');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysubexpense() {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->join('expense', 'sub_expense.expense_id = expense.expense_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryexpensebyid($expense_id) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('expense_id', $expense_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function queryexpensehistorybyid($expense_id) {
        $this->db->select('*');
        $this->db->from('expense_history');
        $this->db->where('expense_history.expense_id', $expense_id);
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysubexpensebyid($sub_expense_id) {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->where('sub_expense_id', $sub_expense_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function querysubexpensehistorybyid($sub_expense_id) {
        $this->db->select('*');
        $this->db->from('expense_history');
        $this->db->where('expense_history.sub_expense_id', $sub_expense_id);
        $this->db->join('expense', 'expense_history.expense_id = expense.expense_id', 'left');
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryexpensereportbydaterange($first_date, $last_date) {
        $this->db->select('expense_history.*,expense.expense_name,sub_expense.sub_expense_name,bank_details.b_name,bank_details.acc_no');
        $this->db->from('expense_history');
        $this->db->where('expense_history.date >=', $first_date);
        $this->db->where('expense_history.date <=', $last_date);
        $this->db->join('expense', 'expense_history.expense_id = expense.expense_id', 'left');
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $this->db->join('bank_details', 'expense_history.exp_bank_id = bank_details.id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryemployeeexpensereport($first_date, $last_date, $emp_id) {
        $this->db->select('employee_expense.*,employee.e_name,employee_expense_type.emp_exp_name,bank_details.b_name,bank_details.acc_no');
        $this->db->from('employee_expense');
        $this->db->join('employee', 'employee_expense.emp_id = employee.e_id', 'left');
        $this->db->join('employee_expense_type', 'employee_expense.emp_exp_id = employee_expense_type.id', 'left');
        $this->db->join('bank_details', 'employee_expense.emp_exp_bank_id = bank_details.id', 'left');
        $this->db->where('employee_expense.emp_exp_date >=', $first_date);
        $this->db->where('employee_expense.emp_exp_date <=', $last_date);
        if ($emp_id != '') {
            $this->db->where('employee_expense.emp_id', $emp_id);
        }

        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryrefundreport($first_date, $last_date) {
       $this->db->select('refund.*,customer.cst_company,bank_details.b_name,bank_details.acc_no');
        $this->db->from('refund');
        $this->db->join('invoice', 'refund.invoice_id = invoice.invoice_id', 'left');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->join('bank_details', 'refund.ref_bank_id = bank_details.id', 'left');
        $this->db->where('refund.ref_date >=', $first_date);
        $this->db->where('refund.ref_date <=', $last_date);

        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function querynoninvoicereport($first_date, $last_date) {
       $this->db->select('transaction_summary.*,bank_details.b_name,bank_details.acc_no,company.com_name');
        $this->db->from('transaction_summary');
        $this->db->join('bank_details', 'transaction_summary.b_id = bank_details.id', 'left');
        $this->db->join('company', 'transaction_summary.non_c_id = company.id', 'left');
        $this->db->where('transaction_summary.tr_date >=', $first_date);
        $this->db->where('transaction_summary.tr_date <=', $last_date);
        $this->db->where('transaction_summary.tr_type', 8);

        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function empexpdetailsbyid($first_date, $last_date, $id) {
        $this->db->select('SUM(employee_expense_details.amount) as tamount,employee_expense_details.category');
        $this->db->from('employee_expense_details');
        $this->db->join('employee_expense', 'employee_expense_details.trans_id = employee_expense.trans_id', 'left');
        $this->db->where('employee_expense.emp_exp_date >=', $first_date);
        $this->db->where('employee_expense.emp_exp_date <=', $last_date);
        if($id !=''){
        $this->db->where('employee_expense.emp_id', $id);
        }
        $this->db->group_by("employee_expense_details.cat_id");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function allexpensereportbydaterangeandhead($head, $first_date, $last_date) {
        $this->db->select('expense_history.*,expense.expense_name,sub_expense.sub_expense_name,bank_details.b_name,bank_details.acc_no');
        $this->db->from('expense_history');
        $this->db->join('expense', 'expense_history.expense_id = expense.expense_id', 'left');
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $this->db->join('bank_details', 'expense_history.exp_bank_id = bank_details.id', 'left');
        $this->db->where('expense_history.expense_id', $head);
        $this->db->where('expense_history.date >=', $first_date);
        $this->db->where('expense_history.date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function getexphname($id) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('expense_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results->expense_name;
    }

    public function getexpsubhname($id) {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->where('sub_expense_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results->sub_expense_name;
    }

    public function allexpensereportbydaterangeandheadsubhead($head, $subhead, $first_date, $last_date) {
        $this->db->select('expense_history.*,expense.expense_name,sub_expense.sub_expense_name,bank_details.b_name,bank_details.acc_no');
        $this->db->from('expense_history');
        $this->db->join('expense', 'expense_history.expense_id = expense.expense_id', 'left');
        $this->db->join('sub_expense', 'expense_history.sub_expense_id = sub_expense.sub_expense_id', 'left');
        $this->db->join('bank_details', 'expense_history.exp_bank_id = bank_details.id', 'left');
        $this->db->where('expense_history.expense_id', $head);
        $this->db->where('expense_history.sub_expense_id', $subhead);
        $this->db->where('expense_history.date >=', $first_date);
        $this->db->where('expense_history.date <=', $last_date);

        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysumofduecollectionreportbydaterange($first_date, $last_date) {
        $this->db->select('SUM(first_payment) as first_payment', FALSE);
        $this->db->from('dues');
        $this->db->where('payment_date >=', $first_date);
        $this->db->where('payment_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function queryduecollectionreportbydaterange($first_date, $last_date) {
        $this->db->select('dues.*, customer.cst_company, bank_details.b_name,bank_details.acc_no');
        $this->db->from('dues');
        $this->db->where('dues.payment_date >=', $first_date);
        $this->db->where('dues.payment_date <=', $last_date);
        $this->db->join('invoice', 'dues.invoice_id = invoice.invoice_id', 'left');
        $this->db->join('customer', 'customer.cst_id = invoice.cst_id', 'left');
        $this->db->join('bank_details', 'dues.bank_id = bank_details.id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryitemlist() {
        $this->db->select('*');
        $this->db->from('item');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryitemlistwithsupplier() {
        $this->db->select('item.item_id,item.item_code,item.item_name,supplier.supplier_name');
        $this->db->from('item');
        $this->db->join('supplier', 'item.supplier_id = supplier.supplier_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result_array();
        return $results;
    }

    public function queryitemlistwithsupplierbyid($item_id) {
        $this->db->select('item.item_id,item.item_code,item.item_name,supplier.supplier_name');
        $this->db->from('item');
        $this->db->where('item.item_id', $item_id);
        $this->db->join('supplier', 'item.supplier_id = supplier.supplier_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function queryitemreport() {
        $this->db->select('item_name');
        $this->db->from('item');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryinvoicereportbydaterange($first_date, $last_date) {
        $this->db->select('invoice_id');
        $this->db->from('invoice');
        $this->db->where('invoice_date >=', $first_date);
        $this->db->where('invoice_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryinvoiceditemreportbyinvoiceid($invoice_id) {
        $this->db->select('*');
        $this->db->from('invoiced_item');
        $this->db->where('invoice_id', $invoice_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysumofduereportbydaterange($first_date, $last_date) {
        $this->db->select('SUM(discount) as discount', FALSE);
        $this->db->from('invoice');
        $this->db->where('invoice_date >=', $first_date);
        $this->db->where('invoice_date <=', $last_date);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function queryprofitreportbydaterange($first_date, $last_date, $item_name) {
        $this->db->select('SUM(total_price) as total_price', FALSE);
        $this->db->from('invoiced_item');
        $this->db->where('invoice_date >=', $first_date);
        $this->db->where('invoice_date <=', $last_date);
        $this->db->where('product_name', $item_name);
        $query_results = $this->db->get();
        $results = $query_results->result_array();
        return $results;
    }

    public function querylossreportbydaterange($first_date, $last_date, $item_name) {
        $this->db->select('SUM(total_cost) as total_cost', FALSE);
        $this->db->from('invoiced_item');
        $this->db->where('invoice_date >=', $first_date);
        $this->db->where('invoice_date <=', $last_date);
        $this->db->where('product_name', $item_name);
        $query_results = $this->db->get();
        $results = $query_results->result_array();
        return $results;
    }

    public function queryinventorymasterreport($item_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('inventory.item_id', $item_id);
        $this->db->order_by("inventory.inventory_id", "desc");
        $this->db->limit(1);
        $this->db->join('item', 'inventory.item_id = item.item_id', 'left');
        $this->db->join('supplier', 'inventory.supplier_id = supplier.supplier_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result_array();
        return $results;
    }

    public function getsubheadofexpensebyidrep($expense_id) {
        $this->db->select('*');
        $this->db->from('sub_expense');
        $this->db->where('expense_id', $expense_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function queryinventoryreportbydaterange($first_date, $last_date, $item_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('inventory.item_id', $item_id);
        $this->db->where('inventory.timestamp >=', $first_date);
        $this->db->where('inventory.timestamp <=', $last_date);
        $this->db->order_by("inventory.inventory_id", "desc");
        $this->db->limit(1);
        $this->db->join('item', 'inventory.item_id = item.item_id', 'left');
        $this->db->join('supplier', 'inventory.supplier_id = supplier.supplier_id', 'left');
        $query_results = $this->db->get();
        $results = $query_results->result_array();
        return $results;
    }

    public function querysupplieditembyid($first_date, $last_date, $item_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('item_id', $item_id);
        $this->db->where('created_date >=', $first_date);
        $this->db->where('created_date <=', $last_date);
        $this->db->where('sold_quantity <=', 0);
        $this->db->order_by("inventory_id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querysolditembyid($first_date, $last_date, $item_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('item_id', $item_id);
        $this->db->where('created_date >=', $first_date);
        $this->db->where('created_date <=', $last_date);
        $this->db->where('sold_quantity >', 0);
        $this->db->order_by("inventory_id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querymastersupplieditembyid($item_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('item_id', $item_id);
        $this->db->where('sold_quantity <=', 0);
        $this->db->order_by("inventory_id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querymastersolditembyid($item_id) {
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where('item_id', $item_id);
        $this->db->where('sold_quantity >', 0);
        $this->db->order_by("inventory_id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
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

    public function querycurrencytag() {
        $this->db->select('currency_tag');
        $this->db->from('currency_info');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function getcustomernamerep($q) {
        $this->db->select('cst_id,cst_company');
        $this->db->like('cst_company', $q);
        $this->db->where('statuss', 0);
        $query = $this->db->get('customer');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['cst_id'] . '-' . $row['cst_company'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    public function getusernamerep($q) {
        $this->db->select('name');
        $this->db->like('name', $q);
        $this->db->where('role <>', 'super_admin');
        $query = $this->db->get('user');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    public function querytotalinvoicehistory() {
        $this->db->select('SUM(invoice.net_total) as net_total,SUM(invoice.due_amount) as due_amount,customer.*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->group_by("invoice.cst_id");
        $this->db->order_by("invoice.invoice_id", "DESC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function querycstreportbycstid($cst_id) {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('customer', 'invoice.cst_id = customer.cst_id', 'left');
        $this->db->where('invoice.cst_id', $cst_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function employee_name() {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function bank_name() {
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function exp_category() {
        $this->db->select('*');
        $this->db->from('employee_expense_type');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

}
