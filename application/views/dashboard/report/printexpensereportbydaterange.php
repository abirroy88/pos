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
            <p class="">From <?php echo $first_date; ?> To <?php echo $last_date; ?> </p>
        </div><!-- /.col -->
        
    </div><!-- /.row -->
    <br/>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Expense</th>
                        <th>Sub Expense</th>
                        <th>Voucher No</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>By</th>                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($queryexpensereportbydaterange as $expensereportbydaterange) {
                        $total = $expensereportbydaterange->cash_amount + $total;
                        ?>
                        <tr>
                            <td><?php echo $expensereportbydaterange->expense_name; ?></td>
                            <td><?php echo $expensereportbydaterange->sub_expense_name; ?></td>
                            <td><?php echo $expensereportbydaterange->rec_no; ?></td>
                            <td><?php 
                            if($expensereportbydaterange->method == 'Bank'){
                                echo $expensereportbydaterange->b_name.' '.$expensereportbydaterange->acc_no;
                            }else{
                                echo 'Petty Cash';
                            }
                            
                            
                            ?></td>
                            <td><?php echo $expensereportbydaterange->cash_amount; ?></td>
                            <td><?php echo $expensereportbydaterange->date; ?></td>
                            <td><?php echo $expensereportbydaterange->note; ?></td>
                            <td><?php echo $expensereportbydaterange->prepared_by; ?></td>
                            
                            
                            
                        </tr>
                        <?php
                    }?>
                    
                	
                    
                </tbody>
                <?php 
                $total2 = 0;
                if($h_msg=='Date Wise Expense Report'){?>
                <tbody>
                    <?php 
                    
                    foreach ($refundreportbydaterange as $refundbydaterange) {
                        $total2 = $refundbydaterange->ref_amount + $total2;
                        ?>
                        <tr>
                            <td colspan="2">Refund</td>
                            <td><?php
                            if ($refundbydaterange->ref_method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>
                            <td><?php 
                            if($refundbydaterange->ref_method == 'Bank'){
                                echo $refundbydaterange->b_name.' '.$refundbydaterange->acc_no;
                            }else{
                                echo 'Paid By Cash';
                            }
                            
                            
                            ?></td>
                            <td><?php echo $refundbydaterange->ref_amount; ?></td>
                             <td><?php echo $refundbydaterange->ref_date; ?></td>
                            <td><?php echo $refundbydaterange->ref_note; ?></td>
                            <td><?php echo $refundbydaterange->ref_by; ?></td>
                            
                           
                            
                        </tr>
                        <?php
                    }?>
                    
                	
                    
                </tbody>
                <?php }?>
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
                        <th>Total Grand Amount:</th>
                        <td><b>BDT</b> <?php echo $total+$total2;?></td>
                    </tr>
                    
                    </tbody>
                </table>
            </div>
        </div><!-- /.col -->
    </div>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p>Copyright © 2015 ABH World</p>
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