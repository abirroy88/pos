<?php
/*
  echo "<pre>";
  print_r($empexpmasterbyid);
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
                <!--<i class="fa fa-globe">--></i> Pay Slip 
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            To
            <address style="font-size:12px">
                <strong style="font-size:12px"><?php echo $empexpmasterbyid->e_name; ?></strong><br>
                <strong>Designation:</strong> <?php echo $empexpmasterbyid->designation; ?><br>
                <strong>Cell No:</strong> <?php echo $empexpmasterbyid->e_mobile; ?><br>
                <strong>Address:</strong> <?php echo $empexpmasterbyid->address; ?><br>

            </address> 
        </div><!-- /.col -->

    </div><!-- /.row -->
    <br/>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Details</th>
                        <?php if ($empexpmasterbyid->chq_no) { ?>
                            <th>Cheque No</th>
                        <?php } ?>

                        <th>Amount</th>
                        <th>Date</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $empexpmasterbyid->method; ?></td>
                        <td><?php
                            if ($empexpmasterbyid->emp_exp_bank_id > 0) {
                                echo $empexpmasterbyid->b_name . ', ' . $empexpmasterbyid->b_branch;
                            } else {
                                echo 'Paid in Cash';
                            }
                            ?></td>
                        <?php if ($empexpmasterbyid->chq_no) { ?>
                            <td><?php echo $empexpmasterbyid->chq_no; ?></td>  
                        <?php } ?>

                        <td>BDT <?php echo $empexpmasterbyid->emp_exp_amount; ?></td>
                        <td><?php echo $empexpmasterbyid->emp_exp_date; ?></td>
                        <td><?php echo $empexpmasterbyid->emp_exp_note; ?></td>
                    </tr>

                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <div class="row">
        <div class="col-xs-6 pull-right table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Category</th>
                        <th style="text-align: right;">Amount</th>
                        <th style="width: 30%; text-align: center;">Note</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    $ttl = 0;
                    foreach ($empexpdetailsbyid as $detailsbyid) {
                        
                        if($detailsbyid->amount==0){ }else{
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $detailsbyid->category; ?></td>
                            <td style="text-align: right;"> <?php
                                if ($detailsbyid->amount < 0) {
                                    echo '(' . abs($detailsbyid->amount) . ')';
                                } else {
                                    echo $detailsbyid->amount;
                                    
                                }
                                ?></td>
                            <td style="width: 30%; text-align: center;"><?php
                                if ($detailsbyid->exp_note == '') {
                                    echo '------';
                                } else {
                                    echo $detailsbyid->exp_note;
                                }
                                ?></td>
                        </tr>

                                <?php
                                $sl++;
                                $ttl+=$detailsbyid->amount;
                        }
                            }
                            ?>
                    <tr>
                        <td colspan="2" style="text-align: right;"><b>Total amount :</b></td>
                        <td style="text-align: right;">BDT <?php echo $ttl; ?></td>

                    </tr>
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </br></br></br>
    <div class="row">
        <div class="col-xs-4">
            <h5 style="text-align: left; padding-left: 20px; text-decoration: overline;">Employee</h5>
        </div> 
        <div class="col-xs-4">
        </div>
        <div class="col-xs-4 pull-right">
            <h5 style="text-align: right; padding-right: 20px; text-decoration: overline;">Employer</h5>
        </div>


    </div>


    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print Slip</button>
        </div>
    </div>
</section><!-- /.content -->