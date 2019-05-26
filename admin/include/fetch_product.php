<?php
	$query="select * from product";
	$query_run=mysqli_query($con,$query);
	while($row=mysqli_fetch_assoc($query_run))
	{
		?>
		<tr>
			<td><?=$row['name_of_product'];?></td>
			<td><?=$row['product_model'];?></td>
			<td><?=$row['product_group'];?></td>
			<td><a href="">Edit</a><a href="">Delete</a><a href="">Detail</a></td>
		</tr>
<?php		
	}
?>