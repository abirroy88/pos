<?php
$success = $this->session->flashdata('success');
if ($success) {
    ?>	
    <div class="box box-info">
        <div class="box-body">
            <div class="callout callout-info">
                <?php
                echo $success;
                ?>
            </div>
        </div><!-- /.box-body -->
    </div>
    <?php
}
?>
<?php
$failed = $this->session->flashdata('failed');
if ($failed) {
    ?>	
    <div class="box box-info">
        <div class="box-body">
            <div class="callout callout-warning">
                <?php
                echo $failed;
                ?>
            </div>
        </div><!-- /.box-body -->
    </div>
    <?php
}
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title pull-left">Clients</h3>   
        <h3 class="box-title pull-right" style="padding-right:20px;"><button class="btn btn-success" data-toggle="modal" data-target="#addHosting-modal"><i class="glyphicon glyphicon-plus"></i>Add Hosting</button> <button class="btn btn-success" data-toggle="modal" data-target="#addCustomer-modal"><i class="glyphicon glyphicon-plus"></i>Add Client</button></h3>  
    </div><!-- /.box-header -->


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th style="width:25%;">Company</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Due</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                $user_role = $this->session->userdata('abhinvoiser_1_1_role');
                foreach ($customerinvoice as $customer) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><a href="<?php echo base_url(); ?>customercontroller/customer_details/<?php echo $customer->cst_id; ?>" class=""><?php echo $customer->cst_company; ?></a></td>
                        <td><?php echo $customer->cst_email; ?></td>
                        <td><?php echo $customer->cst_mobile; ?></td>
                        <td><?php
                            if ($customer->cstdue > 0) {
                                echo $customer->cstdue;
                            } else {
                                echo '0';
                            }
                            ?></td>
                        <td><?php
                            if ($customer->statuss == 0) {
                                ?><input name="id" value="<?php echo $customer->id; ?>" type="hidden" placeholder="" class=""><a href="<?php echo base_url(); ?>customercontroller/inactivatecst/<?php echo $customer->id; ?>" id="inactivate" class="btn btn-warning btn-flat btn-xs">Inactive</a><?php
                            }
                            ?>
                            <?php
                            if ($customer->statuss == 1) {
                                ?><input name="id"  value="<?php echo $customer->id; ?>" type="hidden" placeholder="" class=""><a href="<?php echo base_url(); ?>customercontroller/activatecst/<?php echo $customer->id; ?>" id="activate" class="btn btn-success btn-flat btn-xs">Active</a><?php
                            }
                            ?></td>

                        <td>
                            <div class="options btn-group">

                                <a style="color: #008d4c;"  href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa fa-cog"></i>
                                    Options                  </a>
                                <ul class="dropdown-menu">

                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <?php //if ($customer->icstid != '') { ?>
                                                <a href="<?php echo base_url(); ?>customercontroller/customer_details/<?php echo $customer->cst_id; ?>" class="btn btn-info btn-xs btn-flat"><i class="fa fa-file-text fa-margin"></i> View Client</a>
                                                <!--<a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#historyCustomer-modal-<?php //echo $customer->cst_id;        ?>"><i class="fa fa-eye fa-margin"></i> View</a>-->
                                                <?php
                                                //} else {
                                                //}
                                                ?>
                                            </li>
                                            <?php if ($user_role == "super_admin" || $user_role == "superadmin") { ?> 
                                            <li>
                                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editCustomer-modal-<?php echo $customer->id; ?>"><i class="fa fa-file-text fa-margin"></i> Edit Client</a>
                                            <!--  onclick="edit_customer(<?php //echo $customer->id;  ?>)" -->
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>billingcontroller/createinvoice" class="btn btn-info btn-xs btn-flat"><i class="fa fa-file-text fa-margin"></i> Create Invoice</a>
                                            </li>

                                            <?php if ($user_role == "super_admin" || $user_role == "superadmin") { ?> 
                                            <li>                                                
                                                    <a href="<?php echo base_url(); ?>customercontroller/deletecustomerbyid/<?php echo $customer->cst_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();"><i class="fa fa-trash-o fa-margin"></i> Delete Client</a>
                                               
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>

                            </div>






                            <div class="modal fade" id="historyCustomer-modal-<?php echo $customer->cst_id; ?>" tabindex="-<?php echo $customer->cst_id; ?>" role="dialog" aria-labelledby="historyCustomerLabel-<?php echo $customer->cst_id; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" style=" color: #478500;"><!--<i class="fa fa-envelope-o"></i>--><?php echo $customer->cst_company; ?></h4>
                                            <h6>Payment History</h6>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" name="form">
                                                <table class="table table-responsive" id="tblGrid">
                                                    <thead id="tblHead">
                                                        <tr>
                                                            <th>Invoice Id</th>
                                                            <th>Invoice Date</th>
                                                            <th>Due Date</th>
                                                            <th>Net</th>
                                                            <th>Paid</th>
                                                            <th>Due</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $CI = & get_instance('customercontroller');
                                                        $CI->load->model('customermodel');
                                                        $result = $CI->customermodel->querycstreportbydaterange($customer->cst_id);

                                                        foreach ($result as $querysalesreport) {
                                                            ?>

                                                            <tr>
                                                                <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $querysalesreport->invoice_id; ?>"><?php echo $querysalesreport->invoice_id; ?> </a></td>
                                                                <td><?php echo $querysalesreport->invoice_date; ?></td>
                                                                <td><?php echo $querysalesreport->due_date; ?></td>        
                                                                <td><?php echo $querysalesreport->net_total; ?></td>
                                                                <td><?php echo $querysalesreport->net_total - $querysalesreport->due_amount; ?></td>
                                                                <td><?php echo $querysalesreport->due_amount; ?></td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                </table>


                                                <div class="modal-footer clearfix">
                                                    <button type="button" class="btn btn-danger btn-xs btn-flat pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>          

               <!-- COMPOSE MESSAGE MODAL -->
                <div class="modal fade" id="editCustomer-modal-<?php echo $customer->id; ?>" tabindex="-<?php echo $customer->id; ?>" role="dialog" aria-labelledby="editCustomerLabel-<?php echo $customer->id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Update Client</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url(); ?>customercontroller/updatecustomer" method="post" id="form">


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>ID</label>
                                                <input type="text" class="form-control" placeholder="" name="cst_id" id="cst_id" value="<?php echo $customer->cst_id; ?>" readonly>
                                            </div> 
                                            <div class="col-md-6">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="" name="cst_name" id="cst_name" value="<?php echo $customer->cst_name; ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Company</label>
                                                <input type="text" class="form-control" placeholder="" name="cst_company" id="cst_company" value="<?php echo $customer->cst_company; ?>">
                                            </div> 
                                            <div class="col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control" placeholder="" name="cst_email" id="cst_email" value="<?php echo $customer->cst_email; ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" placeholder="" name="cst_mobile" id="cst_mobile" value="<?php echo $customer->cst_mobile; ?>">
                                            </div> 
                                            <div class="col-md-6">
                                                <label>Date</label>
                                                <div class="dynamic_date">
                                                    <input type="text" id="cst_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="cst_date" value="<?php echo $customer->cst_date; ?>">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Source</label>
                                                <select name="src_id" id="src_id" class="form-control" required>
                                                    <option value="<?php echo $customer->src_id; ?>"><?php echo $customer->src_name; ?></option>
                                                    <?php
                                                    foreach ($source_name as $source) {
                                                        ?>
                                                        <option value="<?php echo $source->id; ?>"><?php echo $source->src_name; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Address</label>
                                                <textarea name="cst_address" placeholder="" rows="3" id="cst_address" class="form-control"><?php echo $customer->cst_address; ?></textarea>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="modal-footer clearfix">
                                        <button type="submit" class="btn btn-sm btn-primary"><!--<i class="fa fa-envelope"></i>-->Update</button>
                                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>                
                                    </div>  

                                </form>

                            </div>                           
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                <?php
                $si++;
            }
            ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>


<!-- page script -->
<div class="modal fade" id="addHosting-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Hosting Details</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>customercontroller/inserthosting" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-3">Client<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="cst_id" id="cst_id" class="form-control" required>
                                <option value="">Select Client</option>
                                <?php
                                foreach ($customer_name as $customer) {
                                    ?>
                                    <option value="<?php echo $customer->cst_id; ?>"><?php echo $customer->cst_company; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Domain<sup>*</sup></label>
                        <div class="col-md-5">
                            <input name="d_name" type="text" class="form-control" id="d_name" placeholder="Domain Name" value="" required>


                        </div>
                        <div class="col-md-2 radio">
                            <label>
                                <input type="radio" name="d_owner" id="optionsRadios1" value="0">
                                Own
                            </label>
                        </div>
                        <div class="col-md-2 radio">
                            <label>
                                <input type="radio" name="d_owner" id="optionsRadios2" value="1">
                                Others
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Domain Price</label>
                        <div class="col-md-9">
                            <input name="d_price" type="text" class="form-control" id="d_price" placeholder="Amount" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Hosting<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="h_space" type="text" class="form-control" id="h_space" placeholder="Hosting Space" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Hosting Price<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="h_price" type="text" class="form-control" id="h_price" placeholder="Amount" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Server<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="srv_id" id="srv_id" class="form-control" required>
                                <option value="">Select Server</option>
                                <?php
                                foreach ($server_name as $server) {
                                    ?>
                                    <option value="<?php echo $server->id; ?>"><?php echo $server->srv_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Reg Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="reg_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="reg_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Exp Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="exp_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="exp_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">User Name<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="user_name" type="text" class="form-control" id="user_name" placeholder="User Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Note</label>
                        <div class="col-md-9">
                            <textarea name="note" placeholder="Note....." rows="3" id="c_address" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Save</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- page script -->
<div class="modal fade" id="addCustomer-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Client</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>customercontroller/insertcustomer" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-3">ID<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="c_id" type="text" class="form-control" id="c_id" placeholder="Customer ID" value="<?php echo '224.' . $current_date_my . '.' . $randomSerialNUmber; ?>">
                            <!--<input name="firstName" placeholder="First Name" class="form-control" type="text">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md-9">
                            <input name="c_name" type="text" class="form-control" id="c_name" placeholder="Name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Company<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="c_company" type="text" class="form-control" id="c_company" placeholder="Company" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="c_email" type="text" class="form-control" id="c_email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Mobile<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="c_mobile" type="text" class="form-control" id="c_mobile" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Date</label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="c_date1" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="c_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Source<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="src_id" id="src_id" class="form-control" required>
                                <option value="">Select Source</option>
                                <?php
                                foreach ($source_name as $source) {
                                    ?>
                                    <option value="<?php echo $source->id; ?>"><?php echo $source->src_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <textarea name="c_address" placeholder="Address....." rows="3" id="c_address" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Save</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

                                                function checkadd() {
                                                    var chk = confirm("Are you sure to add this record ?");
                                                    if (chk) {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                    ;
                                                }

                                                function checkdel() {
                                                    var chk = confirm("Are you sure to delete this record ?");
                                                    if (chk) {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                    ;
                                                }

</script>						 