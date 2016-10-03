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
        <h3 class="box-title pull-left">Employees Expense History</h3>   
        <h3 class="box-title pull-right" style="padding-right:20px;"><button class="btn btn-success" data-toggle="modal" data-target="#addEmployee-modal"><i class="glyphicon glyphicon-plus"></i>Add Employee Expense</button></h3>  
    </div><!-- /.box-header -->


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Employee</th>                   
                    <th>Designation</th>
                    <th>Payment Date</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($employeepayslip as $employee) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $employee->e_name; ?></td>
                        <td><?php echo $employee->designation; ?></td>
                        <td><?php echo $employee->emp_exp_date; ?></td>
                        <td><?php
                            if ($employee->method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>
                        <td><?php echo $employee->emp_exp_amount; ?></td>
                        <td>
                            <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editEmployee-modal-<?php echo $employee->id; ?>">Edit</a>
                            <?php //if ($employee->id != '') { ?>
                            <a href="<?php echo base_url(); ?>employeecontroller/printpayslipbytransid/<?php echo $employee->trans_id; ?>" class="btn btn-success btn-xs btn-flat">View</a> 
                            <?php
                            //} else {
                            //}
                            ?>
                            <div class="modal fade" id="editEmployee-modal-<?php echo $employee->id; ?>" tabindex="-<?php echo $employee->id; ?>" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Edit Employee Expense</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>employeecontroller/editemployeeexpense" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $employee->trans_id; ?>" name="trans_id"/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Employee<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-9" style="padding-bottom: 10px;">
                                                            <select name="emp_id" id="" class="form-control" required>
                                                                <option value="<?php echo $employee->emp_id; ?>"><?php echo $employee->e_name; ?></option>
                                                                <?php foreach ($employee_name as $ename) {
                                                                    ?><option value="<?php echo $ename->e_id; ?>"><?php echo $ename->e_name; ?></option><?php }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Method<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-9" style="padding-bottom: 10px;">
                                                            <select name="method" id="" class="form-control method">
                                                                <option value="<?php echo $employee->method; ?>"><?php
                                                                    if ($employee->method == 'Bank') {
                                                                        echo 'Accounts';
                                                                    } else {
                                                                        echo 'Petty Cash';
                                                                    }
                                                                    ?></option>
                                                                <?php if ($employee->method == 'Bank') { ?>
                                                                    <option value="Cash">Petty Cash</option>
                                                                <?php } else { ?>
                                                                    <option value="Bank">Accounts</option>
                                                                <?php } ?>                                                                

                                                            </select>
                                                        </div>

                                                        <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Accounts</label>
                                                        </div>
                                                        <div class="col-md-9" style="padding-bottom: 10px;">
                                                            <select name="emp_exp_bank_id" id="" class="form-control emp_exp_bank_id">
                                                                <?php if ($employee->method == 'Bank') { ?>
                                                                    <option value="<?php echo $employee->bid; ?>"><?php echo $employee->b_name . ' ,' . $employee->acc_no; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="">Select Account</option>
                                                                <?php } ?>


                                                            </select>
                                                        </div>

                                                        <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Cheque No<sup>*</sup></label>
                                                        </div>

                                                        <div class="col-md-9" style="padding-bottom: 10px;">
                                                            <input name="chq_no" type="" class="form-control" id="chq_no" placeholder="Cheque No" value="<?php echo $employee->chq_no; ?>">
                                                        </div>                                                        

                                                        <div class="col-md-3" style="padding-bottom: 10px;text-align: right;">
                                                            <label class="control-label">Available Balance</label>
                                                        </div>

                                                        <div class="col-md-9" style="padding-bottom: 10px;">
                                                            <input name="av_balance" type="" class="form-control av_balance" id="" placeholder="Available Balance" value="<?php
                                                            $CI = & get_instance('employeecontroller');
                                                            $CI->load->model('employeemodel');
                                                            $result1 = $CI->employeemodel->avbalance($employee->emp_exp_bank_id);

                                                            echo $result1->totalbalance;
                                                            ?>" readonly>
                                                        </div>

                                                        <div class="col-md-12">

                                                            <?php
                                                            $CI = & get_instance('employeecontroller');
                                                            $CI->load->model('employeemodel');
                                                            $result = $CI->employeemodel->employee_expense_details($employee->trans_id);

                                                            foreach ($result as $expense_details) {
                                                                ?>
                                                                <label class="control-label col-md-3"><?php echo $expense_details->category; ?></label>

                                                                <div class="col-md-3" style=" padding: 5px;">
                                                                    <input name="emp_exp_amount1[]" type="hidden" class="form-control" id="" value="<?php echo $expense_details->cat_id; ?>">
                                                                    <input name="emp_exp_amount2[]" type="hidden" class="form-control" id="" value="<?php echo $expense_details->category; ?>">
                                                                    <input name="emp_exp_amount[]" type="" class="form-control" id="" value="<?php
                                                                    if ($expense_details->amount > 0) {
                                                                        echo $expense_details->amount;
                                                                    } else {
                                                                        echo abs($expense_details->amount);
                                                                    }
                                                                    ?>">
                                                                </div>   
                                                                <?php if ($expense_details->category == 'Deductions') { ?>
                                                                    <div class="col-md-9 col-md-offset-3" style=" padding: 5px;">
                                                                        <textarea name="salary_deduction[]" placeholder="Deductions Reasons....." rows="3" id="salary_deduction" class="form-control"><?php echo $expense_details->exp_note; ?></textarea>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <input type="hidden" id="" class="form-control" name="salary_deduction[]" value="">
                                                                    <?php
                                                                }
                                                            }
                                                            ?>

                                                        </div>

                                                        <div class="col-md-3" style="padding-bottom: 10px; padding-top: 10px; text-align: right;">
                                                            <label class="control-label">Date<sup>*</sup></label>
                                                        </div>
                                                        <div class="">
                                                            <div class="col-md-9" style="padding-bottom: 10px; padding-top: 10px">
                                                                <input type="text" id="emp_exp_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="emp_exp_date" value="<?php echo $employee->emp_exp_date; ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Note</label>
                                                        </div>
                                                        <div class="col-md-9" style="padding-bottom: 10px;">
                                                            <textarea name="emp_exp_note" placeholder="Note....." rows="3" id="emp_exp_note" class="form-control"><?php echo $employee->emp_exp_note; ?></textarea>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="modal-footer clearfix">
                                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return checkupd();"><!--<i class="fa fa-envelope"></i>-->Update</button>
                                                    <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <a href="<?php echo base_url(); ?>employeecontroller/deleteemployeeexpbyid/<?php echo $employee->trans_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
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




<div class="modal fade" id="addEmployee-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Employee Expense</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>employeecontroller/insertemployeeexpense" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="control-label col-md-3">Employee<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="emp_id" id="emp_id" class="form-control" required>
                                <option value="">Select Employee</option>
                                <?php foreach ($employee_name as $ename) {
                                    ?><option value="<?php echo $ename->e_id; ?>"><?php echo $ename->e_name; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Method<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="method" id="method" class="form-control" required>
                                <option value="">Select Method</option>
                                <option value="Cash">Petty Cash</option>
                                <option value="Bank">Accounts</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Accounts<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="emp_exp_bank_id" id="emp_exp_bank_id" class="form-control">
                                <option value="">Select Account</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Cheque No</label>
                        <div class="col-md-9">
                            <input name="chq_no" type="text" class="form-control" id="chq_no" placeholder="Cheque No" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Available Balance</label>
                        <div class="col-md-9">
                            <input name="av_balance" type="text" class="form-control" id="av_balance" placeholder="Available Balance" value="" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">

                            <?php foreach ($employee_expense_type as $expense_type) { ?>


                                <label class="control-label col-md-3"><?php echo $expense_type->emp_exp_name; ?></label>
                                <div class="col-md-3" style=" padding: 5px;">
                                    <input name="emp_exp_amount1[]" type="hidden" class="form-control" id="emp_exp_amount1" value="<?php echo $expense_type->id; ?>">
                                    <input name="emp_exp_amount2[]" type="hidden" class="form-control" id="emp_exp_amount2" value="<?php echo $expense_type->emp_exp_name; ?>">
                                    <input name="emp_exp_amount[]" type="" class="form-control" id="emp_exp_amount" placeholder="Amount" value="">
                                </div>
                                <?php if ($expense_type->emp_exp_name == 'Deductions') { ?>
                                    <div class="col-md-9 col-md-offset-3" style=" padding: 5px;">
                                        <textarea name="salary_deduction[]" placeholder="Deductions Reasons....." rows="3" id="salary_deduction" class="form-control"></textarea>
                                    </div>
                                <?php } else { ?>
                                    <input type="hidden" id="salary_deduction" class="form-control" name="salary_deduction[]" value="">
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Date</label>
                        <div class="">
                            <div class="col-md-9">
                                <input type="text" id="emp_exp_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="emp_exp_date" value="<?php echo $current_date; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Note</label>
                        <div class="col-md-9">
                            <textarea name="emp_exp_note" placeholder="Note....." rows="3" id="emp_exp_note" class="form-control"></textarea>
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
        $("#method").change(function () {
            var method = $(this).val();
            $('#emp_exp_bank_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Account</option>')
                    ;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getbankdetails/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = $('<option />'); // here we're creating a new select option for each group
                        opt.val(data[i].id);
                        opt.text(data[i].b_acc_name);
                        $('#emp_exp_bank_id').append(opt);
                    }
                }
            });

        });
    });

    $(function () {
        $("#method").change(function () {
            var method = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getttlavbalance/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    $('#av_balance').val(data.ttlbalance);
                }
            });
        });
    });

    $(function () {
        $("#emp_exp_bank_id").change(function () {
            var emp_exp_bank_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getbankavailable/",
                data: 'emp_exp_bank_id=' + emp_exp_bank_id,
                dataType: 'json',
                success: function (data) {
                    $('#av_balance').val(data.bavbalance);
                }
            });
        });
    });



    $(function () {
        $(".method").change(function () {
            var method = $(this).val();
            $('.emp_exp_bank_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Account</option>')
                    ;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getbankdetails/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = $('<option />'); // here we're creating a new select option for each group
                        opt.val(data[i].id);
                        opt.text(data[i].b_acc_name);
                        $('.emp_exp_bank_id').append(opt);
                    }
                }
            });
        });
    });

    $(function () {
        $(".method").change(function () {
            var method = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getttlavbalance/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    $('.av_balance').val(data.ttlbalance);
                }
            });
        });
    });

    $(function () {
        $(".emp_exp_bank_id").change(function () {
            var emp_exp_bank_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getbankavailable/",
                data: 'emp_exp_bank_id=' + emp_exp_bank_id,
                dataType: 'json',
                success: function (data) {
                    $('.av_balance').val(data.bavbalance);
                }
            });
        });
    });


    $(function () {
        $("#emp_id").change(function () {
            var emp_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getempsalary/",
                data: 'emp_id=' + emp_id,
                dataType: 'json',
                success: function (data) {
                    $('#emp_exp_amount').val(data.b_salary);
                }
            });
        });
    });

</script>

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