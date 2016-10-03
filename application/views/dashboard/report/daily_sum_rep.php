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
<div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 style="text-align:center">Daily Summary Report</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url(); ?>reportcontroller/printdaily_sum_rep" method="post">
            <?php
            $user_role = $this->session->userdata('abhinvoiser_1_1_role');
            $user_name = $this->session->userdata('epos_user_name');
//            echo $user_name;
            ?>
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-3 dynamic_date">
                            <input name="rep_date" value="<?php echo $current_date; ?>" type="text" data-mask="" data-inputmask="'alias': 'yyyy/mm/dd'" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat" >Search</button>
                        </div>
                        </br>
                    </div>

                    <div style="padding-top: 10px;">
                    </div>
                </div>

            </div><!-- /.box-body -->

        </form>

    </div><!-- /.box -->