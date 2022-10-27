<center>
<div style="width: 300px;"> 
    <div><span>Date : 2017-08-12 13:17:46</span></div>
    <div><span>Waiter : Without Waiter</span></div>
    <div><span>Table : Table 1</span></div>
    <table cellspacing="0" border="0" class="table table-condensed table-striped">
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