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

<div class="row">

    <div class="col-sm-12">

        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><button class="pull-right btn btn-success waves-effect btn-xs" data-toggle="modal" data-target="#con-close-modal">Add New</button></h4>


            <h4 class="m-t-0 header-title">
                <b>Pricing Rules</b>
            </h4>
            </br>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Name</th>
                        <th>Percent</th>                        
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($viewpricingrule as $pricingrule) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $pricingrule->name; ?></td>
                            <td><?php echo $pricingrule->percent . '%'; ?></td>
                            <td><?php
                                if ($pricingrule->status > 0) {
                                    echo 'Active';
                                } else {
                                    echo 'Inactive';
                                }
                                ?></td>
                            <td class="actions">
                                <a class="btn btn-info btn-xs waves-effect waves-light"  data-toggle="modal" data-target="#con-close-modaledit<?php echo $pricingrule->id; ?>">Edit</a>
                                <a class="btn btn-danger btn-xs waves-effect waves-light" href="<?php echo base_url(); ?>settings/deletepricingrule/<?php echo $pricingrule->id; ?>">Delete</a>
                            </td>
                        </tr>

                    <div id="con-close-modaledit<?php echo $pricingrule->id; ?>" class="modal fade bs-example-modal-sm" tabindex="<?php echo $pricingrule->id; ?>" role="dialog" aria-labelledby="myModalLabel<?php echo $pricingrule->id; ?>" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-sm"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Edit Pricing Rule</h4> 
                                </div> 

                                <div class="modal-body"> 
                                    <form  action="<?php echo base_url(); ?>settings/editpricingrule" method="post" id="form">
                                        <input type="hidden" name="id" value="<?php echo $pricingrule->id; ?>">
                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-3" class="control-label">Name</label> 
                                                    <input type="text" class="form-control input-sm" id="" placeholder="Name" name="name" value="<?php echo $pricingrule->name; ?>"> 
                                                </div> 
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-3" class="control-label">Percent</label> 
                                                    <input type="text" class="form-control input-sm" id="" placeholder="Percent" name="percent" value="<?php echo $pricingrule->percent; ?>"> 
                                                </div> 
                                            </div>
                                        </div> 
                                </div>
                                <div class="modal-footer"> 
                                    <button type="submit" class="btn btn-info">Update</button> 
                                    <button type="button" class="btn btn-default waves-effect pull-right" data-dismiss="modal">Close</button> 

                                </div>
                                </form>

                            </div> 
                        </div>
                    </div><!-- /.modal -->

                    <?php
                    $sl++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="con-close-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">New Pricing Rule</h4> 
            </div> 

            <div class="modal-body"> 
                <form  action="<?php echo base_url(); ?>settings/insertpricingrule" method="post" id="form">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Name</label> 
                                <input type="text" class="form-control input-sm" id="name" placeholder="Name" name="name"> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Percent</label> 
                                <input type="text" class="form-control input-sm" id="percent" placeholder="Percent" name="percent"> 
                            </div> 
                        </div>
                    </div> 
            </div>
            <div class="modal-footer"> 
                <button type="submit" class="btn btn-info">Save</button> 
                <button type="button" class="btn btn-default waves-effect pull-right" data-dismiss="modal">Close</button> 

            </div>
            </form>

        </div> 
    </div>
</div><!-- /.modal -->
