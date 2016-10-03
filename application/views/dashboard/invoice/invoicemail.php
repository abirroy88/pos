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
                <td colspan="-1"><div align="right"><b>Invoice No. <?php echo $invoiceId; ?></b></div></td>
            </tr>
            <tr>
                <td><?php echo $customerinfo->cst_name; ?></td>
                <td colspan="-1"><div align="right"><span class="col-sm-4 invoice-col" style="font-size:12px"><b>Invoice Date:</b> <?php echo $invoiceDate; ?></span></div></td>
            </tr>
            <tr>
                <td>Cell No:<?php echo $customerinfo->cst_mobile; ?></td>
                <td colspan="-1"><div align="right"><span class="col-sm-4 invoice-col" style="font-size:12px"><b>Due Date:</b> <?php echo $dueDate; ?></span></div></td>
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
                  <span class="col-sm-4 invoice-col" style="font-size:12px"><b>Prepared By:</b> <?php //echo $preparedBy; ?></span>
                  </div></td>
            </tr>-->
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <?php
            $count = count($queryinvoiceditembyinvoiceidMail);
            for ($i = 0; $i < $count; $i++) {
                ?>
            <?php } ?>
      </table>
    </div>
    <br/>
    <div style=" width:700px; height:auto; float:left;">
        <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F0F0F0">

            <tr border="1" cellspacing="0" cellpadding="0">
                <td width="165"><div align="center">
                        <div align="center"><b>Qty</b></div>
                    </div></td>
                <td width="167"><div align="center">
                        <div align="center"><b>Product</b></div>
                    </div></td>
                <td width="165"><div align="center">
                        <div align="center"><b>Unit Price</b></div>
                    </div></td>
                <td width="165"><div align="center">
                        <div align="center"><b>Subtotal</b></div>
                    </div></td>
            </tr>
            <?php
            $count = count($queryinvoiceditembyinvoiceidMail);
            for ($i = 0; $i < $count; $i++) {
                ?>
                <tr border="1" cellspacing="1" cellpadding="1">
                    <td><div align="center"><span class="style1"><?php echo $queryinvoiceditembyinvoiceidMail[$i]->quantity; ?></span></div></td>
                    <td><div align="center"><span class="style1"><?php echo $queryinvoiceditembyinvoiceidMail[$i]->product_name; ?></span></div></td>
                    <td><div align="center"><span class="style1"><?php echo $queryinvoiceditembyinvoiceidMail[$i]->selling_price; ?></span></div></td>
                    <td><div align="center"><span class="style1"><?php echo $queryinvoiceditembyinvoiceidMail[$i]->total_price; ?></span></div></td>
                </tr>
            <?php } ?>
      </table>
    </div>
    <div style="width:350px; float:left; padding-top:20px;">
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
        <br />
        <div style="width:350px; float:left; padding-top:10px;">
            
            <?php if ($cNum > 0) { ?>
                <div style=" width:350px; float:left;">
                    <p style="font-size:15px;">Due Payment History</p>
                    <table width="340" border="1" align="left" cellpadding="0" cellspacing="0">
                        <!--<tr>
                            <td colspan="2"><span class="lead" style="border-bottom: 5px;">Due Payment History</span></td>
                        </tr>-->
                        <tr>
                            <td width="163"><b>Payment Date </b></td>
                            <td width="164"><b>Payment Amount</b></td>
                        </tr>
                        <?php
                        $total_due_paid = 0;
                        foreach ($duepaymenthistorybyinvoiceidMail as $duepaymenthistory) {
                            ?>
                            <tr>
                                <td><?php echo $duepaymenthistory->payment_date; ?></td>
                                <td><?php
                                    $total_due_paid = $duepaymenthistory->first_payment + $total_due_paid;
                                    echo $duepaymenthistory->first_payment;
                                    ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>Total Due Paid Amount</td>
                            <td><b><?php echo $total_due_paid; ?></b></td>
                        </tr>
                    </table>
                </div>
            <?php } ?> 

        </div>
    </div>
   
    <div style=" width:350px; float:right; padding-top:20px;">
        <table width="340" border="1" align="right" cellpadding="0" cellspacing="0">
            <tr>
                <td width="154"><div align="right">Subtotal:</div></td>
                <td width="170"><?php echo $subTotal; ?></td>
            </tr>
            <tr>
                <td><div align="right">Discount:</div></td>
                <td><?php echo $disCount; ?></td>
            </tr>
            <tr>
                <td><div align="right">Grand Total:</div></td>
                <td><?php echo $grandTotal; ?></td>
            </tr>
            <tr>
                <td><div align="right">Net Total:</div></td>
                <td><?php echo $netTotal; ?></td>
            </tr>
            <tr>
                <td><div align="right">Paid Amount:</div></td>
                <td><?php echo $paidAmount; ?></td>
            </tr>
            <?php if ($cNum > 0) { ?>
                <tr>
                    <td><div align="right">Due Payment Amount:</div></td>
                    <td><?php echo $total_due_paid; ?></td>
                </tr>

                <tr>
                    <td><div align="right">Due Amount:</div></td>
                    <td><?php echo $dueAmount; ?></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td><div align="right">Due Amount:</div></td>
                    <td><?php echo $dueAmount; ?></td>
                </tr>
            <?php } ?>
      </table>
    </div>
    <br />
     
    <br/> 
    <div style=" width:700px; float:left;">
        <table width="690" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">
              <p align="center" class="style3"><u>Payment System</u></p>              </td>
          </tr>
          <tr>
            <td width="328"><div align="left"><b>Bkash</b></div></td>
            <td width="7">&nbsp;</td>
            <td width="328"><div align="right"><b>Brack Bank</b></div></td>
          </tr>
          <tr>
            <td><div align="left"><span style="text-align:left; font-size:12px">Pessonal : 01716436241</span></div></td>
            <td>&nbsp;</td>
            <td><div align="right"><span style="text-align:right; font-size:12px">Account Name : ABHWorld</span></div></td>
          </tr>
          <tr>
            <td><div align="left"><span style="text-align:left; font-size:12px">Merchant : 01617221224</span></div></td>
            <td>&nbsp;</td>
            <td><div align="right"><span style="text-align:right; font-size:12px">Account No : 1526202873949001</span></div></td>
          </tr>
        </table>
        
  </div>
       <br/>
    <div style=" width:700px; float:left;">
        <p style="padding-top:15px;text-align:center; font-size:13px">ABH Invoiser Developed By: ABH World</p>
    </div>

</div>
