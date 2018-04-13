<?php
$db_host = "localhost" ;
$db_username = "root";
$db_pass = "";
$db_name = "user_info";
 
session_start();
$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
if(isset($_POST['name'])){ 
	$user_requested_email = $_SESSION['username'];
	$owner = $_POST['name'];
	$user_requested_name = $_SESSION['fname'].''.$_SESSION['lname'];
	$user_requested_name;
	
	$sql = "SELECT * from request_for_contact where owner='$owner' and user_requested_email='$user_requested_email'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		echo 'You have already Requested for this AD' ;
	}
	else{
		$sql = "INSERT INTO request_for_contact (owner, owner_phone, user_requested_name , user_requested_email , starter) VALUES ('$owner','0', '$user_requested_name' ,'$user_requested_email','0')";	
		//echo $sql;
			if(mysqli_query($conn,$sql)){					
				echo 'Successfully Requested ';
			}
			 //else	echo("Error description: " . mysqli_error($conn));
	}
	//print_r(error_get_last());
}
?>