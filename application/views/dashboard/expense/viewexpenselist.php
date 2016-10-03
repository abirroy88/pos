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
        <h3 class="box-title">Expense History</h3>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Head of Expense</th>
                    <!--<th>Sub Head of Expense ID</th>-->
                    <th>Sub Head of Expense</th>
                    <th>Method</th>
                    <th>Details</th>
                    <th>Amount</th>
                    <th>Date</th>                    
                    <th style=" width: 15%;">Note</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl = 1;
                foreach ($queryexpensehistory as $expensehistory) {
                    ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $expensehistory->expense_name; ?></td>
                        <td><?php echo $expensehistory->sub_expense_name; ?></td>
                        <td>
                                <?php
                                if ($expensehistory->method == 'Bank') {
                                    echo 'Accounts';
                                } else {
                                    echo 'Petty Cash';
                                }
                                ?>
                        </td>
                        <td><?php 
                        if($expensehistory->bid>0){
                             echo $expensehistory->b_name.', '.$expensehistory->acc_no;
                        }else{
                             echo 'Paid by Cash';
                        }
                        ?></td>
                        <td><?php echo $expensehistory->cash_amount; ?></td>
                        <td><?php echo $expensehistory->date; ?></td>
                        <td><?php echo $expensehistory->note; ?></td>
                        <td><a href="<?php echo base_url(); ?>expensecontroller/printviewexpense/<?php echo $expensehistory->trans_id; ?>"  class="btn btn-info btn-xs btn-flat">View</a> /
                            <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editExpensesHistory-modal-<?php echo $expensehistory->id; ?>">Edit</a> / 
                            <a href="<?php echo base_url(); ?>expensecontroller/deleteexpensehistory/<?php echo $expensehistory->trans_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
                        </td>

                    </tr>




                    <!-- COMPOSE MESSAGE MODAL -->
                <div class="modal fade" id="editExpensesHistory-modal-<?php echo $expensehistory->id; ?>" tabindex="-<?php echo $expensehistory->id; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $expensehistory->id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Update Expenses</h4>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo base_url(); ?>expensecontroller/changeexpensehistory/<?php echo $expensehistory->id; ?>" method="post" id="form">

                                    <input type="hidden" value="<?php echo $expensehistory->id; ?>" name="id"/>
                                    <input type="hidden" value="<?php echo $expensehistory->trans_id; ?>" name="trans_id"/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Head of Expense<sup>*</sup></label>                                               
                                                <input type="text" class="form-control" placeholder="" name="expense_name" id="" value="<?php echo $expensehistory->expense_name; ?>" disabled>
                                            </div> 
                                            <div class="col-md-6">
                                                <label>Sub-Head of Expense<sup>*</sup></label>                                               
                                                <input type="text" class="form-control" placeholder="" name="sub_expense_name" id="" value="<?php echo $expensehistory->sub_expense_name; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Method<sup>*</sup></label>
                                                <select name="method" id="" class="form-control method">
                                                    <option value="<?php echo $expensehistory->method; ?>">
                                                    <?php if ($expensehistory->method == 'Bank') { 
                                                       echo 'Accounts';
                                                     } else { 
                                                       echo 'Petty Cash';
                                                     } ?></option>
                                                    <?php if ($expensehistory->method == 'Bank') { ?>
                                                        <option value="Cash">Petty Cash</option>
                                                    <?php } else { ?>
                                                        <option value="Bank">Accounts</option>
                                                    <?php } ?> 

                                                </select>
                                            </div> 
                                            <div class=" col-md-6">
                                                <label>Accounts</label>
                                                <select name="exp_bank_id" class="form-control exp_bank_id">
                                                    <?php if ($expensehistory->method == 'Bank') { ?>
                                                        <option value="<?php echo $expensehistory->bid; ?>"><?php echo $expensehistory->b_name . ' ,' . $expensehistory->acc_no; ?></option>
                                                    <?php } else { ?>
                                                        <option value="">Select Account</option>
                                                    <?php } ?>


                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Available Balance</label>
                                                <input name="av_balance" type="" class="form-control av_balance" id="" placeholder="Available Balance" value="<?php
                                                $CI = & get_instance('expensecontroller');
                                                $CI->load->model('expensemodel');
                                                $result1 = $CI->expensemodel->avbalance($expensehistory->exp_bank_id);

                                                echo $result1->totalbalance;
                                                ?>" readonly>
                                            </div> 
                                            <div class="col-md-6">

                                                <label>Cheque No</label>
                                                <input name="chq_no" type="" class="form-control" id="" placeholder="Cheque No" value="<?php echo $expensehistory->chq_no; ?>">
                                            </div> 

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Amount<sup>*</sup></label>
                                                <input type="text" class="form-control" placeholder="" name="cash_amount" id="" value="<?php echo $expensehistory->cash_amount; ?>">
                                            </div> 
                                            <div class="col-md-6">

                                                <label>Date</label>
                                                <div class="dynamic_date">
                                                    <input name="exp_date" value="<?php echo $expensehistory->date; ?>"   type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>R/VC</label>
                                                <input type="text" class="form-control" placeholder="" name="r_vc" id="" value="<?php echo $expensehistory->r_vc; ?>" >
                                            </div>

                                            <div class="col-md-6">
                                                <label>Note</label>
                                                <textarea name="note" placeholder="Note....." rows="3" id="" class="form-control"><?php echo $expensehistory->note; ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer clearfix">
                                        <button type="submit" class="btn btn-sm btn-primary" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Update</button>
                                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>                
                                    </div>  

                                </form>

                            </div>                           
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

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
    $(function () {
        $(".method").change(function () {
            var method = $(this).val();
            $('.exp_bank_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select Account</option>')
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

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>expensecontroller/getttlavbalance/",
                data: 'method=' + method,
                dataType: 'json',
                success: function (data) {
                    $('.av_balance').val(data.ttlbalance);
                }
            });


        });
    });

    $(function () {
        $(".exp_bank_id").change(function () {
            var exp_bank_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>expensecontroller/getbankavailable/",
                data: 'exp_bank_id=' + exp_bank_id,
                dataType: 'json',
                success: function (data) {
                    $('.av_balance').val(data.bavbalance);
                }
            });
        });
    });

    function checkadd() {
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



