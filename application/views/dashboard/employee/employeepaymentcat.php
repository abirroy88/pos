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
        <h3 class="box-title pull-left">Employees Expense Category</h3>   
        <h3 class="box-title pull-right" style="padding-right:20px;"><button class="btn btn-success" data-toggle="modal" data-target="#addEmployee-modal"><i class="glyphicon glyphicon-plus"></i>Add Category</button></h3>  
    </div><!-- /.box-header -->


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($employee_expense_type as $expense_type) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $expense_type->emp_exp_name; ?></td>
                        <td>
                            <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editEmployee-modal-<?php echo $expense_type->id; ?>">Edit</a>
                            <?php //if ($employee->id != '') { ?>
                                <!--<a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#historyEmployee-modal-<?php //echo $employee->id;                     ?>">History</a>-->
                            <?php
                            //} else {
                            //}
                            ?>
                            <div class="modal fade" id="editEmployee-modal-<?php echo $expense_type->id; ?>" tabindex="-<?php echo $expense_type->id; ?>" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Edit Employee Expense Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>employeecontroller/editemployeeexpcat" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $expense_type->id; ?>" name="id"/>
                                                <div class="row">
                                                    <div class="col-md-12">                                                       

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Category Name</label>
                                                        </div>

                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="emp_exp_name" type="" class="form-control" id="emp_exp_name" placeholder="" value="<?php echo $expense_type->emp_exp_name; ?>" required>
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
                            <a href="<?php echo base_url(); ?>employeecontroller/deleteemployeeexpcatbyid/<?php echo $expense_type->id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
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
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Employee Expense Category</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>employeecontroller/insertemployeeexpcat" method="post" class="form-horizontal">


                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Category Name<sup>*</sup></label>
                        <div class="col-md-8">
                            <input name="emp_exp_name" type="text" class="form-control" id="emp_exp_name" placeholder="Enter" required>
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