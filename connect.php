<?php
		$user= "LPZAY";
		$pass="Minatothe4th!";
		$host="rhdatabase.caiavoybq5ht.us-east-2.rds.amazonaws.com";
		$db="RHmaindatabase";

	$conn = mysqli_connect($host, $user, $pass,$db);
	if(!$conn){
		die("Connection failed: " .mysqli_connect_error());
	}
	?>