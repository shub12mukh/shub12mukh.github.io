<?php
	$db_host = "localhost" ;
	$db_username = "root";
	$db_pass = "";
	$db_name = "user_info";
	session_start();
	$owner = $_SESSION['username'];
	$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
	if(isset($_REQUEST['name'])){
		$request = $_REQUEST['name'];
		$phone = $_REQUEST['phone'];
		$sql = "UPDATE request_for_contact SET owner_phone = '$phone', starter= '1'   WHERE owner = '$owner' and user_requested_email = '$request' ";
		$result = mysqli_query($conn,$sql);
	}
	$conn->close();
?>