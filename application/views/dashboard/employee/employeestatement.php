<?php ?>
<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header no-padding no-margin">
                <?php echo $storeInfo->company_info; ?> 
                <h6><?php //echo $viewbankname->b_name.' ,'.$viewbankname->b_branch.' ,'.$viewbankname->acc_no; ?></h6>
            </div>
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header no-padding no-margin">
                 Increment History
            </div>
        </div><!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
               <?php echo $empname->e_name; ?>
                <small class="pull-right">Date: <?php
                    date_default_timezone_set("Asia/Dacca");
                    echo date('Y-m-d');
                    ?></small>
            </h2>
            </br>
        </div><!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Type</th>
                        <th>Basic Salary</th>
                        <th>Increment</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Note</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($viewemployeestatementinfo as $empstatementinfo) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>                            
                            <td><?php 
                            if($empstatementinfo->sal_type==1){
                                echo 'Joining Basic';
                            }else{
                                echo 'Increment Amount';
                            }  
                            
                            ?></td>                            
                            <td><?php echo $empstatementinfo->b_salary; ?></td>
                            <td><?php echo $empstatementinfo->increment; ?></td>
                            <td><?php echo $empstatementinfo->total_b_salary; ?></td>
                            <td><?php echo $empstatementinfo->i_date; ?></td>
                            <td><?php echo $empstatementinfo->i_note; ?></td>

                        </tr>
                        <?php
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