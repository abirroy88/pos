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
        <h3 class="box-title">Head of Expense</h3>       
        <h3 class="box-title pull-right" style="padding-right:20px;"><button class="btn btn-success"  data-toggle="modal" data-target="#addHead-modal"><i class="glyphicon glyphicon-plus"></i>Add Head</button></h3>  
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Head of Expense ID</th>
                    <th>Head of Expense Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl = 1;
                foreach ($queryheadofexpense as $headofexpense) {
                    ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $headofexpense->expense_id; ?></td>
                        <td><?php echo $headofexpense->expense_name; ?></td>
                        <td>
                            <a class="btn btn-info btn-xs btn-flat" data-toggle="modal" data-target="#editHead-modal-<?php echo $headofexpense->id; ?>" onclick="edit_head(<?php echo $headofexpense->id; ?>)">Edit</a>
                            / <a href="<?php echo base_url(); ?>expensecontroller/deleteheadofexpense/<?php echo $headofexpense->expense_id; ?>"  class="btn btn-danger btn-xs btn-flat"  onclick="return checkdel();">Delete</a></td>
                    </tr>


                <script type="text/javascript">

                                var save_method; //for save method string
                                var table;

                                function edit_head(id)
                                {
                                    save_method = 'update';
                                    $('#form')[0].reset(); // reset form on modals

                                    //Ajax Load data from ajax
                                    $.ajax({
                                        url: "<?php echo site_url('expensecontroller/edithead/') ?>/" + id,
                                        type: "GET",
                                        dataType: "JSON",
                                        success: function(data)
                                        {
                                            $('[name="expense_id"]').val(data.expense_id);
                                            $('[name="expense_name"]').val(data.expense_name);
                                            $('#editCustomer-modal-').modal('show'); // show bootstrap modal when complete loaded
                                            $('.modal-title').text('Update Head of Expenses'); // Set title to Bootstrap modal title

                                        },
                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            alert('Error get data from ajax');
                                        }
                                    });
                                }
                </script>                    

                <!-- COMPOSE MESSAGE MODAL -->
                <div class="modal fade" id="editHead-modal-<?php echo $headofexpense->id; ?>" tabindex="-<?php echo $headofexpense->id; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $headofexpense->id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>

                            <div class="modal-body">
                                <form action="<?php echo base_url(); ?>expensecontroller/changeheadofexpense" method="post" id="form">

                                    <input type="hidden" value="" name="expense_id"/> 

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Head of Expense ID</label>
                                                <input type="text" class="form-control" placeholder="" name="expense_id" id="" value="" disabled>
                                            </div> 
                                            <div class="col-md-6">
                                                <label>Head of Expense Name</label>
                                                <input type="text" class="form-control" placeholder="" name="expense_name" id="" value="" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer clearfix">
                                        <button type="submit" class="btn btn-sm btn-primary"><!--<i class="fa fa-envelope"></i>-->Update</button>
                                        <button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>                
                                    </div>  

                                </form>

                            </div>                           
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <?php
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
<!-- page script -->
<div class="modal fade" id="addHead-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><!--<i class="fa fa-envelope-o"></i>--> Add Head of Expense</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>expensecontroller/insertheadofexpense" method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-md-3">Head ID</label>
                        <div class="col-md-9">
                            <input name="expense_id" type="text" readonly class="form-control" id="" placeholder="Head of Expense ID" value="<?php echo "HEX-" . $randomSerialNUmber; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Head Name<sup>*</sup></label>
                        <div class="col-md-9">
                            <input name="expense_name" type="" class="form-control" id="" placeholder="Head of Expense Name">
                        </div>
                    </div>                 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return checkadd();"><!--<i class="fa fa-envelope"></i>-->Save</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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



