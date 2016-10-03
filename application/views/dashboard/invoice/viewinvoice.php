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
    </br>
    <div class="col-md-8 col-md-offset-4">
        <form  method="post" name="form" action="<?php echo base_url(); ?>billingcontroller/viewinvoice" method="post">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <select class="form-control select" name="month" id="month">
                            <option selected="selected" value="<?php //echo $month;   ?>">---Select Month---</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
            </div> 

            <div class="col-md-2">
                <button type="submit" name="submit" value="submit" id="btn-primary" class="btn btn-success btn-sm btn-flat">Search</button>
            </div>
        </form>
    </div>
    <!--<div class="box-header">
        <h3 class="box-title">Invoices</h3>                                    
    </div>-->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Invoice NO</th>
                    <th>Invoice Date</th>
                    <th style="width:30%;">Client</th>
                    <th>Mobile No</th>
                    <th>Net Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $role = $this->session->userdata('abhinvoiser_1_1_role');
                $sl = 1;
                foreach ($queryinvoice as $invoice) {

                    $ss = $invoice->paid_amount + $invoice->due_amount;
                    if ($invoice->status == 0) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $invoice->invoice_id; ?></td>
                            <td><?php echo $invoice->invoice_date; ?></td>
                            <td><?php echo $invoice->cst_company; ?></td>
                            <td><?php echo $invoice->cst_mobile; ?></td>
                            <td><?php echo $invoice->net_total; ?></td>
                            <td><?php 
                            if($invoice->due_amount==0){
                                echo 'Paid'; 
                            }elseif($invoice->net_total > $invoice->due_amount && $invoice->due_amount !==0){
                                echo 'Partial Paid';
                            }elseif($invoice->net_total == $invoice->due_amount){
                                echo 'Unpaid';
                            }
                            
                            
                            ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoice->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">View</a> 
                                <?php
                                if ($role == "super_admin" || $role == "superadmin" || $role == "admin") {
                                    if ($ss == $invoice->net_total) {
                                        ?>
                                        <a href="<?php echo base_url(); ?>billingcontroller/editinvoicebyinvoiceid/<?php echo $invoice->invoice_id; ?>" class="btn btn-info btn-xs btn-flat">Edit</a>
                                        <?php
                                    }

                                    if ($ss == $invoice->net_total) {
                                        ?>
                                        <a href="<?php echo base_url(); ?>billingcontroller/deleteinvoicebyinvoiceid/<?php echo $invoice->invoice_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkadd();">Delete</a>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                if ($invoice->due_amount > 0) {
                                    if ($invoice->due_amount != $invoice->net_total) {
                                        ?>   
                                        <a class="btn btn-vk btn-flat btn-xs"  data-toggle="modal" data-target="#editInvoice-modal-<?php echo $invoice->id; ?>">Refund</a>
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>

                    <!-- COMPOSE MESSAGE MODAL -->
                <div class="modal fade" id="editInvoice-modal-<?php echo $invoice->id; ?>" tabindex="-<?php echo $invoice->id; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $invoice->id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Invoice Refund</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url(); ?>billingcontroller/refund" method="post" class="form-horizontal">
                                    <input type="hidden" value="<?php echo $invoice->cst_id; ?>" name="cst_id"/> 
                                    <input type="hidden" value="<?php echo $invoice->invoice_id; ?>" name="invoice_id"/> 
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!--<div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                 <label class="control-label">Method<sup>*</sup></label>
                                             </div>
                                             <div class="col-md-8" style="padding-bottom: 10px;">
                                                 <select name="method" id="" class="form-control method" required>
                                                     <option value="">Select</option>
                                                     <option value="Cash">Cash</option>
                                                     <option value="Bank">Bank</option>

                                                 </select>
                                             </div>-->

                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Accounts<sup>*</sup></label>
                                            </div>
                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                <select name="ref_bank_id" id="" class="form-control ref_bank_id">
                                                    <option value="">Select Account</option>
                                                    <?php foreach ($bank_details as $bank) { ?>
                                                        <option value="<?php echo $bank->id; ?>"><?php echo $bank->b_acc_name; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Cheque No.</label>
                                            </div>
                                            <div class="col-md-8" style="padding-bottom: 10px;">                                
                                                <input name="ref_chq_no" type="text" class="form-control" placeholder="Cheque No.">
                                            </div>
                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Receipt/Trans No</label>
                                            </div>
                                            <div class="col-md-8" style="padding-bottom: 10px;">                                
                                                <input name="ref_rec_no" type="text" class="form-control" placeholder="Receipt/Trans No">
                                            </div>
                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Available Balance</label>
                                            </div>
                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                <input name="av_balance" readonly type="text" class="form-control av_balance" value="0" placeholder="">
                                            </div>
                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Amount<sup>*</sup></label>
                                            </div>
                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                <?php $CI = & get_instance('billingcontroller');
                                                            $CI->load->model('invoicemodel');
                                                            $result1 = $CI->invoicemodel->ttldiscount($invoice->invoice_id);?>
                                                <input name="ref_amount" type="text" class="form-control" placeholder="" value="<?php echo $invoice->net_total - $invoice->due_amount-$result1->ttldiscount; ?>" readonly="">
                                            </div>

                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Date</label>
                                            </div>
                                            <div class="">
                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                    <input name="ref_date" id="" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                <label class="control-label">Note</label>
                                            </div>
                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                <textarea name="ref_note" placeholder="" rows="2" id="" class="form-control"></textarea>
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

                <?php
                $sl++;
            }
            ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>



<!-- page script -->

<script type="text/javascript">

//    $(function () {
//        $(".method").change(function () {
//            var method = $(this).val();
//            $('.ref_bank_id')
//                    .find('option')
//                    .remove()
//                    .end()
//                    .append('<option value="">Select Bank</option>')
//                    ;
//            $.ajax({
//                type: "POST",
//                url: "<?php echo base_url(); ?>billingcontroller/getbankdetails/",
//                data: 'method=' + method,
//                dataType: 'json',
//                success: function (data) {
//                    for (var i = 0; i < data.length; i++) {
//                        var opt = $('<option />'); // here we're creating a new select option for each group
//                        opt.val(data[i].id);
//                        opt.text(data[i].b_acc_name);
//                        $('.ref_bank_id').append(opt);
//                    }
//                }
//            });
//
//            $.ajax({
//                type: "POST",
//                url: "<?php echo base_url(); ?>billingcontroller/getrefttlavbalance/",
//                data: 'method=' + method,
//                dataType: 'json',
//                success: function (data) {
//                    $('.av_balance').val(data.ttlbalance);
//                }
//            });
//        });
//    });

    $(function () {
        $(".ref_bank_id").change(function () {
            var ref_bank_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>billingcontroller/getrefbankavailable/",
                data: 'ref_bank_id=' + ref_bank_id,
                dataType: 'json',
                success: function (data) {
                    $('.av_balance').val(data.bavbalance);
                }
            });
        });
    });

    function checkadd() {
        var chk = confirm("Are you sure to delete this record ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
        ;
    }

</script>						 			 



