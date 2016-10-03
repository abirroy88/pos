<?php 

?>
<!-- Main content -->
<section class="content invoice">
    <div class="row">
        <div class="col-xs-12">
            <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header">
                <?php echo $storeInfo->company_info; ?> 
            </div>
        </div><!-- /.col -->
    </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <!--<i class="fa fa-globe">--></i> Master Inventory Report 
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
            <!--<p class="lead">Report From </p>-->
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
                        <th>Sl.</th>
                        <th>Item Name</th>
                        <th>Supplier Name</th>
                        <th>Current Balance</th>
                    </tr>
                </thead>
                <tbody>
                    
                	<?php $count = count($queryinventoryreportbydaterange);
                        for ($i=0; $i <$count ; $i++) { 
                            ?><tr>
                                <td><?php echo $i+1,"."; ?></td>
                                <td><?php echo $queryinventoryreportbydaterange[$i][0]['item_name']; ?></td>
                                <td><?php echo $queryinventoryreportbydaterange[$i][0]['supplier_name']; ?></td>
                                <td><?php echo $queryinventoryreportbydaterange[$i][0]['balance_stock']; ?></td>
                            </tr><?php
                        }
                   ?>
                    
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

<div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p>Copyright © 2015 ABH World - Developed By: ABH World</p>
        </div><!-- /.col -->
        <div class="col-xs-6">
            
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print Invoice</button>
        </div>
    </div>
</section><!-- /.content -->