<?php ?>
<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
            </div>
        
            <h3 class="page-header no-padding">
               Mr. <?php echo $user_name; ?>
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h3>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
            <p style=" color: #0088cc; font-size: medium;">Collection Report From <?php echo $first_date; ?> To <?php echo $last_date; ?></p>
        </div><!-- /.col -->

    </div><!-- /.row -->
  
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Invoice Id</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>                        
                        <th>Payment Date</th>
                        <th style="text-align: left; width:25%;">Company</th>
                        <th style="text-align: right;">Paid Amount</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_grand_amount = 0;
                    $sl = 1;
                    foreach ($querycollreportbydaterange as $querysalesreport) {
                        $total_grand_amount = $querysalesreport->first_payment + $total_grand_amount;

                        ?>
                        <tr>
                             <td><?php echo $sl; ?></td>
                          <td><!--<a href="<?php //echo base_url(); ?>billingcontroller/printviewinvoice/<?php //echo $querysalesreport->invoice_id; ?>">-->
                                    <?php echo $querysalesreport->invoice_id; ?> <!--</a>--></td>
                            <td><?php echo $querysalesreport->invoice_date; ?></td>
                            <td><?php echo $querysalesreport->due_date; ?></td>                            
                            <td><?php echo $querysalesreport->payment_date; ?></td>
                            <td><?php echo $querysalesreport->cst_company;    ?></td>
                            <td style="text-align: right;"><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $querysalesreport->first_payment; ?></td>
                        </tr>
                    <?php 
                    $sl++;
                                    }
                    ?>

                        <tr>
                            <td colspan="6" style="text-align: right;"><b>Total Amount From Report :</b></td>
                            <td style="text-align: right;"><b><?php
                                    if (!empty($querycurrencytag->currency_tag)) {
                                        echo $querycurrencytag->currency_tag;
                                    }
                                    ?></b> <?php echo $total_grand_amount; ?></td>
                        </tr>
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print Invoice</button>
        </div>
    </div>
</section><!-- /.content -->