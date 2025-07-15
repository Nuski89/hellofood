<center>
<div style="width: 350px;font-size:25px;"> 
    <div><b><?php echo $company['company_name']; ?><br><small><?php echo $company['branch_address']; ?></small></b></div>
    <div><span>Date : <?=date('Y-m-d');  ?></span></div>
    <div><span><?php echo 'Sale No : '.$sales['sales_auto_id']; ?></span></div>
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