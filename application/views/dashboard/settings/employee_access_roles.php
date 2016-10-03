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
    <div class="card-box table-responsive" style="border-radius: 0;">

        <div class="col-sm-12" style="width: 100%; height: 50px; padding-top: 10px; margin-bottom: 25px;">
            <b class="lead" style="font-weight: 600; color: #000;">Employee Role <?php
                if ($id > 0) {
                    echo '- ' . $rolegroupname->name;
                }
                ?></b>
            <button class="pull-right btn btn-danger btn-sm waves-effect waves-light pull-right" style="margin-left: 5px;border-radius: 0; ">Archive</button>
            <button class="pull-right btn btn-vk btn-sm waves-effect waves-light pull-right" style=" border-color: #CCCCCC;border-radius: 0; ">Save Changes</button>
        </div>
        </br>
        <div class="col-sm-12">
            <?php if ($id == 0) { ?>
                <table class="table table-bordered">                                 
                    <tbody>
                        <tr style=" ">
                            <td style=" width: 100%;border-bottom-color: #777777; border-bottom-width: 2px;padding: 5px 0 0 5px; height: 35px; background-color: #DDDDDD; color: #000;"  colspan="2"><label class="control-label">Name</label></td>
                        </tr>
                        <tr style=" height: 30px;">
                            <td style="border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; width: 25%; background-color: #F8F8F8; color: #000;">Employee Role</td>
                            <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding: 0px; margin: 0px;"><input style="border-radius: 0;" type="text" id="price" name="price" placeholder="Employee Role" class="form-control input-sm" value=""></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
            <table class="table table-bordered">                                 
                <tbody>
                    <tr style=" ">
                        <td style=" width: 100%;border-bottom-color: #777777; border-bottom-width: 2px;padding: 5px 0 0 5px; height: 35px; background-color: #DDDDDD; color: #000;"  colspan="2"><label class="control-label">General</label></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">External Login</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;">

                            <?php if ($id>0) { ?>
                                <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price" value="1" checked>
                            <?php } else { ?>
                                <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price" value="1">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Reports</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Service</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">                                 
                <tbody>

                    <tr style=" ">
                        <td style=" width: 100%;border-bottom-color: #777777; border-bottom-width: 2px;padding: 5px 0 0 5px; height: 35px; background-color: #DDDDDD; color: #000;"  colspan="2"><label class="control-label">Sales</label></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>

                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Refund</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>

                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Open Register </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Register Withdraw </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Close Register </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>

                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Change Prices </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Import Catalog Item</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Layaways & Special Orders </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Line Only Discount </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Sales-Entire Sale Discount </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">                                 
                <tbody>

                    <tr style=" ">
                        <td style=" width: 100%;border-bottom-color: #777777; border-bottom-width: 2px;padding: 5px 0 0 5px; height: 35px; background-color: #DDDDDD; color: #000;"  colspan="2"><label class="control-label">Inventory</label></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Inventory</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">eCom</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">                                 
                <tbody>

                    <tr style=" ">
                        <td style=" width: 100%;border-bottom-color: #777777; border-bottom-width: 2px;padding: 5px 0 0 5px; height: 35px; background-color: #DDDDDD; color: #000;"  colspan="2"><label class="control-label">Customers </label></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Customers </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Customers -Credit Limit</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">                                 
                <tbody>

                    <tr style=" ">
                        <td style=" width: 100%;border-bottom-color: #777777; border-bottom-width: 2px;padding: 5px 0 0 5px; height: 35px; background-color: #DDDDDD; color: #000;"  colspan="2"><label class="control-label">Settings </label></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Settings </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Settings -Setup Shops</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Settings-Setup Employee </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Settings -Setup Sales</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" width: 25%; border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Settings-Void Sales  </td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"><input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                    <tr style=" height: 30px;">
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000; border-right-color: #F8F8F8;">Settings -Pricing</td>
                        <td style=" border-bottom-color: #DDDDDD; border-bottom-width: 1px;padding:  5px 0 0 5px; background-color: #F8F8F8; color: #000;"> <input style="margin-left: 10%; margin-bottom: 10px;" type="checkbox" class="checkbox-inline" id="price" name="price"></td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</div>

