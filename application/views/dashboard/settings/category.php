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


    <div class="col-sm-12" >

        <div class="card-box table-responsive">

            <h4 class="m-t-0 header-title"><button class="pull-right btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</button></h4>


            <h4 class="m-t-0 header-title">
                <b>Product Category List</b>
            </h4>
            </br>



            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr><th>Name</th></tr>
                </thead>


                <tbody>
                    <tr><td>
                            <?php
                            foreach ($category as $cat) {
                                ?>
                                <div style=" border-bottom: 1px solid gray;">
                                    <a href="<?php echo base_url(); ?>settings/cat_details/<?php echo $cat->id; ?>" class="waves-effect waves-light"><?php echo $cat->name; ?></a>
                                </div>
                                <?php
                                $CI = & get_instance('settings');
                                $CI->load->model('setmodel');
                                $result = $CI->setmodel->cat_details_by_parent($cat->id);
                                foreach ($result as $details) {
                                    ?>


                                    <div style=" border-bottom: 1px solid gray;">
                                        <a href="<?php echo base_url(); ?>settings/cat_details/<?php echo $details->id; ?>"  class="waves-effect waves-light" style="padding-left: 2%;"><?php echo $details->name; ?></a>
                                    </div>

                                <?php } 
                                } ?>

                        </td></tr>
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
                <h4 class="modal-title">New Product Category</h4> 
            </div> 

            <div class="modal-body"> 
                <form  action="<?php echo base_url(); ?>settings/insertcat" method="post" id="form">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Name</label> 
                                <input type="text" class="form-control input-sm" id="name" placeholder="Name" name="name"> 
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
