<!-- <?php
	$string="sujan";
	$first=$string[0];
	$len=strlen($string);
	$last=$string[$len-1];
	echo "$first";
	echo "$last";
	
?>
 -->
 <style>
 th,td
 {
 	width: 50;
 	height: 50;
 }
 </style>
 <?php 
 $month=02;
 $year=2017;
 $total_number_of_days=cal_days_in_month(CAL_GREGORIAN,$month,$year);
 $date=$year."/".$month."/01";
 $date_obj=date_create($date);
 $start_day=date_format($date_obj,'N');
 $da=date_format($date_obj,'jS M, Y');
 $day=date_format($date_obj,'s');
 echo $da;
 echo $day;
 ?>
 <table border="1" style="border-collapse:collapse">
	<tr>
		<th>Sun</th>
		<th>Mon</th>
		<th>Tue</th>
		<th>Wed</th>
		<th>Thur</th>
		<th>Fri</th>
		<th>Sat</th>
	</tr>
	<tr>

		<td colspan="<?=$start_day?>"></td>
		<?php for($i=1;$i<=$total_number_of_days;$i++)
		{
			$start_day++;
			if($start_day==8)
			{
				$start_day=1;
				echo "</tr><tr>";
			}
			echo "<td>$i</td>";
		}
		if($start_day!=8)
		{
			echo "<td colspan='8-$start_day'></td>";
		}
		?>
	</tr>
</table>
<?php
die();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="product_create.php" method="post">
<p>Product Name<br/>
<input type="text" name="productName">
</p>
<p>Product Description<br/>
<textarea name="productDescription"></textarea>
</p>
<p>Product Quantity<br/>
<input type="number" name="productQuantity">
</p>
<p>Product Price<br/>
<input type="number" name="productPrice">
</p>
<p>Product Image<br/>
<input type="file" name="productImage">
</p>
<p><br/>
<input type="submit" name="product_create">
</p>
</form>
</body>
</html>