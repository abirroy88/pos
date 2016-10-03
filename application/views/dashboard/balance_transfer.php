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
        <h3 class="box-title pull-left">Transfer History</h3>   
        <ul class="nav navbar-nav pull-right">

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
                                        Accounts to Petty Cash
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
                                        Petty Cash to Accounts
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
                                        Accounts to Accounts
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
                    <th>Transfer Type</th>
                    <!--<th>Method</th>-->
                    <th>Transfer Details</th>
                    <th>Amount</th>
                    <th>Added By</th>
                    <th>Date</th>
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
                            if ($balance->tr_type == 4) {
                                echo 'Accounts to Petty Cash';
                            } elseif ($balance->tr_type == 5) {
                                echo 'Petty Cash to Accounts';
                            } elseif ($balance->tr_type == 6) {
                                echo 'Accounts to Accounts';
                            }
                            ?></td>
                        <!--<td><?php //echo $balance->tr_method;  ?></td>-->

                        <td><?php
                            if ($balance->tr_type == 4 && $balance->b_id > 0) {
                                echo 'Transfar from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 4 && $balance->b_id == 0) {
                                echo 'Transfar to Petty Cash';
                            } elseif ($balance->tr_type == 5 && $balance->b_id > 0) {
                                echo 'Transfar to [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 5 && $balance->b_id == 0) {
                                echo 'Transfar from Petty Cash';
                            } elseif ($balance->tr_type == 6 && $balance->tr_amount > 0) {
                                echo 'Transfar to [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 6 && $balance->tr_amount < 0) {
                                echo 'Transfar from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
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
    <!--                        <td><a href="<?php //echo base_url();          ?>dashboardcontroller/viewtransbyid/<?php //echo $balance->id;          ?>"  class="btn btn-danger btn-xs btn-flat">View</a></td>-->
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


<div class="modal fade" id="transBank-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Transfer Balance from Accounts to Petty Cash</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbanktocashtransfer" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-4">Accounts<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id" id="" class="form-control bank_id" required>
                                <option value="">--- Select Account ---</option>
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
                <h4 class="modal-title">Transfer Balance from Petty Cash to Accounts</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertcashtobanktransfer" method="post" class="form-horizontal">



                    <div class="form-group">
                        <label class="control-label col-md-4">Petty Cash Balance</label>
                        <div class="col-md-8">
                            <input name="cashbalance" type="text" class="form-control" id="cashbalance" placeholder="Cash Balance..." value="<?php echo $cashbalance->cashbalance; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Accounts<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id" id="" class="form-control" required>
                                <option value="">--- Select Accounts ---</option>
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
                <h4 class="modal-title">Transfer Balance from Accounts to Accounts</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbanktobanktransfer" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-4">From<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="bank_id" id="" class="form-control bank_id" required>
                                <option value="">--- Select Accounts ---</option>
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
                                <option value="">--- Select Accounts ---</option>
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