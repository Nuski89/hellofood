<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->lang->line('generate_barcode'); ?></title>
</head>
<body>
<table width='100%'>
<tr>
<?php 
$count = 0;
foreach($items as $item){
	$barcode = $item['id'];
	$text = $item['name'];
	if ($count % 2 ==0 and $count!=0){
		echo '</tr><tr>';
	}
	echo "<td align='center'>".$this->_['app']['company_name']."<br /><img src='".site_url('barcode').'?barcode='.rawurlencode($barcode).'&text='.rawurlencode($barcode)."&scale=$scale' /><br />".character_limiter($text, 45)."</td>";
	$count++;
}
?>
</tr>
</table>
</body>
</html>
