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
                <!--<i class="fa fa-globe">--></i> Sub Head of Expense Report 
                <small class="pull-right">Date: <?php 
                date_default_timezone_set("Asia/Dacca");
                echo date('Y-m-d'); ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row ">
        <div class="col-sm-12 ">
            <p class="lead">Report on <?php echo $querysubexpensebyid->sub_expense_id; ?> : <?php echo $querysubexpensebyid->sub_expense_name; ?> </p>
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
                        <th>Amount</th>
                        <th>Note</th>
                        <th>R/VC</th>
                        <th>Voucher No</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total =0 ;
                    foreach ($querysubexpensehistorybyid as $subexpensehistorybyid) {
                        $total = $subexpensehistorybyid->cash_amount + $total;
                        ?>
                        <tr>
                            <td><?php echo $subexpensehistorybyid->cash_amount; ?></td>
                            <td><?php echo $subexpensehistorybyid->note; ?></td>
                            <td><?php echo $subexpensehistorybyid->r_vc; ?></td>
                            <td><?php echo $subexpensehistorybyid->rec_no; ?></td>
                            <td><?php echo $subexpensehistorybyid->date; ?></td>
                            
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