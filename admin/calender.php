
<!DOCTYPE html>
<html>
<head>
	<title>Calender</title>
</head>
<body>
<?php
$month='08';
$year='2017';


// $obj=date_create($year."/".$month."/"."01");
$obj1=date('Y-m');
echo $obj1;
$obj=date_create($obj1."-"."01");

$total_days=date_format($obj,'t');
echo "<br/>". $total_days;

$startday=date_format($obj,'N');
echo "<br/>".$startday;
echo "<table border=1 style=\"border-collapse:collapse\">";
echo "<tr><th>SUN</th><th>MON</th><th>TUE</th><th>WED</th><th>THUR</th><th>FRI</th><th>SAT</th></tr>";
echo "<tr><td colspan=".$startday."></td>";
for($day=1;$day<=$total_days;$day++)
{
	$startday++;
	if($startday==8)
	{
		echo "</tr><tr>";
		$startday=1;

	}
	echo "<td>".$day."</td>";
}

$startday=date_format($obj,'L');

?>
</body>
</html>