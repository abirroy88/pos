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
        <h4 style=" text-align: center;">Balance Status</h3>
            <div class="box-body table-responsive col-md-offset-2 col-md-8">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL</th> 
                            <th>Name</th>                    
                            <th>Branch</th>
                            <th>Account No.</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sl = 1;
                        $ttl = 0;
                        foreach ($viewbankinfo as $bank) {
                            if ($bank->id == 0) {
                                ?>
                                <tr>
                                    <td colspan="4" style=" text-align: right;">Petty Cash</td>
                                    <td>BDT <?php echo $bank->ttlbalance; ?></td>

                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $bank->b_name; ?></td>
                                    <td><?php echo $bank->b_branch; ?></td>
                                    <td><?php echo $bank->acc_no; ?></td>
                                    <td>BDT <?php echo $bank->ttlbalance; ?></td>
                                </tr>
                                <?php
                            }

                            $ttl+= $bank->ttlbalance;
                            $sl++;
                        }
                        ?>
                        <tr>
                            <td colspan="4" style=" text-align: right;">Total</td>
                            <td>BDT <?php echo $ttl; ?></td>

                        </tr>
                    </tbody>
                </table>
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