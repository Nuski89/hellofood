<center>
<div style="width: 350px;font-size:25px;"> 
    <div><b><?php echo $company['company_name']; ?><br><small><?php echo $company['branch_address']; ?></small></b></div>
    <?php $datetime = new DateTime($sales['salse_date'] . ' ' . $sales['check_in_time']); ?>
    <div><span><?=$datetime->format('l, d M Y h:i A');  ?></span></div>
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
    <?php $total = 0;
    foreach ($data as $key => $value) {
        $total += $value['net_amount'];
    } ?>
    <h2><?php echo 'Total : '.number_format($total,2); ?></h2>
</div>
</center>