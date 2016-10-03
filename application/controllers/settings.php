<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('setmodel', 'SETMODEL', TRUE);
//        $this->load->helper(array('form', 'url'));

        $id = $this->session->userdata('abhinvoiser_1_1_user_id');
        if (empty($id)) {
            redirect("authenticationcontroller");
        }
    }

    public function index() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/setdashboard', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function shop() {
        $data = array();
        $data['salestax'] = $this->SETMODEL->viewtaxclass();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/shop_details', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertshop() {
        
         if(!empty($_FILES['logo_url']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['logo_url'] = $picture;
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['sales_tax'] = $this->input->post('sales_tax');
        $data['fax'] = $this->input->post('fax');
        $data['time_zone'] = $this->input->post('time_zone');
        $data['website'] = $this->input->post('website');
        $data['address_1'] = $this->input->post('address_1');
        $data['address_2'] = $this->input->post('address_2');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['zip'] = $this->input->post('zip');
        $data['country'] = $this->input->post('country');
        $data['mobile'] = $this->input->post('mobile');
        $data['vat_reg_no'] = $this->input->post('vat_reg_no');        
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->insertshop($data);
        if ($result) {
            $success = "Shop successfully inserted!<br>";
            //Name : $name<br>
            //Rate : $rate<br>
            $this->session->set_flashdata('success', $success);
            redirect('settings/shop');
        }
    }

    public function employee() {
        $data = array();
//        $data['itemlist'] = $this->SETMODEL->itemlist();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/employee', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function employee_details() {
        $data = array();
//        $data['itemlist'] = $this->SETMODEL->itemlist();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/employee_details', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function discount() {
        $data = array();
        $data['viewdiscount'] = $this->SETMODEL->viewdiscount();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/discount', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertdiscount() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['rate'] = $this->input->post('rate');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->insertdiscount($data);
        if ($result) {
            $success = "Discount successfully inserted!<br>";
            //Name : $name<br>
            //Rate : $rate<br>
            $this->session->set_flashdata('success', $success);
            redirect('settings/discount');
        }
    }

    public function editdiscount() {
        $data = array();
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['rate'] = $this->input->post('rate');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->updatediscount($data);
//        }
        $result = $this->SETMODEL->updatediscount($id, $data);
        if ($result) {
            $success = "Discount successfully Updated!<br>";
            //Name : $name<br>
            //Rate : $rate<br>
            $this->session->set_flashdata('success', $success);
            redirect('settings/discount');
        }
    }

    public function deletediscount($id = Null) {

//        $result = $this->SETMODEL->ck_dis_existing($id);
//        if ($result) {
        $invoice = $this->SETMODEL->deletediscountbyid($id);

        $success = "Discount Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("settings/discount");
//        } else {
//            $failed = "Can't Delete ! this Discount already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/discount/$id");
//        }
    }

    public function category() {
        $data = array();
        $data['category'] = $this->SETMODEL->viewcat();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/category', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertcat() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->insertcat($data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('settings/category');
//        }
    }

    public function cat_details($id) {
        $data = array();
        $data['cat_details_by_id'] = $this->SETMODEL->cat_details_by_id($id);
        $data['name'] = $this->SETMODEL->cat_name($id);
        $data['parent'] = $this->SETMODEL->cat_name($data['name']->parent_id);
//        print_r($data['name']->parent_id); exit();
        $data['cat_details_by_parent'] = $this->SETMODEL->cat_details_by_parent($id);
        $data['dashboardContent'] = $this->load->view('dashboard/settings/cat_details', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertsubcat() {
        $data = array();
        $data['parent_id'] = $this->input->post('parent_id');
        $data['name'] = $this->input->post('name');
        $data['status'] = 1;
        $id = $this->input->post('parent_id');
//        echo $this->input->post('parent_id'); exit();
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->insertcat($data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect("settings/cat_details/$id");
//        }
    }

    public function updatecat() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['status'] = 1;
        $id = $this->input->post('id');
//        echo $this->input->post('parent_id'); exit();
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->updatecat($id, $data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect("settings/cat_details/$id");
//        }
    }

    public function deletecategory($id = Null) {

        $invoice = $this->SETMODEL->deletecatbyid($id);
        $success = "Category Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("settings/category");
    }

    public function taxclass() {
        $data = array();
        $data['viewtaxclass'] = $this->SETMODEL->viewtaxclass();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/taxclass', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function inserttaxclass() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['rate'] = $this->input->post('rate');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->inserttaxclass($data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('settings/taxclass');
//        }
    }

    public function edittaxclass() {
        $data = array();
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['rate'] = $this->input->post('rate');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->updatetaxclass($data);
//        }
        $result = $this->SETMODEL->updatetaxclass($id, $data);
        if ($result) {
            $success = "Taxclass successfully Updated!<br>";
            //Name : $name<br>
            //Rate : $rate<br>
            $this->session->set_flashdata('success', $success);
            redirect('settings/taxclass');
        }
    }

    public function deletetaxclass($id = Null) {

//        $result = $this->SETMODEL->ck_tax_existing($id);
//        if ($result) {
        $invoice = $this->SETMODEL->deletetaxclassbyid($id);

        $success = "Taxclass Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("settings/taxclass");
//        } else {
//            $failed = "Can't Delete ! this Discount already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/discount/$id");
//        }
    }

    public function paymenttype() {
        $data = array();
        $data['viewpaymenttype'] = $this->SETMODEL->viewpaymenttype();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/payment_type', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertpaymenttype() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->insertpaymenttype($data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('settings/paymenttype');
//        }
    }

    public function editpaymenttype() {
        $data = array();
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->updatepaymenttype($data, $id);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('settings/paymenttype');
//        }
    }

    public function deletepaymenttype($id = Null) {

//        $result = $this->INVENTORYMODEL->ck_ven_existing($id);
//        if ($result) {
        $invoice = $this->SETMODEL->deletepaymenttypebyid($id);

        $success = "Payment Type Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("settings/paymenttype");
//        } else {
//            $failed = "Can't Delete ! this Vendor already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("inventory/editvendor/$id");
//        }
    }

    public function pricingrule() {
        $data = array();
        $data['viewpricingrule'] = $this->SETMODEL->viewpricingrule();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/pricing_rule', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertpricingrule() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['percent'] = $this->input->post('percent');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->insertdiscount($data);
//        }
        $result = $this->SETMODEL->insertpricingrule($data);
        if ($result) {
            $success = "Pricing Rule successfully inserted!<br>";
            //Name : $name<br>
            //Rate : $rate<br>
            $this->session->set_flashdata('success', $success);
            redirect('settings/pricingrule');
        }
    }

    public function editpricingrule() {
        $data = array();
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['percent'] = $this->input->post('percent');
        $data['status'] = 1;
//        $duplicate = $this->SETMODEL->duplicateItemChecker($data['name'], $data['rate']);
//
//        if ($duplicate == TRUE) {
//            $failed = "Please enter Unique Item Name, Code, Supplier Name";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/updateitem/$id");
//        } else {
//            $result = $this->SETMODEL->updatediscount($data);
//        }
        $result = $this->SETMODEL->updatepricingrule($id, $data);
        if ($result) {
            $success = "Pricing Rule successfully Updated!<br>";
            //Name : $name<br>
            //Rate : $rate<br>
            $this->session->set_flashdata('success', $success);
            redirect('settings/pricingrule');
        }
    }

    public function deletepricingrule($id = Null) {

//        $result = $this->SETMODEL->ck_dis_existing($id);
//        if ($result) {
        $invoice = $this->SETMODEL->deletepricingrulebyid($id);

        $success = "Pricing Rule Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("settings/pricingrule");
//        } else {
//            $failed = "Can't Delete ! this Discount already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("settings/discount/$id");
//        }
    }

    public function employeeroles() {
        $data = array();
        $data['viewrolegroup'] = $this->SETMODEL->viewrolegroup();
        $data['dashboardContent'] = $this->load->view('dashboard/settings/employee_roles', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function employeeaccess($id) {
        $data = array();
        $data['id'] = $id;
        $data['rolegroupname'] = $this->SETMODEL->viewrolegroupname($id);
        $data['cat_details_by_parent'] = $this->SETMODEL->cat_details_by_parent(1);
        $data['dashboardContent'] = $this->load->view('dashboard/settings/employee_access_roles', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

}
