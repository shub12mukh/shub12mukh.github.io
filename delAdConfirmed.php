<?php
	$db_host = "localhost" ;
	$db_username = "root";
	$db_pass = "";
	$db_name = "user_info";
	$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		echo "Connection Established" ;
	session_start();
	$email = $_SESSION['username'];
	
	$sql = "DELETE FROM ads_db WHERE email ='$email'"; 
	
	$result = mysqli_query($conn,$sql);
	header('Location: profilePage.php');
?>