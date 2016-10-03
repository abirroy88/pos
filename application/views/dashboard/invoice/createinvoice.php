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
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Create Invoice</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(); ?>billingcontroller/insertinvoice" method="POST" role="form">
                <div class="box-body">

                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <div id="select_box">
                                    <label>Client<sup>*</sup></label>
                                    <input type="text" id="tags_11" data-type="cstName"  name="cst_name" placeholder="Client Name" class="customer form-control">
                                    <input type="hidden" name="cst_id" id="cst_id"/>
                                </div> 
                            </div>
                        </div>



                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Invoice No.</label>
                                <input name="invoice_id" type="text" readonly placeholder="Invoice No." class="form-control" value="<?php echo $randomSerialNUmber; ?>">
                            </div>                           
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Domain Name</label>
                                <input name="domain_name" type="text" placeholder="Domain Name" class="form-control" value="">
                            </div>                           
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Exp Date</label>
                                <div class="dynamic_date">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="domain_expire" id="domain_expire" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                                    </div><!-- /.input group -->
                                </div>
                            </div>                           
                        </div>

                        <div class="col-md-2">                            
                            <div class="form-group">
                                <label>Invoice Date</label>
                                <div class="dynamic_date">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="invoice_date" id="invoice_date" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                                    </div><!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Due Date</label>
                                <div class="dynamic_date">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="due_date" id="due_date" value="<?php echo $current_date; ?>"   type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                                    </div><!-- /.input group -->
                                </div>
                            </div>
                        </div>



                    </div> 

                    <div class="box-header">
                        <h3 class="box-title">Products</h3>
                    </div><!-- /.box-header -->
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Product Name</th>
                                    <th>Details</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody id="tableDynamic">
                                <tr>
                                    <td>1.</td>
                                    <td><input type="text" id="tags_1" data-type="productName"  name="product_name[]" placeholder="Product Name" class="proname form-control"></td>
                                    <td><input type="text" id="details_1" data-type="productDetails"  name="product_details[]" placeholder="Product Details" class="proname form-control"></td>
                                    <td><input type="text" name="quantity[]" id="quantity_1"    placeholder="Quantity" class="quant form-control"></td>
                                    <td><input type="hidden"  name="purchasing_price[]"  placeholder="Unit Price" id="unitcost_1" class="purchaseprice form-control"><input type="text"  name="selling_price[]"  placeholder="Unit Price" id="unitprice_1" class="unitprice form-control"></td>
                                    <td><input type="text" id="totalprice_1"   name="total_price[]"  readonly   placeholder="Total Price.." class="totalprice form-control"></td>
                                    <td><a href="javascript:void(0);" id="deleteRow_1"  class="deleteRow btn btn-danger btn-flat btn-sm">Delete</a></td>
                                </tr>

                            </tbody>
                        </table>
                        <table class="table">
                            <tr>
                                <td style="width: 48%;border-top: medium none;"><a href="javascript:void(0);" id="addRow" class="btn btn-info btn-flat btn-sm">Add Product</a></td>
                                <td style="width: 22%;border-top: medium none;">Sub Total</td>
                                <td style="border-top: medium none;"><input name="sub_total" type="text" id="subtotal"  readonly   name="sub_total" placeholder="Sub Total Price.." class="form-control"></td>
                            </tr>
                            <tr>
                                <td rowspan="6" style="border-top: medium none;">
                                    <label for="">Note<sup>*</sup></label>
                                    <textarea name="note" class="" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </td>
                                <td style="border-top: medium none;">Vat</td>
                                <td style="border-top: medium none;"><input  type="hidden" id="vat_rate" name="vat_rate"  placeholder="Vat Rate" class="form-control" value="<?php echo $vat_rate->vat_rate; ?>"><input nam type="text" id="vat_amount" name="vat_amount"  readonly  placeholder="Total Vat Amount.." class="form-control"></td>
                            </tr>
                            <tr>
                                <!--<td style="border-top: medium none;"></td>-->
                                <td style="border-top: medium none;">Grand Total</td>
                                <td style="border-top: medium none;"><input  type="text" id="grandtotal" name="grand_total"  readonly  placeholder="Total Price.." class="form-control"></td>
                            </tr>
                            <tr>

                                <td style="border-top: medium none;">Discount</td>
                                <td style="border-top: medium none;"><input type="text" name="discount" id="discount"   name="discount" placeholder="Discount.." class="form-control"></td>
                            </tr>


                            <tr>
                                <!--<td style="border-top: medium none;"></td>-->
                                <td style="border-top: medium none;">Net Total</td>
                                <td style="border-top: medium none;"><input  type="text" id="net_total" name="net_total"  readonly placeholder="Net Total.." class="form-control"></td>
                            </tr>
                            <input type="hidden" id="paidamount"   name="paid_amount" placeholder="Paid Amount.." class="form-control">
                            <!--<tr>
                                <td style="border-top: medium none;"></td>
                                <td style="border-top: medium none;">Paid Amount</td>
                                <td style="border-top: medium none;"><input type="text" id="paidamount"   name="paid_amount" placeholder="Paid Amount.." class="form-control"></td>
                            </tr>-->
                            <tr>
                                <!--<td style="border-top: medium none;"></td>-->
                                <td style="border-top: medium none;">Due Amount</td>
                                <td style="border-top: medium none;"><input type="text" id="dueamount"  readonly   name="due_amount" placeholder="Due Amount.." class="form-control"></td>
                            </tr>
                        </table>
                    </div>

                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat"  onclick="return checkadd();">Create Invoice</button>
                </div>
            </form>
        </div>
    </div>  
