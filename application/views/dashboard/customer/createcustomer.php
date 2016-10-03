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
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Create Customer</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url(); ?>billingcontroller/insertcustomer" method="POST" role="form">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="cst_id">ID<sup>*</sup></label>
                                <input name="cst_id" type="text" class="form-control" id="cst_id" placeholder="Customer ID" value="<?php echo '224-'.$current_date_my.'-'.$randomSerialNUmber; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="cst_name">Name<sup></sup></label>
                                <input name="cst_name" type="text" class="form-control" id="cst_name" placeholder="Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="cst_company">Company<sup>*</sup></label>
                                <input name="cst_company" type="text" class="form-control" id="cst_company" placeholder="Company">
                            </div>
                            
                            <div class="form-group">
                                <label for="cst_email">Email<sup>*</sup></label>
                                <input name="cst_email" type="text" class="form-control" id="cst_email" placeholder="Email">
                            </div>
                            
                            <div class="form-group">
                                <label for="cst_mobile">Mobile No.<sup>*</sup></label>
                                <input name="cst_mobile" type="text" class="form-control" id="cst_mobile" placeholder="Mobile Number">
                            </div>
                          
                        </div>
                        
                        <div class="col-md-5 col-md-offset-1">
                            
                            <div class="form-group">
                                <label>Date:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="cst_date1" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="yyyy/mm/dd" name="cst_date" value="<?php echo $current_date; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cst_address">Address</label>
                                <textarea name="cst_address" placeholder="Address....." rows="3" id="cst_address" class="form-control"></textarea>
                            </div>
                                                        
                        </div>
                        
                    </div>

                    <div>

                    </div>

                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat"  onclick="return checkadd();">Create</button>
                </div>
            </form>
        </div>
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

//$(function() {
//        $('#cst_date1').datepicker({
//            format: 'yyyy/mm/dd',
//        }).on('changeDate', function(e) {
//            $(this).datepicker('hide');
//        });
//
//    });


</script>


