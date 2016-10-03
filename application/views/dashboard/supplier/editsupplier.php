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
<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<form action="<?php echo base_url();?>suppliercontroller/changesupplierinfo" method="post">
					<div class="box-header">
						<div class="row">
							<div class=" col-md-10">
								<h3 class="box-title">Edit Supplier Information</h3>
							</div>
							
						</div>
					</div>
					
						
					<div class="box-body">
						<div class="form-group">
							<label>Supplier Name</label>
							<input id="name" class="form-control" name="supplier_id" type="hidden" value="<?php echo $querysupplier->supplier_id; ?>">
							<input id="name" class="form-control" name="supplier_name" type="text" value="<?php echo $querysupplier->supplier_name; ?>">
						</div>
						<div class="form-group">
							<label>Address: </label>
							<textarea id="address" class="form-control" rows="4" name="other_supplier_details" cols="50"><?php echo $querysupplier->other_supplier_details; ?></textarea>						
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Phone Number: </label>
									<input id="phone" class="form-control" name="supplier_phone" type="text" value="<?php echo $querysupplier->supplier_phone; ?>">								
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Email Address: </label>
									<input id="email" class="form-control" name="supplier_email" type="email" value="<?php echo $querysupplier->supplier_email; ?>">								
								</div>						
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Mobile Number: </label>
									<input id="mobile" class="form-control" name="supplier_cell_phone" type="text" value="<?php echo $querysupplier->supplier_cell_phone; ?>">								
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input class="btn btn-primary btn-flat pull-right" type="submit" value="Save"></input>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>