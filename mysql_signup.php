<?php
	$db_host = "localhost";
	$db_username = "root";
	$db_pass = "";
	$db_name = "user_info";
	
	//Connect to Mysql 
	$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
	
	//Check Connect
	if(!$conn){
			echo("Connect Failed".mysqli_connect_error());
	} 
	
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	
	//Checking if the username already exists
	//if exists, then show it.
	$sql = "SELECT email FROM `registration_db` WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			include 'loginform.html';
		}
	}
	//Else register the email and password.
	else {
		$sql = "INSERT INTO registration_db (firstname, lastname, email, password, gender)
		VALUES ('$fname', '$lname', '$email', '$password' , '$gender')";
		if(mysqli_query($conn,$sql)){
			session_start();
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['username'] = $email;
			$_SESSION['gender'] = $gender;
			header('Location: profilePage.php');
		}
		
	}
	mysqli_close($conn);
	
	
	
	
?>