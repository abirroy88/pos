<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Authenticationcontroller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('userauthmodel', 'USERAUTHMODEL', TRUE);
    }

    public function index() {
        $id = $this->session->userdata('abhinvoiser_1_1_user_id');
        if (!empty($id)) {
            redirect("dashboardcontroller");
        } else {
            $this->load->view('auth/login');
        }
    }

    public function checkuser() {
        $user_name = $this->input->post('name');
        $password = $this->USERAUTHMODEL->hash($this->input->post('password'));
//echo $password;
        $result = $this->USERAUTHMODEL->check_login($user_name, $password);

        /*
          echo "<pre>";
          print_r($result);
          exit();
         */

        if ($result) {
            $data = array();
            if ($result->role == "bill_collector") {
                $billcollectordata['abhinvoiser_1_1_user_id'] = $result->id;
                $billcollectordata['epos_user_name'] = $result->name;
                $billcollectordata['abhinvoiser_1_1_role'] = $result->role;
                $this->session->set_userdata($billcollectordata);
                redirect("dashboardcontroller");
            } elseif ($result->role == "accounts") {
                $accountsdata['abhinvoiser_1_1_user_id'] = $result->id;
                $accountsdata['epos_user_name'] = $result->name;
                $accountsdata['abhinvoiser_1_1_role'] = $result->role;
                $this->session->set_userdata($accountsdata);
                redirect("dashboardcontroller");
            } elseif ($result->role == "super_admin") {
                $super_admindata['abhinvoiser_1_1_user_id'] = $result->id;
                $super_admindata['epos_user_name'] = $result->name;
                $super_admindata['abhinvoiser_1_1_role'] = $result->role;
                $this->session->set_userdata($super_admindata);
                redirect("dashboardcontroller");
            }
        } else {
            $sdata = array();
            $exception = "User Email/Password Invalid!";
            $this->session->set_flashdata('exception', $exception);
            redirect("authenticationcontroller");
        }
    }

    public function userLogout() {
        //$data['abhpos_user_id'] =         $this->session->userdata('abhpos_user_id');
        //$data['abhpos_user_name'] = $this->session->userdata('abhpos_user_name');
        //$data['abhpos_role'] = $this->session->userdata('abhpos_role');
        /* echo "<pre>";
          print_r($data);
          exit(); */
        session_destroy();
        $this->session->unset_userdata('abhinvoiser_1_1_user_id');
        $this->session->unset_userdata('epos_user_name');
        $this->session->unset_userdata('abhinvoiser_1_1_role');
        $data = array();
        $data['session_destroy_message'] = 'You are successfully logout';
        $this->session->set_userdata($data);
        redirect("authenticationcontroller");
    }

}
