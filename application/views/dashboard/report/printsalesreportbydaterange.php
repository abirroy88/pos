<?php ?>
<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
            </div>
        </div><!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <!--<i class="fa fa-globe">--></i> Sales Report 
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
            <p class="lead">Report From <?php echo $first_date; ?> To <?php echo $last_date; ?></p>
        </div><!-- /.col -->

    </div><!-- /.row -->
    <br/>
    <br/>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Invoice Id</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th>Company</th>
                        <th>Sub Total</th>
                        <th>Vat</th>
                        <th>Grand</th>
                        <th>Discount</th>
                        <th>Net</th>
                        <th>Paid</th>
                        <th>Due</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_sub_amount = 0;
                    $total_grand_amount = 0;
                    $total_vat_amount = 0;
                    $total_discount_amount = 0;
                    $total_net_amount = 0;
                    $total_paid_amount = 0;
                    $total_due_amount = 0;
                    foreach ($querysalesreportbydaterange as $querysalesreport) {
                        $total_sub_amount = $querysalesreport->sub_total + $total_sub_amount;
                        $total_grand_amount = $querysalesreport->grand_total + $total_grand_amount;
                        $total_discount_amount = $querysalesreport->discount + $total_discount_amount;
                        $total_vat_amount = $querysalesreport->vat_amount + $total_vat_amount;
                        $total_net_amount = $querysalesreport->net_total + $total_net_amount;
                        $total_paid_amount = ($querysalesreport->net_total - $querysalesreport->due_amount) + $total_paid_amount;
                        $total_due_amount = $querysalesreport->due_amount + $total_due_amount;
                        ?>
                        <tr>
                            <td><?php echo $querysalesreport->invoice_id; ?></td>
                            <td><?php echo $querysalesreport->invoice_date; ?></td>
                            <td><?php echo $querysalesreport->due_date; ?></td>
                            <td><?php echo $querysalesreport->cst_company; ?></td>
                            <td><?php echo $querysalesreport->sub_total; ?></td>
                            <td><?php echo $querysalesreport->vat_amount; ?></td>
                            <td><?php echo $querysalesreport->grand_total; ?></td>
                            <td><?php echo $querysalesreport->discount; ?></td>
                            <td><?php echo $querysalesreport->net_total; ?></td>
                            <td><?php echo $querysalesreport->net_total - $querysalesreport->due_amount; ?></td>
                            <td><?php echo $querysalesreport->due_amount; ?></td>
                        </tr>
                    <?php }
                    ?>


                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
        </div><!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Total Amount From Report</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Total Sub Amount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_sub_amount; ?></td>
                        </tr>
                        <?php if ($total_vat_amount > 0) { ?>
                            <tr>
                                <th>Total Vat Amount:</th>
                                <td><b><?php
                                        if (!empty($querycurrencytag->currency_tag)) {
                                            echo $querycurrencytag->currency_tag;
                                        }
                                        ?></b> <?php echo $total_vat_amount; ?></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <th>Total Grand Amount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_grand_amount; ?></td>
                        </tr>
                        
                        
                        <?php if ($total_discount_amount > 0) { ?>
                            <tr>
                                <th>Total Discount Amount:</th>
                                <td><b><?php
                                        if (!empty($querycurrencytag->currency_tag)) {
                                            echo $querycurrencytag->currency_tag;
                                        }
                                        ?></b> <?php echo $total_discount_amount; ?></td>
                            </tr>

                        <?php } ?>

                        <tr>
                            <th>Total Net Amount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_net_amount; ?></td>
                        </tr>
                        <tr>
                            <th>Total Paid Amount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_paid_amount; ?></td>
                        </tr>
                        <tr>
                            <th>Total Due Amount:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_due_amount; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.col -->
    </div>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p>Copyright © 2015 ABH World - Developed By: ABH World</p>
        </div><!-- /.col -->
        <div class="col-xs-6">

        </div><!-- /.col -->
    </div><!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print Invoice</button>
        </div>
    </div>
</section><!-- /.content -->