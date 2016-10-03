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
            <h4 class="m-t-0 header-title"><a href="<?php echo base_url(); ?>inventory/addvendor" class="pull-right btn btn-success waves-effect btn-xs" style="margin-bottom:10px"><span class="btn-label"><i class="fa  fa-plus"></i></span>Add Vendor</a></h4>


            <h4 class="m-t-0 header-title">
                <b>Vendor List</b>
            </h4>
            </br>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($viewvendors as $vendors) {
                        ?>
                        <tr>
                            <td><a href="<?php echo base_url(); ?>inventory/editvendor/<?php echo $vendors->id; ?>"><?php echo $vendors->name; ?></a></td>
                            <td><?php echo $vendors->phone; ?></td>
                            <td><?php echo $vendors->mobile; ?></td>
                            <td><?php echo $vendors->email; ?></td>
                            
                            
                           
                        </tr>
                        <?php
                        $sl++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

