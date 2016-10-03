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
            <div class="row">
                <form  action="<?php echo base_url(); ?>settings/updatecat" method="post" id="form">
                    <input type="hidden" id="id" name="id" value="<?php echo $name->id; ?>">
                    <div style=" padding-bottom: 35px;">
                        <div class="col-sm-2">
                            <span class="input-group-addon" style=" padding-right: 10px; text-align: left;">Category Name</span>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="name" name="name" placeholder="Category Name" class="form-control input-sm" style="width:50%;" value="<?php echo $name->name; ?>">
                        </div>
                        <div class="col-sm-2"><button class="pull-right btn btn-primary btn-sm waves-effect waves-light">Update</button></div>
                    </div>
                    </form>
                    <div style=" padding-bottom: 50px;">
                        <div class="col-sm-2">
                            <span class="input-group-addon" style=" padding-right: 10px; text-align: left;">Parent </span>
                        </div>
                        <div class="col-sm-8">
                            <?php
                            if ($name->parent_id > 0) {?>
                            <a href="<?php echo base_url(); ?>settings/cat_details/<?php echo $name->id; ?>"><?php echo $parent->name; ?></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>settings/cat_details/<?php echo $name->id; ?>"><?php echo 'None'; ?></a>
                            <?php }
                            ?>
                        </div>
                        <div class="col-sm-2"><a href="<?php echo base_url(); ?>settings/deletecategory/<?php echo $name->id; ?>" class="pull-right btn btn-danger btn-sm waves-effect waves-light">Delete</a></div>
                    </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12" style=" height: 35px; background-color: lightgray; font-size: 25; width: 98%; margin-left:1%;"><b>Add Subcategory</b></div>
                <form  action="<?php echo base_url(); ?>settings/insertsubcat" method="post" id="form">
                    <input type="hidden" id="parent_id" name="parent_id" value="<?php echo $name->id; ?>">
                    <div class="col-sm-2">
                        <span class="input-group-addon" style="text-align: left;">Name</span>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" id="name" name="name" placeholder="Name" class="form-control input-sm" value="">
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-block btn-sm btn-inverse">Add Subcategory</button>
                    </div>

                </form>

            </div>
            </br>


            <h4 class="m-t-0 header-title">
                <b>Sub Category</b>
            </h4>
            </br>


            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <th>Name</th>
                </thead>


                <tbody>
                    <tr>
    
                    <?php
                        foreach ($cat_details_by_id as $details) {
                    ?>
                            <td colspan="">
                                <a href="<?php echo base_url(); ?>settings/cat_details/<?php echo $details->id; ?>"  class="waves-effect waves-light"><?php echo $details->name; ?></a></td>
                            </td>
    
                    <?php
                        }
                    ?>
    
    
                    </tr>

                    <?php
                    foreach ($cat_details_by_parent as $details) {
                        ?>
                        <tr>

                            <td>
                                <a href="<?php echo base_url(); ?>settings/cat_details/<?php echo $details->id; ?>"  class="waves-effect waves-light" style="padding-left: 2%;"><?php echo $details->name; ?></a></td>
                            </td> 
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

