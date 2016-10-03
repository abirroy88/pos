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
                <b>Discount List</b>
            </h4>
            </br>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Name</th>
                        <th>Rate</th>                        
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($viewdiscount as $discount) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $discount->name; ?></td>
                            <td><?php echo $discount->rate . '%'; ?></td>
                            <td><?php
                                if ($discount->status > 0) {
                                    echo 'Active';
                                } else {
                                    echo 'Inactive';
                                }
                                ?></td>
                            <td class="actions">
                                <a class="btn btn-info btn-xs waves-effect waves-light"  data-toggle="modal" data-target="#con-close-modaledit<?php echo $discount->id; ?>">Edit</a>
                                <a class="btn btn-danger btn-xs waves-effect waves-light" href="<?php echo base_url(); ?>settings/deletediscount/<?php echo $discount->id; ?>">Delete</a>
                            </td>
                        </tr>

                    <div id="con-close-modaledit<?php echo $discount->id; ?>" class="modal fade bs-example-modal-sm" tabindex="<?php echo $discount->id; ?>" role="dialog" aria-labelledby="myModalLabel<?php echo $discount->id; ?>" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-sm"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Edit Discount</h4> 
                                </div> 

                                <div class="modal-body"> 
                                    <form  action="<?php echo base_url(); ?>settings/editdiscount" method="post" id="form">
                                        <input type="hidden" name="id" value="<?php echo $discount->id; ?>">
                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-3" class="control-label">Name</label> 
                                                    <input type="text" class="form-control input-sm" id="" placeholder="Name" name="name" value="<?php echo $discount->name; ?>"> 
                                                </div> 
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-3" class="control-label">Rate</label> 
                                                    <input type="text" class="form-control input-sm" id="" placeholder="Rate" name="rate" value="<?php echo $discount->rate; ?>"> 
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
                <h4 class="modal-title">New Discount</h4> 
            </div> 

            <div class="modal-body"> 
                <form  action="<?php echo base_url(); ?>settings/insertdiscount" method="post" id="form">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Name</label> 
                                <input type="text" class="form-control input-sm" id="name" placeholder="Name" name="name"> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Rate</label> 
                                <input type="text" class="form-control input-sm" id="rate" placeholder="Rate" name="rate"> 
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
