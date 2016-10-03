<?php ?>
<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
                <h6><?php echo $viewbankname->b_name.' ,'.$viewbankname->b_branch.' ,'.$viewbankname->acc_no; ?></h6>
            </div>
        </div><!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                Bank Statement 
                <small class="pull-right">Date: <?php
                    date_default_timezone_set("Asia/Dacca");
                    echo date('Y-m-d');
                    ?></small>
            </h2>
        </div><!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Trans Date</th>
                        <th>Particulars</th>
                        <th>Transaction Amount</th>
                        <th>Balance</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    $bln = 0;
                    $total = 0;
                    foreach ($viewbankstatementinfo as $bankstatementinfo) {
                        $total = $bln + $bankstatementinfo->tr_amount
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>                            
                            <td><?php echo $bankstatementinfo->tr_date; ?></td>
                            <td><?php
                                if ($bankstatementinfo->tr_type == 0) {
                                    echo 'Opening Balance';
                                } elseif ($bankstatementinfo->tr_type == 1) {
                                    echo 'Sales revenue';
                                } elseif ($bankstatementinfo->tr_type == 2) {
                                    echo 'General Expense';
                                } elseif ($bankstatementinfo->tr_type == 3) {
                                     echo 'Employee Expense';
                                } elseif ($bankstatementinfo->tr_type == 4) {
                                    echo 'Transfar from Bank to Cash';
                                } elseif ($bankstatementinfo->tr_type == 5) {
                                    echo 'Transfar from Cash to Bank';
                                } elseif ($bankstatementinfo->tr_type == 6) {
                                    echo 'Transfar from Bank to Bank';
                                }elseif ($bankstatementinfo->tr_type == 7) {
                                    echo 'Refund';
                                }elseif ($bankstatementinfo->tr_type == 8) {
                                    echo 'Non Invoice Income';
                                }
                                ?></td>
                            <td><?php
                                if ($bankstatementinfo->tr_amount < 0) {
                                    echo '( ' . abs($bankstatementinfo->tr_amount) . ' )';
                                } else {
                                    echo $bankstatementinfo->tr_amount;
                                }
                                ?></td>
                            <td><?php echo $total; ?></td>

                        </tr>
                        <?php
                        $bln = $total;
                        $sl++;
                    }
                    ?>



                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->



    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</section><!-- /.content -->