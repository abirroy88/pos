<?php ?>
<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
                <h6>Non Invoice Income</h6>

            </div>
        </div><!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-6">
            <!--<h6>Company: <?php //echo $viewcompanyinfo->com_name; ?></h6>-->

            <h6>From <?php echo $first_date; ?> To <?php echo $last_date; ?></h6>
        </div>
        <div class="col-xs-6" style=" text-align: right;">
            <h6></h6>

            <h6>Print Date: <?php
                date_default_timezone_set("Asia/Dacca");
                echo date('Y-m-d');
                ?></h6>
        </div>
    </div>
    </br>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th style=" width: 15%;">Company</th>
                        <th>Trans Date</th>
                        <th style=" width: 20%;">Accounts</th>                        
                        <th>Amount</th>
                        <th style=" width: 20%;">Note</th>
                        <th style=" width: 10%;">Prepared By</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    $ttl = 0;
                    foreach ($querynoninvoicereport as $bankstatementinfo) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td> 
                            <td><?php echo $bankstatementinfo->com_name; ?></td>
                            <td><?php echo $bankstatementinfo->tr_date; ?></td>
                            <td><?php
                                if ($bankstatementinfo->b_id > 0) {
                                    echo $bankstatementinfo->b_name . ' ,' . $bankstatementinfo->acc_no;
                                } else {
                                    echo 'Petty Cash';
                                }
                                ?></td>

                            <td>BDT <?php echo $bankstatementinfo->tr_amount; ?></td>
                            <td><?php
                                echo $bankstatementinfo->tr_note;
                                ?></td>
                            <td><?php
                                echo $bankstatementinfo->tr_by;
                                ?></td>

                        </tr>
                        <?php
                        $sl++;
                        $ttl+=$bankstatementinfo->tr_amount;
                    }
                    ?>
                        <tr>
                            <td colspan="4" style=" text-align: right;">Total </td>
                            <td colspan="3">BDT <?php echo $ttl; ?></td>
                        </tr>


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