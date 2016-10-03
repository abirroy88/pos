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
        <div class="card-box table-responsive" style="min-height: 500px">
            <form action="<?php echo base_url(); ?>inventory/insertproduct" id="addForm" name="addForm" method="post" accept-charset="utf-8" class="form-horizontal">
                <h4 class="m-t-0 header-title">
                    <b>Add New Item</b>

                    <div class="input-group pull-right text-right m-b-0" style="padding-bottom: 10px">
                        <button id="loading" style="display: none " disabled="disabled" class="btn btn-warning waves-effect waves-light  btn-xs">Working...
                        </button>
                        <button id="submit" name="submit" class="btn btn-primary waves-effect waves-light  btn-xs" type="submit">Submit
                        </button>
                        <button type="reset" class="btn btn-default waves-effect waves-light m-l-5  btn-xs">
                            Reset
                        </button>
                    </div>
                </h4>
                <hr>

                <div class="row">
                    <div class="col-lg-6 text-left ">
                        <label class="control-label">Details</label>

                        <div class="input-group">
                            <span class="input-group-addon">Item Name</span>
                            <input type="text" id="name" name="name" placeholder="Enter product name" class="form-control input-sm">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Quantity</span>
                            <input type="text" id="quantity" name="quantity" placeholder="Enter product Qty" class="form-control input-sm">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">Item Type</span>
                            <select id="type" name="type" class="form-control input-sm">
                                <option value="1">Inventory</option>  
                                <option value="2">Non Inventory</option>  
                            </select>
                        </div>

                        <label class="control-label" style="padding-top: 10px">IDs</label>
                        <div class="input-group">
                            <span class="input-group-addon">UPC</span>
                            <input type="text" id="upc" name="upc" placeholder="Enter UPC" class="form-control input-sm">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">EAN</span>
                            <input type="text" id="ean" name="ean" placeholder="Enter EAN" class="form-control input-sm">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Item Code</span>
                            <input type="text" id="code" name="code" placeholder="Enter Item Code" class="form-control input-sm">
                        </div>


                        <label class="control-label" style="padding-top: 10px">Organize</label>
                        <div class="input-group">
                            <span class="input-group-addon">Categories</span>
<!--                            <input type="text" id="cat_name" name="cat_name" class="form-control input-sm" placeholder="Type Category Name">                                                      
                            <input type="hidden" name="cat_id" id="cat_id"/>-->
                            <select id="cat_id" name="cat_id" class="form-control input-sm">
                                <option value="">Select One</option>
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
                                <option value="">Select One</option>
                                <?php
                                foreach ($manufacturer as $man) {
                                    ?>

                                    <option value="<?php echo $man->id; ?>"><?php echo $man->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Rack Number</span>
                            <input type="text" id="rack_no" name="rack_no" placeholder="Enter Rack Number" class="form-control input-sm">
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
                                    <td style="padding: 0px"><input type="text" id="price" name="price" placeholder="Enter price" class="form-control input-sm" value="0" onkeyup="myFunction()"></td>
                                    <td style="padding: 0px"><input type="text" id="margin" name="margin" placeholder="Enter margin" class="form-control input-sm" readonly=""></td>
                                </tr>

                                <tr>
                                    <td style="padding: 5px 5px 0px 5px"><input name="is_taxable" id="is_taxable" type="checkbox" value="1"> Taxable</td>
                                    <td style="padding: 0px ">
                                        <select id="tax_calss" name="tax_calss" class="form-control input-sm">
                                            <option value="">Select One</option>
                                            <?php
                                            foreach ($taxclass as $tclass) {
                                                ?>
                                                <option value="<?php echo $tclass->id; ?>"><?php echo $tclass->name . '(' . $tclass->rate . '%)'; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 5px 5px 0px 5px"><input name="is_discount" id="is_discount" type="checkbox" value="1"> Discount Allowed</td>
                                    <td style="padding: 0px">
                                        <select id="discount" name="discount" class="form-control input-sm">
                                            <option value="">Select One</option>
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
                            <input type="text" id="costing" name="costing" placeholder="Enter costing" class="form-control input-sm" value="0" onkeyup="myFunction()">
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
                                <option value="">Select One</option>
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
                            <input type="text" id="reorder_point" name="reorder_point" placeholder="Enter reorder point" class="form-control input-sm">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Desired Level</span>
                            <input type="text" id="desired_inv_level" name="desired_inv_level" placeholder="Enter desired inventory level" class="form-control input-sm">
                        </div>

                    </div>
                </div>
            </form>
        </div>


    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="mySmallModalLabel">Category</h4>
            </div>
            <form method="post" class="form-horizontal">
                <div class="modal-body">
                    <input type="text" id="category" name="category" placeholder="Enter Category" class="form-control input-sm">
                </div>

                <div class="modal-footer">
                    <button id="save" class="btn btn-primary" name="save">Save</button>
                    <button type="button" class="btn btn-default waves-effect pull-right" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div> 
    </div> 
</div>


<script type="text/javascript">
    $("#cat_name").autocomplete({
        source: 'getcatname',
        select: function (event, ui) {
            $("#cat_name").val(ui.item.value);
            $("#cat_id").val(ui.item.id);
            return false;
        }
    });

//    $(document).on("keyup", "#costing", function (event) {
//        var costing = $(this).val();
//        var price = $("#price").val();
//        var margin = price - costing / price * 100;
//
//        $("#margin").append().val(margin);
//    });

    function myFunction() {
       
        var x = document.getElementById("price");
         var y = document.getElementById("costing");
        var z = document.getElementById("margin");
        
        z.value = x.value.valueOf() - y.value.valueOf();
    }
</script>