<?php
/*
  echo "<pre>";
  print_r($queryinvoicebyinvoiceid);
  print_r($queryinvoiceditembyinvoiceid);
  exit();
 */
?>
<!-- Main content -->
<section class="content invoice">
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;  margin-bottom: 0px;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
            </div>
        </div><!-- /.col -->
    </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <!--<i class="fa fa-globe">--></i> Invoice 
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            To
            <address style="font-size:12px">
                <strong style="font-size:12px"><?php echo $queryinvoicebyinvoiceid->cst_company; ?></strong><br>
                <strong>Cell No:</strong> <?php echo $queryinvoicebyinvoiceid->cst_mobile; ?><br>
                <strong>Email:</strong> <?php echo $queryinvoicebyinvoiceid->cst_email; ?><br>

                <strong>Address:</strong> <?php echo $queryinvoicebyinvoiceid->cst_address; ?><br>
            </address> 
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">

        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col" style="font-size:12px">
            <br/>
            <b>Invoice No. <?php echo $queryinvoicebyinvoiceid->invoice_id; ?></b><br/>

            <b>Invoice Date:</b> <?php echo $queryinvoicebyinvoiceid->invoice_date; ?><br/>
            <b>Due Date:</b> <?php echo $queryinvoicebyinvoiceid->due_date; ?><br/>
            <?php if($queryinvoicebyinvoiceid->domain_name !=''){?>
            <b>Domain Name:</b> <?php 
            
            echo $queryinvoicebyinvoiceid->domain_name;
            ?><br/>
            <?php }?>
            <b>Prepared By:</b> <?php echo $queryinvoicebyinvoiceid->prepared_by; ?><br/>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <br/>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Product</th>
                        <th>Product Details</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = count($queryinvoiceditembyinvoiceid);
                    for ($i = 0; $i < $count; $i++) {
                        ?><tr>

                            <td><?php echo $queryinvoiceditembyinvoiceid[$i]->product_name; ?></td>
                            <td><?php echo $queryinvoiceditembyinvoiceid[$i]->product_details; ?></td>
                            <td><?php echo $queryinvoiceditembyinvoiceid[$i]->quantity; ?></td>
                            <td><?php echo $queryinvoiceditembyinvoiceid[$i]->selling_price; ?></td>
                            <td><?php echo $queryinvoiceditembyinvoiceid[$i]->total_price; ?></td>
                        </tr><?php
                    }
                    ?>

                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <div style="margin-bottom: 5px;" class="lead">Note</div>
            <p style="padding-bottom: 20px;"><?php echo $queryinvoicebyinvoiceid->note; ?></p>

            <?php if (count($duepaymenthistorybyinvoiceid) > 0) {
                ?>

                <p style="margin-bottom: 5px;" class="lead">Due Payment History</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Payment Date</th>
                            <td><b>Payment Amount</b></td>
                            <td><b>Payment Discount</b></td>
                        </tr>
                        <?php
                        $total_due_paid = 0;
                        $total_due_discount = 0;
                        foreach ($duepaymenthistorybyinvoiceid as $duepaymenthistory) {
                            ?><tr>
                                <td style="width:50%"><?php echo $duepaymenthistory->payment_date; ?></td>
                                <td><?php
                                    $total_due_paid = $duepaymenthistory->first_payment + $total_due_paid;
                                    echo $duepaymenthistory->first_payment;
                                    ?></td>
                                <td><?php
                                    $total_due_discount = $duepaymenthistory->pay_discount + $total_due_discount;
                                    echo $duepaymenthistory->pay_discount;
                                    ?></td>
                            </tr><?php }
                                ?>
                        <tr>
                            <th style="width:50%">Total Due Paid Amount</th>
                            <td><b><?php echo $total_due_paid; ?></b></td>
                            <td><b><?php echo $total_due_discount; ?></b></td>
                        </tr>
                    </table>
                </div>
            <?php }
            ?>
        </div><!-- /.col -->
        <div class="col-xs-6">
            <!--<p class="lead">Amount From <?php //echo $queryinvoicebyinvoiceid->due_date;   ?></p>-->
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $queryinvoicebyinvoiceid->sub_total; ?></td>
                    </tr>
                    <tr>
                        <th>Vat Amount:</th>
                        <td><b><?php if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                } ?></b> <?php echo $queryinvoicebyinvoiceid->vat_amount; ?></td>
                    </tr>
                    <tr>
                        <th>Grand Total:</th>
                        <td><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $queryinvoicebyinvoiceid->grand_total; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Discount:</th>
                        <td><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $queryinvoicebyinvoiceid->discount; ?></td>
                    </tr>
                    <tr>
                        <th>Net Total:</th>
                        <td><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $queryinvoicebyinvoiceid->net_total; ?></td>
                    </tr>
<!--                    <tr>
                        <th>Paid Amount:</th>
                        <td><b><?php
//                    if (!empty($querycurrencytag->currency_tag)) {
//                        echo $querycurrencytag->currency_tag;
//                    }
                                ?></b> <?php //echo $queryinvoicebyinvoiceid->paid_amount; ?></td>
                    </tr>-->
                                <?php if (count($duepaymenthistorybyinvoiceid) > 0) {
                                    ?>
                        <tr>
                            <th>Due Payment Amount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_due_paid; ?></td>
                        </tr>
                        <tr>
                            <th>Payment Discount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_due_discount; ?></td>
                        </tr>
                        <tr>
                            <th>Due Amount:</th>
                            <td><b><?php
                        if (!empty($querycurrencytag->currency_tag)) {
                            echo $querycurrencytag->currency_tag;
                        }
                        ?></b> <?php echo $queryinvoicebyinvoiceid->due_amount; ?></td>
                        </tr>
    <?php
} else {
    ?>
                        <tr>
                            <th>Due Amount:</th>
                            <td><b><?php
    if (!empty($querycurrencytag->currency_tag)) {
        echo $querycurrencytag->currency_tag;
    }
    ?></b> <?php echo $queryinvoicebyinvoiceid->due_amount; ?></td>
                        </tr>
    <?php
}
?>




                </table>

            </div>

        </div><!-- /.col -->
    </div><!-- /.row -->
    <!--<div class="row">
            <div class="col-md-12">
            <p style="margin-bottom: 5px;" class="lead">Payment Method:</p> 
            Bkash: 01716436241 (Personal). Bank: Brac Bank, Account Name: ABH World, AC NO: 1526202873949001
            </div>
    </div>-->
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
            <p style="padding-top: 30px;text-align:center; font-size:13px">ABH Invoiser Developed By: ABH World</p>
        </div><!-- /.col -->

    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print Invoice</button>
        </div>
    </div>
</section><!-- /.content -->