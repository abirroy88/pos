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
        <h3 class="box-title pull-left">Company</h3> 

        <h3 class="box-title pull-right" style="padding-right:10px;"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addEmployee-modal"><i class="glyphicon glyphicon-plus"></i>Add New</button></h3> 
    </div>


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Name</th>                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $si = 1;
                foreach ($companylist as $company) {
                    ?>
                    <tr>
                        <td><?php echo $si; ?></td>
                        <td><?php echo $company->com_name; ?></td>                     
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
                            <?php if ($company->status == 0) { ?>
                                <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editEmployee-modal-<?php echo $company->id; ?>">Edit</a>
                            <?php } ?>
                           
                                
                                <div class="modal fade" id="editEmployee-modal-<?php echo $company->id; ?>" tabindex="-<?php echo $company->id; ?>" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Company</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>dashboardcontroller/editcompany" method="post" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $company->id; ?>" name="id"/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                                            <label class="control-label">Name</label>
                                                        </div>
                                                        <div class="col-md-8" style="padding-bottom: 10px;">
                                                            <input name="com_name" type="text" class="form-control" id="dep_name" placeholder="Name" value="<?php echo $company->com_name; ?>">
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
                            <a href="<?php echo base_url(); ?>dashboardcontroller/deletecompanybyid/<?php echo $company->id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
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
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Company</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboardcontroller/insertcompany" method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md-9">
                            <input name="com_name" type="text" class="form-control" id="com_name" placeholder="Company" required>
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