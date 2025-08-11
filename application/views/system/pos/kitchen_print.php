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
    <?php echo($sales['waiter_auto_id']==0 ? '' :"<div><span>{$this->lang->line('waiter')} : {$sales['waiter']}</span></div>"); ?>
    <table cellspacing="0" border="0" class="table table-condensed table-striped" style="font-size:25px;">
        <thead>
            <tr>
                <th>Product</th>
                <th class="text-center">QTY</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;$num=0;
            foreach ($data as $key => $value) {
                $num = ($key+1);
                echo "<tr><td>{$num}. {$value['name']}</td><td class='text-center'>{$value['qty']}</td></tr>";
            } ?>
        </tbody>
    </table>
</div>
</center>