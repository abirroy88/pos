<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Employeecontroller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('employeemodel', 'EMPLOYEEMODEL', TRUE);

        $id = $this->session->userdata('abhinvoiser_1_1_user_id');
        if (empty($id)) {
            redirect("authenticationcontroller");
        }

        /*
          echo "<pre>";
          print_r($data);
          exit();
         */
    }

    public function index() {
        
    }

    public function createemployee() {

        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['randomSerialNUmber'] = $this->generateRandomString(4);
        $data['vat_rate'] = $this->EMPLOYEEMODEL->queryvatrate();
        $data['employee_name'] = $this->EMPLOYEEMODEL->employee_name();
        $data['dashboardContent'] = $this->load->view('dashboard/employee/createemployee', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getemployeename() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->EMPLOYEEMODEL->getemployeename($q);
        }
    }

    public function insertemployee() {
        $data = array();
        $idata = array();
        $dt = new DateTime();
        $e_id = $dt->format('ymdHis');
        $data['e_id'] = $e_id;
        
        $data['e_name'] = $this->input->post('e_name');
        $data['dep_id'] = $this->input->post('dep_id');
        $data['designation'] = $this->input->post('designation');
        $data['b_salary'] = $this->input->post('b_salary');
        $data['e_mobile'] = $this->input->post('e_mobile');
        $data['dob'] = $this->input->post('dob');
        $data['ap_date'] = $this->input->post('ap_date');
        $data['jn_date'] = $this->input->post('jn_date');
        $data['address'] = $this->input->post('address');

        $data['prepared_by'] = $this->session->userdata('epos_user_name');
        
        $idata['e_id'] = $e_id;
        $idata['b_salary'] = $this->input->post('b_salary');
        $idata['increment'] = '';
        $idata['i_date'] = $this->input->post('jn_date');
        $idata['total_b_salary'] = $this->input->post('b_salary');
        $idata['i_note'] = 'Joining Salary';        
        $idata['sal_type'] = 1;

        $idata['prepared_by'] = $this->session->userdata('epos_user_name');

        

        $employee = $this->EMPLOYEEMODEL->insertemployee($data); 
        $increment = $this->EMPLOYEEMODEL->insertemployeeincrement($idata);

        if ($increment && $employee) {
            $success_saved = "
				Data successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("employeecontroller/viewemployee");
        } else {
            $failed = "
				Data not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewemployee");
        }
    }
    
    public function insertincrement() {
        $data = array();
        
        
        $data['e_id'] = $this->input->post('emp_id');
        $data['b_salary'] = $this->input->post('p_salary');
        $data['increment'] = $this->input->post('i_salary');
        $data['i_date'] = $this->input->post('i_date');
        $data['total_b_salary'] = $this->input->post('p_salary')+$this->input->post('i_salary');
        $data['i_note'] = $this->input->post('i_note');        
        $data['sal_type'] = 2;

        $data['prepared_by'] = $this->session->userdata('epos_user_name');
//        print_r($data); exit();
        $edata['b_salary'] = $this->input->post('p_salary')+$this->input->post('i_salary');
        $edata['increment_status'] = 1;
        
        $e_id = $this->input->post('emp_id');
        
        $increment = $this->EMPLOYEEMODEL->insertemployeeincrement($data);
        $result = $this->EMPLOYEEMODEL->updateemployee2($e_id, $edata);

        if ($increment && $result) {
            $success_saved = "
				Data successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("employeecontroller/viewemployee");
        } else {
            $failed = "
				Data not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewemployee");
        }
    }
    
    public function activateemp($id) {
        $info_data['status'] = 0;

        $result = $this->EMPLOYEEMODEL->activateemployee($id, $info_data);
        redirect("employeecontroller/viewemployee");
    }

    public function inactivateemp($id) {
        $info_data['status'] = 1;

        $result = $this->EMPLOYEEMODEL->inactivateemployee($id, $info_data);
        redirect("employeecontroller/viewemployee");
    }
    
    public function employeestatement($e_id) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $data['storeInfo'] = $this->EMPLOYEEMODEL->storeInfo();
        $data['empname'] = $this->EMPLOYEEMODEL->employee_name2($e_id);
        $data['viewemployeestatementinfo'] = $this->EMPLOYEEMODEL->viewemployeestatementinfo($e_id);

        $data['dashboardContent'] = $this->load->view('dashboard/employee/employeestatement', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function viewemployee() {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['randomSerialNUmber'] = $this->generateRandomString(4);
        $data['employee_name'] = $this->EMPLOYEEMODEL->employee_name(); 
        $data['empdepartment'] = $this->EMPLOYEEMODEL->departmentlist(); 
        $data['employeeinvoice'] = $this->EMPLOYEEMODEL->employeeinvoice();
        $data['dashboardContent'] = $this->load->view('dashboard/employee/viewemployee', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function editemployee() {
        $data = array();
        $idata = array();
        $data['e_name'] = $this->input->post('e_name');
        $data['dep_id'] = $this->input->post('dep_id');
        $data['designation'] = $this->input->post('designation');
        $data['b_salary'] = $this->input->post('b_salary');
        $data['e_mobile'] = $this->input->post('e_mobile');
        $data['dob'] = $this->input->post('dob');
        $data['ap_date'] = $this->input->post('ap_date');
        $data['jn_date'] = $this->input->post('jn_date');
        $data['address'] = $this->input->post('address');

        $data['prepared_by'] = $this->session->userdata('epos_user_name');
        
        
        $idata['b_salary'] = $this->input->post('b_salary');
        $idata['increment'] = '';
        $idata['i_date'] = $this->input->post('jn_date');
        $idata['total_b_salary'] = $this->input->post('b_salary');
        $idata['i_note'] = 'Joining Salary';        
        $idata['sal_type'] = 1;

        $idata['prepared_by'] = $this->session->userdata('epos_user_name');

        

        $e_id = $this->input->post('e_id');
        
//        print_r($id);        exit();
        $result = $this->EMPLOYEEMODEL->updateemployee($e_id, $data);
        $increment = $this->EMPLOYEEMODEL->updateemployeeincrement($e_id,$idata);
        
        if ($result && $increment) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/viewemployee/");
        }
    }

    public function printviewemployee($cst_id) {
        $data = array();
        $dt = new DateTime();
        $data['cst_id'] = $cst_id;

        $data['current_date'] = $dt->format('Y/m/d');




        $data['querysalesreportbydaterange'] = $this->EMPLOYEEMODEL->querycstreportbydaterange($cst_id);

        $data['first_date'] = 'All';
        $data['last_date'] = 'All';

        $data['storeInfo'] = $this->EMPLOYEEMODEL->storeInfo();
        $data['cst_company'] = $this->EMPLOYEEMODEL->cstcompany($cst_id);
        $data['querycurrencytag'] = $this->EMPLOYEEMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printcstreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function deleteemployeebyid($id = Null) {

        $result = $this->EMPLOYEEMODEL->ck_emp_existing($id);

        if ($result==1) {
            $invoice = $this->EMPLOYEEMODEL->deleteemployeebyid($id);

            $success = "EMPLOYEE Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/viewemployee");
        } else {
            $failed = "Can't Delete ! this employee already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewemployee");
        }
    }

    public function getbankdetails() {
        $method = $this->input->post('method');
        if ($method == 'Bank') {
            $data = $this->EMPLOYEEMODEL->getbankdetails();
            echo json_encode($data);
        }
    }

    public function getttlavbalance() {
        $method = $this->input->post('method');
        $data = $this->EMPLOYEEMODEL->getttlavbalances($method);
        echo json_encode($data);
    }

    public function getbankavailable() {

        $id = $this->input->post('emp_exp_bank_id');
        if ($id != '') {
            $data = $this->EMPLOYEEMODEL->bankavailableblances($id);
            echo json_encode($data);
        }
    }
    
    public function getempsalary() {

        $e_id = $this->input->post('emp_id');
        if ($e_id != '') {
            $data = $this->EMPLOYEEMODEL->getempsalarys($e_id);
            echo json_encode($data);
        }
    }
    
    public function printpayslipbytransid($trans_id) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $data['empexpmasterbyid'] = $this->EMPLOYEEMODEL->empexpmasterbyid($trans_id);
        $data['empexpdetailsbyid'] = $this->EMPLOYEEMODEL->empexpdetailsbyid($trans_id);
        $data['storeInfo'] = $this->EMPLOYEEMODEL->storeInfo();
        $data['querycurrencytag'] = $this->EMPLOYEEMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/employee/payslip', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function employeeexpense() {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['employee_name'] = $this->EMPLOYEEMODEL->employee_name();
        $data['employee_expense_type'] = $this->EMPLOYEEMODEL->employee_expense_type();
        $data['employeepayslip'] = $this->EMPLOYEEMODEL->employeepayslip();

        $data['dashboardContent'] = $this->load->view('dashboard/employee/employeepayment', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function creategrouparrays($cat_id, $cat_name, $cat_amt, $salary_deduction) {

        foreach ($cat_id as $k => $name) {
            $group[] = array('cat_id' => $name, 'category' => $cat_name[$k], 'amount' => $cat_amt[$k], 'deductions' => $salary_deduction[$k]);
        }
        return $group;
    }

    public function insertemployeeexpense() {
        $data = array();
        $dt = new DateTime();
        $trans = $dt->format('ymdHis');
        $data['trans_id'] = $trans;
        $data['emp_id'] = $this->input->post('emp_id');
        $data['prepared_by'] = $this->session->userdata('epos_user_name');
        $data['emp_exp_date'] = $this->input->post('emp_exp_date');
        $data['method'] = $this->input->post('method');
        $data['chq_no'] = $this->input->post('chq_no');
        $data['emp_exp_note'] = $this->input->post('emp_exp_note');

        $cat_id = $this->input->post('emp_exp_amount1');
        $cat_name = $this->input->post('emp_exp_amount2');
        $cat_amt = $this->input->post('emp_exp_amount');
        $salary_deduction = $this->input->post('salary_deduction');

//        print_r($cat_id);        exit();

        $av_balance = $this->input->post('av_balance');


        $trdata['trans_id'] = $trans;
        $trdata['tr_type'] = 3;
        $trdata['tr_method'] = $this->input->post('method');

        $trdata['tr_date'] = $this->input->post('emp_exp_date');
        $trdata['tr_by'] = $this->session->userdata('epos_user_name');


        $method = $this->input->post('method');
        if ($method == 'Bank') {
            $data['emp_exp_bank_id'] = $this->input->post('emp_exp_bank_id');
            $trdata['b_id'] = $this->input->post('emp_exp_bank_id');

            if (empty($data['emp_exp_bank_id'])) {
                $failed = "Please Select Bank Account !!!";
                $this->session->set_flashdata('failed', $failed);
                redirect("employeecontroller/employeeexpense");
            }
        }

        if ($method == 'Cash') {
            $data['emp_exp_bank_id'] = 0;
            $trdata['b_id'] = 0;
        }

//        print_r($data);        exit();
        $group = $this->creategrouparrays($cat_id, $cat_name, $cat_amt, $salary_deduction);

        $count = count($group);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $new = array();
            $new['trans_id'] = $trans;
            $new['emp_exp_date'] = $this->input->post('emp_exp_date');
            $new['cat_id'] = $group[$i]['cat_id'];
            $new['category'] = $group[$i]['category'];
            if ($group[$i]['category'] == 'Deductions') {
                $new['amount'] = -$group[$i]['amount'];
            } else {
                $new['amount'] = $group[$i]['amount'];
            }


            $new['exp_note'] = $group[$i]['deductions'];


            $exp_item = $this->EMPLOYEEMODEL->insertexpcatdetails($new);

            $total+=$new['amount'];
        }

        $data['emp_exp_amount'] = $total;
        $trdata['tr_amount'] = -$total;
        
        if ($total == 0 || $total < 0) {
            $failed = "Invalid  amount !!!";
            $employeeexp = $this->EMPLOYEEMODEL->deleteexpdetails($trans);
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/employeeexpense");
        }

        if ($total > $av_balance) {
            $failed = "Insufficient available Balance !!!";
            $employeeexp = $this->EMPLOYEEMODEL->deleteexpdetails($trans);
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/employeeexpense");
        }


        $employeeexp = $this->EMPLOYEEMODEL->insertemployeeexp($data);
        $trans_sum = $this->EMPLOYEEMODEL->insertemptranssummary($trdata);

        if ($employeeexp && $trans_sum) {
            $success_saved = "
				Data successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("employeecontroller/employeeexpense");
        } else {
            $failed = "
				Data not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/employeeexpense");
        }
    }

    public function editemployeeexpense() {
        $data = array();
        $trdata = array();
        $data['emp_id'] = $this->input->post('emp_id');
        $data['emp_exp_id'] = $this->input->post('emp_exp_id');
        $data['emp_exp_date'] = $this->input->post('emp_exp_date');
        $data['method'] = $this->input->post('method');
        $data['chq_no'] = $this->input->post('chq_no');
        $data['emp_exp_note'] = $this->input->post('emp_exp_note');

        $cat_id = $this->input->post('emp_exp_amount1');
        $cat_name = $this->input->post('emp_exp_amount2');
        $cat_amt = $this->input->post('emp_exp_amount');
        $salary_deduction = $this->input->post('salary_deduction');
        $av_balance = $this->input->post('av_balance');

//        $data['prepared_by'] = $this->session->userdata('epos_user_name');

        $trdata['tr_type'] = 3;
        $trdata['tr_method'] = $this->input->post('method');
        $trdata['tr_date'] = $this->input->post('emp_exp_date');
//        $trdata['tr_by'] = $this->session->userdata('epos_user_name');

        if (empty($data['method'])) {
            $failed_mess = "Please enter required fields!!!";
            $this->session->set_flashdata('failed', $failed_mess);
            redirect("employeecontroller/employeeexpense");
        }

        $trans_id = $this->input->post('trans_id');
        $method = $this->input->post('method');
        if ($method == 'Bank') {
            $data['emp_exp_bank_id'] = $this->input->post('emp_exp_bank_id');
            $trdata['b_id'] = $this->input->post('emp_exp_bank_id');

            if (empty($data['emp_exp_bank_id'])) {
                $failed = "Please Select Bank Account !!!";
                $this->session->set_flashdata('failed', $failed);
                redirect("employeecontroller/employeeexpense");
            }
        }

        if ($method == 'Cash') {
            $data['emp_exp_bank_id'] = 0;
            $trdata['b_id'] = 0;
        }
        
        $group = $this->creategrouparrays($cat_id, $cat_name, $cat_amt, $salary_deduction);

        $count = count($group);
        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $new = array();
            $new['trans_id'] = $this->input->post('trans_id');
            $new['emp_exp_date'] = $this->input->post('emp_exp_date');
            $new['cat_id'] = $group[$i]['cat_id'];
            $new['category'] = $group[$i]['category'];
            $cat_id = $group[$i]['cat_id'];
            if ($group[$i]['category'] == 'Deductions') {
                $new['amount'] = -$group[$i]['amount'];
            } else {
                $new['amount'] = $group[$i]['amount'];
            }


            $new['exp_note'] = $group[$i]['deductions'];

//            print_r($new);           // exit();
            $exp_item = $this->EMPLOYEEMODEL->updateexpcatdetails($trans_id,$cat_id,$new);

            $total+=$new['amount'];
        }

        $data['emp_exp_amount'] = $total;
        $trdata['tr_amount'] = -$total;
        
        if ($total == 0 || $total < 0) {
            $failed = "Invalid  amount !!!";
            $employeeexp = $this->EMPLOYEEMODEL->deleteexpdetails($trans);
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/employeeexpense");
        }

        if ($total > $av_balance) {
            $failed = "Insufficient Balance !!!";
            $employeeexp = $this->EMPLOYEEMODEL->deleteexpdetails($trans);
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/employeeexpense");
        }

        $result = $this->EMPLOYEEMODEL->updateemployeeexp($trans_id, $data);
        $result2 = $this->EMPLOYEEMODEL->updatetransactionhistory($trans_id, $trdata);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/employeeexpense");
        }
    }

    public function deleteemployeeexpbyid($trans_id = Null) {

        $result = $this->EMPLOYEEMODEL->deleteempexpensehistory($trans_id);

        $success = "EMPLOYEE Expense Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("employeecontroller/employeeexpense");
    }

    public function expensescategory() {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['employee_expense_type'] = $this->EMPLOYEEMODEL->employee_expense_type();
        $data['dashboardContent'] = $this->load->view('dashboard/employee/employeepaymentcat', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertemployeeexpcat() {
        $data = array();
        $data['emp_exp_name'] = $this->input->post('emp_exp_name');

        $name = $this->input->post('emp_exp_name');

        $ck_existing_expcat = $this->EMPLOYEEMODEL->ck_existing_expcat($name);


        if (!$ck_existing_expcat) {
            $failed = "
				Duplicate Expense category !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/expensescategory");
        }


        $employeeexpcat = $this->EMPLOYEEMODEL->insertemployeeexpcat($data);

        if ($employeeexpcat) {
            $success_saved = "
				Category successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("employeecontroller/expensescategory");
        } else {
            $failed = "
				Category not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/expensescategory");
        }
    }

    public function editemployeeexpcat() {
        $data = array();
        $data['emp_exp_name'] = $this->input->post('emp_exp_name');

        $id = $this->input->post('id');

        $name = $this->input->post('emp_exp_name');

        $ck_existing_expcat = $this->EMPLOYEEMODEL->ck_existing_expcat($name);


        if (!$ck_existing_expcat) {
            $failed = "
				Duplicate Expense category !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/expensescategory");
        }


        $result = $this->EMPLOYEEMODEL->updateemployeeexpcat($id, $data);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/expensescategory");
        }
    }

    public function deleteemployeeexpcatbyid($id = Null) {

        $result = $this->EMPLOYEEMODEL->ck_empexpcat_existing($id);

        if ($result) {
            $invoice = $this->EMPLOYEEMODEL->deleteemployeeexpcatbyid($id);

            $success = "EMPLOYEE Expense Category Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/expensescategory");
        } else {
            $failed = "
				Can't Delete ! this employee Expense Category already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/expensescategory");
        }
    }
    
    public function viewdepartment() {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['departmentlist'] = $this->EMPLOYEEMODEL->departmentlist();
        $data['dashboardContent'] = $this->load->view('dashboard/employee/department', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function insertdepartment() {
        $data = array();
        $data['dep_name'] = $this->input->post('dep_name');

        $name = $this->input->post('dep_name');

        $ck_existing_dep = $this->EMPLOYEEMODEL->ck_existing_dep($name);


        if (!ck_existing_dep) {
            $failed = "
				Duplicate Department !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewdepartment");
        }


        $department = $this->EMPLOYEEMODEL->insertemployeedep($data);

        if ($department) {
            $success_saved = "
				Department successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("employeecontroller/viewdepartment");
        } else {
            $failed = "
				Department not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewdepartment");
        }
    }
    
    public function editdepartment() {
        $data = array();
        $data['dep_name'] = $this->input->post('dep_name');

        $id = $this->input->post('id');

        $name = $this->input->post('dep_name');

        $ck_existing_dep = $this->EMPLOYEEMODEL->ck_existing_dep($id,$name);


        if (!$ck_existing_dep) {
            $failed = "
				Duplicate Department !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewdepartment");
        }


        $result = $this->EMPLOYEEMODEL->updatedepartment($id, $data);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/viewdepartment");
        }
    }
    
    public function deletedepartmentbyid($id = Null) {

        $result = $this->EMPLOYEEMODEL->ck_dep_existing($id);

        if ($result) {
            $invoice = $this->EMPLOYEEMODEL->deleteemployeedepartmentbyid($id);

            $success = "Department Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("employeecontroller/viewdepartment");
        } else {
            $failed = "
				Can't Delete ! this Department already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("employeecontroller/viewdepartment");
        }
    }

}
