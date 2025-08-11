<center>
<div style="width: 350px;font-size:25px;"> 
    <div><b><?php echo $company['company_name']; ?><br><small><?php echo $company['branch_address']; ?></small></b></div>
    <?php $datetime = new DateTime($sales['salse_date'] . ' ' . $sales['check_in_time']); ?>
    <div><span><?=$datetime->format('D, d M Y h:i A');  ?></span></div>
    <?php
    switch ($sales['hold_type']) {
        case '1':
            $status = $table_arr[$sales['hold_auto_id']];
            break;
        case '2':
            $status = "Wak In";
            break;
        case '3':
            $status = "Take Away";
            break;
        case '4':
            $status = "Delivery";
            break;
        case '5':
            $status = "Order";
            break;
        default:
            $status = "Wholesale";
    } ?>
    <div><span><?php echo $status.' #'.$sales['sales_id']; ?></span></div>
    <?php $total = 0; $num=0; $qty=0; ?>
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
        </tbody>
    </table>
</div>
</center>