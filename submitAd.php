<?php 
$db_host = "localhost" ;
$db_username = "root";
$db_pass = "";
$db_name = "user_info";
 
session_start();
$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);


	if(isset($_POST['submit'])){
		$saved_path="img/room/";
		$saved_file_name="room_".time()."_".rand(1000,9999).".jpg";
		$upload_path=$saved_path.$saved_file_name;
		
		move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$email = $_SESSION['username'];
		$gender = $_SESSION['gender'];
		$location = $_POST['location'];
		$address = $_POST['address'];
		$foodAvailability = $_POST['foodAvailability'];
		$details = $_POST['details'];
		$sql = "SELECT * FROM ads_db WHERE email = '$email'";
		$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
					include 'delAd.php' ;
			}
			else{
				$sql1 = "INSERT INTO ads_db (fname, lname, email, gender ,location ,address ,foodAvailability , image , details)
						VALUES ('$fname', '$lname', '$email' , '$gender' ,'$location','$address' ,'$foodAvailability' , '$upload_path' , '$details')";	
				if(mysqli_query($conn,$sql1)){					
					header('Location: profilePage.php');
				}
				
			}
	}
?> 