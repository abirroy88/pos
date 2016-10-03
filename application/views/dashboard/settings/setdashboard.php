<?php
$success = $this->session->flashdata('success');
if ($success) {
    ?>	
    <div class="box box-info">
        <div class="box-body">
            <div class="callout callout-info">
                <?php
                echo $success;
                ?>
            </div>
        </div><!-- /.box-body -->
    </div>
    <?php
}
?>
<?php
$failed = $this->session->flashdata('failed');
if ($failed) {
    ?>	
    <div class="box box-info">
        <div class="box-body">
            <div class="callout callout-warning">
                <?php
                echo $failed;
                ?>
            </div>
        </div><!-- /.box-body -->
    </div>
    <?php
}
?>

<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header" style="margin-top:0px;">Partition-1</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon-info pull-left">
                <i class="md md-attach-money text-info"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">31,570</b></h3>-->
                <p class="text-muted"><a href="<?php //echo base_url(); ?>settings/shop">Shop Setup</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-pink pull-left">
                <i class="md md-add-shopping-cart text-pink"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">280</b></h3>-->
                <p class="text-muted"><a href="<?php //echo base_url(); ?>settings/employee">Employee Setup</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">0.16</b>%</h3>-->
                <p class="text-muted">General Options</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">0.16</b>%</h3>-->
                <p class="text-muted">Subscription Setup</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header" style="margin-top:0px;">Partition-2</h4>
    </div>
</div>
<div class="row">    

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-pink pull-left">
                <i class="md md-add-shopping-cart text-pink"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">280</b></h3>-->
                <p class="text-muted"><a href="<?php echo base_url(); ?>settings/paymenttype">Payment Types</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">0.16</b>%</h3>-->
                <p class="text-muted"><a href="<?php echo base_url(); ?>settings/taxclass">Tax Classes</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-success pull-left">
                <i class="md md-remove-red-eye text-success"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">64,570</b></h3>-->
                <p class="text-muted">Sales Taxes</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header" style="margin-top:0px;">Partition-3</h4>
    </div>
</div>
<div class="row">    

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-pink pull-left">
                <i class="md md-add-shopping-cart text-pink"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">280</b></h3>-->
                <p class="text-muted"><a href="<?php echo base_url(); ?>settings/pricingrule">Pricing Rule</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">0.16</b>%</h3>-->
                <p class="text-muted"><a href="<?php echo base_url(); ?>settings/discount">Discount</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header" style="margin-top:0px;">Partition-4</h4>
    </div>
</div>
<div class="row">    

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-pink pull-left">
                <i class="md md-add-shopping-cart text-pink"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">280</b></h3>-->
                <p class="text-muted"><a href="<?php echo base_url(); ?>settings/employeeroles">Employee Roles</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-9 col-lg-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <!--<h3 class="text-dark"><b class="counter">0.16</b>%</h3>-->
                <p class="text-muted">Integrations Setup</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-12">
        <h4 class="page-header" style="margin-top:0px;">Partition-5</h4>
    </div>
</div>
