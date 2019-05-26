<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "test");  
 $output = '';  
 if(isset($_POST["name"]))   	
 {  
 	$table_names=$_POST['tablename'];
      if($_POST["name"] != '')  
      {  
           $query="Select * from $table_names where price>=".$_POST['init']." and price<=".$_POST['end']." and name_of_product='".$_POST['name']."'";
      }  
      else  
      {  
           $sql = "SELECT * FROM $table_names";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      { 
      	
      }  
      echo $outputs;  
 }  
 ?>  