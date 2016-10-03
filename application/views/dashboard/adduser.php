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
            <h3 class="box-title">Add Staff</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url();?>dashboardcontroller/insertuser" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Username <sup>*</sup></label>
                    <input name="name" type="" class="form-control" id="" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password <sup>*</sup></label>
                    <input name="password" type="password" class="form-control" id="" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Satus <sup>*</sup></label>
                    <select name="status" class="form-control">
                        <option value="">--- Select Status ---</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Role <sup>*</sup></label>
                    <select name="role" class="form-control">
                        <option value="">--- Select Role ---</option>
                        <option value="accounts">Accounts</option>
                        <option value="bill_collector">Bill Collector</option>
                    </select>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="return checkadd();">Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
<script type="text/javascript">
    function checkadd(){
        var chk = confirm("Are you sure to add this record ?");
        if (chk) {
            return true;
        } else{
            return false;
        };
    }
</script>