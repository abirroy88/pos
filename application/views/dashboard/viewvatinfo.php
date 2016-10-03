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
<h3 class="box-title">Vat Informations</h3>                                    
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Sl. No</th>
<th>Vat Rate</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach ($viewvatinfo as $viewvat) {
?><tr>
<td><?php echo $viewvat->id; ?></td>
<td><?php echo $viewvat->vat_rate; ?> %</td>
<td><a href="<?php echo base_url(); ?>dashboardcontroller/deletevatinfo/<?php echo $viewvat->id; ?>" class="btn btn-danger btn-sm"  onclick="return checkadd();">Delete</a></td>
</tr><?php
}?>


</tbody>
<tfoot>

</tfoot>
</table>
</div><!-- /.box-body -->
</div>
<!-- page script -->

<script type="text/javascript">
function checkadd(){
var chk = confirm("Are you sure to delete this record ?");
if (chk) {
    return true;
} else{
    return false;
};
}

</script>   				 
    
	

