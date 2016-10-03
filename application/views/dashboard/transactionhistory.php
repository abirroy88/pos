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
        <h3 style="text-align:center">Transactions History</h3>   

    </div>

    <!-- form start -->
    <form action="<?php echo base_url(); ?>dashboardcontroller/transactionhistory" method="post">
        <div class="box-body">
            <div class="row">
                <div class="form-group">

                    <div class="col-md-3 col-md-offset-1">
                        <select name="method" id="method" class="form-control">
                            <option value="<?php
                            if ($method != '') {
                                echo $method;
                            } else {
                                
                            }
                            ?>">
                                        <?php
                                        if ($method != '') {
                                            echo $method;
                                        } else {
                                            echo 'Select Method';
                                        }
                                        ?>
                            </option>
                            <option value="Cash">Petty Cash</option>
                            <option value="Bank">Accounts</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="b_id" id="b_id" class="form-control">
                            <option value="<?php
                            if ($b_id != '') {
                                echo $b_id;
                            } else {
                                
                            }
                            ?>">
                                        <?php
                                        if ($b_id != '') {
                                            echo $b_name->b_acc_name;
                                        } else {
                                            echo 'Select Account';
                                        }
                                        ?>
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="date_range" id="reservation" class="form-control pull-right" placeholder="Select Date Range" value="<?php
//                                if ($date_range != '') {
//                                    echo $date_range;
//                                } else {
//                                    echo 'Select Date Range';
//                                }
                        ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-flat" >Search</button>
                    </div>
                    </br>
                </div>

                <div style="padding-top: 10px;">
                </div>
            </div>

        </div><!-- /.box-body -->

    </form>


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Transaction Type</th>
                    <th>Method</th>
                    <th>Details</th>
                    <th>Amount</th>
                   <th>Added By</th>
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
                                echo 'Accounts to Petty Cash';
                            } elseif ($balance->tr_type == 5) {
                                echo 'Petty Cash to Accounts';
                            } elseif ($balance->tr_type == 6) {
                                echo 'Accounts to Accounts';
                            } elseif ($balance->tr_type == 7) {
                                echo 'Refund';
                            } elseif ($balance->tr_type == 8) {
                                echo 'Non Invoice Income';
                            }
                            ?></td>
                        <td><?php
                            if ($balance->tr_method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>

                        <td><?php
                            if ($balance->tr_type == 0 && $balance->b_id > 0) {
                                echo 'Opening Balance of '.$balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->tr_type == 0 && $balance->b_id == 0) {
                                echo 'Opening Balance of Petty Cash';
                                
                            } elseif ($balance->tr_type == 1 && $balance->b_id > 0) {
                                echo 'To '.$balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no;
                            } elseif ($balance->tr_type == 1 && $balance->b_id == 0) {
                                echo 'To Petty Cash';
                                
                            } elseif ($balance->tr_type == 2 && $balance->b_id > 0) {
                                echo 'from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 2 && $balance->b_id == 0) {
                                echo 'from Petty Cash';
                                
                            } elseif ($balance->tr_type == 3 && $balance->b_id > 0) {
                                echo 'from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            } elseif ($balance->tr_type == 3 && $balance->b_id == 0) {
                                echo 'from Petty Cash';                            
                                
                            } elseif ($balance->tr_type == 4 && $balance->b_id > 0) {
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
                                
                            } elseif ($balance->tr_type == 7 && $balance->b_id > 0) {
                                echo 'Refund from [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            }elseif ($balance->tr_type == 7 && $balance->b_id == 0) {
                                echo 'Refund from Petty Cash';
                            
                            } elseif ($balance->tr_type == 8 && $balance->b_id > 0) {
                                echo 'Non Invoice Income to [' . $balance->b_name . ', ' . $balance->b_branch . ', ' . $balance->acc_no . ']';
                            }elseif ($balance->tr_type == 8 && $balance->b_id == 0) {
                                echo 'Non Invoice Income to Petty Cash';
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
    <!--                        <td><a href="<?php //echo base_url();            ?>dashboardcontroller/viewtransbyid/<?php //echo $balance->id;            ?>"  class="btn btn-danger btn-xs btn-flat">View</a></td>-->
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


<script type="text/javascript">


    $(function () {
        $("#method").change(function () {
            var method = $(this).val();
            $('#b_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Account</option>')
                    ;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>dashboardcontroller/getbankdetail/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = $('<option />'); // here we're creating a new select option for each group
                        opt.val(data[i].id);
                        opt.text(data[i].b_acc_name);
                        $('#b_id').append(opt);
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