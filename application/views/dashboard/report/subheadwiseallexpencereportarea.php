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

<div class="col-md-10 col-md-offset-1">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 style="text-align:center">Head Sub-Head & Date Wise Expense Report</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url(); ?>reportcontroller/allexpensereportbydaterangeandheadsubhead" method="post">
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <select name="expense_id" id="expense_id" class="form-control">
                                <option value="">Select Head of Expense</option>
                                <?php foreach ($queryexpense as $headofexpense) {
                                    ?><option value="<?php echo $headofexpense->expense_id; ?>"><?php echo $headofexpense->expense_name; ?></option><?php }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select name="sub_expense_id" id="sub_expense_id" class="form-control">
                                <option value="">Select Sub Head of Expense</option>

                            </select>
                        </div>

                        <div class="col-md-4" style="padding-bottom: 10px;">
                            <input type="text" name="date_range" id="reservation" class="form-control pull-right" placeholder="Select Date Range">
                        </div>
                    </div>

                    <div style="padding-bottom: 10px;">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >Search</button>
                </div>
            </div><!-- /.box-body -->

        </form>

    </div>

    <script type="text/javascript">
        $(function() {
            $("#expense_id").change(function() {
                var expense_id = $(this).val();
                $('#sub_expense_id')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Select Sub Head of Expense</option>')
                        ;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>reportcontroller/getsubheadofexpensebyidrep/",
                    data: 'expense_id=' + expense_id,
                    dataType: 'json',
                    success: function(data) {
                        for (var i = 0; i < data.length; i++) {
                            var opt = $('<option />'); // here we're creating a new select option for each group
                            opt.val(data[i].sub_expense_id);
                            opt.text(data[i].sub_expense_name);
                            $('#sub_expense_id').append(opt);
                        }
                    }
                });
            });
        });


    </script>




