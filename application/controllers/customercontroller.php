<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Customercontroller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('customermodel', 'CUSTOMERMODEL', TRUE);

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

    public function createcustomer() {

        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m.Y');
        $data['randomSerialNUmber'] = $this->generateRandomString(4);
        $data['vat_rate'] = $this->CUSTOMERMODEL->queryvatrate();
        $data['customer_name'] = $this->CUSTOMERMODEL->customer_name();
        $data['dashboardContent'] = $this->load->view('dashboard/customer/createcustomer', $data, TRUE);
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

    public function checkproductname() {
        $proname = $this->input->post('proname');
        $data = $this->CUSTOMERMODEL->checkproductname($proname);
        echo json_encode($data);
    }

    public function checksellingpricebyname() {
        $proname = $this->input->post('proname');
        $proid = $this->CUSTOMERMODEL->checkproductid($proname);
        $data = $this->CUSTOMERMODEL->checksellingpricebyname($proid->item_id);
        echo json_encode($data);
    }

    public function checkstockbyitemname() {
        $proname = $this->input->post('proname');
        $proid = $this->CUSTOMERMODEL->checkproductid($proname);
        $balancestock = $this->CUSTOMERMODEL->checkstockbyname($proid->item_id);


        echo json_encode($balancestock);
    }

    public function getproductname() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->CUSTOMERMODEL->getproductname($q);
        }
    }

    public function getcustomername() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->CUSTOMERMODEL->getcustomername($q);
        }
    }

    public function insertcustomer() {
        $data = array();
        $data['cst_id'] = $this->input->post('c_id');
        $data['cst_name'] = $this->input->post('c_name');
        $data['cst_company'] = $this->input->post('c_company');
        $data['cst_email'] = $this->input->post('c_email');
        $data['cst_mobile'] = $this->input->post('c_mobile');
        $data['cst_address'] = $this->input->post('c_address');
        $dates = new DateTime($this->input->post('c_date'));
        $data['src_id'] = $this->input->post('src_id');
        $data['cst_date'] = $dates->format('Y-m-d');

        $data['prepared_by'] = $this->session->userdata('epos_user_name');

        if (empty($data['cst_id']) || empty($data['cst_company']) || empty($data['cst_email'])) {
            $failed = "Please enter Required Fields!!";
            $this->session->set_flashdata('failed', $failed);
            redirect('customercontroller/viewcustomer');
        }

        $cst_id = $this->input->post('c_id');
        $cst_email = $this->input->post('c_email');
        $ck_existing = $this->CUSTOMERMODEL->ck_existing($cst_email);


        if (!$ck_existing) {
            $failed = "
				Duplicate Customer Email!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/viewcustomer");
        }

        $customer = $this->CUSTOMERMODEL->insertcustomer($data);

        if ($customer) {
            $success_saved = "
				Data successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("customercontroller/viewcustomer");
        } else {
            $failed = "
				Data not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/viewcustomer");
        }
    }

    public function inserthosting() {
        $data = array();
        $data['cst_id'] = $this->input->post('cst_id');
        $data['d_name'] = $this->input->post('d_name');
        $data['d_owner'] = $this->input->post('d_owner');
        $data['d_price'] = $this->input->post('d_price');
        $data['h_space'] = $this->input->post('h_space');
        $data['h_price'] = $this->input->post('h_price');
        $data['srv_id'] = $this->input->post('srv_id');
        
        $data['reg_date'] = $this->input->post('reg_date');
        $data['exp_date'] = $this->input->post('exp_date');
        $data['user_name'] = $this->input->post('user_name');
        $data['password'] = $this->input->post('password');
        $data['note'] = $this->input->post('note');

        $data['add_by'] = $this->session->userdata('epos_user_name');

        $cst_id = $this->input->post('cst_id');

//        $ck_existing = $this->CUSTOMERMODEL->ck_existing($cst_email);

        $hosting = $this->CUSTOMERMODEL->inserthostingdetails($data);

        if ($hosting) {
            $success_saved = "
				Data successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("customercontroller/customer_details/$cst_id");
        } else {
            $failed = "
				Data not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/viewcustomer");
        }
    }
    
    
    public function updatehosting() {
        $data = array();
        $data['cst_id'] = $this->input->post('cst_id');
        $data['d_name'] = $this->input->post('d_name');
        $data['d_owner'] = $this->input->post('d_owner');
        $data['d_price'] = $this->input->post('d_price');
        $data['h_space'] = $this->input->post('h_space');
        $data['h_price'] = $this->input->post('h_price');
        $data['srv_id'] = $this->input->post('srv_id');
        
        $data['reg_date'] = $this->input->post('reg_date');
        $data['exp_date'] = $this->input->post('exp_date');
        $data['user_name'] = $this->input->post('user_name');
        $data['password'] = $this->input->post('password');
        $data['note'] = $this->input->post('note');

        $data['add_by'] = $this->session->userdata('epos_user_name');

        $id = $this->input->post('id');
        $cst_id = $this->input->post('cst_id');

//        $ck_existing = $this->CUSTOMERMODEL->ck_existing($cst_email);

        $hosting = $this->CUSTOMERMODEL->updatehosting($id,$data);

        if ($hosting) {
            $success_saved = "
				Data successfully Update!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("customercontroller/customer_details/$cst_id");
        } else {
            $failed = "
				Data not Update!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/viewcustomer");
        }
    }

    public function activatecst($id) {
        $info_data['statuss'] = 0;

        $result = $this->CUSTOMERMODEL->activatecustomer($id, $info_data);
        redirect("customercontroller/viewcustomer");
    }

    public function inactivatecst($id) {
        $info_data['statuss'] = 1;

        $result = $this->CUSTOMERMODEL->inactivatecustomer($id, $info_data);
        redirect("customercontroller/viewcustomer");
    }

    public function updatepaymentofduebyinvoiceid() {
        $data = array();
        $dt = new DateTime();

        $data['trans_id'] = $this->input->post('trans_id');
        $data['invoice_id'] = $this->input->post('invoice_id');
        $data['first_payment'] = $this->input->post('first_payment');
        $data['pay_discount'] = $this->input->post('pay_discount');
        $data['method'] = $this->input->post('method');
        $data['payment_date'] = $this->input->post('payment_date');
        $data['rec_no'] = $this->input->post('rec_no');
        $cst_id = $this->input->post('cst_id');
//        $data['prepared_by'] = $this->session->userdata('epos_user_name');
        $data['pay_note'] = $this->input->post('pay_note');

        $trdata['trans_id'] = $this->input->post('trans_id');
        $trdata['tr_type'] = 1;
        $trdata['tr_method'] = $this->input->post('method');
        $trdata['tr_amount'] = $this->input->post('first_payment');
        $trdata['tr_date'] = $this->input->post('payment_date');
//        $trdata['tr_by'] = $this->session->userdata('epos_user_name');

        $method = $this->input->post('method');
//        echo $this->input->post('bid');
//        
//        exit();
        if ($method == 'Bank') {
            $data['bank_id'] = $this->input->post('bid');
            $data['chq_no'] = $this->input->post('chq_no');
            $trdata['b_id'] = $this->input->post('bid');

            $invoice_id = $this->input->post('invoice_id');

            if (empty($data['bank_id']) || empty($data['chq_no'])) {
                $failed = "Please Select Bank Account !!!";
                $this->session->set_flashdata('failed', $failed);
                redirect("customercontroller/customer_details/$cst_id");
            }
        }

        if ($method == 'Cash') {
            $data['bank_id'] = 0;
            $data['chq_no'] = '';
            $trdata['b_id'] = 0;
        }


        $invoice_id = $this->input->post('invoice_id');
        $trans_id = $this->input->post('trans_id');

        if (empty($data['first_payment'])) {
            $failed = "Please insert valid amount!<br>";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/customer_details/$cst_id");
        }
        $balance = $this->input->post('balance');
        $payment = $this->input->post('first_payment') + $this->input->post('pay_discount');

        if ($payment > $balance) {
            $failed = "Payment Can't be greater than Due!<br>";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/customer_details/$cst_id");
        }


        $duedata['due_amount'] = $balance - $payment;


        $update = $this->CUSTOMERMODEL->updateinvoiceduebyid($duedata, $invoice_id);

        $result = $this->CUSTOMERMODEL->updateduepaymentbyid($data, $trans_id);

        $trans_sum = $this->CUSTOMERMODEL->updateduetranssummary($trdata, $trans_id);

        if ($result) {
//            $cominfo = $this->CUSTOMERMODEL->storeInfomail();
//            $customerinfo = $this->CUSTOMERMODEL->customerinfo($cst_id);
//            $cnum = count($this->CUSTOMERMODEL->duepaymenthistorybyinvoiceid($invoice_id));
//            $queryinvoiceditembyinvoiceidmail = $this->CUSTOMERMODEL->queryinvoiceditembyinvoiceid($invoice_id);
//            $duepaymenthistorybyinvoiceidmail = $this->CUSTOMERMODEL->duepaymenthistorybyinvoiceid($invoice_id);
//            $invdata = $this->CUSTOMERMODEL->queryinvoicefordue($invoice_id);
//            $config = Array(
//                'protocol' => 'sendmail',
//                'smtp_host' => 'localhost',
//                'smtp_port' => 25,
//                'smtp_user' => 'softabhw',
//                'smtp_pass' => 'ABHsoft321#',
//                'smtp_timeout' => '4',
//                'mailtype' => 'html',
//                'charset' => 'iso-8859-1'
//            );
//            $this->load->library('email', $config);
//            $this->email->set_newline("\r\n");
//
//            $this->email->from('info@abhworld.com', 'Express Billing');
//            $indata = array(
//                'companyInfo' => $cominfo, 'currDate' => $curr_date,
//                'customerinfo' => $customerinfo, 'invoiceId' => $invoice_id,
//                'invoiceDate' => $invdata->invoice_date, 'dueDate' => $invdata->due_date,
//                'preparedBy' => $invdata->prepared_by, 'notE' => $duedata['note'], 'cNum' => $cnum,
//                'subTotal' => $invdata->sub_total, 'disCount' => $invdata->due_iscount, 'grandTotal' => $invdata->grand_total,
//                'netTotal' => $invdata->net_total, 'paidAmount' => $invdata->paid_amount,
//                'dueAmount' => $invdata->due_amount, 'meThod' => $data['method'],
//                'duepaymenthistorybyinvoiceidMail' => $duepaymenthistorybyinvoiceidmail,
//                'queryinvoiceditembyinvoiceidMail' => $queryinvoiceditembyinvoiceidmail
//            );
//            $this->email->to('foysal@abhworld.com');  // replace it with receiver mail id
//            $this->email->subject('Invoice Information'); // replace it with relevant subject
//
//            $body = $this->load->view('dashboard/invoice/invoicemail.php', $indata, TRUE);
//            $this->email->message($body);
//            $this->email->send();
            redirect("customercontroller/customer_details/$cst_id");
        }
    }

    public function customer_details($id) {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m.Y');
        $data['randomSerialNUmber'] = $this->generateRandomString(4);
        $data['querycstdetails'] = $this->CUSTOMERMODEL->querycstdetails($id);
        $data['customerinvoicebyid'] = $this->CUSTOMERMODEL->customerinvoicebyid($id);
        $data['querytotalinvoicehistory'] = $this->CUSTOMERMODEL->queryinvoicehistory($id);
        $data['queryhostingdetails'] = $this->CUSTOMERMODEL->queryhostingdetails($id);
        $data['queryinvoicepaymenthistory'] = $this->CUSTOMERMODEL->queryinvoicepaymenthistory($id);
        $data['customer_name'] = $this->CUSTOMERMODEL->customer_name();
        $data['server_name'] = $this->CUSTOMERMODEL->server_name();
        $data['source_name'] = $this->CUSTOMERMODEL->source_name();

        $data['dashboardContent'] = $this->load->view('dashboard/customer/customer_details', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function viewcustomer() {
        $data = array();
        $dt = new DateTime();

        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m.Y');
        $data['randomSerialNUmber'] = $this->generateRandomString(4);
        $data['customer_name'] = $this->CUSTOMERMODEL->customer_name();
        $data['server_name'] = $this->CUSTOMERMODEL->server_name();
        $data['source_name'] = $this->CUSTOMERMODEL->source_name();
        $data['customerinvoice'] = $this->CUSTOMERMODEL->customerinvoice();
        $data['dashboardContent'] = $this->load->view('dashboard/customer/viewcustomer', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function editcustomer($id) {
        $data = $this->CUSTOMERMODEL->getquerycustomerid($id);
        echo json_encode($data);
    }

    public function updatecustomer() {
        $data = array();
        //$data['cst_id'] = $this->input->post('cst_id');
        $data['cst_name'] = $this->input->post('cst_name');
        $data['cst_company'] = $this->input->post('cst_company');
        $data['cst_email'] = $this->input->post('cst_email');
        $data['cst_mobile'] = $this->input->post('cst_mobile');
        $data['cst_address'] = $this->input->post('cst_address');
        $data['src_id'] = $this->input->post('src_id');

        $cst_id = $this->input->post('cst_id');
        $cst_email = $this->input->post('cst_email');
        $ck_existing = $this->CUSTOMERMODEL->ck_existing($cst_id,$cst_email);


        if (!$ck_existing) {
            $failed = "
				Duplicate Customer Email!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/viewcustomer");
        }

        $result = $this->CUSTOMERMODEL->updatecustomer($cst_id, $data);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("customercontroller/viewcustomer/$cst_id");
        }
    }

    public function printviewcustomer($cst_id) {
        $data = array();
        $dt = new DateTime();
        $data['cst_id'] = $cst_id;

        $data['current_date'] = $dt->format('Y/m/d');




        $data['querysalesreportbydaterange'] = $this->CUSTOMERMODEL->querycstreportbydaterange($cst_id);

        $data['first_date'] = 'All';
        $data['last_date'] = 'All';

        $data['storeInfo'] = $this->CUSTOMERMODEL->storeInfo();
        $data['cst_company'] = $this->CUSTOMERMODEL->cstcompany($cst_id);
        $data['querycurrencytag'] = $this->CUSTOMERMODEL->querycurrencytag();

        $data['dashboardContent'] = $this->load->view('dashboard/report/printcstreportbydaterange', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function deletecustomerbyid($cst_id = Null) {

        $result = $this->CUSTOMERMODEL->ck_cst_existing($cst_id);

        if ($result) {
            $invoice = $this->CUSTOMERMODEL->deletecustomerbyid($cst_id);

            $success = "Customer Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("customercontroller/viewcustomer");
        } else {
            $failed = "Can't Delete ! this customer already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("customercontroller/viewcustomer");
        }
    }

    public function deletetransactionbyid($id = Null) {

        $ss = explode('-', $id);
        $invoice_id = $ss[0];
        $trans_id = $ss[1];

        $select = $this->CUSTOMERMODEL->getduebyinvoiceid($invoice_id);
        $amount['due_amount'] = $ss[2] + $select->due_amount;
        $update = $this->CUSTOMERMODEL->updatepaymentbyid($amount, $invoice_id);

        $delete = $this->CUSTOMERMODEL->deletepaymentbyid($trans_id);

//        if ($update && $delete) {
        $success = "Payment Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("customercontroller/customer_details/$select->cst_id");
//        } else {
//            $failed = "Can't Delete !<br>
//				";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("customercontroller/customer_details/$select->cst_id");
//        }
    }

}
