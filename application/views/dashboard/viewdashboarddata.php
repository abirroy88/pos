<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            <?php
            if ($type == 'm_all') {
                echo 'Sales';
            } elseif ($type == 'm_coll') {
                echo 'Collections';
            } elseif ($type == 'm_due') {
                echo 'Dues';
            } elseif ($type == 'all') {
                echo 'All Sales';
            } elseif ($type == 'coll') {
                echo 'All Collections';
            } elseif ($type == 'due') {
                echo 'All Dues';
            } elseif ($type == 'm_overdue') {
                echo 'Overdue';
            } elseif ($type == 'overdue') {
                echo 'All Overdue';
            }
            ?></h3> 
        <div class="box-tools pull-right">
            <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
        </div>                                   
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Invoice No</th>
                    <th>Company</th>
                    <th>Invoice Date</th>                                           
                    <th>Due Date</th>
                    <th>Net</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl = 1;
                foreach ($querytotalinvoicehistory as $invoices) {
                    $dif = $invoices->net_total - $invoices->due_amount;
                    $date1 = date_create($invoices->due_date);
                    $date2 = date_create($current_date);
                    $diff = date_diff($date1, $date2);
                    $difd = $diff->format("%R%a days");
//                    $enddate = date('d-m-Y', strtotime($invoices->due_date) + strtotime("+30 day", 0));
//                    echo $invoices->due_date;
                    if ($type == 'm_all') {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><?php if ($invoices->due_amount > 0 && $invoices->status == 0) { ?> <a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }
                    if ($type == 'm_coll' && $dif > 0) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td> <?php if ($invoices->due_amount > 0 && $invoices->status == 0) { ?><a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }

                    if ($type == 'm_due' && $invoices->due_amount > 0) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><?php if ($invoices->status == 0) { ?><a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }
                    if ($type == 'all') {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><?php if ($invoices->due_amount > 0 && $invoices->status == 0) { ?>  <a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }

                    if ($type == 'coll' && $dif > 0) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><?php if ($invoices->due_amount > 0 && $invoices->status == 0) { ?> <a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }

                    if ($type == 'due' && $invoices->due_amount > 0) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><?php if ($invoices->status == 0) { ?><a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }

                    if ($type == 'overdue' && $invoices->due_amount > 0 && $difd > 30) {
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo base_url(); ?>billingcontroller/printviewinvoice/<?php echo $invoices->invoice_id; ?>"><?php echo $invoices->invoice_id; ?></a></td>
                            <td><?php echo $invoices->cst_company; ?></td>
                            <td><?php echo $invoices->invoice_date; ?></td>                                       
                            <td><?php echo $invoices->due_date; ?></td>
                            <td><?php echo $invoices->net_total; ?></td>
                            <td><?php echo $invoices->net_total - $invoices->due_amount; ?></td>
                            <td><?php echo $invoices->due_amount; ?></td>
                            <td><?php if ($invoices->status == 0) { ?><a href="<?php echo base_url(); ?>billingcontroller/addpaymentbyviewdueinvoice/<?php echo $invoices->invoice_id; ?>" class="btn btn-success btn-xs btn-flat">Add Payment</a><?php } ?></td>
                        </tr>
                        <?php
                    }
                    $sl++;
                }
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>





