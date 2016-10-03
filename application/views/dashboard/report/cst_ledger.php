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
            <h3 style="text-align:center">Client Ledger</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url(); ?>reportcontroller/querycstreportbydaterange" method="post">
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-2">
                            <input type="text" id="tags_2" data-type="cstCompany"  name="cst_company" placeholder="Client Company" class="customer form-control">
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
    
   
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Company</th>
                        <th>Net Amount</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($querytotalinvoicehistory as $invoices) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total-$invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><a href="<?php echo base_url(); ?>reportcontroller/querycstreportbycstid/<?php echo $invoices->cst_id; ?>" class="btn btn-info btn-xs">View Details</a></td>
                        </tr>
                        <?php
                        $sl++;
                    }
                    ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
    
</div>

    
    <script type="text/javascript">
    $( "#tags_2" ).autocomplete({
          source: "getcustomernamerep"
        });
   </script>