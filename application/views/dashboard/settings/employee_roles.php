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

<div class="row no-gutter">

    <div class="col-sm-12 header-title" style=" background-color: #EEEEEE; padding: 0;">
        <a href="<?php echo base_url(); ?>settings/employeeaccess/<?php echo 0; ?>" style="border-radius: 0; border-color: #BBBBBB; border-width: 1px; color: #000000;" class="pull-right btn btn-vk btn-lg waves-effect waves-light">Add New</a>
    </div>
    <div class="card-box table-responsive" style="border-radius: 0; margin: 0;">
        <!--        <div class="col-sm-12" style="margin-bottom: 25px;">
                    <h4 class="m-t-0 header-title"><a href="<?php // echo base_url();  ?>settings/employeeaccess/<?php echo 0; ?>" style="border-radius: 0; border-color: #BBBBBB; border-width: 1px; color: #000000;"class="pull-right btn btn-vk waves-effect waves-light">Add New</a></h4>
                </div>-->




        <!--            <h4 class="m-t-0 header-title">
                        <b>Product Category List</b>
                    </h4>
                    </br>-->

        <div class="col-sm-12" >

            <table class="table table-striped table-bordered">
                <thead>
                    <tr style=" background-color: #F8F8F8; border-bottom-width: 1px; border-bottom-color: #777777;"><th>EMPLOYEE ROLE</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($viewrolegroup as $rolegroup) { ?>
                        <tr>
                            <td style=" width: 100%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding: 5px 0 0 5px; height: 35px; background-color: #FFFFFF; color: #000;"><a href="<?php echo base_url(); ?>settings/employeeaccess/<?php echo $rolegroup->id; ?>" class="waves-effect waves-light"><i class="icon icon-lock " style="padding: 0 10px 0 0;"></i> <?php echo $rolegroup->name; ?></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

