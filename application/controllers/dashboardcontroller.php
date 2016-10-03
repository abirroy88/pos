<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Dashboardcontroller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('dashboardmodel', 'DASHBOARDMODEL', TRUE);

        $id = $this->session->userdata('abhinvoiser_1_1_user_id');
        if (empty($id)) {
            redirect("authenticationcontroller");
        }/**/
        /*
          echo "<pre>";
          print_r($data);
          exit();
         */
    }

    public function index() {

        $data = array();
        $dt = new DateTime();
        $today = $dt->format('Y/m/d');
        $year = $dt->format('Y');
        $month = $dt->format('m');

//        $enddate = date('Y-m-d', strtotime($today) + strtotime("-30 day", 0));
//        $data['querycurrencytag'] = $this->DASHBOARDMODEL->querycurrencytag();
//
//        $data['querytotalsale'] = $this->DASHBOARDMODEL->querytotalsale();
//        $data['querytotaldue'] = $this->DASHBOARDMODEL->querytotaldue();
//        $data['querytotaloverdue'] = $this->DASHBOARDMODEL->querytotaloverdue($enddate);
//
//
//
//        $first_date = $year . "/" . $month . "/" . "01";
//        $last_date = $year . "/" . $month . "/" . "31";
//
//        $data['first_date'] = $first_date;
//        $data['last_date'] = $last_date;
//
//        $data['viewbankinfo'] = $this->DASHBOARDMODEL->viewbankbalanceinfo();
//        $data['viewclientinfo'] = $this->DASHBOARDMODEL->viewclientinfo();
//        $data['viewactiveclientinfo'] = $this->DASHBOARDMODEL->viewactiveclientinfo();
//
//        $data['querycurrenttotalsale'] = $this->DASHBOARDMODEL->querycurrenttotalsale($first_date, $last_date);
//        $data['querycurrenttotaldue'] = $this->DASHBOARDMODEL->querycurrenttotaldue($first_date, $last_date);


        /* echo "<pre>";
          print_r($last_date);
          exit(); */

        $data['dashboardContent'] = $this->load->view('dashboard/frontpage', $data, TRUE);
        ;
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function adduser() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/adduser', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertuser() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['password'] = $this->DASHBOARDMODEL->hash($this->input->post('password'));
        $data['status'] = $this->input->post('status');
        $data['role'] = $this->input->post('role');

        if (empty($data['name']) || empty($data['password']) || empty($data['status']) || empty($data['role'])) {
            $failed = "Please enter Required Fields";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/adduser');
        }

        $duplicate = $this->DASHBOARDMODEL->duplicateUserChecker($data['name']);

        if ($duplicate) {
            $failed = "Please enter Unique Username";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/adduser');
        } else {
            $result = $this->DASHBOARDMODEL->insertUserInfo($data);
        }

        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $status = $this->input->post('status');
        $role = $this->input->post('role');

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				Username : $name<br>
				Password : $password<br>
				Status : $status<br>
				Role : $role<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/adduser');
        }
    }

    public function viewuserlist() {
        $data = array();
        $data['viewuserlist'] = $this->DASHBOARDMODEL->viewuserlist();
        $data['dashboardContent'] = $this->load->view('dashboard/viewuserlist', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function activateuser($id) {
        $info_data['status'] = "active";
        $result = $this->DASHBOARDMODEL->activateuser($id, $info_data);
        redirect("dashboardcontroller/viewuserlist");
    }

    public function inactivateuser($id) {
        $info_data['status'] = "inactive";
        $result = $this->DASHBOARDMODEL->inactivateuser($id, $info_data);
        redirect("dashboardcontroller/viewuserlist");
    }

    public function changepassword($id) {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['password'] = $this->input->post('new_password');
        $new_password = $this->input->post('new_password_again');

        if (empty($data['name'])) {
            $success = "Please enter User Name!!";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewuserlist");
        }
        if (empty($data['password']) || empty($new_password)) {
            $success = "Please enter Password Twice!!";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewuserlist");
        } else {
            if ($data['password'] == $new_password) {
                $data['password'] = $this->DASHBOARDMODEL->hash($data['password']);
                $result = $this->DASHBOARDMODEL->changepassword($id, $data);
                $success = "Password changed successfully!";
                $this->session->set_flashdata('success', $success);
                redirect("dashboardcontroller/viewuserlist");
            } else {
                $failed = "Password does not match!";
                $this->session->set_flashdata('failed', $failed);
                redirect("dashboardcontroller/viewuserlist");
            }
        }
    }
    
    public function viewsource() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['sourcelist'] = $this->DASHBOARDMODEL->sourcelist();
        $data['dashboardContent'] = $this->load->view('dashboard/source', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function insertsource() {
        $data = array();
        $data['src_name'] = $this->input->post('src_name');

        $name = $this->input->post('src_name');

        $ck_existing_src = $this->DASHBOARDMODEL->ck_existing_src('', $name);


        if (!$ck_existing_src) {
            $failed = "
				Duplicate Server !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewsource");
        }


        $ource = $this->DASHBOARDMODEL->insert_source($data);

        if ($ource) {
            $success_saved = "
				Source successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("dashboardcontroller/viewsource");
        } else {
            $failed = "
				Source not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewsource");
        }
    }
    
    public function editsource() {
        $data = array();
        $data['src_name'] = $this->input->post('src_name');

        $id = $this->input->post('id');

        $name = $this->input->post('src_name');

        $ck_existing_src = $this->DASHBOARDMODEL->ck_existing_src($id, $name);


        if (!$ck_existing_src) {
            $failed = "
				Duplicate Source !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewsource");
        }


        $result = $this->DASHBOARDMODEL->update_source($id, $data);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewsource");
        }
    }
    
    public function viewserver() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['serverlist'] = $this->DASHBOARDMODEL->serverlist();
        $data['dashboardContent'] = $this->load->view('dashboard/server', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function insertserver() {
        $data = array();
        $data['srv_name'] = $this->input->post('srv_name');

        $name = $this->input->post('srv_name');

        $ck_existing_srv = $this->DASHBOARDMODEL->ck_existing_srv('', $name);


        if (!$ck_existing_srv) {
            $failed = "
				Duplicate Server !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewcompany");
        }


        $server = $this->DASHBOARDMODEL->insert_server($data);

        if ($server) {
            $success_saved = "
				Server successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("dashboardcontroller/viewserver");
        } else {
            $failed = "
				Server not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewserver");
        }
    }
    
    public function editserver() {
        $data = array();
        $data['srv_name'] = $this->input->post('srv_name');

        $id = $this->input->post('id');

        $name = $this->input->post('srv_name');

        $ck_existing_srv = $this->DASHBOARDMODEL->ck_existing_srv($id, $name);


        if (!$ck_existing_srv) {
            $failed = "
				Duplicate Server !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewserver");
        }


        $result = $this->DASHBOARDMODEL->update_server($id, $data);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewserver");
        }
    }

    public function viewcompany() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['companylist'] = $this->DASHBOARDMODEL->companylist();
        $data['dashboardContent'] = $this->load->view('dashboard/company', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertcompany() {
        $data = array();
        $data['com_name'] = $this->input->post('com_name');

        $name = $this->input->post('com_name');

        $ck_existing_com = $this->DASHBOARDMODEL->ck_existing_com('', $name);


        if (!$ck_existing_com) {
            $failed = "
				Company Department !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewcompany");
        }


        $company = $this->DASHBOARDMODEL->insert_company($data);

        if ($company) {
            $success_saved = "
				Company successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("dashboardcontroller/viewcompany");
        } else {
            $failed = "
				Company not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewcompany");
        }
    }

    public function editcompany() {
        $data = array();
        $data['com_name'] = $this->input->post('com_name');

        $id = $this->input->post('id');

        $name = $this->input->post('com_name');

        $ck_existing_com = $this->DASHBOARDMODEL->ck_existing_com($id, $name);


        if (!$ck_existing_com) {
            $failed = "
				Duplicate Company !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewcompany");
        }


        $result = $this->DASHBOARDMODEL->update_company($id, $data);

        if ($result) {
            $success = "Updated successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewcompany");
        }
    }

    public function deletecompanybyid($id = Null) {

//        $result = $this->DASHBOARDMODEL->ck_com_existing($id);


        $invoice = $this->DASHBOARDMODEL->deletecompany_byid($id);

        if (!$invoice) {
            $success = "Company Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewcompany");
        } else {
            $failed = "
				Can't Delete ! this Company already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewcompany");
        }
    }
    
    public function viewpayable() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['current_date_my'] = $dt->format('m-Y');
        $data['payablelist'] = $this->DASHBOARDMODEL->payablelist();
        $data['dashboardContent'] = $this->load->view('dashboard/payable', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }
    
    public function insertpayable() {
        $data = array();
        $data['purpose'] = $this->input->post('purpose');
        $data['amount'] = $this->input->post('amount');
        $data['exp_date'] = $this->input->post('exp_date');
        $data['p_note'] = $this->input->post('p_note');


        $payable = $this->DASHBOARDMODEL->insert_payable($data);

        if ($payable) {
            $success_saved = "
				Payable successfully Insert!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("dashboardcontroller/viewpayable");
        } else {
            $failed = "
				Payable not Insert!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewpayable");
        }
    }
    
    public function editpayable() {
        $data = array();
        $data['purpose'] = $this->input->post('purpose');
        $data['amount'] = $this->input->post('amount');
        $data['exp_date'] = $this->input->post('exp_date');
        $data['p_note'] = $this->input->post('p_note');
        
        $id = $this->input->post('id');


        $payable = $this->DASHBOARDMODEL->update_payable($id, $data);

        if ($payable) {
            $success_saved = "
				Payable successfully Update!<br>
				";
            $this->session->set_flashdata('success', $success_saved);
            redirect("dashboardcontroller/viewpayable");
        } else {
            $failed = "
				Payable not Update!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewpayable");
        }
    }
    
    public function deletepayablebyid($id = Null) {

        $invoice = $this->DASHBOARDMODEL->deletepayable_byid($id);

        if (!$invoice) {
            $success = "Payable Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewpayable");
        } else {
            $failed = "
				Can't Delete !<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewpayable");
        }
    }
    
    
    public function deleteserverbyid($id = Null) {

//        $result = $this->DASHBOARDMODEL->ck_com_existing($id);


        $invoice = $this->DASHBOARDMODEL->deleteserver_byid($id);

        if (!$invoice) {
            $success = "Server Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewserver");
        } else {
            $failed = "
				Can't Delete ! this Server already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewserver");
        }
    }
    
    public function deletesourcebyid($id = Null) {

//        $result = $this->DASHBOARDMODEL->ck_com_existing($id);


        $invoice = $this->DASHBOARDMODEL->deletesource_byid($id);

        if (!$invoice) {
            $success = "Source Deleted Successfully!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewsource");
        } else {
            $failed = "
				Can't Delete ! this Source already in use...<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/viewsource");
        }
    }

    public function addbank() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['viewbankinfo'] = $this->DASHBOARDMODEL->viewbankinfo();
        $data['dashboardContent'] = $this->load->view('dashboard/viewbank', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertbank() {
        $data = array();
        $data['b_name'] = $this->input->post('b_name');
        $data['b_branch'] = $this->input->post('b_branch');
        $data['acc_no'] = $this->input->post('acc_no');
        $data['b_date'] = $this->input->post('b_date');


        $bank = $this->input->post('b_name');
        $acc_no = $this->input->post('acc_no');

        $ck_existing = $this->DASHBOARDMODEL->ckbank_existing($bank, $acc_no);


        if (!$ck_existing) {
            $failed = "
				Duplicate Bank Account No.!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/addbank");
        }

        $result = $this->DASHBOARDMODEL->insertbankinfo($data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/addbank');
        }
    }

    public function editbank() {
        $data = array();
        $data['b_name'] = $this->input->post('b_name');
        $data['b_branch'] = $this->input->post('b_branch');
        $data['acc_no'] = $this->input->post('acc_no');
        $data['b_date'] = $this->input->post('b_date');


        $bank = $this->input->post('b_name');
        $acc_no = $this->input->post('acc_no');

        $ck_existing = $this->DASHBOARDMODEL->ckbank_existing($bank, $acc_no);


        if (!$ck_existing) {
            $failed = "
				Duplicate Bank Account No.!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/addbank");
        }

        $id = $this->input->post('id');

        $result = $this->DASHBOARDMODEL->updatebankinfo($id, $data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/addbank');
        }
    }

    public function bankstatement($id) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $data['storeInfo'] = $this->DASHBOARDMODEL->storeInfo();
        $data['viewbankname'] = $this->DASHBOARDMODEL->viewbankname($id);
        $data['viewbankstatementinfo'] = $this->DASHBOARDMODEL->viewbankstatementinfo($id);

        $data['dashboardContent'] = $this->load->view('dashboard/bankstatement', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function deletebankbyid($id) {


        $ck_existing = $this->DASHBOARDMODEL->ck_existing_use($id);

        if (!$ck_existing) {
            $failed = "
				Can't Delete Bank Inf already use...!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect("dashboardcontroller/addbank");
        }

        $this->DASHBOARDMODEL->deletebankinfo($id);
        $success = 'Deleted Bank Info Successfully !!!';
        $this->session->set_flashdata('success', $success);
        redirect('dashboardcontroller/addbank');
    }

    public function addobl() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['viewbankinfo1'] = $this->DASHBOARDMODEL->viewbankinfo();
        $data['viewbankinfo2'] = $this->DASHBOARDMODEL->viewbankinfo2();
        $data['cashbalance'] = $this->DASHBOARDMODEL->cashbalance();
        $first_date = '';
        $last_date = '';
        $method = '';
        $b_id = '';

        $data['viewbalanceinfo'] = $this->DASHBOARDMODEL->viewbalanceinfo($first_date, $last_date, $method, $b_id);
        $data['dashboardContent'] = $this->load->view('dashboard/viewbalance', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function getbankdetail() {
        $method = $this->input->post('method');
        if ($method == 'Bank') {
            $data = $this->DASHBOARDMODEL->getbankdetail();
            echo json_encode($data);
        }
    }

    public function transactionhistory() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        if ($this->input->post('date_range')) {
            $date_range = $this->input->post('date_range');
            if (!empty($date_range)) {
                $dateexplode = explode("-", $date_range);

                $first_date = $dateexplode[0];
                $last_date = $dateexplode[1];

                $data['first_date'] = $dateexplode[0];
                $data['last_date'] = $dateexplode[1];
            } else {
                $first_date = '';
                $last_date = '';
            }
        } else {
            $first_date = '';
            $last_date = '';
        }

        if ($this->input->post('method')) {
            $method = $this->input->post('method');
            $data['method'] = $method;
        } else {
            $method = '';
            $data['method'] = $method;
        }
        if ($this->input->post('b_id')) {
            $b_id = $this->input->post('b_id');
            $data['b_name'] = $this->DASHBOARDMODEL->getbankinfo($b_id);
            $data['b_id'] = $b_id;
        } else {
            $b_id = '';
            $data['b_id'] = $b_id;
        }

        $data['viewbalanceinfo'] = $this->DASHBOARDMODEL->viewbalanceinfo($first_date, $last_date, $method, $b_id);
        $data['dashboardContent'] = $this->load->view('dashboard/transactionhistory', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function balance_status() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['viewbankinfo'] = $this->DASHBOARDMODEL->viewbankbalanceinfo();
        $data['dashboardContent'] = $this->load->view('dashboard/balance_status', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function balance_transfer() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['viewbankinfo1'] = $this->DASHBOARDMODEL->viewbankinfo();
        $data['cashbalance'] = $this->DASHBOARDMODEL->cashbalance();

        $data['viewbalanceinfo'] = $this->DASHBOARDMODEL->viewtransferbalanceinfo();
        $data['dashboardContent'] = $this->load->view('dashboard/balance_transfer', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function opening_balance() {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');
        $data['companylist'] = $this->DASHBOARDMODEL->companylist();
        $data['viewbankinfo2'] = $this->DASHBOARDMODEL->viewbankinfo2();
        $data['viewbalanceinfo'] = $this->DASHBOARDMODEL->viewopeningbalanceinfo();
        $data['dashboardContent'] = $this->load->view('dashboard/opening_balance', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function getbankavailable() {

        $id = $this->input->post('bank_id');
        if ($id != '') {
            $data = $this->DASHBOARDMODEL->bankavailableblance($id);
            echo json_encode($data);
        }
    }

    public function insertbankobl() {
        $udata = array();
        $data = array();
        $dt = new DateTime();

        $data['trans_id'] = $dt->format('ymdHis');
        $data['b_id'] = $this->input->post('b_id');
        $data['tr_type'] = 0;
        $data['tr_method'] = 'Bank';
        $data['tr_amount'] = $this->input->post('tr_amount');
        $data['tr_date'] = $this->input->post('tr_date');
        $data['tr_by'] = $this->session->userdata('epos_user_name');

        $id = $this->input->post('b_id');
        $udata['status'] = 1;

        $update = $this->DASHBOARDMODEL->updatebankobl($id, $udata);

        $result = $this->DASHBOARDMODEL->inserttrnsinfo($data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/opening_balance');
        }
    }

    public function insertcashobl() {
        $data = array();
        $dt = new DateTime();

        $data['trans_id'] = $dt->format('ymdHis');
        $data['tr_type'] = 0;
        $data['tr_method'] = 'Cash';
        $data['tr_amount'] = $this->input->post('tr_amount');
        $data['tr_date'] = $this->input->post('tr_date');
        $data['tr_by'] = $this->session->userdata('epos_user_name');

        $tr_type = $data['tr_type'];
        $tr_method = $data['tr_method'];

        $dupcash = $this->DASHBOARDMODEL->duplicatecashob($tr_type, $tr_method);

        if ($dupcash) {
            $failed = "Cash Opening Balance Already Added.";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/opening_balance');
        } else {
            $result = $this->DASHBOARDMODEL->inserttrnsinfo($data);
        }



        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/opening_balance');
        }
    }
    
    public function viewnoninvoice($id) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y/m/d');

        $data['storeInfo'] = $this->DASHBOARDMODEL->storeInfo();
        
        $data['viewcompanyinfo'] = $this->DASHBOARDMODEL->noninvoicecompany($id);
        
        $data['viewbankstatementinfo'] = $this->DASHBOARDMODEL->noninvoice($id);

        $data['dashboardContent'] = $this->load->view('dashboard/printviewnoninvoice', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertnoninvbl() {
        $data = array();
        $dt = new DateTime();
        
        $transid = $dt->format('ymdHis');

        $data['trans_id'] = $transid;
        $data['tr_type'] = 8;
        $data['tr_method'] = $this->input->post('method');
        $data['rec_no'] = $this->input->post('rec_no');
        $data['non_c_id'] = $this->input->post('non_c_id');
        $data['tr_note'] = $this->input->post('tr_note');
        if ($this->input->post('tr_method') == 'Cash') {
            $data['b_id'] = 0;
            $data['chq_no'] = '';
        } else {
            $data['b_id'] = $this->input->post('b_id');
            $data['chq_no'] = $this->input->post('chq_no');
        }

        $data['tr_amount'] = $this->input->post('tr_amount');
        $data['tr_date'] = $this->input->post('tr_date');
        $data['tr_by'] = $this->session->userdata('epos_user_name');

        $result = $this->DASHBOARDMODEL->inserttrnsinfo($data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewnoninvoice/$transid");
        } else {
            $failed = "Non Invoice Income not Added.";
            $this->session->set_flashdata('success', $failed);
            redirect('dashboardcontroller/opening_balance');
        }
    }
    
    
    public function updatenoninvbl() {
        $data = array();
        $dt = new DateTime();
        
        $transid = $this->input->post('trans_id');

        $data['trans_id'] = $this->input->post('trans_id');
        $data['tr_type'] = 8;
        $data['tr_method'] = $this->input->post('method');
        $data['rec_no'] = $this->input->post('rec_no');
        $data['non_c_id'] = $this->input->post('non_c_id');
        $data['tr_note'] = $this->input->post('tr_note');
        if ($this->input->post('method') == 'Cash') {
            $data['b_id'] = 0;
            $data['chq_no'] = '';
        } else {
            $data['b_id'] = $this->input->post('b_id');
            $data['chq_no'] = $this->input->post('chq_no');
        }

        $data['tr_amount'] = $this->input->post('tr_amount');
        $data['tr_date'] = $this->input->post('tr_date');
//        $data['tr_by'] = $this->session->userdata('epos_user_name');

        $result = $this->DASHBOARDMODEL->updatetrnsinfo($transid,$data);

        if ($result) {
            $success = "
				Data successfully Updated!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect("dashboardcontroller/viewnoninvoice/$transid");
        } else {
            $failed = "Non Invoice Income not Updated.";
            $this->session->set_flashdata('success', $failed);
            redirect('dashboardcontroller/opening_balance');
        }
    }
    
    
    public function deletenoninvoice($id) {
        $this->DASHBOARDMODEL->deletenoninvinfo($id);
        $success = 'Non Invoice Income Successfully Deleted!!!';
        $this->session->set_flashdata('success', $success);
        redirect('dashboardcontroller/opening_balance');
    }

    public function insertbanktocashtransfer() {
        $bdata = array();
        $cdata = array();
        $dt = new DateTime();


        $trans = $dt->format('ymdHis');

        $bdata['trans_id'] = $trans;
        $cdata['trans_id'] = $trans;

        $bdata['b_id'] = $this->input->post('bank_id');
        $cdata['b_id'] = 0;
        $bdata['tr_type'] = 4;
        $cdata['tr_type'] = 4;
        $bdata['tr_method'] = 'Bank';
        $cdata['tr_method'] = 'Cash';
        $bdata['tr_amount'] = -$this->input->post('trans_amount');
        $cdata['tr_amount'] = $this->input->post('trans_amount');
        $bdata['tr_date'] = $this->input->post('tr_date');
        $cdata['tr_date'] = $this->input->post('tr_date');
        $bdata['tr_by'] = $this->session->userdata('epos_user_name');
        $cdata['tr_by'] = $this->session->userdata('epos_user_name');


        if ($this->input->post('trans_amount') > $this->input->post('av_amount')) {
            $failed = "Invalid amount.";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/balance_transfer');
        }


        $result1 = $this->DASHBOARDMODEL->inserttrnsinfo($bdata);

        $result2 = $this->DASHBOARDMODEL->inserttrnsinfo($cdata);

        if ($result1 && $result2) {
            $success = "Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/balance_transfer');
        }
    }

    public function insertcashtobanktransfer() {
        $bdata = array();
        $cdata = array();
        $dt = new DateTime();

        $trans = $dt->format('ymdHis');

        $bdata['trans_id'] = $trans;
        $cdata['trans_id'] = $trans;

        $bdata['b_id'] = 0;
        $cdata['b_id'] = $this->input->post('bank_id');
        $bdata['tr_type'] = 5;
        $cdata['tr_type'] = 5;
        $bdata['tr_method'] = 'Cash';
        $cdata['tr_method'] = 'Bank';
        $bdata['tr_amount'] = -$this->input->post('trans_amount');
        $cdata['tr_amount'] = $this->input->post('trans_amount');
        $bdata['tr_date'] = $this->input->post('tr_date');
        $cdata['tr_date'] = $this->input->post('tr_date');
        $bdata['tr_by'] = $this->session->userdata('epos_user_name');
        $cdata['tr_by'] = $this->session->userdata('epos_user_name');

        if ($this->input->post('trans_amount') > $this->input->post('cashbalance')) {
            $failed = "Invalid amount.";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/balance_transfer');
        }

//        print_r($cdata); exit();
        $result1 = $this->DASHBOARDMODEL->inserttrnsinfo($bdata);

        $result2 = $this->DASHBOARDMODEL->inserttrnsinfo($cdata);

        if ($result1 && $result2) {
            $success = "Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/balance_transfer');
        }
    }

    public function insertbanktobanktransfer() {
        $bdata = array();
        $cdata = array();
        $dt = new DateTime();


        $trans = $dt->format('ymdHis');

        $bdata['trans_id'] = $trans;
        $cdata['trans_id'] = $trans;

        $bdata['b_id'] = $this->input->post('bank_id');
        $cdata['b_id'] = $this->input->post('bank_id2');
        $bdata['tr_type'] = 6;
        $cdata['tr_type'] = 6;
        $bdata['tr_method'] = 'Bank';
        $cdata['tr_method'] = 'Bank';
        $bdata['tr_amount'] = -$this->input->post('trans_amount');
        $cdata['tr_amount'] = $this->input->post('trans_amount');
        $bdata['tr_date'] = $this->input->post('tr_date');
        $cdata['tr_date'] = $this->input->post('tr_date');
        $bdata['tr_by'] = $this->session->userdata('epos_user_name');
        $cdata['tr_by'] = $this->session->userdata('epos_user_name');


        if ($this->input->post('bank_id') == $this->input->post('bank_id2')) {
            $failed = "Please Select different bank accounts.";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/balance_transfer');
        }


        if ($this->input->post('trans_amount') > $this->input->post('av_amount')) {
            $failed = "Invalid amount.";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/balance_transfer');
        }


        $result1 = $this->DASHBOARDMODEL->inserttrnsinfo($bdata);

        $result2 = $this->DASHBOARDMODEL->inserttrnsinfo($cdata);

        if ($result1 && $result2) {
            $success = "Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/balance_transfer');
        }
    }

    public function addstoreinfo() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/addstoreinfo', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertstoreinfo() {
        $data = array();
        $data['company_info'] = $this->input->post('company_info');

        $result = $this->DASHBOARDMODEL->insertstoreinfo($data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/addstoreinfo');
        }
    }

    public function viewstoreinfo() {
        $data = array();
        $data['viewstoreinfo'] = $this->DASHBOARDMODEL->viewstoreinfo();
        $data['dashboardContent'] = $this->load->view('dashboard/viewstoreinfo', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function deletestoreinfo($id) {
        $this->DASHBOARDMODEL->deletestoreinfo($id);
        $success = 'Deleted Store Info Successfully !!!';
        $this->session->set_flashdata('success', $success);
        redirect('dashboardcontroller/viewstoreinfo');
    }

    public function addvatrate() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/addvatrate', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertvat() {
        $data = array();
        $data['vat_rate'] = $this->input->post('vat_rate');

        $result = $this->DASHBOARDMODEL->insertvat($data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/addvatrate');
        }
    }

    public function viewvatinfo() {
        $data = array();
        $data['viewvatinfo'] = $this->DASHBOARDMODEL->viewvatinfo();
        $data['dashboardContent'] = $this->load->view('dashboard/viewvatinfo', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function deletevatinfo($id) {
        $this->DASHBOARDMODEL->deletevatinfo($id);
        $success = 'Deleted Store Info Successfully !!!';
        $this->session->set_flashdata('success', $success);
        redirect('dashboardcontroller/viewvatinfo');
    }

    public function addcurrencyinfo() {
        $data = array();
        $data['querycurrencytag'] = $this->DASHBOARDMODEL->querycurrencytag();
        $data['dashboardContent'] = $this->load->view('dashboard/addcurrencyinfo', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertcurrencyinfo() {
        $data = array();
        $data['currency_tag'] = $this->input->post('currency_tag');

        if (empty($data['currency_tag'])) {
            $failed = "
				Please enter Currency Sign!<br>
				";
            $this->session->set_flashdata('failed', $failed);
            redirect('dashboardcontroller/addcurrencyinfo');
        }

        $result = $this->DASHBOARDMODEL->insertcurrencyinfo($data);

        if ($result) {
            $success = "
				Data successfully inserted!<br>
				";
            $this->session->set_flashdata('success', $success);
            redirect('dashboardcontroller/addcurrencyinfo');
        }
    }

    public function viewdashboarddata($type) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y-m-d');
        $today = $dt->format('Y/m/d');
        $year = $dt->format('Y');
        $month = $dt->format('m');
        $first_date = $year . "/" . $month . "/" . "01";
        $last_date = $year . "/" . $month . "/" . "31";

        $data['first_date'] = $first_date;
        $data['last_date'] = $last_date;

        $data['type'] = $type;


        $data['querytotalinvoicehistory'] = $this->DASHBOARDMODEL->querytotalinvoicehistory($first_date, $last_date);
        print $this->load->view('dashboard/viewdashboarddata', $data, TRUE);
    }

    public function viewdashboarddata2($type) {
        $data = array();
        $dt = new DateTime();
        $data['current_date'] = $dt->format('Y-m-d');
        $today = $dt->format('Y/m/d');
        $year = $dt->format('Y');
        $month = $dt->format('m');

        $first_date = $year . "/" . $month . "/" . "01";
        $last_date = $year . "/" . $month . "/" . "31";

        $data['first_date'] = $first_date;
        $data['last_date'] = $last_date;
        $data['type'] = $type;
        $data['querytotalinvoicehistory'] = $this->DASHBOARDMODEL->querytotalinvoicehistory2();
        print $this->load->view('dashboard/viewdashboarddata', $data, TRUE);
    }

}
