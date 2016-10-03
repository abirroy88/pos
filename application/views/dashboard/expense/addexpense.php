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
<div class="col-md-10 col-md-offset-1">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header margin">
            <h3 class="box-title">Add Expense</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url(); ?>expensecontroller/insertexpense" method="post">
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Head of Expense <sup>*</sup></label>
                            <select name="expense_id" id="expense_id" class="form-control">
                                <option value="">--- Select Head of Expense ---</option>
                                <?php foreach ($queryheadofexpense as $headofexpense) {
                                    ?><option value="<?php echo $headofexpense->expense_id; ?>"><?php echo $headofexpense->expense_name; ?></option><?php }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Select Sub Head of Expense <sup>*</sup></label>
                            <select name="sub_expense_id" id="sub_expense_id" class="form-control">
                                <option value="">--- Select Sub Head of Expense ---</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Method <sup>*</sup></label>
                            <select name="method" id="method" class="form-control">
                                <option value="">Select Method</option>
                                <option value="Cash">Petty Cash</option>
                                <option value="Bank">Accounts</option>
    
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Accounts</label>
                            <select name="exp_bank_id" id="exp_bank_id" class="form-control">
                                <option value="">Select Account</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Available Balance</label>
                            <input name="av_balance" type="" class="form-control" id="av_balance" placeholder="Available Balance" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Cheque No</label>
                            <input name="chq_no" type="" class="form-control" id="chq_no" placeholder="Cheque No">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Amount <sup>*</sup></label>
                            <input name="cash_amount" type="" class="form-control" id="" placeholder="Cash Amount" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Voucher No</label>
                            <input name="rec_no" type="" class="form-control" id="rec_no" placeholder="Voucher No">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Date <sup>*</sup></label>
                            <div class="dynamic_date">
                                <input name="exp_date" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">R/VC </label>
                            <input name="r_vc" type="" class="form-control" id="" placeholder="R/VC">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Note </label>
                            <textarea name="note" placeholder="Note....." rows="3" id="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer margin">
                <button type="submit" class="btn btn-primary" onclick="return checkadd();">Add Expense</button>
            </div>
        </form>
    </div><!-- /.box -->

    <script type="text/javascript">
        $(function () {
            $("#expense_id").change(function () {
                var expense_id = $(this).val();
                $('#sub_expense_id')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">--- Select Sub Head of Expense ---</option>')
                        ;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>expensecontroller/getsubheadofexpensebyid/",
                    data: 'expense_id=' + expense_id,
                    dataType: 'json',
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var opt = $('<option />'); // here we're creating a new select option for each group
                            opt.val(data[i].sub_expense_id);
                            opt.text(data[i].sub_expense_name);
                            $('#sub_expense_id').append(opt);
                        }
                    }
                });
            });
        });

        $(function () {
            $("#method").change(function () {
                var method = $(this).val();
                $('#exp_bank_id')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Select Account</option>')
                        ;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();  ?>expensecontroller/getbankdetails/",
                    data: 'method=' + method,
                    dataType: 'json',
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var opt = $('<option />'); // here we're creating a new select option for each group
                            opt.val(data[i].id);
                            opt.text(data[i].b_acc_name);
                            $('#exp_bank_id').append(opt);
                        }
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();  ?>expensecontroller/getttlavbalance/",
                    data: 'method=' + method,
                    dataType: 'json',
                    success: function (data) {
                        $('#av_balance').val(data.ttlbalance);
                    }
                });
            });
        });

        $(function () {
            $("#exp_bank_id").change(function () {
                var exp_bank_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>expensecontroller/getbankavailable/",
                    data: 'exp_bank_id=' + exp_bank_id,
                    dataType: 'json',
                    success: function (data) {
                        $('#av_balance').val(data.bavbalance);
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
    </script>