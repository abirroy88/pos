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
                <h3 class="box-title">Due Invoice</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="customer_name">Customer Name<sup>*</sup></label>
                            <input name="customer_name" type="text" class="form-control" id="customername"   readonly  placeholder="Customer Name" value="<?php echo $queryinvoicebyinvoiceid->cst_company; ?>">
                        </div>
                    </div>

                    <div class="col-md-2">                        
                        <div class="form-group">
                            <label>Invoice No.</label>
                            <input name="invoice_id" type="text" readonly placeholder="Invoice No." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->invoice_id; ?>">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Domain Name</label>
                            <input name="domain_name" type="text" placeholder="Domain Name" class="form-control" value="<?php echo $queryinvoicebyinvoiceid->domain_name; ?>">
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
                                    <input name="domain_expire" id="domain_expire" value="<?php echo $queryinvoicebyinvoiceid->domain_expire; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                                </div><!-- /.input group -->
                            </div>
                        </div>                           
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Invoice Date:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="invoice_date" value="<?php echo $queryinvoicebyinvoiceid->invoice_date; ?>"   readonly    type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Due Date:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="due_date" value="<?php echo $queryinvoicebyinvoiceid->due_date; ?>"   readonly    type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
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
                            <th>Product Name</th
                            <th>Details</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody id="">
                        <?php foreach ($queryinvoiceditembyinvoiceid as $queryinvoiceditem) {
                            ?><tr>
                                <td><input type="text" id="tags_1" data-type="productName"   readonly   name="product_name" placeholder="Product Name" class="proname form-control" value="<?php echo $queryinvoiceditem->product_name; ?>"></td>
                                <td><input type="text" id="details_1" data-type="productDetails"  name="product_details[]" placeholder="Product Details" class="proname form-control" value="<?php echo $queryinvoiceditem->product_details; ?>" readonly></td>
                                <td><input type="text" name="quantity" id="quantity_1"    readonly    placeholder="Quantity" class="quant form-control" value="<?php echo $queryinvoiceditem->quantity; ?>"></td>
                                <td><input type="hidden"  name="purchasing_price"  placeholder="Unit Price" id="unitcost_1" class="purchaseprice form-control"><input type="text"   readonly   name="selling_price"  placeholder="Unit Price" id="unitprice_1" class="unitprice form-control" value="<?php echo $queryinvoiceditem->selling_price; ?>"></td>
                                <td><input type="text" id="totalprice_1"   name="total_price"  readonly   placeholder="Total Price.." class="totalprice form-control" value="<?php echo $queryinvoiceditem->total_price; ?>"></td>
                            </tr><?php }
                        ?>

                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td rowspan="11" style="border-top: medium none;">
                            <label for="">Note<sup>*</sup></label>
                            <textarea name="note" readonly class="" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $queryinvoicebyinvoiceid->note; ?></textarea></td>
                        <td style="width: 22%;border-top: medium none;">Sub Total</td>
                        <td style="border-top: medium none;"><input name="sub_total" type="text" id="subtotal"  readonly   name="sub_total" placeholder="Sub Total Price.." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->sub_total; ?>"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;">Discount</td>
                        <td style="border-top: medium none;"><input type="text" name="discount" id="discount"   readonly    name="discount" placeholder="Discount.." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->discount; ?>"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;">Grand Total</td>
                        <td style="border-top: medium none;"><input nam type="text" id="grandtotal" name="grand_total"  readonly   name="grand_total" placeholder="Total Price.." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->grand_total; ?>"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;">Vat Amount</td>
                        <td style="border-top: medium none;"><input nam type="text" id="grandtotal" name="grand_total"  readonly   name="grand_total" placeholder="Total Price.." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->vat_amount; ?>"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;">Net Total</td>
                        <td style="border-top: medium none;"><input nam type="text" id="grandtotal" name="grand_total"  readonly   name="grand_total" placeholder="Total Price.." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->net_total; ?>"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;">Paid Amount</td>
                        <td style="border-top: medium none;"><input type="text" id="paidamount"   readonly    name="paid_amount" placeholder="Paid Amount.." class="form-control" value="<?php echo $queryinvoicebyinvoiceid->paid_amount; ?>"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;"><b style="font-size: 20px;">Due Payment History</b></td>
                        <td style="border-top: medium none;"></td>
                    </tr>
                    <tr>
                        <td style="border-top: medium none;"><b>Payment Date</b></td>
                        <td style="border-top: medium none;"><b>Payment Amount</b></td>
                    </tr>
                    <?php foreach ($duepaymenthistorybyinvoiceid as $duepaymenthistory) {
                        ?><tr>
                            <td style="border-top: medium none;"><?php echo $duepaymenthistory->payment_date; ?></td>
                            <td style="border-top: medium none;"><?php echo $duepaymenthistory->first_payment; ?></td>
                        </tr><?php }
                    ?>


                    <tr>
                        <td style="border-top: medium none;"><b style="font-size: 20px;">Due Payment</b></td>
                        <td style="border-top: medium none;" ><b style="font-size: 20px;"><?php
                                if ($queryinvoicebyinvoiceid->due_amount != 0) {
                                    echo $queryinvoicebyinvoiceid->due_amount;
                                } else {
                                    echo "No Due!!!!";
                                }
                                ?></b></td>
                    </tr>
                </table>
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <a class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#addPayment-modal">Add Payment</a>
        </div>

    </div>
</div>  

<div class="modal fade" id="addPayment-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Payment</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>billingcontroller/insertpaymentofduebyinvoiceid" method="post" class="form-horizontal">
                    <input type="hidden" value="<?php echo $queryinvoicebyinvoiceid->cst_id; ?>" name="cst_id"/> 
                    <input type="hidden" value="<?php echo $queryinvoicebyinvoiceid->invoice_id; ?>" name="invoice_id"/> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Due Remaining:</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <input name="balance" readonly type="text" class="form-control" placeholder="" value="<?php echo $queryinvoicebyinvoiceid->due_amount; ?>">
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Accounts<sup>*</sup></label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <select name="bid" id="bid" class="form-control" required>
                                    <option value="">Select Account</option>
                                    <?php foreach ($bank_details as $bank) { ?>
                                        <option value="<?php echo $bank->id; ?>"><?php echo $bank->b_acc_name; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Cheque No.</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">                                
                                <input name="chq_no" type="text" class="form-control" placeholder="Cheque No.">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Receipt/Trans No</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">                                
                                <input name="rec_no" type="text" class="form-control" placeholder="Receipt/Trans No">
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Amount<sup>*</sup></label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <input name="first_payment" type="text" class="form-control" placeholder="Add Amount" required>
                            </div>
                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Discount</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <input name="pay_discount" type="text" class="form-control" placeholder="Add Discount">
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Date</label>
                            </div>
                            <div class="">
                                <div class="col-md-8" style="padding-bottom: 10px;">
                                    <input name="payment_date" id="payment_date" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px; text-align: right;">
                                <label class="control-label">Note</label>
                            </div>
                            <div class="col-md-8" style="padding-bottom: 10px;">
                                <textarea name="pay_note" placeholder="" rows="2" id="pay_note" class="form-control"><?php echo $queryinvoicebyinvoiceid->note; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Save</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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

</script>