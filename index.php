<?php include('admin/include/connection.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<script type="text/javascript" src="js/all.js"></script>
	<script type="text/javascript" src="js/detail.js"></script>


<body>
<?php
	  include('separate_detail.php');
	  include('search.php');
	  include('navigation.php');
	  include('trending.php');
	  include('popular.php');
	  include('footer.php');
?>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
</body>
</html>