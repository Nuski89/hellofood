<center>
<div style="width: 100%;margin-top:0px;margin-bottom:0px;font-size:18px;">
    <div><b><?php echo $company['company_name']; ?><br><small><?php echo $company['branch_address']; ?></small></b></div>
    <div><span><?php echo 'Sale No : '.$sales['sales_id']; ?></span></div>
    <div><span>Date : <?php echo $sales['salse_date'].' '.$sales['check_in_time']; ?></span></div>
    <?php echo($sales['waiter_auto_id']==0 ? '' :"<div><span>{$this->lang->line('waiter')} : {$sales['waiter']}</span></div>"); ?>
    <?php echo($sales['customer_auto_id']==0?'':"<div><span>{$this->lang->line('customer')} : {$sales['customer']}</span></div>"); ?>
    <div><span><?php echo $this->lang->line('holds')[$sales['hold_type']].' '.$sales['hold_auto_id']; ?></span></div>
    <?php $total = 0;$num=0;$qty=0;
    switch (2) {
        case '1':
    ?>
    <table cellspacing="0" border="0" class="table table-condensed table-striped" style="margin-top:5px;font-size:16px;">
        <tbody>
            <?php
            foreach ($data as $key => $value) {
                $num = ($key+1);
                $price = to_currency_only($value['net_amount']);
                echo "<tr><td>{$num}. # {$value['id']} ( {$value['amount']} - {$value['discount']} ) * {$value['qty']} <span class='pull-right'> {$price}</span><br>{$value['name']}</td></tr>";
                $total += $value['net_amount'];
                $qty +=$value['qty'];
            } ?>
        </tbody>
    </table>
    <?php
        break;
        case '2':
    ?>
    <table cellspacing="0" border="0" class="table table-condensed table-striped" style="margin-top:5px;font-size:16px;">
        <thead>
            <tr>
                <th class="text-left">Product</th>
                <th>Qty</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value) {
                $num = ($key+1);
                $price = to_currency_only($value['net_amount']);
                echo "<tr><td>{$num}. {$value['name']}</td><td class='text-center'>{$value['qty']}</td><td >{$price}</td></tr>";
                $total += $value['net_amount'];
                $qty +=$value['qty'];
            } ?>
        </tbody>
    </table>
    <?php
        break;
        default:
        echo "string";
        break;
    }
    ?>
    <?php if (!empty($sales)) { ?>
    <p style="text-align:center; font-weight:bold;font-size:16px; padding-top:2px;" colspan="2">Items <?php echo $num.' [ '.$qty.' ]'; ?></p>
    <table class="table table-condensed" cellspacing="0" border="0" style="margin-bottom:5px;">
        <tbody>
            <tr>
                <td style="font-weight:bold;font-size:16px;" colspan="2" >DISC <?php echo to_local_currency($sales['sales_discount']); ?> / TAX <?php echo to_local_currency($sales['sales_tax']); ?></td>
            </tr>
            <?php $total -= $sales['sales_discount']; $total += $sales['sales_tax']; ?>
            <tr>
                <td style="text-align:left; font-weight:bold;font-size:16px; padding-top:5px;">Grand Total</td>
                <td style="border-top:1px dashed #000; padding-top:5px; text-align:right; font-weight:bold;font-size:16px;"><?php echo to_local_currency($total); ?></td>
            </tr>
            <tr>
                <td style="text-align:left; font-weight:bold;font-size:16px; padding-top:5px;">Paid</td>
                <td style="padding-top:5px; text-align:right; font-weight:bold;font-size:16px;"><?php echo to_local_currency($sales['sales_tender']); ?></td>
            </tr>
            <tr>
                <td style="text-align:left; font-weight:bold;font-size:16px; padding-top:5px;">Change</td>
                <td style="padding-top:5px; text-align:right; font-weight:bold;font-size:16px;"><?php echo to_local_currency($sales['sales_change']); ?></td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</div>
</center>
