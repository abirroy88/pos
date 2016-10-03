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
<div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Items</h3>                                    
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Supplier Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($viewitemlist as $viewitem){?>
                                        <tr>
                                            <td><?php echo $viewitem->item_code; ?></td>
                                            <td><?php echo $viewitem->item_name; ?></td>
                                            <td><?php echo $viewitem->supplier_name; ?></td>
                                            <td><a href="<?php echo base_url();?>itemcontroller/updateitem/<?php echo $viewitem->item_id; ?>" class="btn btn-info btn-sm btn-flat">Edit</a> / <a href="<?php echo base_url();?>itemcontroller/deleteitem/<?php echo $viewitem->item_id; ?>"  class="btn btn-danger btn-sm btn-flat"  onclick="return checkadd();">Delete</a></td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                    <tfoot>
                                        
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div>
						<!-- page script -->
						
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
    
	

