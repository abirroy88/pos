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
    <div class="col-md-6 col-md-offset-3">
        <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Date Wise Expense Report</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="<?php echo base_url();?>reportcontroller/expensereportbydaterange" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label>Date range:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date_range" id="reservation" class="form-control pull-right">
                    </div><!-- /.input group -->
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </form>
    </div><!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Head of Expense</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Head of Expense ID</th>
                            <th>Head of Expense Name</th>
                            <th>Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($queryexpense as $expense) {
                            ?>
                            <tr>
                                <td><?php echo $expense->expense_id; ?></td>
                                <td><?php echo $expense->expense_name; ?></td>
                                <td><a href="<?php echo base_url(); ?>reportcontroller/individualexpensereport/<?php echo $expense->expense_id; ?>" class="btn btn-info btn-sm btn-flat">Report</a></td>
                            </tr>
                            <?php    
                        }?>
                        
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div>
        <!-- page script -->
    </div>
    <div class="col-lg-7">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sub Head of Expense</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Head of Expense ID</th>
                            <th>Head of Expense Name</th>
                            <th>Sub Head of Expense ID</th>
                            <th>Sub of Expense Name</th>
                            <th>Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($querysubexpense as $subexpense) {
                            ?>
                            <tr>
                                <td><?php echo $subexpense->expense_id; ?></td>
                                <td><?php echo $subexpense->expense_name; ?></td>
                                <td><?php echo $subexpense->sub_expense_id; ?></td>
                                <td><?php echo $subexpense->sub_expense_name; ?></td>
                                <td><a href="<?php echo base_url(); ?>reportcontroller/individualsubexpensereport/<?php echo $subexpense->sub_expense_id; ?>" class="btn btn-info btn-sm btn-flat">Report</a></td>
                            </tr>
                            <?php    
                        }?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div>
        <!-- page script -->
    </div>
</div>

						 
    
	

