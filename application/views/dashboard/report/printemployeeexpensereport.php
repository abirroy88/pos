<?php ?>
<!-- Main content -->
<style>    
    @media print {
        a[href]:after {
            content:"" !important;
        }
    }
</style>
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
                    echo date('Y-m-d');
                    ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row ">
        <div class="col-sm-12 ">
            <p>Report From <?php echo $first_date; ?> To <?php echo $last_date; ?> </p>
        </div><!-- /.col -->

    </div><!-- /.row -->
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Employee</th>
                        <th>Method</th>
                        <th>Details</th>                                             
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Note</th>  

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    $total = 0;
                    foreach ($queryemployeeexpensereport as $expensereportbydaterange) {
                        $total = $expensereportbydaterange->emp_exp_amount + $total;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>employeecontroller/printpayslipbytransid/<?php echo $expensereportbydaterange->trans_id; ?>"><?php echo $expensereportbydaterange->e_name; ?></a></td>
                            <td><?php
                            if ($expensereportbydaterange->method == 'Bank') {
                                echo 'Accounts';
                            } else {
                                echo 'Petty Cash';
                            }
                            ?></td>


                            <td><?php
                                if ($expensereportbydaterange->method == 'Bank') {
                                    echo $expensereportbydaterange->b_name . ',' . $expensereportbydaterange->acc_no;
                                } else {
                                    echo "Paid by Cash";
                                }
                                ?></td>


                            <td>BDT <?php echo $expensereportbydaterange->emp_exp_amount; ?></td>
                            <td><?php echo $expensereportbydaterange->emp_exp_date; ?></td>
                            <td><?php echo $expensereportbydaterange->emp_exp_note; ?></td>

                        </tr>
                        <?php
                        $sl++;
                    }
                    ?>



                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
        </div><!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Expenses Details</p>
            <div class="table-responsive">
                <table class="table">

                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category</th>
                            <th style="text-align: right;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        $ttl = 0;
                        foreach ($empexpdetailsbyid as $detailsbyid) {
                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $detailsbyid->category; ?></td>
                                <td style="text-align: right;"><?php
                                    if ($detailsbyid->tamount < 0) {
                                        echo '(' . abs($detailsbyid->tamount) . ')';
                                        
                                    } else {
                                        echo $detailsbyid->tamount;
                                    }
                                    ?></td>
                                
                            </tr>
                                    <?php
                                    $ttl+=$detailsbyid->tamount;
                                    $sl++;
                                }
                                ?>
                            
                            <tr>
                                <td colspan="2" style="text-align: right;">Total amount from report :</td>
                                <td style="text-align: right;">BDT <?php echo $ttl; ?></td>
                                
                            </tr>
                    </tbody>

                </table>
            </div>
        </div><!-- /.col -->
    </div>

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</section><!-- /.content -->