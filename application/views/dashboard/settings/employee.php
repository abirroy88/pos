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
    <div class="col-lg-12">
        <div class="card-box" style="min-height: 500px;">
            </br>
            <div class="row">
                <form role="form">
                    <div class="col-sm-9">
                        <table class="table-bordered  table table-hover">                                 
                            <tbody>
                                <tr>
                                    <td style="padding: 0 0 0 0; width: 30%;"><input type="text" id="price" name="price" placeholder="" class="form-control input-sm" value="Name"></td>
                                    <td style="padding: 0 0 0 5px;">
                                        <select id="type" name="type" class="form-control input-sm">
                                            <option value="">Select Role</option>  
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td style="padding: 0 0 0 5px;">
                                        <select id="type" name="type" class="form-control input-sm">
                                            <option value="">Select Status</option>  
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                    <td style="padding: 0 0 0 5px;"><a data-animation="fadein" class="btn btn-default btn-sm" style="width: 100%;">Search</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="col-sm-3">
                    <a href="<?php echo base_url(); ?>settings/employee_details" data-animation="fadein" class="btn btn-default btn-sm waves-effect waves-light m-b-30 pull-right"><i class="md md-add"></i> Add New</a>
                </div>
            </div>
            <div class="table-responsive">
                <div class="fixed-table-container" style="padding-bottom: 0px;">
                    <div class="fixed-table-header" style="display: none;">
                        <table></table>
                    </div>

                    <div class="fixed-table-body">
                        <table class="table-bordered  table table-hover" data-pagination="true" data-page-size="10" data-toggle="table" style="display: table;">
                            <thead style="">
                                <tr>

                                    <th tabindex="0" data-field="id" style="">
                                        <div class="th-inner ">SL</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th tabindex="0" data-field="name" style="">
                                        <div class="th-inner ">First Name</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th tabindex="0" data-field="date" style="">
                                        <div class="th-inner ">Last Name</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th tabindex="0" data-field="amount" style="">
                                        <div class="th-inner ">Role</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th tabindex="0" data-field="user-status" style="" class="text-center">
                                        <div class="th-inner ">Status</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th tabindex="0" data-field="user-status" style="" class="text-center">
                                        <div class="th-inner ">External Access</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr data-index="0">
                                    <td style="">1</td>
                                    <td style="">Isidra</td><td style="">Boudreaux</td>
                                    <td style="">Traffic Court Referee</td><td style="">22 Jun 1972</td>
                                    <td style="" class="text-center"><span class="label label-table label-success">Active</span></td>
                                </tr>
                                <tr data-index="1">
                                    <td style="">1</td>
                                    <td style="">Shona</td>
                                    <td style="">Woldt</td>
                                    <td style="">Airline Transport Pilot</td>
                                    <td style="">3 Oct 1981</td>
                                    <td style="" class="text-center">
                                        <span class="label label-table label-inverse">Disabled</span>
                                    </td>
                                </tr>

                                <tr data-index="2">
                                    <td style="">1</td>
                                    <td style="">Granville</td>
                                    <td style="">Leonardo</td>
                                    <td style="">Business Services Sales Representative</td>
                                    <td style="">19 Apr 1969</td>
                                    <td style="" class="text-center"><span class="label label-table label-danger">Suspended</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-footer" style="display: none;">
                        <table>
                            <tbody>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-pagination">
                        <div class="pull-left pagination-detail">
                            <span class="pagination-info">Showing 1 to 10 of 30 rows</span>
                            <span class="page-list"><span class="btn-group dropup">
                                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                                        <span class="page-size">10</span> <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li class="active"><a href="javascript:void(0)">10</a></li>
                                        <li><a href="javascript:void(0)">25</a></li>
                                        <li><a href="javascript:void(0)">50</a></li>
                                    </ul>
                                </span> rows per page</span>
                        </div>
                        <div class="pull-right pagination">
                            <ul class="pagination">
                                <li class="page-pre"><a href="javascript:void(0)">‹</a></li>
                                <li class="page-number active"><a href="javascript:void(0)">1</a></li>
                                <li class="page-number"><a href="javascript:void(0)">2</a></li>
                                <li class="page-number"><a href="javascript:void(0)">3</a></li>
                                <li class="page-next"><a href="javascript:void(0)">›</a></li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div> <!-- end col -->
</div>
