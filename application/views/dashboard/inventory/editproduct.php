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
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
            <div class="panel-body">
                <div class="col-lg-2">
                    <div class="card-box">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header lightSpeedOut">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    
                                </button>
                                <a class="navbar-brand" href="#">Brand</a>
                            </div>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Brand</a>
                            </div>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Brand</a>
                            </div>

                        </nav>

                    </div>


                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive" style="min-height: 500px">
                                <form action="<?php echo base_url(); ?>inventory/updateproduct/<?php echo $itemdetails->tr_id; ?>" id="addForm" name="addForm" method="post" accept-charset="utf-8" class="form-horizontal">
                                    <h4 class="m-t-0 header-title">
                                        <b>Update New Item</b>

                                        <div class="input-group pull-right text-right m-b-0" style="padding-bottom: 10px">
                                            <button id="loading" style="display: none " disabled="disabled" class="btn btn-warning waves-effect waves-light  btn-xs">Working...
                                            </button>
                                            <button id="submit" name="submit" class="btn btn-primary waves-effect waves-light  btn-xs" type="submit">Update
                                            </button>
                                            <a class="btn btn-danger btn-xs waves-effect waves-light" href="<?php echo base_url(); ?>inventory/deleteproduct/<?php echo $itemdetails->tr_id; ?>">Delete</a>
                                        </div>
                                    </h4>
                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6 text-left ">
                                            <label class="control-label">Details</label>

                                            <div class="input-group">
                                                <span class="input-group-addon">Item Name</span>
                                                <input type="text" id="name" name="name" value="<?php echo $itemdetails->name; ?>" class="form-control input-sm">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Quantity</span>
                                                <input type="text" id="quantity" name="quantity" value="<?php echo $itemdetails->quantity; ?>" class="form-control input-sm">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Item Type</span>
                                                <select id="type" name="type" class="form-control input-sm">
                                                    <?php if ($itemdetails->type_id == 1) { ?>
                                                        <option value="1">Inventory</option>  
                                                        <option value="2">Non Inventory</option>
                                                    <?php } else { ?>
                                                        <option value="2">Non Inventory</option>
                                                        <option value="1">Inventory</option> 
                                                    <?php } ?>



                                                </select>
                                            </div>

                                            <label class="control-label" style="padding-top: 10px">IDs</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">UPC</span>
                                                <input type="text" id="upc" name="upc" placeholder="Enter UPC" class="form-control input-sm" value="<?php echo $itemdetails->upc; ?>">
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">EAN</span>
                                                <input type="text" id="ean" name="ean" placeholder="Enter EAN" class="form-control input-sm" value="<?php echo $itemdetails->ean; ?>">
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">Item Code</span>
                                                <input type="text" id="code" name="code" placeholder="Enter Item Code" class="form-control input-sm" value="<?php echo $itemdetails->code; ?>">
                                            </div>


                                            <label class="control-label" style="padding-top: 10px">Organize</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Categories</span>
                                                <select id="cat_id" name="cat_id" class="form-control input-sm">
                                                    <option value="<?php echo $itemdetails->cat_id; ?>"><?php echo $itemdetails->cname; ?></option>
                                                    <?php
                                                    foreach ($category as $cat) {
                                                        ?>

                                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">Manufacturer</span>
                                                <select id="manufacture" name="manufacture" class="form-control input-sm">
                                                    <option value="<?php echo $itemdetails->manufacture_id; ?>"><?php echo $itemdetails->mname; ?></option>
                                                    <?php
                                                    foreach ($manufacturer as $man) {
                                                        ?>

                                                        <option value="<?php echo $man->id; ?>"><?php echo $man->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">Rack Number</span>
                                                <input type="text" id="rack_no" name="rack_no" placeholder="Enter Rack Number" class="form-control input-sm" value="<?php echo $itemdetails->rack_no; ?>">
                                            </div>

                                        </div>

                                        <div class="col-lg-6 text-left ">
                                            <label class="control-label">Pricing</label>

                                            <table class="table-bordered  table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="padding: 3px">Price</th>
                                                        <th style="padding: 3px">Margin</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="Enter price" class="form-control input-sm" value="<?php echo $itemdetails->default_selling_price; ?>"></td>
                                                        <td style="padding: 0px"><input type="text" id="margin" name="margin" placeholder="Enter margin" class="form-control input-sm" value="<?php echo $itemdetails->margin; ?>"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="padding: 5px 5px 0px 5px">
                                                            <?php if ($itemdetails->is_taxable == 1) { ?>
                                                                <input name="is_taxable" id="is_taxable" type="checkbox" value="1" checked=""> 
                                                            <?php } else { ?>
                                                                <input name="is_taxable" id="is_taxable" type="checkbox" value="1"> 
                                                            <?php } ?>


                                                            Taxable</td>
                                                        <td style="padding: 0px ">
                                                            <select id="tax_calss" name="tax_calss" class="form-control input-sm">
                                                                <option value="<?php echo $itemdetails->tax_class_id; ?>"><?php echo $itemdetails->tname . '(' . $itemdetails->trate . '%)'; ?></option>
                                                                <?php
                                                                foreach ($taxclass as $tclass) {
                                                                    ?>
                                                                    <option value="<?php echo $tclass->id; ?>"><?php echo $tclass->name . '(' . $tclass->rate . '%)'; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="padding: 5px 5px 0px 5px">

                                                            <?php if ($itemdetails->is_discount_allow == 1) { ?>
                                                                <input name="is_discount" id="is_discount" type="checkbox" value="1" checked="">
                                                            <?php } else { ?>
                                                                <input name="is_discount" id="is_discount" type="checkbox" value="1">
                                                            <?php } ?>

                                                            Discount Allowed</td>
                                                        <td style="padding: 0px">
                                                            <select id="discount" name="discount" class="form-control input-sm">
                                                                <option value="<?php echo $itemdetails->discount_percentage; ?>"><?php echo $itemdetails->dname . '(' . $itemdetails->drate . '%)'; ?></option>
                                                                <?php
                                                                foreach ($discount as $dis) {
                                                                    ?>

                                                                    <option value="<?php echo $dis->id; ?>"><?php echo $dis->name . '(' . $dis->rate . '%)'; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                <!--<tr>
                                    <td colspan="3" style="padding: 5px 5px 0px 5px"><input name="is_serial_required" id="is_serial_required" type="checkbox" value="1"> Required Serial</td>
                                </tr>-->
                                                </tbody>
                                            </table>


                                            <label class="control-label" style="padding-top: 10px"></label>

                                            <div class="input-group">
                                                <span class="input-group-addon">Costing</span>
                                                <input type="text" id="costing" name="costing" placeholder="Enter costing" class="form-control input-sm" value="<?php echo $itemdetails->default_buying_price; ?>">
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">Unit</span>
                                                <select id="unit" name="unit" class="form-control input-sm">
                                                    <option value="Pice">Pice</option>
                                                </select>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">Default Vendor</span>
                                                <select id="vendor" name="vendor" class="form-control input-sm">
                                                    <option value="<?php echo $itemdetails->vendor_id; ?>"><?php echo $itemdetails->vname; ?></option>
                                                    <?php
                                                    foreach ($vendor as $ven) {
                                                        ?>

                                                        <option value="<?php echo $ven->id; ?>"><?php echo $ven->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <label class="control-label" style="padding-top: 10px"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Reorder Point</span>
                                                <input type="text" id="reorder_point" name="reorder_point" placeholder="Enter reorder point" class="form-control input-sm" value="<?php echo $itemdetails->reorder_point; ?>">
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">Desired Level</span>
                                                <input type="text" id="desired_inv_level" name="desired_inv_level" placeholder="Enter desired inventory level" class="form-control input-sm" value="<?php echo $itemdetails->desired_inv_level; ?>">
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<script>
//$('#addForm').submit(function (event) {
//    dataString = $("#addForm").serialize();
//    $.ajax({
//        type:"POST",
//        url:"<?php echo base_url(); ?>inventory/insertitem",
//        data:dataString,
//
//        success:function (data) {
//            alert('test');
//        }
//
//    });
//    event.preventDefault();
//});

</script>