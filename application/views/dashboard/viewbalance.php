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
        <h3 class="box-title pull-left">Transactions</h3>   
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
                                        Bank
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
                                        Cash
                                    </h4>
                                    <p style="color: #008d4c;">Opening Balance</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php }?>
            <li class="custom_hover dropdown messages-menu">
                <a style="color: #008d4c;"  href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-plus-circle"></i>
                    Transfer Balance                   </a>
                <ul class="dropdown-menu">

                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href=""  data-toggle="modal" data-target="#transBank-modal">
                                    <div class="pull-left">
                                        <img src="<?php echo base_url(); ?>/assets/img/avatar3.png" class="img-circle" alt="user image"/>
                                    </div>
                                    <h4>
                                        Bank to Cash
                                    </h4>
                                    <p style="color: #008d4c;">Transfer</p>
                                </a>
                            </li><!-- end message -->

                            <li>
                                <a href=""  data-toggle="modal" data-target="#transCash-modal">
                                    <div class="pull-left">
                                        <img src="<?php echo base_url(); ?>/assets/img/avatar3.png" class="img-circle" alt="user image"/>
                                    </div>
                                    <h4>
                                        Cash to Bank
                                    </h4>
                                    <p style="color: #008d4c;">Transfer</p>
                                </a>
                            </li>

                            <li>
                                <a href=""  data-toggle="modal" data-target="#transBankBank-modal">
                                    <div class="pull-left">
                                        <img src="<?php echo base_url(); ?>/assets/img/avatar3.png" class="img-circle" alt="user image"/>
                                    </div>
                                    <h4>
                                        Bank to Bank
                                    </h4>
                                    <p style="color: #008d4c;">Transfer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- /.box-header -->


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Transaction Type</th>
                    <th>Method</th>
                    <th>Details</th>
                    <th>Amount</th>
                    <th>Date</th>
<!--                    <th>Action</th>-->
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
                            } elseif ($balance->tr_type == 1) {
                                echo 'Sales Collection';
                            } elseif ($balance->tr_type == 2) {
                                echo 'General Expense';
                            } elseif ($balance->tr_type == 3) {
                                echo 'Employee Expense';
                            } elseif ($balance->tr_type == 4) {
                                echo 'Bank to Cash';
                            } elseif ($balance->tr_type == 5) {
                                echo 'Cash to Bank';
                            } elseif ($balance->tr_type == 6) {
                                echo 'Bank to Bank';
                            }
                            ?></td>
                        <td><?php echo $balance->tr_method; ?></td>

                        <td><?php
                            if ($balance->tr_method == 'Bank' && $balance->tr_type == 0) {
                                echo $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->tr_method == 'Bank' && $balance->tr_type == 1) {
                                echo $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->tr_method == 'Bank' && $balance->tr_type == 2) {
                                echo $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->tr_method == 'Bank' && $balance->tr_type == 3) {
                                echo $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->tr_type == 4) {
                                echo 'Transfar from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . '] to Cash';
                            } elseif ($balance->tr_type == 5) {
                                echo 'Transfar from Cash to [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 6 && $balance->tr_amount < 0) {
                                echo 'Transfar from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 6 && $balance->tr_amount > 0) {
                                echo 'Transfar to [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } else {
                                echo 'Cash Amount';
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
                        <td><?php echo $balance->tr_date; ?></td>
    <!--                        <td><a href="<?php //echo base_url();       ?>dashboardcontroller/viewtransbyid/<?php //echo $balance->id;       ?>"  class="btn btn-danger btn-xs btn-flat">View</a></td>-->
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
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Bank Opening Balance</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbankobl" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-3">Bank<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="b_id" id="tr_id" class="form-control" required>
                                <option value="">--- Select Bank ---</option>
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
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Cash Opening Balance</h4>
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


<div class="modal fade" id="transBank-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Transfer Balance from Bank to Cash</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbanktransfer" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-4">Bank<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id" id="" class="form-control bank_id" required>
                                <option value="">--- Select Bank ---</option>
                                <?php foreach ($viewbankinfo1 as $bank1) {
                                    ?><option value="<?php echo $bank1->id; ?>"><?php echo $bank1->b_name . ', ' . $bank1->acc_no; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-4">Available Balance</label>
                        <div class="col-md-8">
                            <input name="av_amount" type="text" class="form-control av_amount" id="" placeholder="Available Balance..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Amount to Transfer<sup>*</sup></label>
                        <div class="col-md-8">
                            <input name="trans_amount" type="text" class="form-control" id="trans_amount" placeholder="Transfer Amount..." required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Transfer Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-8">
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

<div class="modal fade" id="transCash-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Transfer Balance from Cash to Bank</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertcashtransfer" method="post" class="form-horizontal">



                    <div class="form-group">
                        <label class="control-label col-md-4">Cash Balance</label>
                        <div class="col-md-8">
                            <input name="cashbalance" type="text" class="form-control" id="cashbalance" placeholder="Cash Balance..." value="<?php echo $cashbalance->cashbalance; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Bank<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id" id="" class="form-control" required>
                                <option value="">--- Select Bank ---</option>
                                <?php foreach ($viewbankinfo1 as $bank1) {
                                    ?><option value="<?php echo $bank1->id; ?>"><?php echo $bank1->b_name . ', ' . $bank1->acc_no; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-4">Amount to Transfer<sup>*</sup></label>
                        <div class="col-md-8">
                            <input name="trans_amount" type="text" class="form-control" id="trans_amount" placeholder="Transfer Amount..." required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Transfer Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-8">
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

<div class="modal fade" id="transBankBank-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Transfer Balance from Bank to Bank</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbanktobanktransfer" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-4">From<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id" id="" class="form-control bank_id" required>
                                <option value="">--- Select Bank ---</option>
                                <?php foreach ($viewbankinfo1 as $bank1) {
                                    ?><option value="<?php echo $bank1->id; ?>"><?php echo $bank1->b_name . ', ' . $bank1->acc_no; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="control-label col-md-4">To<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id2" id="" class="form-control" required>
                                <option value="">--- Select Bank ---</option>
                                <?php foreach ($viewbankinfo1 as $bank1) {
                                    ?><option value="<?php echo $bank1->id; ?>"><?php echo $bank1->b_name . ', ' . $bank1->acc_no; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Available Balance</label>
                        <div class="col-md-8">
                            <input name="av_amount" type="text" class="form-control av_amount" id="" placeholder="Available Balance..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Amount to Transfer<sup>*</sup></label>
                        <div class="col-md-8">
                            <input name="trans_amount" type="text" class="form-control" id="trans_amount" placeholder="Transfer Amount..." required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Transfer Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-8">
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

<script type="text/javascript">


    $(function () {
        $(".bank_id").change(function () {
            var bank_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>dashboardcontroller/getbankavailable/",
                data: 'bank_id=' + bank_id,
                dataType: 'json',
                success: function (data) {
                    $('.av_amount').val(data.bavbalance);
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