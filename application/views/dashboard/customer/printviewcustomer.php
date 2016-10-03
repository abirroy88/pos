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
                <!--<i class="fa fa-globe">--></i> Invoice List
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->

    <br/>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Invoice No</th>                    
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Total</th>
                        
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Invoice Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = count($queryinvoicebyinvoiceid);
                    $sl = 1;
                    for ($i = 0; $i < $count; $i++) {
                        ?><tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->invoice_id; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->cst_name; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->cst_mobile; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->net_total; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->net_total - $queryinvoicebyinvoiceid[$i]->due_amount;; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->due_amount; ?></td>
                            <td><?php echo $queryinvoicebyinvoiceid[$i]->invoice_date; ?></td>
                            
                            
                        </tr><?php
                        $sl++;
                    }
                    ?>

                </tbody>
            </table>
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
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</section><!-- /.content -->