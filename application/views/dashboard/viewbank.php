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
        <h3 class="box-title pull-left">Accounts</h3>   
        <?php if ($user_role != 'admin') { ?>
            <h3 class="box-title pull-right" style="padding-right:20px;"><button class="btn btn-success" data-toggle="modal" data-target="#addBank-modal"><i class="glyphicon glyphicon-plus"></i>Add Accounts</button></h3>  
        <?php } ?>
    </div><!-- /.box-header -->


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Name</th>                    
                    <th>Branch</th>
                    <th>Account No.</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($viewbankinfo as $bank) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $bank->b_name; ?></td>
                        <td><?php echo $bank->b_branch; ?></td>
                        <td><?php echo $bank->acc_no; ?></td>
                        <td><?php echo $bank->b_date; ?></td>
                        <td><?php if ($user_role != 'admin') { ?>
                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editBank-modal-<?php echo $bank->id; ?>">Edit</a> <?php } ?>
                            <a href="<?php echo base_url(); ?>dashboardcontroller/bankstatement/<?php echo $bank->id; ?>" class="btn btn-info btn-xs btn-flat">Statement</a> 

                            <div class="modal fade" id="editBank-modal-<?php echo $bank->id; ?>" tabindex="-<?php echo $bank->id; ?>" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Edit Account</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>dashboardcontroller/editbank" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $bank->id; ?>" name="id"/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Name<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="b_name" type="text" class="form-control" id="b_name" placeholder="Name" value="<?php echo $bank->b_name; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Branch<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="b_branch" type="text" class="form-control" id="b_branch" placeholder="Branch..." value="<?php echo $bank->b_branch; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Account No.<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="acc_no" type="text" class="form-control" id="acc_no" placeholder="Account No...." value="<?php echo $bank->acc_no; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Date</label>
                                                        </div>
                                                        <div class="dynamic_date">
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <input type="text" id="b_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="b_date" value="<?php echo $bank->b_date; ?>">
                                                            </div>
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
                            <?php if ($user_role != 'admin') { ?>
                                <a href="<?php echo base_url(); ?>dashboardcontroller/deletebankbyid/<?php echo $bank->id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a>
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
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Account</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertbank" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="control-label col-md-3">Name<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="b_name" type="text" class="form-control" id="b_name" placeholder="Name" required>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-3">Branch<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="b_branch" type="text" class="form-control" id="b_branch" placeholder="Branch..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Account No.<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="acc_no" type="text" class="form-control" id="acc_no" placeholder="Account No...." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Date</label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="b_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="b_date" value="<?php echo $current_date; ?>">
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