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
        <h3 class="box-title pull-left">Employees</h3> 

        <h3 class="box-title pull-right" style="padding-right:20px;"><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addIncrement-modal"><i class="glyphicon glyphicon-plus"></i>Increment</button></h3>  
        <h3 class="box-title pull-right" style="padding-right:10px;"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addEmployee-modal"><i class="glyphicon glyphicon-plus"></i>Employee</button></h3> 
    </div>


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Name</th>                    
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Jn-Date</th>
                    <th>Ap-Date</th>
                    <th>Salary</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($employeeinvoice as $employee) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $employee->e_name; ?></td>
                        <td><?php echo $employee->address; ?></td>
                        <td><?php echo $employee->dob; ?></td>
                        <td><?php echo $employee->jn_date; ?></td>
                        <td><?php echo $employee->ap_date; ?></td>
                        <td><?php echo $employee->b_salary; ?></td>
                        <td><?php echo $employee->dep_name; ?></td>
                        <td><?php echo $employee->designation; ?></td>
                        <td>
                            <?php
                            if ($employee->status == 0) {
                                ?><input name="id" value="<?php echo $employee->id; ?>" type="hidden" placeholder="" class=""><a href="<?php echo base_url(); ?>employeecontroller/inactivateemp/<?php echo $employee->id; ?>" id="inactivate" class="btn btn-warning btn-flat btn-xs">Inactive</a><?php
                            }
                            ?>
                            <?php
                            if ($employee->status == 1) {
                                ?><input name="id"  value="<?php echo $employee->id; ?>" type="hidden" placeholder="" class=""><a href="<?php echo base_url(); ?>employeecontroller/activateemp/<?php echo $employee->id; ?>" id="activate" class="btn btn-success btn-flat btn-xs">Active</a><?php
                            }
                            ?>
                            <?php if ($employee->increment_status == 0) { ?>
                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editEmployee-modal-<?php echo $employee->id; ?>">Edit</a>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>employeecontroller/employeestatement/<?php echo $employee->e_id; ?>" class="btn btn-vk btn-xs btn-flat">History</a>


                            <div class="modal fade" id="editEmployee-modal-<?php echo $employee->id; ?>" tabindex="-<?php echo $employee->id; ?>" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Edit Employee</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>employeecontroller/editemployee" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $employee->e_id; ?>" name="e_id"/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Name</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="e_name" type="text" class="form-control" id="e_name" placeholder="Name" value="<?php echo $employee->e_name; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Department</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <select name="dep_id" id="" class="form-control" required>
                                                                <option value="<?php echo $employee->dep_id; ?>"><?php echo $employee->dep_name; ?></option>
                                                                <?php foreach ($empdepartment as $department) {
                                                                    ?><option value="<?php echo $department->id; ?>"><?php echo $department->dep_name; ?></option><?php }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Designation<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="designation" type="text" class="form-control" id="designation" placeholder="Designation..." value="<?php echo $employee->designation; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Salary<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="b_salary" type="text" class="form-control" id="b_salary" placeholder="Basic Salary..." value="<?php echo $employee->b_salary; ?>">
                                                        </div>


                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Mobile<sup>*</sup></label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="e_mobile" type="text" class="form-control" id="e_mobile" placeholder="Mobile Number" value="<?php echo $employee->e_mobile; ?>">
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Birth Date</label>
                                                        </div>
                                                        <div class="dynamic_date">
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <input type="text" id="dob" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="dob" value="<?php echo $employee->dob; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Appointment Date</label>
                                                        </div>
                                                        <div class="dynamic_date">
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <input type="text" id="ap_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="ap_date" value="<?php echo $employee->ap_date; ?>">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Joining Date</label>
                                                        </div>
                                                        <div class="dynamic_date">
                                                            <div class="col-md-8" style="padding-bottom: 10px;">
                                                                <input type="text" id="jn_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="jn_date" value="<?php echo $employee->jn_date; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Address</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <textarea name="address" placeholder="Address....." rows="3" id="address" class="form-control"><?php echo $employee->address; ?></textarea>
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
                            <a href="<?php echo base_url(); ?>employeecontroller/deleteemployeebyid/<?php echo $employee->e_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
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
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Employee</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>employeecontroller/insertemployee" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="control-label col-md-3">Name<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="e_name" type="text" class="form-control" id="e_name" placeholder="Name" required>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-3">Department<sup>*</sup></label>
                        <div class="col-md-9">
                            <select name="dep_id" id="" class="form-control" required>
                                <option value="">Select</option>
                                <?php foreach ($empdepartment as $department) {
                                    ?><option value="<?php echo $department->id; ?>"><?php echo $department->dep_name; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Designation<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="designation" type="text" class="form-control" id="designation" placeholder="Designation..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Salary<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="b_salary" type="text" class="form-control" id="b_salary" placeholder="Basic Salary..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Mobile<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="e_mobile" type="text" class="form-control" id="e_mobile" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Birth Date</label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="dob" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="dob" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Appointment Date</label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="ap_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="ap_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Joining Date</label>
                        <div class="dynamic_date">
                            <div class="col-md-9">
                                <input type="text" id="jn_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="jn_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <textarea name="address" placeholder="Address....." rows="3" id="address" class="form-control"></textarea>
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


<div class="modal fade" id="addIncrement-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Increment</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>employeecontroller/insertincrement" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="control-label col-md-4">Employee<sup>*</sup></label>
                        <div class="col-md-8">
                            <select name="emp_id" id="emp_id" class="form-control" required>
                                <option value="">Select Employee</option>
                                <?php foreach ($employee_name as $ename) {
                                    ?><option value="<?php echo $ename->e_id; ?>"><?php echo $ename->e_name; ?></option><?php }
                                ?>
                            </select>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-md-4">Present Salary</label>
                        <div class="col-md-8">
                            <input name="p_salary" type="text" class="form-control" id="p_salary" placeholder="Basic Salary..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Increment Amount<sup>*</sup></label>
                        <div class="col-md-8">
                            <input name="i_salary" type="text" class="form-control" id="i_salary" placeholder="Increment amount..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Date<sup>*</sup></label>
                        <div class="dynamic_date">
                            <div class="col-md-8">
                                <input type="text" id="i_date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="i_date" value="<?php echo $current_date; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Note</label>
                        <div class="col-md-8">
                            <textarea name="i_note" placeholder="Note....." rows="3" id="i_note" class="form-control"></textarea>
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



    $(function () {
        $("#emp_id").change(function () {
            var emp_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>employeecontroller/getempsalary/",
                data: 'emp_id=' + emp_id,
                dataType: 'json',
                success: function (data) {
                    $('#p_salary').val(data.b_salary);
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