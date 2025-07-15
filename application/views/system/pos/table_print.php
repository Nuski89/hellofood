<center>
<div style="width: 350px;font-size:25px;"> 
    <div><b><?php echo $company['company_name']; ?><br><small><?php echo $company['branch_address']; ?></small></b></div>
    <div><span>Date : <?=date('Y-m-d');  ?></span></div>
    <div><span><?php echo 'Sale No : '.$sales['sales_auto_id']; ?></span></div>
    <h2><?php echo 'Total : '.number_format($sales['sales_total'],2); ?></h2>
</div>
</center>