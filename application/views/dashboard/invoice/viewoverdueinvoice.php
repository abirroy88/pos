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
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Over Due Invoices</h3>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Invoice Id</th>
                    <th>Invoice Id</th>
                    <th>Due Date</th>
                    <th style="width:25%;">Client</th>
                    <th>Mobile NO</th>
                    <th>Net Total</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl = 1;
                foreach ($queryoverdueinvoice as $dueinvoice) {                    
                    
                    $date1=date_create($dueinvoice->due_date);
                    $date2=date_create($current_date);
                    $diff=date_diff($date1,$date2);
                    $dif = $diff->format("%R%a days");
                    if ($dueinvoice->status == 0) {
                    if ($dueinvoice->due_amount == 0 || $dif < 30) {
                        
                    } else {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $dueinvoice->invoice_id; ?>" class="btn btn-sm btn-flat">
                                    <?php echo $dueinvoice->invoice_id; ?> </a>
                            </td>
                            <td><?php echo $dueinvoice->invoice_date; ?></td>
                            <td><?php echo $dueinvoice->due_date; ?></td>
                            <td><?php echo $dueinvoice->cst_company; ?></td>
                            <td><?php echo $dueinvoice->cst_mobile; ?></td>
                            <td><?php echo $dueinvoice->net_total; ?></td>
                            <td><?php echo $dueinvoice->net_total - $dueinvoice->due_amount; ?></td>
                            <td><?php echo $dueinvoice->due_amount; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $dueinvoice->invoice_id; ?>" class="btn btn-success  btn-xs btn-flat">Add Payment</a> <!--/ <a href="" class="btn btn-info btn-sm btn-flat">Edit</a> / <a href=""  class="btn btn-danger btn-sm btn-flat"  onclick="return checkadd();">Delete</a>--></td>
                        </tr>
                        <?php
                    } }
                    $sl++;
                }
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>
<!-- page script -->

<script type="text/javascript">
    function checkadd() {
        var chk = confirm("Are you sure to delete this record ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
        ;
    }

</script>						 



