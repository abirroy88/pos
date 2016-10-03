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
<div class="row">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Details</a></li>
                <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Invoice</a></li>
                <li><a href="#settings" data-toggle="tab">Payments</a></li>
                <li><a href="#hosting" data-toggle="tab">Hosting</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="activity">
                    </br>
                    <div class="row">
                        <div class="col-xs-4 col-md-offset-1 table-responsive">
                            <table id="example" class="table table-bordered table-striped">

                                <tbody>
                                    <?php
                                    foreach ($querycstdetails as $cst) {
                                        ?>
                                        <tr>
                                            <th colspan="2"><?php echo $cst->cst_company; ?></th>

                                        </tr>
                                        <tr>
                                            <td>Client ID</td>
                                            <td><?php echo $cst->cst_id; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $cst->cst_name; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $cst->cst_email; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td><?php echo $cst->cst_mobile; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo $cst->cst_address; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td><?php echo $cst->cst_date; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Source</td>
                                            <td><?php echo $cst->src_name; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><?php
                                                if ($cst->statuss == 0) {
                                                    echo 'Active';
                                                } else {
                                                    echo 'Inactive';
                                                }
                                                ?></td>                                           
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <div class="col-xs-4 col-md-offset-1 table-responsive">
                            <table id="example" class="table table-bordered table-striped">

                                <tbody>
                                    <?php
                                    foreach ($customerinvoicebyid as $customer) {
                                        ?>
                                        <tr>
                                            <th colspan="2">Payments</th>

                                        </tr>
                                        <tr>
                                            <td>Total Billed</td>
                                            <td><?php echo $customer->cstnet; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Total Paid</td>
                                            <td><?php echo $customer->cstnet - $customer->cstdue; ?></td>                                           
                                        </tr>
                                        <tr>
                                            <td>Total Balance</td>
                                            <td><?php echo $customer->cstdue; ?></td>                                           
                                        </tr>


                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Client</th>
                                        <th>Invoice Date</th>
                                        <th>Due Date</th>
                                        <th>Net Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 1;
                                    foreach ($querytotalinvoicehistory as $invoices) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->cst_company; ?></a></td>
                                            <td><?php echo $invoices->invoice_date; ?></td>
                                            <td><?php echo $invoices->due_date; ?></td>
                                            <td><?php echo $invoices->net_total; ?></td>
                                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                                            <td><?php echo $invoices->due_amount; ?></td>
                                            <td>
                                                <?php if ($invoices->due_amount > 0) { ?>
                                                    <a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success  btn-xs btn-flat">Add Payment</a> </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                        $sl++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Payment Date</th>
                                        <th>Invoice Date</th>
                                        <th>Invoice No</th>
                                        <th>Client</th>
                                        <th>Amount</th>                                        
                                        <th>Method</th>
                                        <th>Note</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 1;
                                    foreach ($queryinvoicepaymenthistory as $singlepaymenthistory) {
                                        $amt = $singlepaymenthistory->first_payment + $singlepaymenthistory->pay_discount;
                                        if ($singlepaymenthistory->first_payment > 0) {
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><a href="<?php echo base_url(); ?>billingcontroller/printsingleinvoice/<?php echo $singlepaymenthistory->invoice_id . '-' . $singlepaymenthistory->trans_id; ?>"><?php echo $singlepaymenthistory->payment_date; ?></a></td>
                                                <td><?php echo $singlepaymenthistory->invoice_date; ?></td>
                                                <td><?php echo $singlepaymenthistory->invoice_id; ?></td>
                                                <td><?php echo $singlepaymenthistory->cst_company; ?></td>
                                                <td><?php echo $singlepaymenthistory->first_payment; ?></td>
                                                <td><?php echo $singlepaymenthistory->method; ?></td>
                                                <td><?php echo $singlepaymenthistory->pay_note; ?></td>
                                                <td>
                                                <?php 
                                                $user_role = $this->session->userdata('abhinvoiser_1_1_role');
                                                if ($user_role == "super_admin") { ?>    
                                                    
                                                    <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editPayment-modal-<?php echo $singlepaymenthistory->trans_id; ?>"><i class="fa fa-edit fa-margin"></i> Edit</a>


                                                    <div class="modal fade" id="editPayment-modal-<?php echo $singlepaymenthistory->trans_id; ?>" tabindex="-<?php echo $singlepaymenthistory->trans_id; ?>" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Edit Payment</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo base_url(); ?>customercontroller/updatepaymentofduebyinvoiceid" method="post" class="form-horizontal">
                                                                        <input type="hidden" value="<?php echo $singlepaymenthistory->trans_id; ?>" name="trans_id"/> 
                                                                        <input type="hidden" value="<?php echo $singlepaymenthistory->invoice_id; ?>" name="invoice_id"/> 
                                                                        <input type="hidden" value="<?php echo $singlepaymenthistory->cst_id; ?>" name="cst_id"/>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Due Remaining:</label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                    <input name="balance" readonly type="text" class="form-control" placeholder="" value="<?php echo $singlepaymenthistory->due_amount + $singlepaymenthistory->first_payment + $singlepaymenthistory->pay_discount; ?>">
                                                                                </div>

                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Method<sup>*</sup></label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                    <select name="method" id="method" class="form-control method" required>
                                                                                        <option value="<?php echo $singlepaymenthistory->method; ?>"><?php echo $singlepaymenthistory->method; ?></option>
                                                                                        <?php if ($singlepaymenthistory->method == 'Bank') { ?>
                                                                                            <option value="Cash">Cash</option>
                                                                                        <?php } else { ?>
                                                                                            <option value="Bank">Bank</option>
                                                                                        <?php } ?> 

                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Bank<sup>*</sup></label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                    <select name="bid" id="bid" class="form-control exp_bank_id">
                                                                                        <?php if ($singlepaymenthistory->method == 'Bank') { ?>
                                                                                            <option value="<?php echo $singlepaymenthistory->bank_id; ?>"><?php echo $singlepaymenthistory->b_name . ' ,' . $singlepaymenthistory->acc_no; ?></option>
                                                                                        <?php } else { ?>
                                                                                            <option value="">Select Bank</option>
                                                                                        <?php } ?>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Cheque No.</label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">                                
                                                                                    <input name="chq_no" type="text" class="form-control" placeholder="Cheque No." value="<?php echo $singlepaymenthistory->chq_no; ?>">
                                                                                </div>
                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Receipt/Trans No</label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">                                
                                                                                    <input name="rec_no" type="text" class="form-control" placeholder="Receipt/Trans No" value="<?php echo $singlepaymenthistory->rec_no; ?>">
                                                                                </div>

                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Amount<sup>*</sup></label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                    <input name="first_payment" type="text" class="form-control" placeholder="Add Amount" value="<?php echo $singlepaymenthistory->first_payment; ?>">
                                                                                </div>

                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Discount</label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                    <input name="pay_discount" type="text" class="form-control" placeholder="Add Discount" value="<?php echo $singlepaymenthistory->pay_discount; ?>">
                                                                                </div>

                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Date</label>
                                                                                </div>
                                                                                <div class="">
                                                                                    <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                        <input name="payment_date" id="payment_date" value="<?php echo $singlepaymenthistory->payment_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control" readonly>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                                    <label class="control-label">Note</label>
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                                    <textarea name="pay_note" placeholder="" rows="2" id="pay_note" class="form-control"><?php echo $singlepaymenthistory->pay_note; ?></textarea>
                                                                                </div>
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
                                                    <a href="<?php echo base_url(); ?>customercontroller/deletetransactionbyid/<?php echo $singlepaymenthistory->invoice_id . '-' . $singlepaymenthistory->trans_id . '-' . $amt; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();"><i class="fa fa-trash-o fa-margin"></i> Delete</a>
                                                <?php }?>
                                                
                                                </td>
                                            </tr>
                                            <?php
                                            $sl++;
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->

                <div class="tab-pane" id="hosting">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Reg-Date</th>
                                        <th>Exp-Date</th>
                                        <th>Domain</th>
                                        <th>Domain Price</th>
                                        <th>Hosting</th>
                                        <th>Hosting Price</th>
                                        <th>Server</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 1;
                                    foreach ($queryhostingdetails as $hosting) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><!--<a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php //echo $hosting->id;       ?>"></a>--><?php echo $hosting->reg_date; ?></td>
                                            <td><?php echo $hosting->exp_date; ?></td>
                                            <td><?php echo $hosting->d_name; ?></td>
                                            <td><?php echo $hosting->d_price; ?></td>
                                            <td><?php echo $hosting->h_space; ?></td>
                                            <td><?php echo $hosting->h_price; ?></td>
                                            <td><?php echo $hosting->srv_name; ?></td>
                                            <td>
                                               <?php $user_role = $this->session->userdata('abhinvoiser_1_1_role');
                                                if ($user_role == "super_admin") { ?> 
                                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editHosting-modal-<?php echo $hosting->id; ?>"><i class="fa fa-edit fa-margin"></i> Edit</a><?php }?></td>

                                    <div class="modal fade" id="editHosting-modal-<?php echo $hosting->id; ?>" tabindex="-<?php echo $hosting->id; ?>" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Edit Hosting Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo base_url(); ?>customercontroller/updatehosting" method="post" class="form-horizontal">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input name="id" type="hidden" class="form-control" value="<?php echo $hosting->id; ?>">
                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Client</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <select name="cst_id" id="cst_id" class="form-control" required>
                                                                        <option value="<?php echo $hosting->cst_id; ?>"><?php echo $hosting->cst_company; ?></option>
                                                                        <?php
                                                                        foreach ($customer_name as $customer) {
                                                                            ?>
                                                                            <option value="<?php echo $customer->cst_id; ?>"><?php echo $customer->cst_company; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>                                                               
                                                                

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Domain</label>
                                                                </div>
                                                                <div class="col-md-5" style="padding-bottom: 10px;">
                                                                    <input name="d_name" type="text" class="form-control" id="d_name" placeholder="Domain Name" value="<?php echo $hosting->d_name; ?>" required>

                                                                </div>
                                                                <div class="col-md-4 radio" style="padding-bottom: 10px;">
                                                                    <label>
                                                                        <?php if($hosting->d_owner==0){?>
                                                                        <input type="radio" name="d_owner" id="optionsRadios1" value="0" checked>
                                                                        <?php }else{?>
                                                                            <input type="radio" name="d_owner" id="optionsRadios1" value="0">
                                                                        <?php }?>
                                                                        Own
                                                                    </label>
                                                                
                                                                    <label>
                                                                        <?php if($hosting->d_owner==1){?>
                                                                        <input type="radio" name="d_owner" id="optionsRadios2" value="1" checked>
                                                                        <?php }else{?>
                                                                        <input type="radio" name="d_owner" id="optionsRadios2" value="1">
                                                                        <?php }?>
                                                                        Others
                                                                    </label>
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Domain Price</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <input name="d_price" type="text" class="form-control" id="d_price" placeholder="Amount" value="<?php echo $hosting->d_price; ?>">
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Hosting</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <input name="h_space" type="text" class="form-control" id="h_space" placeholder="Hosting Space" required value="<?php echo $hosting->h_space; ?>">
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Hosting Price</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <input name="h_price" type="text" class="form-control" id="h_price" placeholder="Amount" required value="<?php echo $hosting->h_price; ?>">
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Server</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <select name="srv_id" id="srv_id" class="form-control" required>
                                                                        <option value="<?php echo $hosting->srv_id; ?>"><?php echo $hosting->srv_name; ?></option>
                                                                        <?php
                                                                        foreach ($server_name as $server) {
                                                                            ?>
                                                                            <option value="<?php echo $server->id; ?>"><?php echo $server->srv_name; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Reg Date</label>
                                                                </div>
                                                                <div class="dynamic_date">
                                                                    <div class="col-md-9" style="padding-bottom: 10px;">
                                                                        <input type="text" id="reg_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="reg_date" value="<?php echo $hosting->reg_date; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Exp Date</label>
                                                                </div>
                                                                <div class="dynamic_date">
                                                                    <div class="col-md-9" style="padding-bottom: 10px;">
                                                                        <input type="text" id="exp_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="exp_date" value="<?php echo $hosting->exp_date; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">User Name</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <input name="user_name" type="text" class="form-control" id="user_name" placeholder="User Name" required value="<?php echo $hosting->user_name; ?>">
                                                                </div>

                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Password</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <input name="password" type="text" class="form-control" id="password" placeholder="Password" required value="<?php echo $hosting->password; ?>">
                                                                </div>                                                                
                                                                <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Note</label>
                                                                </div>
                                                                <div class="col-md-9" style="padding-bottom: 10px;">
                                                                    <textarea name="note" placeholder="Note....." rows="3" id="c_address" class="form-control"><?php echo $hosting->note; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer clearfix">
                                                            <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Update</button>
                                                            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                        </div>
                                                </div>
                                                </form>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    </tr>
                                    <?php
                                    $sl++;
                                }
                                ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
    </div>
</div>



<script type="text/javascript">

    $(function () {
        $(".method").change(function () {
            var method = $(this).val();
            $('.exp_bank_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Bank</option>')
                    ;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>expensecontroller/getbankdetails/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = $('<option />'); // here we're creating a new select option for each group
                        opt.val(data[i].id);
                        opt.text(data[i].b_acc_name);
                        $('.exp_bank_id').append(opt);
                    }
                }
            });

        });
    });
    function checkadd() {
        var chk = confirm("Are you sure to add this record ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
        ;
    }

    function checkupd() {
        var chk = confirm("Are you sure to update this record ?");
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