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
            <h4 class="m-t-0 header-title"><a href="<?php echo base_url(); ?>inventory/addproduct" class="pull-right btn btn-success waves-effect btn-xs" style="margin-bottom:10px"><span class="btn-label"><i class="fa  fa-plus"></i></span>Add Item</a></h4>

            <h4 class="m-t-0 header-title">
                <b>Product List</b>
            </h4>
            </br>

            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Av Cost</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Category</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($itemlist as $item) {
                        ?>
                    <tr>
                        
                        <td><a href="<?php echo base_url(); ?>inventory/editproduct/<?php echo $item->tr_id; ?>"><?php echo $item->name; ?></a></td>
                        <td><?php echo $item->quantity; ?></td>
                        <td><?php echo $item->unit_cost; ?></td>
                        <td><?php echo $item->default_selling_price; ?></td>
                        <td><?php echo $item->default_selling_price/100*$item->rate; ?></td>
                        <td><?php echo $item->cname; ?></td>
                        
                    </tr>
                    <?php 
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

