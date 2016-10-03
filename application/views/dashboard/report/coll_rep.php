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
            <h3 style="text-align:center">Staff Collection Report</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url(); ?>reportcontroller/querycollreportbydaterange" method="post">
            <?php
            $user_role = $this->session->userdata('abhinvoiser_1_1_role');
            $user_name = $this->session->userdata('epos_user_name');
//            echo $user_name;
            ?>
            <div class="box-body">
                <div class="row">
                    <div class="form-group">

                        <?php if ($user_role == 'bill_collector') { ?>
                        <div class="col-md-2 col-md-offset-1">
                            <input type="hidden" id="" name="user_name" value="<?php echo $user_name; ?>" class="form-control">
                        </div>
                        <?php } else { ?>
                            <div class="col-md-4 col-md-offset-1">
                                <input type="text" id="tags_2" data-type="userName"  name="user_name" placeholder="User Name" class="user form-control">
                            </div>
                        <?php }
                        ?>

                        <div class="col-md-5">
                            <input type="text" name="date_range" id="reservation" class="form-control pull-right" placeholder="Select Date Range">
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


    <script type="text/javascript">
        $("#tags_2").autocomplete({
            source: "getusernamerep"
        });
    </script>