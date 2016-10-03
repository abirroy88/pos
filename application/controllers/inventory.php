<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Inventory extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('inventorymodel', 'INVENTORYMODEL', TRUE);

        $id = $this->session->userdata('abhinvoiser_1_1_user_id');
        if (empty($id)) {
            redirect("authenticationcontroller");
        }
    }

    public function index() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/invdashboard', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

//    public function invdashboard() {
//    }

    public function searchitem() {
        $data = array();
        $data['itemlist'] = $this->INVENTORYMODEL->itemlist();
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/searchitem', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function addproduct() {
        $data = array();
        $data['category'] = $this->INVENTORYMODEL->category();
        $data['manufacturer'] = $this->INVENTORYMODEL->manufacturer();
        $data['taxclass'] = $this->INVENTORYMODEL->taxclass();
        $data['discount'] = $this->INVENTORYMODEL->discount();
        $data['vendor'] = $this->INVENTORYMODEL->vendor();
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/addproduct', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function editproduct($tr_id) {
        $data = array();
        $data['category'] = $this->INVENTORYMODEL->category();
        $data['manufacturer'] = $this->INVENTORYMODEL->manufacturer();
        $data['taxclass'] = $this->INVENTORYMODEL->taxclass();
        $data['discount'] = $this->INVENTORYMODEL->discount();
        $data['vendor'] = $this->INVENTORYMODEL->vendor();
        $data['itemdetails'] = $this->INVENTORYMODEL->itemdetails($tr_id);
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/editproduct', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function getcatname() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->INVENTORYMODEL->getcatnames($q);
        }
    }

    public function insertproduct() {
        $data = array();
        $data2 = array();
        $dt = new DateTime();
        $tr_id = $dt->format('ymdHis');
        $data['tr_id'] = $tr_id;
        $data['code'] = $this->input->post('code');
        $data['name'] = $this->input->post('name');
        $data['type_id'] = $this->input->post('type');
        $data['unit_id'] = $this->input->post('unit');
        $data['manufacture_id'] = $this->input->post('manufacture');
        $data['is_taxable'] = $this->input->post('is_taxable');
        $data['tax_class_id'] = $this->input->post('tax_calss');
        $data['is_discount_allow'] = $this->input->post('is_discount');
        $data['discount_percentage'] = $this->input->post('discount');
        $data['is_serial_required'] = $this->input->post('is_serial_required');
        $data['upc'] = $this->input->post('upc');
        $data['ean'] = $this->input->post('ean');
        $data['rack_no'] = $this->input->post('rack_no');
        $data['reorder_point'] = $this->input->post('reorder_point');
        $data['desired_inv_level'] = $this->input->post('desired_inv_level');
        $data['default_selling_price'] = $this->input->post('price');

        $data['default_buying_price'] = $this->input->post('costing');
        $data['margin'] = $this->input->post('margin');
        $data['cat_id'] = $this->input->post('cat_id');
        $data['entry_by'] = $this->session->userdata('epos_user_name');

        $data2['tr_id'] = $tr_id;
        $data2['quantity'] = $this->input->post('quantity');
        $data2['unit_cost'] = $this->input->post('costing');
        $data2['total_cost'] = $this->input->post('quantity') * $this->input->post('costing');
        $data2['vendor_id'] = $this->input->post('vendor');

//        print_r($data['is_taxable']);
//        print_r($data['is_serial_required']);
//        print_r($data['is_discount_allow']);
//
//        exit();
//		if(empty($data['item_id']) || empty($data['supplier_id']) || empty($data['first_supplied_stock']) || empty($data['purchasing_price']) || empty($data['selling_price']) ){
//			$failed = "Please enter Required files";
//			$this->session->set_flashdata('failed', $failed);
//			redirect('inventory/addinventory');
//		}

        $result = $this->INVENTORYMODEL->insertinventory($data, $data2);
//
//
//
        if ($result) {
            $success = "Data successfully inserted!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("inventory/editproduct/$tr_id");
        }
    }

    public function updateproduct($tr_id) {
        $data = array();
        $dt = new DateTime();

        $data['code'] = $this->input->post('code');
        $data['name'] = $this->input->post('name');
        $data['type_id'] = $this->input->post('type');
        $data['unit_id'] = $this->input->post('unit');
        $data['manufacture_id'] = $this->input->post('manufacture');
        $data['is_taxable'] = $this->input->post('is_taxable');
        $data['tax_class_id'] = $this->input->post('tax_calss');
        $data['is_discount_allow'] = $this->input->post('is_discount');
        $data['discount_percentage'] = $this->input->post('discount');
        $data['is_serial_required'] = $this->input->post('is_serial_required');
        $data['upc'] = $this->input->post('upc');
        $data['ean'] = $this->input->post('ean');
        $data['rack_no'] = $this->input->post('rack_no');
        $data['reorder_point'] = $this->input->post('reorder_point');
        $data['desired_inv_level'] = $this->input->post('desired_inv_level');
        $data['default_selling_price'] = $this->input->post('price');
        $data['default_buying_price'] = $this->input->post('costing');
        $data['margin'] = $this->input->post('margin');
        $data['cat_id'] = $this->input->post('cat_id');
        $data['entry_by'] = $this->session->userdata('epos_user_name');


        $data2['tr_id'] = $tr_id;
        $data2['quantity'] = $this->input->post('quantity');
        $data2['unit_cost'] = $this->input->post('costing');
        $data2['total_cost'] = $this->input->post('quantity') * $this->input->post('costing');
        $data2['vendor_id'] = $this->input->post('vendor');

//        print_r($data['is_taxable']);
//        print_r($data['is_serial_required']);
//        print_r($data['is_discount_allow']);
//
//        exit();
//		if(empty($data['item_id']) || empty($data['supplier_id']) || empty($data['first_supplied_stock']) || empty($data['purchasing_price']) || empty($data['selling_price']) ){
//			$failed = "Please enter Required files";
//			$this->session->set_flashdata('failed', $failed);
//			redirect('inventory/addinventory');
//		}

        $result = $this->INVENTORYMODEL->updateinventory($data, $data2, $tr_id);
//
//
//
        if ($result) {
            $success = "Data successfully Updated!<br>";
            $this->session->set_flashdata('success', $success);
            redirect("inventory/editproduct/$tr_id");
        }
    }

    public function deleteproduct($tr_id = Null) {

//        $result = $this->INVENTORYMODEL->ck_ven_existing($id);
//        if ($result) {
        $invoice = $this->INVENTORYMODEL->deleteproductbyid($tr_id);

        $success = "Vendor Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("inventory/searchitem");
//        } else {
//            $failed = "Can't Delete ! this product already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("inventory/editproduct/$id");
//        }
    }

    public function addmanufacturer() {
        $data = array();
        $data['viewmanufacturer'] = $this->INVENTORYMODEL->viewmanufacturer();
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/manufacturer', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertmanufacturer() {
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
        $result = $this->INVENTORYMODEL->insertmanufacturer($data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('inventory/addmanufacturer');
//        }
    }

    public function editmanufacturer() {
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
        $result = $this->INVENTORYMODEL->updatemanufacturer($data, $id);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('inventory/addmanufacturer');
//        }
    }

    public function deletmanufacturer($id = Null) {

//        $result = $this->INVENTORYMODEL->ck_ven_existing($id);
//        if ($result) {
        $invoice = $this->INVENTORYMODEL->deletemanufacturerbyid($id);

        $success = "Manufacturer Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("inventory/addmanufacturer");
//        } else {
//            $failed = "Can't Delete ! this Vendor already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("inventory/editvendor/$id");
//        }
    }

    public function viewvendor() {
        $data = array();
        $data['viewvendors'] = $this->INVENTORYMODEL->viewvendors();
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/vendor', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function addvendor() {
        $data = array();
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/addvendor', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function insertvendor() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['mobile'] = $this->input->post('mobile');
        $data['email'] = $this->input->post('email');
        $data['website'] = $this->input->post('website');
        $data['bank_name'] = $this->input->post('bank_name');
        $data['bank_ac_no'] = $this->input->post('bank_ac_no');
        $data['paypal'] = $this->input->post('paypal');
        $data['skrill'] = $this->input->post('skrill');
        $data['payza'] = $this->input->post('payza');
        $data['contact_person_name'] = $this->input->post('person_name');
        $data['contact_person_designation'] = $this->input->post('person_designation');
        $data['contact_person_email'] = $this->input->post('person_email');
        $data['contact_person_phone'] = $this->input->post('person_phone');
        $data['contact_person_mobile'] = $this->input->post('person_mobile');
        $data['address'] = $this->input->post('address');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['zip'] = $this->input->post('zip');
        $data['country'] = $this->input->post('country');
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
        $result = $this->INVENTORYMODEL->insertvendors($data);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('inventory/viewvendor');
//        }
    }

    public function editvendor($id) {
        $data = array();
        $data['editvendor'] = $this->INVENTORYMODEL->editvendor($id);
        $data['dashboardContent'] = $this->load->view('dashboard/inventory/editvendor', $data, TRUE);
        $this->load->view('dashboard/master_dashboard_panel', $data);
    }

    public function updatevendor($id) {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['mobile'] = $this->input->post('mobile');
        $data['email'] = $this->input->post('email');
        $data['website'] = $this->input->post('website');
        $data['bank_name'] = $this->input->post('bank_name');
        $data['bank_ac_no'] = $this->input->post('bank_ac_no');
        $data['paypal'] = $this->input->post('paypal');
        $data['skrill'] = $this->input->post('skrill');
        $data['payza'] = $this->input->post('payza');
        $data['contact_person_name'] = $this->input->post('person_name');
        $data['contact_person_designation'] = $this->input->post('person_designation');
        $data['contact_person_email'] = $this->input->post('person_email');
        $data['contact_person_phone'] = $this->input->post('person_phone');
        $data['contact_person_mobile'] = $this->input->post('person_mobile');
        $data['address'] = $this->input->post('address');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['zip'] = $this->input->post('zip');
        $data['country'] = $this->input->post('country');
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
        $result = $this->INVENTORYMODEL->updatevendor($data, $id);
//        if ($result) {
//            $success = "
//				Data successfully inserted!<br>
//				Item Code : $item_code<br>
//				Item Name : $item_name<br>
//				";
//            $this->session->set_flashdata('success', $success);
        redirect('inventory/viewvendor');
//        }
    }

    public function deletevendor($id = Null) {

//        $result = $this->INVENTORYMODEL->ck_ven_existing($id);
//        if ($result) {
        $invoice = $this->INVENTORYMODEL->deletevendorbyid($id);

        $success = "Vendor Deleted Successfully!<br>";
        $this->session->set_flashdata('success', $success);
        redirect("inventory/viewvendor");
//        } else {
//            $failed = "Can't Delete ! this Vendor already in use...<br>";
//            $this->session->set_flashdata('failed', $failed);
//            redirect("inventory/editvendor/$id");
//        }
    }

    public function purchaseOrder() {
      $data = array();
      $data['itemlist'] = $this->INVENTORYMODEL->itemlist();
      $data['dashboardContent'] = $this->load->view('dashboard/inventory/searchitem', $data, TRUE);
      $this->load->view('dashboard/master_dashboard_panel', $data);
    }

}
