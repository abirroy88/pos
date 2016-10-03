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
            <h3 style="text-align:center">Employee Expense Report</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url(); ?>reportcontroller/queryempexpreportbydaterange" method="post">
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-2">
                            <select name="emp_id" id="emp_id" class="form-control">
                                <option value="">Select Employee</option>
                                <?php foreach ($employee_name as $ename) {
                                    ?><option value="<?php echo $ename->e_id; ?>"><?php echo $ename->e_name; ?></option><?php }
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3">
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
