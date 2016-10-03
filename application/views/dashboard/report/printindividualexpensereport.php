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
                <!--<i class="fa fa-globe">--></i> Head of Expense Report 
                <small class="pull-right">Date: <?php 
                date_default_timezone_set("Asia/Dacca");
                echo date('Y-m-d'); ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row ">
        <div class="col-sm-12 ">
            <p class="lead">Report on <?php echo $queryexpensebyid->expense_id; ?> : <?php echo $queryexpensebyid->expense_name; ?> </p>
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
                        <th>Sub Expense ID</th>
                        <th>Sub Expense Name</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>R/VC</th>
                        <th>Voucher No</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($queryexpensehistorybyid as $expensehistorybyid) {
                        $total = $expensehistorybyid->cash_amount + $total;
                        ?>
                        <tr>
                            <td><?php echo $expensehistorybyid->sub_expense_id; ?></td>
                            <td><?php echo $expensehistorybyid->sub_expense_name; ?></td>
                            <td><?php echo $expensehistorybyid->cash_amount; ?></td>
                            <td><?php echo $expensehistorybyid->note; ?></td>
                            <td><?php echo $expensehistorybyid->r_vc; ?></td>
                            <td><?php echo $expensehistorybyid->rec_no; ?></td>
                            <td><?php echo $expensehistorybyid->date; ?></td>
                            
                        </tr>
                        <?php
                    }?>
                    
                	
                    
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
                        <th>Total Grand Amount:</th>
                        <td><b>BDT</b> <?php echo $total;?></td>
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