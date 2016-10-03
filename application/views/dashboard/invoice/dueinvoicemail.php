<!-- Main content -->
<style type="text/css">
    <!--
    .style1 {color: #F0F0F0}
    -->
</style>

<div style="width:700px; position:relative;">
    <div style=" width:700px; height:auto; float:left;">
        <table width="690" align="center" cellpadding="0" cellspacing="0" bordercolor="#F0F0F0">
            <tr>
                <td colspan="2"><div align="center"><?php echo $companyInfo; ?></div></td>
            </tr>
            <tr>
                <td width="339">Invoice</td>
                <td width="339" colspan="-1" align="right">Date: <?php echo $currDate; ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td><span class="col-sm-4 invoice-col">To </span></td>
                <td colspan="-1"><div align="right"><b>Invoice No. <?php echo $queryinvoicefordue->invoice_id; ?></b></div></td>
            </tr>
            <tr>
                <td><?php echo $customerinfo->cst_name; ?></td>
                <td colspan="-1"><div align="right"><span class="col-sm-4 invoice-col" style="font-size:12px"><b>Invoice Date:</b> <?php echo $queryinvoicefordue->invoice_date; ?></span></div></td>
            </tr>
            <tr>
                <td>Cell No:<?php echo $customerinfo->cst_mobile; ?></td>
                <td colspan="-1"><div align="right"><span class="col-sm-4 invoice-col" style="font-size:12px"><b>Due Date:</b> <?php echo $queryinvoicefordue->due_date; ?></span></div></td>
            </tr>
            <tr>
                <td>Email:</strong> <?php echo $customerinfo->cst_email; ?></td>

            </tr>
            <tr>
                <td>Address: <?php echo $customerinfo->cst_address; ?></td>

            </tr>
            <!--<tr>
              <td>&nbsp;</td>
              <td colspan="-1"><div align="right">
                  <span class="col-sm-4 invoice-col" style="font-size:12px"><b>Prepared By:</b> <?php //echo $preparedBy;  ?></span>
                  </div></td>
            </tr>-->
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            
        </table>
    </div>
    <br/>

    <div style="width:700px; float:left; padding-top:20px;">
        <div style="width:350px; float:left;">
            <table width="340" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="font-size:15px;"><b>Note</b></td>
                </tr>
                <tr>
                    <td><?php echo $notE; ?></td>
                </tr>
            </table>
        </div>

                <div style=" width:350px; float:left;">
                    <p style="font-size:15px;">Due Payment History</p>
                    <table width="340" border="1" align="left" cellpadding="0" cellspacing="0">
                        <!--<tr>
                            <td colspan="2"><span class="lead" style="border-bottom: 5px;">Due Payment History</span></td>
                        </tr>-->
                        <tr>
                            <td width="163"><b>Payment Date </b></td>
                            <td width="164"><b>Payment Amount</b></td>
                            <td width="164"><b>Payment Method</b></td>
                        </tr>
                        
                            <tr>
                                <td><?php echo $paymentDate; ?></td>
                                <td><?php echo $firstPayment; ?></td>
                                <td><?php echo $meThod; ?></td>
                            </tr>
                        
                    </table>
                </div>

    </div>

    <br />

    <br/>
    <div style=" width:700px; float:left;">
        <p style="padding-top:15px;text-align:center; font-size:13px">ABH Invoiser Developed By: ABH World</p>
    </div>

</div>
