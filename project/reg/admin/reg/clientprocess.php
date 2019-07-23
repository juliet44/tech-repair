<?php

include('connection.php');


if(isset($_POST["create"])){

	$Name = $_POST["Name"];
    	
	

    $Contact = $_POST["Contact"];
	
$Service = $_POST["Service"];
    $Technician = $_POST["Technician"];

	// $usertype = $_SESSION["usertype"];

	$add_user = "INSERT INTO  client (Name,Contact,Service,Technician) VALUES ('$Name','$Contact', '$Service','$Technician')";
	
	if($conn->query($add_user) === TRUE){
	

		header("Location: clientprocess.php");
		exit();
	}else{
		echo "Error: " . $add_user . " ON " . $conn->error;
	}
    
}
		
		
 
?>