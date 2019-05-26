<?php
include('include/connection.php');

	unset($_SESSION['login']);
	header('location:../index.php');


?>