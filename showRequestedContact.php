<?php
	$db_host = "localhost" ;
	$db_username = "root";
	$db_pass = "";
	$db_name = "user_info";
	session_start();
	
	$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
	$owner = $_SESSION['username'];
	$sql = "SELECT * from request_for_contact where owner = '$owner'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$temp[] = $row;
		}
		$myjson['testData'] = $temp;
		$myJSON_showRequestsContact = json_encode($myjson);
	}
	echo $myJSON_showRequestsContact;
?>