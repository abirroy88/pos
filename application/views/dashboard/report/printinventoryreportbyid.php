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
                <!--<i class="fa fa-globe">--></i> Individual Inventory Report 
                <small class="pull-right">Date: <?php echo $current_date; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
            <p class="lead">Report From <?php echo $first_date; ?> To <?php echo $last_date; ?></p>
        </div><!-- /.col -->
        
    </div><!-- /.row -->
    <br/>
    <br/>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 ">
            <div class="row">
                <div  style="text-align: center; font-size: 16px; font-weight: bold; padding: 10px 0px;" class="col-xs-4">Item Name: <?php echo $queryitemlistwithsupplierbyid->item_name; ?></div>
                <div  style="text-align: center; font-size: 16px; font-weight: bold; padding: 10px 0px;" class="col-xs-4">Item Code: <?php echo $queryitemlistwithsupplierbyid->item_code; ?></div>
                <div  style="text-align: center; font-size: 16px; font-weight: bold; padding: 10px 0px;" class="col-xs-4">Supplier: <?php echo $queryitemlistwithsupplierbyid->supplier_name; ?></div>
            </div>
            <div class="row">
                <div style="text-align: center; font-size: 20px; font-weight: bold; padding: 10px 0px;"  class="col-xs-6">
                    <div class="row">Product In</div>
                    <div class="row" ><div class="col-xs-6">Date</div><div class="col-xs-6">Quantity</div></div>
                </div>
                <div style="text-align: center; font-size: 20px; font-weight: bold; padding: 10px 0px;"  class="col-xs-6">
                    <div class="row">Product Out</div>
                    <div class="row" ><div class="col-xs-6">Date</div><div class="col-xs-6">Quantity</div></div>
                </div>
            </div>

            <div class="row">
                <div style="text-align: center; font-size: 16px; font-weight: bold; padding: 10px 0px;"  class="col-xs-6">
                    <div class="row" >
                        <?php 
                        $totalsupplied = 0;
                        foreach ($querysupplieditembyid as $querysupplieditem) {
                        $totalsupplied = $totalsupplied + $querysupplieditem->first_supplied_stock;
                        ?>
                        <div class="col-xs-6">
                            <?php echo $querysupplieditem->first_supplied_date; ?>
                        </div>
                        <div class="col-xs-6">
                            <?php echo $querysupplieditem->first_supplied_stock; ?>
                        </div>
                        <?php
                        }?>
                    </div>
                </div>
                <div style="text-align: center; font-size: 16px; font-weight: bold; padding: 10px 0px;"  class="col-xs-6">
                    <div class="row" >
                        <?php
                        $totalsold = 0; 
                         foreach ($querysolditembyid as $querysolditem) {
                        $totalsold = $totalsold + $querysolditem->sold_quantity; 
                        ?>
                        <div class="col-xs-6">
                            <?php echo $querysolditem->sold_date; ?>
                        </div>
                        <div class="col-xs-6">
                            <?php echo $querysolditem->sold_quantity; ?>
                        </div>
                        <?php
                        }?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="text-align: center; font-size: 18px; font-weight: bold; padding: 10px 0px;"  class="col-xs-4">
                    <div class="row" >
                        
                        <div class="col-xs-6">
                            Total Product In:
                        </div>
                        <div class="col-xs-6">
                            <?php echo $totalsupplied; ?>
                        </div>
                        
                    </div>
                </div>
                <div style="text-align: center; font-size: 18px; font-weight: bold; padding: 10px 0px;"  class="col-xs-4">
                    <div class="row" >
                        
                        <div class="col-xs-6">
                           Total Product Out:
                        </div>
                        <div class="col-xs-6">
                            <?php echo $totalsold; ?>
                        </div>
                       
                    </div>
                </div>
                <div style="text-align: center; font-size: 18px; font-weight: bold; padding: 10px 0px;"  class="col-xs-4">
                    <div class="row" >
                        
                        <div class="col-xs-6">
                           Balance:
                        </div>
                        <div class="col-xs-6">
                            <?php echo $totalsupplied - $totalsold; ?>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p style="padding-top: 20px;">Copyright © 2015 ABH World - Developed By: ABH World</p>
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