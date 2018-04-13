<?php
$profileImage = '';
session_start();
if ($_SESSION['gender']=='male'){
	$profileImage = 1;
}
else $profileImage = 2;

?>
<?php
$db_host = "localhost" ;
$db_username = "root";
$db_pass = "";
$db_name = "user_info";
$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$email = $_SESSION['username'];
	$sql = "SELECT * FROM ads_db where email = '$email'";
	$imageData ='';
	$location='';
	$address='';
	$errorMessage = '';
	$foodAvailability='';
	$details = '';
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$imageData = $row['image'];
			$location = $row['location'];
			$address = $row['address'];
			$foodAvailability = $row['foodAvailability'];
			$errorMessage = 'Your Ads';
			$details = $row['details'];
			
		}
	}
	else $errorMessage = 'NO ADS POSTED YET';
?> 

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="favicon.png" type="image/x-icon">
		<title>Connect To People</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
			// Script to open and close sidebar
			function w3_open() {
				document.getElementById("mySidebar").style.display = "block";
				document.getElementById("myOverlay").style.display = "block";
			}
			 
			function w3_close() {
				document.getElementById("mySidebar").style.display = "none";
				document.getElementById("myOverlay").style.display = "none";
			}
		</script>
		<script>
			$(document).ready(function(){
				$("#b03").click(function(){
					$("#chatBot").modal('show');	
				});
			});
			$(document).ready(function(){
				$("#b02").click(function(){
					alert("Redirecting to Home Page");	
				});
			});
		</script>
		
		<!-- Hiding Div if no ads posted -->
		<script>
			$(document).ready(function(){
				var x = "<?php echo $errorMessage; ?>";
				if(x == "NO ADS POSTED YET"){
					$("#adDetails").hide();
				}
			});
		</script>
		<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
		</style>
		<style>
			iframe{
				width: 100%;
				height: 380px;
			}
		</style>
	</head>
	<body class="w3-light-grey w3-content" style="max-width:1600px">
		<!-- Sidebar/menu -->
		<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar" style="color: "><br>
		  <div class="w3-container">
			<a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
			  <i class="fa fa-remove"></i>
			</a>
			<img src="<?php echo $profileImage; ?>.png" style="width:45%;" class="w3-round" alt="inf"><br><br>
			<p class="w3-text-grey"><h4><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></b></h4></p>
		  </div>
		  <div class="w3-bar-block">
			<a href="profilePage.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon-home w3-margin-right"></i>VIEW ADS</a> 
			<a href="profilePage.php" id="b02" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon-plus w3-margin-right"></i>POST AD</a>
			<a href="" onclick="location.href='testing3.php';" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="glyphicon glyphicon-log-out w3-margin-right"></i>VIEW MY AD</a>
			<a id="b03" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>REACH US</a>
			<a href="landing.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon glyphicon-off w3-margin-right"></i>LOG OUT</a>
			
		  </div>
		  <div class="w3-panel w3-large">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>  
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
		  </div>
		</nav>

		<!-- Overlay effect when opening sidebar on small screens -->
		<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
		
		
		
		<!-- ChatBot Modal -->
		<div class="container">
			<!--Modal -->
			<div id="chatBot" class="modal fade" role="dialog">
				<div class="modal-dialog modal-md">
					<!--Modal Content -->
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
						</div>
						<div class="modal-body">
							<iframe style="border:2px solid rgb(244, 217, 66);"
								src="https://console.dialogflow.com/api-client/demo/embedded/e7d88a7c-8552-451e-a880-adccae98b43c">
							</iframe>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>CLOSE</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		
		
		<!-- Page Content -->
		<div class="w3-main" style="margin-left:300px">
			
			<!-- Header -->
			  <header id="portfolio">
				<a href="#"><img src="<?php echo $profileImage; ?>.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
				<span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
				<div class="w3-container">
					<h1 style="color: #ff5500;"><b>Connect To People</b></h1>
				</div>
			  </header>
			
				<div class="w3-row-padding">
					<div class="w3-third w3-container w3-margin-bottom">
					<br>
					<br>
					<p style="font-size: 20px;"><b><?php echo $errorMessage; ?></b></p>
					  <img src="<?php echo $imageData; ?>" style="width:100%" class="w3-hover-opacity">
					  <div id="adDetails" class="w3-container w3-white">
					  <p style="font-size: 15px;"><b>Personal Details</b></p>
						<ul>
							<li><p><b><?php echo strtoupper($location) ?></b></p></li>
							<li><p><b><?php echo strtoupper($address) ?></b></p></li>
							<li><p><b>Food Availability: <?php echo strtoupper($foodAvailability) ?></b></p></li>
							<li><p><b>Details:- <br > <?php echo $details ?> </b></p></li>
						</ul>
					  </div>
					</div>
				</div>
			
			
		<!-- End page content -->
		</div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
	</body>
</html>