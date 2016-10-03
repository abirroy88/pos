<?php

/**
 * 
 */
class Employeemodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getemployeename($q) {
        $this->db->select('cst_id,cst_company');
        $this->db->like('cst_company', $q);
        $query = $this->db->get('employee');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['cst_id'] . '-' . $row['cst_company'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    public function insertemployee($data) {
        $this->db->insert('employee', $data);

        return true;
    }

    public function ck_existing($cst_email) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('cst_email', $cst_email);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function queryemployeebyid($cst_id) {
        $this->db->select('invoice.*,employee.cst_name,employee.cst_name,employee.cst_mobile');
        $this->db->from('invoice');
        $this->db->where('invoice.cst_id', $cst_id);
        $this->db->join('employee', 'invoice.cst_id = employee.cst_id', 'left');
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

    public function employeeinvoice() {
        $this->db->select('employee.*,department.dep_name');
        $this->db->from('employee');
        $this->db->join('department', 'employee.dep_id = department.id', 'left');
        $this->db->order_by("employee.id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function getqueryemployeeid($id) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateemployee($e_id, $data) {
        $this->db->where('e_id', $e_id);
        $this->db->update('employee', $data);
        return TRUE;
    }

    public function updateemployeeincrement($e_id, $data) {
        $this->db->where('e_id', $e_id);
        $this->db->update('increment_history', $data);
        return TRUE;
    }

    public function updateemployee2($e_id, $data) {
        $this->db->where('e_id', $e_id);
        $this->db->update('employee', $data);
        return TRUE;
    }

    public function querycstreportbydaterange($cst_id) {
        $this->db->select('*');
        $this->db->from('employee');
//        $this->db->join('employee', 'invoice.cst_id = employee.cst_id', 'left');
        $this->db->where('id', $cst_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function cstcompany($cst_id) {
        $this->db->select('*');
        $this->db->from('employee');
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

    public function queryvatrate() {
        $this->db->select('*');
        $this->db->from('vat_info');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function viewemployeestatementinfo($e_id) {
        $this->db->select('*');
        $this->db->from('increment_history');
        $this->db->where('e_id', $e_id);
        $this->db->order_by("id", "ASC");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function employee_name() {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('status', 0);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function employee_name2($e_id) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('e_id', $e_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function employeepayslip() {
        $this->db->select('employee_expense.*,employee.e_name,employee.designation,employee_expense_type.emp_exp_name,bank_details.id as bid,bank_details.b_name,bank_details.acc_no');
        $this->db->from('employee_expense');
        $this->db->join('employee', 'employee_expense.emp_id = employee.e_id', 'left');
        $this->db->join('employee_expense_type', 'employee_expense.emp_exp_id = employee_expense_type.id', 'left');
        $this->db->join('bank_details', 'employee_expense.emp_exp_bank_id = bank_details.id', 'left');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
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

    public function employee_expense_details($trans_id) {
        $this->db->select('*');
        $this->db->from('employee_expense_details');
        $this->db->where('trans_id', $trans_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function employee_expense_type() {
        $this->db->select('*');
        $this->db->from('employee_expense_type');
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

    public function ck_emp_existing($id) {
        $this->db->select('*');
        $this->db->from('employee_expense');
        $this->db->where('emp_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function activateemployee($id, $info_data) {
        $this->db->where('id', $id);
        $this->db->update('employee', $info_data);
        return TRUE;
    }

    public function inactivateemployee($id, $info_data) {
        $this->db->where('id', $id);
        $this->db->update('employee', $info_data);
        return TRUE;
    }

    public function deleteemployeebyid($id) {
        $this->db->where('e_id', $id);
        $this->db->delete('employee');
    }

    public function ck_empexpcat_existing($id) {
        $this->db->select('*');
        $this->db->from('employee_expense_details');
        $this->db->where('cat_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function deleteexpdetails($id) {
        $this->db->where('trans_id', $id);
        $this->db->delete('employee_expense_details');
    }

    public function deleteemployeeexpcatbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('employee_expense_type');
    }

    public function getttlavbalances($method) {
        $this->db->select('SUM(tr_amount) as ttlbalance', FALSE);
        $this->db->from('transaction_summary');
        $this->db->where('tr_method', $method);
        $query_results = $this->db->get();
        $results = $query_results->row();
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

    public function getempsalarys($e_id) {
        $this->db->select('b_salary', FALSE);
        $this->db->from('employee');
        $this->db->where('e_id', $e_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function getbankdetails() {
        $this->db->select("id,CONCAT(b_name,',',acc_no) as b_acc_name", FALSE);
        $this->db->from('bank_details');
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }

    public function insertexpcatdetails($new) {
        $this->db->insert('employee_expense_details', $new);

        return true;
    }

    public function updateexpcatdetails($trans_id, $cat_id, $data) {
        $this->db->where('trans_id', $trans_id);
        $this->db->where('cat_id', $cat_id);
        $this->db->update('employee_expense_details', $data);
        return TRUE;
    }

    public function insertemployeeexp($data) {
        $this->db->insert('employee_expense', $data);

        return true;
    }

    public function insertemployeeincrement($data) {
        $this->db->insert('increment_history', $data);

        return true;
    }

    public function insertemptranssummary($data) {
        $this->db->insert('transaction_summary', $data);

        return true;
    }

    public function updateemployeeexp($trans_id, $data) {
        $this->db->where('trans_id', $trans_id);
        $this->db->update('employee_expense', $data);
        return TRUE;
    }

    public function updatetransactionhistory($trans_id, $data) {
        $this->db->where('trans_id', $trans_id);
        $this->db->update('transaction_summary', $data);
        return TRUE;
    }

    public function ck_existing_expcat($name) {
        $this->db->select('*');
        $this->db->from('employee_expense_type');
        $this->db->where('emp_exp_name', $name);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function ck_existing_dep($id,$name) {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where('dep_name', $name);
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

    public function insertemployeeexpcat($data) {
        $this->db->insert('employee_expense_type', $data);

        return true;
    }

    public function updateemployeeexpcat($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('employee_expense_type', $data);
        return TRUE;
    }

    public function deleteempexpensehistory($trans_id) {
        $this->db->where('trans_id', $trans_id);
        $this->db->delete('employee_expense');
        $this->db->where('trans_id', $trans_id);
        $this->db->delete('employee_expense_details');
        $this->db->where('trans_id', $trans_id);
        $this->db->delete('transaction_summary');
    }

    public function empexpmasterbyid($trans_id) {
        $this->db->select('*');
        $this->db->from('employee_expense');
        $this->db->join('employee', 'employee_expense.emp_id = employee.e_id', 'left');
        $this->db->join('bank_details', 'employee_expense.emp_exp_bank_id = bank_details.id', 'left');
        $this->db->where('trans_id', $trans_id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        return $results;
    }

    public function empexpdetailsbyid($trans_id) {
        $this->db->select('*');
        $this->db->from('employee_expense_details');
        $this->db->where('trans_id', $trans_id);
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function departmentlist() {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->order_by("id", "desc");
        $query_results = $this->db->get();
        $results = $query_results->result();
        return $results;
    }
    
    public function insertemployeedep($data) {
        $this->db->insert('department', $data);

        return true;
    }
    
    public function updatedepartment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('department', $data);
        return TRUE;
    }
    
    public function ck_dep_existing($id) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('dep_id', $id);
        $query_results = $this->db->get();
        $results = $query_results->row();
        if (count($results) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function deleteemployeedepartmentbyid($id) {
        $this->db->where('id', $id);
        $this->db->delete('department');        
    }

}
