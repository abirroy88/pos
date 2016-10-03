<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Reportcontroller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('reportmodel', 'REPORTMODEL', TRUE);

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

    public function expensereport() {
        $data = array();
        $data['queryexpense'] = $this->REPORTMODEL->queryexpense();
        $data['querysubexpense'] = $this->REPORTMODEL->querysubexpense();
        $data['dashboardContent'] = $this->load->view('dashboard/report/expencereportarea', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function datewiseallexpensereport() {
        $data = array();
        $data['queryexpense'] = $this->REPORTMODEL->queryexpense();
        $data['querysubexpense'] = $this->REPORTMODEL->querysubexpense();
        $data['dashboardContent'] = $this->load->view('dashboard/report/datewiseallexpencereportarea', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function headwiseallexpensereport() {
        $data = array();
        $data['queryexpense'] = $this->REPORTMODEL->queryexpense();
        $data['querysubexpense'] = $this->REPORTMODEL->querysubexpense();
        $data['dashboardContent'] = $this->load->view('dashboard/report/headwiseallexpencereportarea', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function subheadwiseallexpensereport() {
        $data = array();
        $data['queryexpense'] = $this->REPORTMODEL->queryexpense();
       // $data['querysubexpense'] = $this->REPORTMODEL->querysubexpense();
        $data['dashboardContent'] = $this->load->view('dashboard/report/subheadwiseallexpencereportarea', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function individualexpensereport($expense_id = Null) {
        $data = array();
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();
        $data['queryexpensebyid'] = $this->REPORTMODEL->queryexpensebyid($expense_id);
        $data['queryexpensehistorybyid'] = $this->REPORTMODEL->queryexpensehistorybyid($expense_id);

        $data['dashboardContent'] = $this->load->view('dashboard/report/printindividualexpensereport', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function individualsubexpensereport($sub_expense_id = Null) {
        $data = array();
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();
        $data['querysubexpensebyid'] = $this->REPORTMODEL->querysubexpensebyid($sub_expense_id);
        $data['querysubexpensehistorybyid'] = $this->REPORTMODEL->querysubexpensehistorybyid($sub_expense_id);

        $data['dashboardContent'] = $this->load->view('dashboard/report/printindividualsubexpensereport', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function expensereportbydaterange() {
        $data = array();


        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/expensereport');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];
        $data['h_msg'] = "Date Wise Expense Report";

        $data['queryexpensereportbydaterange'] = $this->REPORTMODEL->queryexpensereportbydaterange($first_date, $last_date);
        $data['refundreportbydaterange'] = $this->REPORTMODEL->queryrefundreport($first_date, $last_date);
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printexpensereportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function allexpensereportbydaterange() {
        $data = array();
        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/datewiseallexpensereport');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];
        $data['h_msg'] = "Date Wise Expense Report";

        $data['queryexpensereportbydaterange'] = $this->REPORTMODEL->queryexpensereportbydaterange($first_date, $last_date);
        $data['refundreportbydaterange'] = $this->REPORTMODEL->queryrefundreport($first_date, $last_date);
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printexpensereportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function allexpensereportbydaterangeandhead() {
        $data = array();
        $date_range = $this->input->post('date_range');
        $head = $this->input->post('expense_id');
        $exh = explode('-', $head);
        $head_id = $exh[0] . '-' . $exh[1];
        $head_name = $exh[2];

        if (empty($head)) {
            $failed_date = "Please select a head";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/headwiseallexpensereport');
        }
        
        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/headwiseallexpensereport');
        }
        
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];
        $data['h_msg'] = "Expense Report for Head-<b>" . $head_name . "</b>";
        
        $data['expense_id'] = $this->input->post('date_range');
        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['queryexpensereportbydaterange'] = $this->REPORTMODEL->allexpensereportbydaterangeandhead($head_id, $first_date, $last_date);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printexpensereportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function allexpensereportbydaterangeandheadsubhead() {
        $data = array();
        $date_range = $this->input->post('date_range');
        $head = $this->input->post('expense_id');
        $subhead = $this->input->post('sub_expense_id');

        if (empty($head)) {
            $failed_date = "Please select a Head";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/subheadwiseallexpensereport');
        }
        
        if (empty($subhead)) {
            $failed_date = "Please select a Sub Head";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/subheadwiseallexpensereport');
        }
        
        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/subheadwiseallexpensereport');
        }
        
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];
        $head_name = $this->REPORTMODEL->getexphname($head);
        $subhead_name = $this->REPORTMODEL->getexpsubhname($subhead);

        $data['h_msg'] = "Expense Report for Head-<b>" . $head_name . "</b> ,SubHead-<b>" . $subhead_name;
        
        $data['expense_id'] = $this->input->post('expense_id');
        $data['sub_expense_id'] = $this->input->post('sub_expense_id');
        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['queryexpensereportbydaterange'] = $this->REPORTMODEL->allexpensereportbydaterangeandheadsubhead($head, $subhead, $first_date, $last_date);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printexpensereportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function salesreportform() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/salesreportform', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }   
    
    public function querysalesreportbydaterange() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/salesreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['querysalesreportbydaterange'] = $this->REPORTMODEL->querysalesreportbydaterange($first_date, $last_date);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printsalesreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function refund_rep() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/refund_rep', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function nonInvoice_rep() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/nonInvoice_rep', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    

    public function cst_ledger_rep() {
        $data = array();
        $data['querytotalinvoicehistory'] = $this->REPORTMODEL->querytotalinvoicehistory();
        $data['dashboardContent'] = $this->load->view('dashboard/report/cst_ledger', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function user_coll_rep() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/coll_rep', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function daily_sum_rep() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['dashboardContent'] = $this->load->view('dashboard/report/daily_sum_rep', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function querycstreportbydaterange() {
        $data = array();
        $dt = new DateTime();
        $customer = $this->input->post('cst_company');
        $cn = explode('-', $this->input->post('cst_company'));
        $data['cst_id'] = $cn[0].'-'.$cn[1].'-'.$cn[2];
        $cst_id = $cn[0].'-'.$cn[1].'-'.$cn[2];
        
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');
        
        if (empty($customer)) {
            $failed = "Please Select Customer";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/cst_ledger_rep');
        }
        
        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/cst_ledger_rep');
        }
   
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['querycstreportbydaterange'] = $this->REPORTMODEL->querycstreportbydaterange($cst_id, $first_date, $last_date);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();
        $data['cst_company'] = $this->REPORTMODEL->cstcompany($cst_id);
        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printcstreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function querycstreportbycstid($cst_id) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        
        $data['first_date'] = 'Beginning';
        $data['last_date'] = 'End';

        $data['querycstreportbydaterange'] = $this->REPORTMODEL->querycstreportbycstid($cst_id);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();
        $data['cst_company'] = $this->REPORTMODEL->cstcompany($cst_id);
        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printcstreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function getcustomernamerep() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->REPORTMODEL->getcustomernamerep($q);
        }
    }
    
    public function getusernamerep() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->REPORTMODEL->getusernamerep($q);
        }
    }
    
    public function querycollreportbydaterange() {
        $data = array();
        $dt = new DateTime();
        $user = $this->input->post('user_name');
        
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');
        
        if (empty($user)) {
            $failed = "Please enter User Name";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/user_coll_rep');
        }
        
        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/user_coll_rep');
        }
   
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['querycollreportbydaterange'] = $this->REPORTMODEL->queryreportbyuser($user, $first_date, $last_date);
//        print_r($data['querycollreportbydaterange']);
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();
        $data['user_name'] = $user;
        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printcollreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function printdaily_sum_rep() {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $this->input->post('rep_date');

        $date = $this->input->post('rep_date');
        if (empty($date)) {
            $failed = "Please enter Date";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/printdaily_sum_rep');
        }
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();
        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();
        $data['viewbankinfo1'] = $this->REPORTMODEL->viewdailybankbalanceinfo1($date);
        $data['viewbankinfo2'] = $this->REPORTMODEL->viewdailybankbalanceinfo2($date);
        $data['viewbankinfo3'] = $this->REPORTMODEL->viewdailybankbalanceinfo3($date);
        $data['viewbankinfo4'] = $this->REPORTMODEL->viewdailybankbalanceinfo4($date);
        $data['viewbankinfo5'] = $this->REPORTMODEL->viewdailybankbalanceinfo5($date);
        $data['viewbankinfo6'] = $this->REPORTMODEL->viewdailybankbalanceinfo6($date);
        $data['viewbankinfo7'] = $this->REPORTMODEL->viewdailybankbalanceinfo7($date);

        $data['dashboardContent'] = $this->load->view('dashboard/report/printdaily_sum_rep', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function getsubheadofexpensebyidrep() {
        $expense_id = $this->input->post('expense_id');
        $data = $this->REPORTMODEL->getsubheadofexpensebyidrep($expense_id);
        echo json_encode($data);
    }

    public function duecollectionreportform() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/duecollectionreportform', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function queryduecollectionreportbydaterange() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/duecollectionreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['querysumofduecollectionreportbydaterange'] = $this->REPORTMODEL->querysumofduecollectionreportbydaterange($first_date, $last_date);
        $data['querysumofsalesreportbydaterange'] = $this->REPORTMODEL->querysumofsalesreportbydaterange($first_date, $last_date);



        $data['queryduecollectionreportbydaterange'] = $this->REPORTMODEL->queryduecollectionreportbydaterange($first_date, $last_date);
        $data['querynewcollectionreportbydaterange'] = $this->REPORTMODEL->querynonreportbydaterangebyinvoicedate($first_date, $last_date);

       
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printduecollectionreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function empexpensereport() {
        $data = array();
        $data['employee_name'] = $this->REPORTMODEL->employee_name();
//        $data['exp_category'] = $this->REPORTMODEL->exp_category();
        $data['dashboardContent'] = $this->load->view('dashboard/report/emp_exp_rep', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    
    
    public function queryempexpreportbydaterange() {
        $data = array();
        $data['emp_id'] = $this->input->post('emp_id');
        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/empexpensereport');
        }
        $dateexplode = explode("-", $date_range);

        $emp_id = $this->input->post('emp_id');
        
        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        
        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];
        $data['h_msg'] = "Employee Expense Report";

        $data['queryemployeeexpensereport'] = $this->REPORTMODEL->queryemployeeexpensereport($first_date, $last_date, $emp_id);
        $data['empexpdetailsbyid'] = $this->REPORTMODEL->empexpdetailsbyid($first_date, $last_date, $emp_id);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printemployeeexpensereport', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function queryrefundreportbydaterange() {
        $data = array();
        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/refund_rep');
        }
        $dateexplode = explode("-", $date_range);
        
        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        
        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];
        $data['h_msg'] = "Client Refund Report";

        $data['queryrefundreport'] = $this->REPORTMODEL->queryrefundreport($first_date, $last_date);
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printrefundreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function querynonInvoicereportbydaterange() {
        $data = array();
        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed_date = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed_date);
            redirect('reportcontroller/refund_rep');
        }
        $dateexplode = explode("-", $date_range);
        
        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        
        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['querynoninvoicereport'] = $this->REPORTMODEL->querynoninvoicereport($first_date, $last_date);
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printviewnoninvoiceincome', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function inventoryreportform() {
        $data = array();
        $data['queryitemlist'] = $this->REPORTMODEL->queryitemlist();
        $data['dashboardContent'] = $this->load->view('dashboard/report/inventoryreportform', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function inventorymasterreport() {
        $data = array();

        $iteminfo = $this->REPORTMODEL->queryitemlistwithsupplier();

        $countiteminfo = count($iteminfo);
        $queryinventoryreportbydaterange = array();
        for ($i = 0; $i < $countiteminfo; $i++) {

            $queryinventoryreportbydaterange[$i] = $this->REPORTMODEL->queryinventorymasterreport($iteminfo[$i]['item_id']);
        }



        $data['queryinventoryreportbydaterange'] = $queryinventoryreportbydaterange;

        /* echo "<pre>";
          print_r($data['queryinventoryreportbydaterange']);
          exit(); */

        $data['dashboardContent'] = $this->load->view('dashboard/report/viewinventorymasterreport', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function printinventorymasterreport() {
        $data = array();

        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $iteminfo = $this->REPORTMODEL->queryitemlistwithsupplier();

        $countiteminfo = count($iteminfo);
        $queryinventoryreportbydaterange = array();
        for ($i = 0; $i < $countiteminfo; $i++) {

            $queryinventoryreportbydaterange[$i] = $this->REPORTMODEL->queryinventorymasterreport($iteminfo[$i]['item_id']);
        }



        $data['queryinventoryreportbydaterange'] = $queryinventoryreportbydaterange;

        /* echo "<pre>";
          print_r($data['queryinventoryreportbydaterange']);
          exit(); */
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printinventorymasterreport', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function printinventorymasterreportbyid() {
        $data = array();

        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $item_id = $this->input->post('item_id');

        $data['queryitemlistwithsupplierbyid'] = $this->REPORTMODEL->queryitemlistwithsupplierbyid($item_id);

        $data['querysupplieditembyid'] = $this->REPORTMODEL->querymastersupplieditembyid($item_id);

        $data['querysolditembyid'] = $this->REPORTMODEL->querymastersolditembyid($item_id);

        /* echo "<pre>";
          print_r($data['querysolditembyid']);
          exit(); */
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printinventorymasterreportbyid', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function queryinventoryreportbydaterange() {
        $data = array();

        $date_range = $this->input->post('date_range');

        $data['date_range'] = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/inventoryreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $iteminfo = $this->REPORTMODEL->queryitemlistwithsupplier();

        $countiteminfo = count($iteminfo);
        $queryinventoryreportbydaterange = array();
        for ($i = 0; $i < $countiteminfo; $i++) {

            $queryinventoryreportbydaterange[$i] = $this->REPORTMODEL->queryinventoryreportbydaterange($first_date, $last_date, $iteminfo[$i]['item_id']);
        }



        $data['queryinventoryreportbydaterange'] = $queryinventoryreportbydaterange;

        /* echo "<pre>";
          print_r($data['queryinventoryreportbydaterange']);
          exit(); */

        $data['dashboardContent'] = $this->load->view('dashboard/report/viewinventoryreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function printinventoryreportbydate() {
        $data = array();

        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');

        $data['date_range'] = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/inventoryreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $iteminfo = $this->REPORTMODEL->queryitemlistwithsupplier();

        $countiteminfo = count($iteminfo);
        $queryinventoryreportbydaterange = array();
        for ($i = 0; $i < $countiteminfo; $i++) {

            $queryinventoryreportbydaterange[$i] = $this->REPORTMODEL->queryinventoryreportbydaterange($first_date, $last_date, $iteminfo[$i]['item_id']);
        }



        $data['queryinventoryreportbydaterange'] = $queryinventoryreportbydaterange;

        /* echo "<pre>";
          print_r($data['queryinventoryreportbydaterange']);
          exit(); */
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printinventoryreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function printinventoryreportbyid() {
        $data = array();

        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');
        $item_id = $this->input->post('item_id');

        $data['date_range'] = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/inventoryreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['queryitemlistwithsupplierbyid'] = $this->REPORTMODEL->queryitemlistwithsupplierbyid($item_id);

        $data['querysupplieditembyid'] = $this->REPORTMODEL->querysupplieditembyid($first_date, $last_date, $item_id);

        $data['querysolditembyid'] = $this->REPORTMODEL->querysolditembyid($first_date, $last_date, $item_id);

        /* echo "<pre>";
          print_r($data['querysolditembyid']);
          exit(); */
        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printinventoryreportbyid', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function profitlossreportform() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/profitlossreportform', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function queryprofitlossreportbydaterange() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/profitlossreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['queryitemreport'] = $this->REPORTMODEL->queryitemreport();

        $countitem = count($data['queryitemreport']);

        $sdata = array();
        for ($i = 0; $i < $countitem; $i++) {
            $sdata[$i] = $this->REPORTMODEL->queryprofitreportbydaterange($first_date, $last_date, $data['queryitemreport'][$i]->item_name);
        }

        $data['queryprofitreportbydaterange'] = $sdata;


        $lodata = array();
        for ($i = 0; $i < $countitem; $i++) {
            $lodata[$i] = $this->REPORTMODEL->querylossreportbydaterange($first_date, $last_date, $data['queryitemreport'][$i]->item_name);
        }

        $data['querylossreportbydaterange'] = $lodata;

        /* echo "<pre>";
          print_r($data['queryprofitreportbydaterange']);
          exit(); */


        $data['querysumofduereportbydaterange'] = $this->REPORTMODEL->querysumofduereportbydaterange($first_date, $last_date);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();


        $data['dashboardContent'] = $this->load->view('dashboard/report/printprofitlossreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    

    public function vatreportform() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/report/vatreportform', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function queryvatreportbydaterange() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $date_range = $this->input->post('date_range');

        if (empty($date_range)) {
            $failed = "Please enter Date Range";
            $this->session->set_flashdata('failed', $failed);
            redirect('reportcontroller/vatreportform');
        }
        $dateexplode = explode("-", $date_range);

        $first_date = $dateexplode[0];
        $last_date = $dateexplode[1];

        $data['first_date'] = $dateexplode[0];
        $data['last_date'] = $dateexplode[1];

        $data['querysalesreportbydaterange'] = $this->REPORTMODEL->queryvatreportbydaterange($first_date, $last_date);

        $data['storeInfo'] = $this->REPORTMODEL->storeInfo();

        $data['querycurrencytag'] = $this->REPORTMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printvatreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

}