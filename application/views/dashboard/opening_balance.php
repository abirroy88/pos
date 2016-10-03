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

<?php $user_role = $this->session->userdata('abhinvoiser_1_1_role'); ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title pull-left">Added Balance History</h3>   
        <ul class="nav navbar-nav pull-right">
            <?php if ($user_role == "super_admin" || $user_role == "superadmin") { ?>
                <li class="custom_hover dropdown messages-menu">
                    <a style="color: #008d4c;"  href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-plus-circle"></i>
                        Add Balance                  </a>
                    <ul class="dropdown-menu">

                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href=""  data-toggle="modal" data-target="#addBank-modal">
                                        <div class="pull-left">
                                            <img src="<?php echo base_url(); ?>/assets/img/avatar3.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            Accounts
                                        </h4>
                                        <p style="color: #008d4c;">Opening Balance</p>
                                    </a>
                                </li><!-- end message -->

                                <li>
                                    <a href=""  data-toggle="modal" data-target="#addCash-modal">
                                        <div class="pull-left">
                                            <img src="<?php echo base_url(); ?>/assets/img/avatar3.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            Petty Cash
                                        </h4>
                                        <p style="color: #008d4c;">Opening Balance</p>
                                    </a>
                                </li>

                                <li>
                                    <a href=""  data-toggle="modal" data-target="#addNon-modal">
                                        <div class="pull-left">
                                            <img src="<?php echo base_url(); ?>/assets/img/avatar3.png" class="img-circle" alt="user image"/>
                                        </div>
                                        <h4>
                                            Petty Cash/Accounts
                                        </h4>
                                        <p style="color: #008d4c;">Non Invoice Income</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php } ?>            
        </ul>
    </div><!-- /.box-header -->


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Transaction Type</th>
                    <!--<th>Method</th>-->
                    <th>Transaction Details</th>
                    <th>Amount</th>
                    <th>Added By</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($viewbalanceinfo as $balance) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php
                            if ($balance->tr_type == 0) {
                                echo 'Opening Balance';
                            } else {
                                echo 'Non Invoice Income';
                            }
                            ?></td>
                        <!--<td><?php echo $balance->method; ?></td>-->

                        <td><?php
                            if ($balance->b_id > 0) {
                                echo $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->b_id == 0) {
                                echo 'Petty Cash';
                            }
                            ?></td>
                        <td style=" text-align: right;"><?php
                            if ($balance->tr_amount > 0) {
                                echo $balance->tr_amount;
                            } else {
                                $bb = abs($balance->tr_amount);
                                echo '(' . $bb . ')';
                            }
                            ?></td>
                        <td><?php echo $balance->tr_by; ?></td>
                        <td><?php echo $balance->tr_date; ?></td>
                        <td>
                            <?php if ($balance->tr_type == 8) { ?>
                                <a href="<?php echo base_url(); ?>dashboardcontroller/viewnoninvoice/<?php echo $balance->trans_id; ?>"  class="btn btn-info btn-xs btn-flat">View</a>

                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editNon-modal-<?php echo $balance->trans_id; ?>">Edit</a>

                                <a href="<?php echo base_url(); ?>dashboardcontroller/deletenoninvoice/<?php echo $balance->trans_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a>


                                <div class="modal fade" id="editNon-modal-<?php echo $balance->trans_id; ?>" tabindex="-1<?php echo $balance->trans_id; ?>; ?>" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Edit Non Invoice Income</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url(); ?>dashboardcontroller/updatenoninvbl" method="post" class="form-horizontal">
                                                    <input type="hidden" value="<?php echo $balance->trans_id; ?>" name="trans_id"/>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                <label class="control-label">Company<sup>*</sup></label>
                                                            </div>
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <select name="non_c_id" id="non_c_id" class="form-control" required>
                                                                    <option value="<?php echo $balance->non_c_id; ?>"><?php echo $balance->com_name; ?></option>
                                                                    <?php foreach ($companylist as $company) { ?>
                                                                        <option value="<?php echo $company->id; ?>"><?php echo $company->com_name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                <label class="control-label">Method<sup>*</sup></label>
                                                            </div>
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <select name="method" id="" class="form-control method">
                                                                    <option value="<?php echo $balance->tr_method; ?>">
                                                                        <?php
                                                                        if ($balance->tr_method == 'Bank') {
                                                                            echo 'Accounts';
                                                                        } else {
                                                                            echo 'Petty Cash';
                                                                        }
                                                                        ?></option>
                                                                    <?php if ($balance->tr_method == 'Bank') { ?>
                                                                        <option value="Cash">Petty Cash</option>
                                                                    <?php } else { ?>
                                                                        <option value="Bank">Accounts</option>
                                                                    <?php } ?> 

                                                                </select>
                                                            </div>

                                                            <div id="myDIV">
                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Accounts<sup>*</sup></label>
                                                                </div>
                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                    <select name="b_id" class="form-control b_id">
                                                                        <?php if ($balance->tr_method == 'Bank') { ?>
                                                                            <option value="<?php echo $balance->b_id; ?>"><?php echo $balance->b_name . ' ,' . $balance->acc_no; ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="">Select Account</option>
                                                                        <?php } ?>


                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Cheque No.</label>
                                                                </div>
                                                                <div class="col-md-8" style="padding-bottom: 10px;">                                
                                                                    <input name="chq_no" type="text" class="form-control" placeholder="Cheque No." value="<?php echo $balance->chq_no; ?>">
                                                                </div>
                                                                <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                    <label class="control-label">Receipt/Trans No</label>
                                                                </div>
                                                                <div class="col-md-8" style="padding-bottom: 10px;">                                
                                                                    <input name="rec_no" type="text" class="form-control" placeholder="Receipt/Trans No" value="<?php echo $balance->rec_no; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                <label class="control-label">Amount<sup>*</sup></label>
                                                            </div>
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <input name="tr_amount" type="text" class="form-control" placeholder="Add Amount" required value="<?php echo $balance->tr_amount; ?>">
                                                            </div>
                                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                <label class="control-label">Date</label>
                                                            </div>
                                                            <div class="">
                                                                <div class="col-md-8" style="padding-bottom: 10px;">
                                                                    <input name="tr_date" id="payment_date" value="<?php echo $balance->tr_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                                <label class="control-label">Note</label>
                                                            </div>
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <textarea name="tr_note" placeholder="" rows="2" id="tr_note" class="form-control"><?php echo $balance->tr_note; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer clearfix">
                                                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();">Update</button>
                                                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                            <?php } ?>
                        </td>
                    </tr>





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

<!-- COMPOSE MESSAGE MODAL -->              




<div class="modal fade" id="addBank-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Accounts Opening Balance</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbankobl" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-3">Accounts<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="b_id" id="b_id" class="form-control b_id" required>
                                <option value="">--- Select Account ---</option>
                                <?php foreach ($viewbankinfo2 as $bank) {
                                    ?><option value="<?php echo $bank->id; ?>"><?php echo $bank->b_name . ', ' . $bank->acc_no; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-3">Amount<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="tr_amount" type="text" class="form-control" id="tr_amount" placeholder="Amount..." required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="tr_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="tr_date" value="<?php echo $current_date; ?>">
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


<div class="modal fade" id="addCash-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Petty Cash Opening Balance</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertcashobl" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-3">Amount<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="tr_amount" type="text" class="form-control" id="tr_amount" placeholder="Amount..." required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="tr_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="tr_date" value="<?php echo $current_date; ?>">
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


<div class="modal fade" id="addNon-modal" tabindex="-1; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Non Invoice Income</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertnoninvbl" method="post" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Company<sup>*</sup></label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <select name="non_c_id" id="non_c_id" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php foreach ($companylist as $company) { ?>
                                        <option value="<?php echo $company->id; ?>"><?php echo $company->com_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Method<sup>*</sup></label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <select name="method" id="method" class="form-control method" required>
                                    <option value="">Select</option>
                                    <option value="Cash">Petty Cash</option>
                                    <option value="Bank">Accounts</option>

                                </select>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Accounts<sup>*</sup></label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <select name="b_id" id="bid" class="form-control b_id">
                                    <option value="">Select Accounts</option>

                                </select>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Cheque No.</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">                                
                                <input name="chq_no" type="text" class="form-control" placeholder="Cheque No.">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Receipt/Trans No</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">                                
                                <input name="rec_no" type="text" class="form-control" placeholder="Receipt/Trans No">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Amount<sup>*</sup></label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <input name="tr_amount" type="text" class="form-control" placeholder="Add Amount" required>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Date</label>
                            </div>
                            <div class="">
                                <div class="col-md-8" style="padding-bottom: 10px;">
                                    <input name="tr_date" id="payment_date" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Note</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <textarea name="tr_note" placeholder="" rows="2" id="tr_note" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();">Save</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal -->




<script type="text/javascript">


    $(function () {
        $(".method").change(function () {
            var method = $(this).val();
            $('.b_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Accounts</option>')
                    ;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>billingcontroller/getbankdetails/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = $('<option />'); // here we're creating a new select option for each group
                        opt.val(data[i].id);
                        opt.text(data[i].b_acc_name);
                        $('.b_id').append(opt);
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