</div>


<script type="text/javascript">
                        var scntDiv = $('#tableDynamic');
                        var i = $('#tableDynamic tr').size() + 1;
                        $("#tags_11").autocomplete({
                            source: 'getcustomername',
                            select: function(event, ui) {
                                $("#tags_11").val(ui.item.value);
                                $("#cst_id").val(ui.item.id);
                                return false;
                            }
                        });
                        $('#addRow').on('click', function() {
                            $('<tr><td>' + i + '</td><td><input type="text" id="tags_' + i + '" data-type="productName"  name="product_name[]" placeholder="Product Name" class="proname form-control"></td><td><input type="text" id="details_' + i + '" data-type="productDetails"  name="product_details[]" placeholder="Product Details" class="prodetails form-control"></td><td><input type="text" name="quantity[]" id="quantity_' + i + '"  placeholder="Quantity" class="quant form-control"></td><td><input type="hidden"  name="purchasing_price[]"  placeholder="Unit Price" id="unitcost_' + i + '" class="purchaseprice form-control"><input type="text" name="selling_price[]" id="unitprice_' + i + '"    placeholder="Unit Price" class="unitprice form-control"></td><td><input type="text" id="totalprice_' + i + '"   name="total_price[]" readonly placeholder="Total Price.." class="totalprice form-control"></td><td><a href="javascript:void(0);" id="deleteRow_' + i + '"  class="deleteRow btn btn-danger btn-flat btn-sm">Delete</a></td></tr>').appendTo(scntDiv);



                            i++;

                            return false;
                        });


                        $(document).on("click", ".deleteRow", function(e) {
                            if ($('#tableDynamic tr').size() > 1) {
                                var target = e.target;

                                var id_arr = $(this).attr('id');
                                var id = id_arr.split("_");
                                var element_id = id[id.length - 1];
                                //console.log(element_id);

                                var totalprice = parseFloat($("#totalprice_" + element_id).val());
                                var subtotal = parseFloat($("#subtotal").val());
                                var grandtotal = parseFloat($("#grandtotal").val());
                                var net_total = parseFloat($("#net_total").val());
                                var dueamount = parseFloat($("#dueamount").val());

                                if (!isNaN(totalprice)) {


                                    $("#subtotal").val(subtotal - totalprice);
                                    $("#grandtotal").val(grandtotal - totalprice);
                                    $("#net_total").val(grandtotal - totalprice);
                                    $("#dueamount").val(dueamount - totalprice);

                                    var vat_rate = parseFloat($("#vat_rate").val());

                                    var subtotal = parseFloat($("#subtotal").val());
                                    var vat_amount = subtotal / 100 * vat_rate;
                                    //console.log(vat_rate);


                                    $("#vat_amount").append().val(vat_amount);
                                    $("#grandtotal").append().val(subtotal + vat_amount);
                                    $("#net_total").append().val(subtotal + vat_amount);
                                    $("#dueamount").append().val(subtotal + vat_amount);

                                }

                                $(target).closest('tr').remove();


                            } else {
                                //alert('One row should be present in table');
                            }
                        });


                        $(document).on("keyup", ".proname", function(event) {
                            var proname = $(this).val();
                            var id_arr = $(this).attr('id');
                            var id = id_arr.split("_");
                            var element_id = id[id.length - 1];
                            //console.log(proname);






                        });

                        $(document).on("keyup", ".unitprice", function(event) {
                            var unitprice = $(this).val();
                            var id_arr = $(this).attr('id');
                            var id = id_arr.split("_");
                            var element_id = id[id.length - 1];
                            //console.log(element_id);

                            var total = unitprice * $("#quantity_" + element_id).val();

                            $("#totalprice_" + element_id).val(total);

                            function findTotals() {
                                $("#tableDynamic tr").each(function() {
                                    row_total = 0;
                                    $("td .totalprice").each(function() {
                                        row_total += Number($(this).val());
                                    });
                                    $("#subtotal").append().val(row_total);

                                });
                            }
                            row = findTotals();

                            var vat_rate = parseFloat($("#vat_rate").val());
                            var subtotal = parseFloat($("#subtotal").val());
                            var dueamount = parseFloat($("#dueamount").val());

                            var vat_amount = subtotal / 100 * vat_rate;
                            //console.log(vat_rate);


                            $("#vat_amount").append().val(vat_amount);
                            $("#grandtotal").append().val(subtotal + vat_amount);
                            $("#net_total").append().val(subtotal + vat_amount);
                            $("#dueamount").append().val(subtotal + vat_amount);
                        });

                        $(document).on("keyup", ".quant", function() {
                            var quant = parseInt($(this).val());
                            var id_arr = $(this).attr('id');
                            var id = id_arr.split("_");
                            var element_id = id[id.length - 1];
                            //console.log(element_id);

                            var totalprice = $("#totalprice_" + element_id).val();
                            //console.log(totalprice);

                            //console.log($("#unitprice_"+element_id).val());
                            //console.log($("#quantity_"+element_id).val());
                            //var stock = localStorage.getItem("stock");

                            $("#totalprice_" + element_id).prop('value', '');
                            $("#totalprice_" + element_id).attr({placeholder: 'Total Price...'});


                            //console.log("Current Stock "+stock);
                            //console.log("Current Quantity "+quant);

                            //console.log(quant>stock);
                            //console.log(quant<stock);


                            //console.log(0);
                            var total = $("#unitprice_" + element_id).val() * $("#quantity_" + element_id).val();

                            $("#totalprice_" + element_id).val(total);

                            function findTotals() {
                                $("#tableDynamic tr").each(function() {
                                    row_total = 0;
                                    $("td .totalprice").each(function() {
                                        row_total += Number($(this).val());
                                    });
                                    $("#subtotal").append().val(row_total);

                                });
                            }
                            row = findTotals();

                            var vat_rate = parseFloat($("#vat_rate").val());
                            var subtotal = parseFloat($("#subtotal").val());
                            var dueamount = parseFloat($("#dueamount").val());

                            var vat_amount = subtotal / 100 * vat_rate;
                            //console.log(vat_rate);


                            $("#vat_amount").append().val(vat_amount);
                            $("#grandtotal").append().val(subtotal + vat_amount);
                            $("#net_total").append().val(subtotal + vat_amount);
                            $("#dueamount").append().val(subtotal + vat_amount);






                        });

                        $(document).on("keyup", "#discount", function(event) {
                            var discount = $(this).val();
                            //console.log(discount);
                            var subtotal = parseFloat($("#subtotal").val());
                            var grandtotal = parseFloat($("#grandtotal").val());
                            var dueamount = parseFloat($("#dueamount").val());

                            //$("#grandtotal").append().val(subtotal - discount);
                            //$("#dueamount").append().val(subtotal - discount);

                            var vat_rate = parseFloat($("#vat_rate").val());
                            var grandtotal = parseFloat($("#grandtotal").val());
                            var dueamount = parseFloat($("#dueamount").val());

                            var vat_amount = grandtotal / 100 * vat_rate;
                            //console.log(vat_rate);


                            //$("#vat_amount").append().val(vat_amount);
                            $("#net_total").append().val(grandtotal - discount);
                            $("#dueamount").append().val(grandtotal - discount);
                        });




                        $(document).on("keyup", "#paidamount", function(event) {
                            var paidamount = $(this).val();
                            var net_total = $("#net_total").val();
                            var dueamount = $("#dueamount").val();

                            $("#dueamount").append().val(net_total - paidamount);
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



</script>


