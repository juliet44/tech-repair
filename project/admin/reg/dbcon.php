<?php
	
	$db="repair";
	$host="localhost";
	$user="root";
	$pass="";
	
	$con=mysqli_connect($host,$user,$pass,$db);
	if(!$con){
		echo "Failed to connect to database";
	}

?>