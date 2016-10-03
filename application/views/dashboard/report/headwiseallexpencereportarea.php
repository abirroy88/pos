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

<div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 style="text-align:center">Head & Date Wise Expense Report</h3>
        </div>
        <!-- form start -->
        <form action="<?php echo base_url();?>reportcontroller/allexpensereportbydaterangeandhead" method="post">
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <select name="expense_id" class="form-control">
                        <option value="">Select Head of Expense</option>
                        <?php foreach ($queryexpense as $headofexpense) {
                            ?><option value="<?php echo $headofexpense->expense_id.'-'.$headofexpense->expense_name; ?>"><?php echo $headofexpense->expense_name; ?></option><?php
                        }?>
                            </select>
                        </div>
                        
                        <div class="col-md-6" style="padding-bottom: 10px;">
                            <input type="text" name="date_range" id="reservation" class="form-control pull-right" placeholder="Select Date Range">
                        </div>
                    </div>
                    
                    <div style="padding-bottom: 10px;">
                    </div>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary" >Search</button>
                </div>
            </div><!-- /.box-body -->

        </form>

    </div>


						 
    
	

