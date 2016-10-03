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

    <!-- info row -->
    <div class="row ">
        <div class="col-lg-12">
            <p>
                Date: <?php
                date_default_timezone_set("Asia/Dacca");
                echo date('Y-m-d');
                ?></br>
                <?php
                if ($queryexpensehistory->method == 'Bank') {
                    echo $queryexpensehistory->b_name . ', ' . $queryexpensehistory->acc_no;
                } else {
                    echo 'Petty Cash';
                }
                ?></br>
                <?php
                if ($queryexpensehistory->method == 'Bank') {
                    echo 'Cheque No : '.$queryexpensehistory->chq_no;
                } else {
                    echo '';
                }
                ?></br>
                Voucher No : <?php echo $queryexpensehistory->rec_no; ?></br>
                Prepared By : <?php echo $queryexpensehistory->prepared_by; ?>
            </p>
        </div>
    </div><!-- /.row -->
    <br/>
    <br/>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Expense</th>
                        <th>Sub Expense</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>R/VC</th>
                        <th>Note</th>                                                
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?php echo $queryexpensehistory->expense_name; ?></td>
                        <td><?php echo $queryexpensehistory->sub_expense_name; ?></td>
                        <td><?php echo $queryexpensehistory->cash_amount; ?></td>
                        <td><?php echo $queryexpensehistory->date; ?></td>
                        <td><?php echo $queryexpensehistory->r_vc; ?></td>
                        <td><?php echo $queryexpensehistory->note; ?></td>


                    </tr>

                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    </br>
    </br>
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