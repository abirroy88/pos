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
        </div><!-- /.box-body col-md-offset-2-->
    </div>
    <?php
}
?>
<div class="box ">
    <div class="box-header">
        <h3 class="box-title pull-left">Payable</h3> 

        <h3 class="box-title pull-right" style="padding-right:10px;"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addEmployee-modal"><i class="glyphicon glyphicon-plus"></i>Add New</button></h3> 
    </div>


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Purpose</th>                    
                    <th>Amount</th>
                    <th>Expected Date</th>
                    <th>Note</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($payablelist as $payable) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $payable->purpose; ?></td>
                        <td><?php echo $payable->amount; ?></td>
                        <td><?php echo $payable->exp_date; ?></td>
                        <td><?php echo $payable->p_note; ?></td>
                        <td>
                            <?php
                            //if ($employee->status == 0) {
                            ?><!--<input name="id" value="<?php //echo $employee->id; ?>" type="hidden" placeholder="" class=""><a href="<?php //echo base_url(); ?>employeecontroller/inactivateemp/<?php //echo $employee->id; ?>" id="inactivate" class="btn btn-warning btn-flat btn-xs">Inactive</a><?php
                            //}
                            ?>
                            <?php
                            //if ($employee->status == 1) {
                            ?><input name="id"  value="<?php //echo $employee->id; ?>" type="hidden" placeholder="" class=""><a href="<?php //echo base_url(); ?>employeecontroller/activateemp/<?php //echo $employee->id; ?>" id="activate" class="btn btn-success btn-flat btn-xs">Active</a>--><?php
                            //}
                            ?>
                            <?php if ($payable->status == 0) { ?>
                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editEmployee-modal-<?php echo $payable->id; ?>">Edit</a>
                            <?php } ?>


                            <div class="modal fade" id="editEmployee-modal-<?php echo $payable->id; ?>" tabindex="-<?php echo $payable->id; ?>" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Payable</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>dashboardcontroller/editpayable" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $payable->id; ?>" name="id"/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Purpose</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="purpose" type="text" class="form-control" id="purpose" placeholder="Purpose" value="<?php echo $payable->purpose; ?>">
                                                        </div>
                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Amount</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="amount" type="text" class="form-control" id="amount" placeholder="Amount" value="<?php echo $payable->amount; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Expected Date</label>
                                                        </div>
                                                        <div class="dynamic_date">
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <input type="text" id="exp_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="exp_date" value="<?php echo $payable->exp_date; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Note</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px; text-align: right;">
                                                            <textarea name="p_note" placeholder="Note....." rows="3" id="p_note" class="form-control"><?php echo $payable->p_note; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer clearfix">
                                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return checkupd();"><!--<i class="fa fa-envelope"></i>-->Update</button>
                                                    <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(); ?>dashboardcontroller/deletepayablebyid/<?php echo $payable->id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Payable</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertpayable" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="control-label col-md-3">Purpose</label>
                        <div class="col-md-9">
                            <input name="purpose" type="text" class="form-control" id="purpose" placeholder="Purpose" required>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3">Amount</label>
                        <div class="col-md-9">
                            <input name="amount" type="text" class="form-control" id="amount" placeholder="Amount" required>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3">Expected Date</label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="exp_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="exp_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-md-3">Note</label>
                        <div class="col-md-9">
                            <textarea name="p_note" placeholder="Note....." rows="3" id="p_note" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Save</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


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