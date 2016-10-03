<?php 

?>
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
                <!--<i class="fa fa-globe">--></i> <?php echo $h_msg; ?> 
                <small class="pull-right">Date: <?php 
                date_default_timezone_set("Asia/Dacca");
                echo date('Y-m-d'); ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row ">
        <div class="col-sm-12 ">
            <p class="lead">Report From <?php echo $first_date; ?> To <?php echo $last_date; ?> </p>
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
                        <th>SL</th>
                        <th>Invoice</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Method</th>
                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Refund By</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    $sl = 1;
                    foreach ($queryrefundreport as $refundreport) {
                        $total = $refundreport->ref_amount + $total;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $refundreport->invoice_id; ?>"><?php echo $refundreport->invoice_id; ?></a></td>
                            <td><?php echo $refundreport->ref_date; ?></td>
                            <td><?php echo $refundreport->cst_company; ?></td>
                            <td><?php
                            if ($refundreport->ref_method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>
                            <td><?php 
                            if($refundreport->ref_method=='Bank'){
                                echo 'From '.$refundreport->b_name.' '.$refundreport->acc_no; 
                            }else{
                                echo 'From Petty Cash' ; 
                            }
                            
                            
                            ?></td>
                            <td><?php echo $refundreport->ref_amount; ?></td>
                            <td><?php echo $refundreport->ref_note; ?></td>
                            <td><?php echo $refundreport->ref_by; ?></td>
                            
                            
                        </tr>
                        <?php
                        $sl++;
                    }?>
                    
                        <tr>
                            <td colspan="6" style="text-align: right;">Total</td>  
                            <td><?php echo $total;?></td> 
                            <td colspan="2"></td> 
                            
                        </tr>
                    
                </tbody>
            </table>
        </div><!-- /.col -->
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
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</section><!-- /.content -->