<center>
<div style="width: 350px;font-size:25px;">
    <h2>Expense</h2>
    <div><b><?php echo $company['company_name']; ?><br><small><?php echo $company['branch_address']; ?></small></b></div>
    <div><span>Date : <?=$data['expense_date'];  ?></span></div>
    <div><span>Reference : <?=$data['expense_reference'];  ?></span></div>
    <div><span>Category : <?=$data['expense_category'];  ?></span></div>
    <div><span>Amount : <?=to_local_currency($data['expense_amount']);  ?></span></div>
    <div><span><?=$data['expense_note'];  ?></span></div>
</div>
</center>