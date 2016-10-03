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
    <div class="col-xs-12">
        <div style="font-size: 16px;border-bottom: 0px;text-align: center;" class="page-header no-padding no-margin">
            <?php echo $storeInfo->company_info; ?> 
        </div>
        <p style=" text-align: center;"><?php echo $current_date; ?></p>
    </div><!-- /.col -->
</div>
<div class="row">

    <div class="box-body table-responsive col-md-offset-2 col-md-8">
        <table id="example" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>SL</th> 
                    <th>Particulars</th>                    
                    <th>Balance</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th colspan="3">Opening Balance</th>                    
                </tr>
            </thead>
            <tbody>

                <?php
                $sl = 1;
                $ttl = 0;
                foreach ($viewbankinfo1 as $bank) {
                    if ($bank->id == 0) {
                        ?>
                        <tr><td><?php echo $sl; ?></td>
                            <td style=" text-align: right;">Petty Cash</td>
                            <td>BDT <?php echo $bank->ttlbalance; ?></td>

                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                            <td>BDT <?php echo $bank->ttlbalance; ?></td>
                        </tr>
                        <?php
                    }

                    $ttl+= $bank->ttlbalance;
                    $sl++;
                }
                ?>
                <tr>
                    <td colspan="2" style=" text-align: right;">Total</td>
                    <td>BDT <?php echo $ttl; ?></td>

                </tr>
            </tbody>
            <?php
            $num1 = count($viewbankinfo2);
            if ($num1 > 0) {
                ?>
                <thead>
                    <tr>
                        <th colspan="3">Accounts Collection</th>                    
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sl = 1;
                    $ttl = 0;
                    foreach ($viewbankinfo2 as $bank) {
                        if ($bank->id == 0) {
                            ?>
                            <tr><td><?php echo $sl; ?></td>
                                <td style=" text-align: right;">Petty Cash</td>
                                <td>BDT <?php echo $bank->ttlbalance; ?></td>

                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                                <td>BDT <?php echo $bank->ttlbalance; ?></td>
                            </tr>
                            <?php
                        }

                        $ttl+= $bank->ttlbalance;
                        $sl++;
                    }
                    ?>
                    <tr>
                        <td colspan="2" style=" text-align: right;">Total</td>
                        <td>BDT <?php echo $ttl; ?></td>

                    </tr>
                </tbody>
                <?php
            }
            $num2 = count($viewbankinfo7);
            if ($num2 > 0) {
                ?>
                <thead>
                    <tr>
                        <th colspan="3">Non Invoice Collection</th>                    
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sl = 1;
                    $nttl = 0;
                    foreach ($viewbankinfo7 as $bank) {
                        if ($bank->id == 0) {
                            ?>
                            <tr><td><?php echo $sl; ?></td>
                                <td style=" text-align: right;">Petty Cash</td>
                                <td>BDT <?php echo $bank->ttlbalance; ?></td>

                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                                <td>BDT <?php echo $bank->ttlbalance; ?></td>
                            </tr>
                            <?php
                        }

                        $nttl+= $bank->ttlbalance;
                        $sl++;
                    }
                    ?>
                    <tr>
                        <td colspan="2" style=" text-align: right;">Total</td>
                        <td>BDT <?php echo $nttl; ?></td>

                    </tr>
                </tbody>
                <?php
            }
            $num3 = count($viewbankinfo3);
            if ($num3 > 0) {
                ?>
                <thead>
                    <tr>
                        <th colspan="3">Expense</th>                    
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sl = 1;
                    $ttl = 0;
                    foreach ($viewbankinfo3 as $bank) {
                        if ($bank->id == 0) {
                            ?>
                            <tr><td><?php echo $sl; ?></td>
                                <td style=" text-align: right;">Petty Cash</td>
                                <td>BDT <?php echo '(' . abs($bank->ttlbalance) . ')'; ?></td>

                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                                <td>BDT <?php echo '(' . abs($bank->ttlbalance) . ')'; ?></td>
                            </tr>
                            <?php
                        }

                        $ttl+= $bank->ttlbalance;
                        $sl++;
                    }
                    ?>
                    <tr>
                        <td colspan="2" style=" text-align: right;">Total</td>
                        <td>BDT <?php echo '(' . abs($ttl) . ')'; ?></td>

                    </tr>
                </tbody>
                <?php
            }
            $num4 = count($viewbankinfo6);
            if ($num4 > 0) {
                ?>
                <thead>
                    <tr>
                        <th colspan="3">Refund</th>                    
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sl = 1;
                    $ttl6 = 0;
                    foreach ($viewbankinfo6 as $bank) {
                        if ($bank->id == 0) {
                            ?>
                            <tr><td><?php echo $sl; ?></td>
                                <td style=" text-align: right;"><?php echo 'Refund from Petty Cash'; ?>
                                </td>
                                <td>BDT <?php echo '(' . abs($bank->ttlbalance) . ')'; ?></td>

                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo 'Refund from ' . $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                                <td>BDT <?php echo '(' . abs($bank->ttlbalance) . ')'; ?></td>
                            </tr>
                            <?php
                        }

                        $ttl6+= $bank->ttlbalance;
                        $sl++;
                    }
                    ?>
                    <tr>
                        <td colspan="2" style=" text-align: right;">Total</td>
                        <td>BDT <?php echo '(' . abs($ttl6) . ')'; ?></td>

                    </tr>
                </tbody>
            <?php
            }
            $num5 = count($viewbankinfo4);
            if ($num5 > 0) {
                ?>
            <thead>
                <tr>
                    <th colspan="3">Transfer</th>                    
                </tr>
            </thead>
            <tbody>

                <?php
                $sl = 1;
                $ttl = 0;
                foreach ($viewbankinfo4 as $bank) {
                    if ($bank->id == 0) {
                        ?>
                        <tr><td><?php echo $sl; ?></td>
                            <td style=" text-align: right;">Petty Cash</td>
                            <td>BDT <?php echo $bank->ttlbalance; ?></td>

                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                            <td>BDT <?php echo $bank->ttlbalance; ?></td>
                        </tr>
                        <?php
                    }

                    $ttl+= $bank->ttlbalance;
                    $sl++;
                }
                ?>
                <tr>
                    <td colspan="2" style=" text-align: right;">Total</td>
                    <td>BDT <?php echo $ttl; ?></td>

                </tr>
            </tbody>
            <?php }?>
            <thead>
                <tr>
                    <th colspan="3">Closing Balance</th>                    
                </tr>
            </thead>
            <tbody>

                <?php
                $sl = 1;
                $ttl = 0;
                foreach ($viewbankinfo5 as $bank) {
                    if ($bank->id == 0) {
                        ?>
                        <tr><td><?php echo $sl; ?></td>
                            <td style=" text-align: right;">Petty Cash</td>
                            <td>BDT <?php echo $bank->ttlbalance; ?></td>

                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $bank->b_name . ' [' . $bank->acc_no . ']'; ?></td>
                            <td>BDT <?php echo $bank->ttlbalance; ?></td>
                        </tr>
                        <?php
                    }

                    $ttl+= $bank->ttlbalance;
                    $sl++;
                }
                ?>
                <tr>
                    <td colspan="2" style=" text-align: right;">Total</td>
                    <td>BDT <?php echo $ttl; ?></td>

                </tr>
            </tbody>
        </table>

        </table>
    </div>
</div>
</br>
<div class="row no-print">
    <div class="col-xs-8 col-md-offset-2">
        <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
    </div>
</div>


<script type="text/javascript">

    function checkadd() {
        var chk = confirm("Are you sure to add this record ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
        ;
    }

    function checkupd() {
        var chk = confirm("Are you sure to update this record ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
        ;
    }

    function checkdel() {
        var chk = confirm("Are you sure to delete this record ?");
        if (chk) {
            return true;
        } else {
            return false;
        }
        ;
    }

</script>						 