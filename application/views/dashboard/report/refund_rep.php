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
<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 style="text-align:center">Refund Report</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url(); ?>reportcontroller/queryrefundreportbydaterange" method="post">
                      
            <div class="box-body">
                <div class="form-group">
                    <label>Date range:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date_range" id="reservation" class="form-control pull-right" placeholder="Select Date Range">
                    </div><!-- /.input group -->
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>

        </form>

    </div><!-- /.box -->
</div>