<?php 
$success = $this->session->flashdata('success');
if($success){?> 

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
if($failed){?>

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
<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Head of Expense</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url();?>expensecontroller/changeheadofexpense" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Head of Expense ID</label>
                    <input name="expense_id" type="text" readonly class="form-control" id="" placeholder="Head of Expense ID" value="<?php echo $queryheadofexpensebyid->expense_id; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Head of Expense Name <sup>*</sup></label>
                    <input name="expense_name" type="text" class="form-control" id="" placeholder="Head of Expense Name" value="<?php echo $queryheadofexpensebyid->expense_name; ?>">
                </div>
                
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="return checkadd();">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
<script type="text/javascript">
    function checkadd(){
        var chk = confirm("Are you sure to edit this record ?");
        if (chk) {
            return true;
        } else{
            return false;
        };
    }
</script>