<?php ?>
<!-- Main content -->
<section class="content invoice">
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
            </div>
        </div><!-- /.col -->
    </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12 no-margin">
            <h4> Accounts Report </h4>(From <?php echo $first_date; ?> To <?php echo $last_date; ?>)
            <small class="pull-right">Print Date: <?php echo $current_date; ?></small>

        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
            <!--<p style="color:green;" class="lead"><b>Collection: <?php
//                    if (!empty($querycurrencytag->currency_tag)) {
//                        echo $querycurrencytag->currency_tag;
//                    }
                    ?> <?php //echo $querysumofduecollectionreportbydaterange->first_payment + $querysumofsalesreportbydaterange->paid_amount; ?></b></p>-->
        </div><!-- /.col -->

    </div><!-- /.row -->
    <div class="row">


        <div class="col-xs-12 table-responsive">
            <p class="lead">Due Payment Collection</p><hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Company</th>
                        <th style=" text-align: right;">Amount</th>
                        <th style=" text-align: right;">Discount</th>
                        <th>Method</th>
                        <th>Details</th>
                        <th>Collected By</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_payment = 0;
                    $total_pay_discount = 0;
                    foreach ($queryduecollectionreportbydaterange as $queryduecollectionreport) {
                        $total_payment = $queryduecollectionreport->first_payment + $total_payment;
                        $total_pay_discount = $queryduecollectionreport->pay_discount + $total_pay_discount;
                        ?>
                        <tr>
                            <td><?php echo $queryduecollectionreport->payment_date; ?></td>
                            <td><?php echo $queryduecollectionreport->invoice_id; ?></td>
                            <td><?php echo $queryduecollectionreport->cst_company; ?></td>
                            <td style=" text-align: right;"><?php echo $queryduecollectionreport->first_payment; ?></td>
                            <td style=" text-align: right;"><?php echo $queryduecollectionreport->pay_discount; ?></td>
                            <td><?php
                            if ($queryduecollectionreport->method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>
                            <td><?php
                                if ($queryduecollectionreport->method == 'Bank') {
                                    echo $queryduecollectionreport->b_name . ' ' . $queryduecollectionreport->acc_no;
                                } else {
                                    echo 'Paid By Cash';
                                }
                                ?></td>
                            <td><?php echo $queryduecollectionreport->prepared_by; ?></td>
                        </tr>
                    <?php }
                    ?>
                    <tr>
                        <th colspan="3" style=" text-align: right;">Total Amount:</th>
                        <td style=" text-align: right;"><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $total_payment; ?> </td>
                        <td style=" text-align: right;"><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $total_pay_discount; ?> </td>
                        <td colspan="3"></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <?php   $num=count($querynewcollectionreportbydaterange);
        $total_nonpayment = 0;
        if($num>0){
        
        ?>
        <div class="col-xs-12 table-responsive">
            <p class="lead">Non Invoice Collection</p><hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Details</th>
                        <th>Collected By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($querynewcollectionreportbydaterange as $querynewcollectionreport) {
                        $total_nonpayment = $querynewcollectionreport->tr_amount + $total_nonpayment;
                        ?>
                        <tr>
                            <td><?php echo $querynewcollectionreport->tr_date; ?></td>
                            <td style=" text-align: right;"><?php echo $querynewcollectionreport->tr_amount; ?></td>
                            <td><?php
                            if ($querynewcollectionreport->tr_method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>
                            <td><?php 
                            if ($querynewcollectionreport->tr_method == 'Bank') {
                                    echo $querynewcollectionreport->b_name . ' ' . $querynewcollectionreport->acc_no;
                                } else {
                                    echo 'Paid By Cash';
                                }                            
                                                        
                            ?></td>
                            <td><?php echo $querynewcollectionreport->tr_by; ?></td>
                        </tr>
                    <?php }
                    ?>
                        <tr>
                        <th colspan="" style=" text-align: right;">Total Amount:</th>
                       
                        <td style=" text-align: right;"><b><?php
                                if (!empty($querycurrencytag->currency_tag)) {
                                    echo $querycurrencytag->currency_tag;
                                }
                                ?></b> <?php echo $total_nonpayment; ?> </td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <?php }?>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table">
                    <tbody>

                        <tr>
                            <th style=" text-align: right;">Total Due Collection:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_payment; ?> </td>
                        </tr>
                        <tr>
                            <th style=" text-align: right;">Total Non Invoice Collection:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_nonpayment; ?> </td>
                        </tr>
                        <tr>
                            <th style=" text-align: right;">Total Amount From Report:</th>
                            <td><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_payment+$total_nonpayment; ?> </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.row -->

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