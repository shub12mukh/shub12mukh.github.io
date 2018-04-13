<?php
$profileImage = '';
session_start();
if ($_SESSION['gender']=='male'){
	$profileImage = 1;
}
else $profileImage = 2;
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
<style>..
	body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<style>
	iframe{
		width: 100%;
		height: 380px;
	}
</style>
<script>
	//For Modal Post Ad Show

		$(document).ready(function(){
		});
			
			
			
		$(document).ready(function(){
			$("#b02").click(function(){
				$("#postAdForm").modal('show');
			});
		});
		
		$(document).ready(function(){
			$("#b03").click(function(){
				$("#chatBot").modal('show');
				
			});
		});
		
		$(document).ready(function(){
			$("#signUp").click(function(){
				var imageName = $("#image").val();
				if (imageName == '')
					alert('Please Upload An Image To Post AD');
				else{
					var extension = $("#image").val().split('.').pop().toLowerCase();
					if(jQuery.inArray(extension,['gif','jpeg','png','jpg']) ==-1){
						alert('Invalid Image Types');
						$("#image").val('');
						return false;
					}
				}
			});
		});
		
		
</script>
</head>



<body class="w3-light-grey w3-content" style="max-width:1600px">
<!-- Post ad Form Modal -->
<div class="container">
	<!--Modal -->
	<div id="postAdForm" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">
			<!--Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
					<h2 style="text-align:center;"><span class="glyphicon glyphicon-bullhorn"></span> Do You Want To Post an AD</h2>
				</div>
				
				<div class="modal-body">
				
				
					<form id="signupform" role="form"  method="POST" action="submitAd.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>Please Provide Genuine Details. We Respect Privacy</label>
						</div>
						<div class="form-group">
							<label for="sel1">Location:</label>
							  <select class="form-control" id="sel1" name="location" required>
								<option value="Sector1, Saltlake">Sector 1</option>
								<option value="Sector2, Saltlake">Sector 2</option>
								<option value="Sector3, Saltlake">Sector 3</option>
								<option value="Sector4, Saltlake">Sector4</option>
							  </select>
						</div>
						<div class="form-group"> 
							<label>Address </label>
							<input id="#" type="text" class="form-control" placeholder="Enter Address" required name="address"></input>
						</div>
						<div class="form-group"> 
							<label>Upload Image: </label>
							<input style="width:50%;" id="image" type="file"  required name="image" />
						</div>
						<div class="form-group" required>
							<label>Is food available: </label><br>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="foodAvailability" value="YES" ><i class="glyphicon glyphicon-ok" style="font-size:15px" ></i>Yes
								</label>
							</div>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="foodAvailability" value="NO"><i class="glyphicon glyphicon-remove" style="font-size:15px"></i>No
								</label>
							</div>
						</div><br>
						<div class="form-group">
							<label><input type="checkbox" value="" required>Accept The Terms&Conditions </label>
							<br >
							<button id="signUp" class="btn btn-success btn-block" type="submit" name="submit"><span class="glyphicon glyphicon-off"></span>Post AD</button>
						</div>
					</form>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
				</div>
			</div>
		</div>
	</div>
</div>

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


<!-- View Ad Modal -->

<div class="container">
	<!--Modal -->
	<div id="viewMyAd" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!--Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
					<h2 style="text-align:center;"><span class="glyphicon glyphicon-folder-open"></span> Your Ads</h2>
				</div>
				
				<div class="modal-body">
						<div class="form-group">
							<label>Please Provide Genuine Details. We Respect Privacy</label>
						</div>
						<div class="form-group">
							<label for="sel1">Location:</label>
							  <select class="form-control" id="sel1" name="location" required>
								<option value="sector1_saltlake">Sector 1</option>
								<option value="sector2_saltlake">Sector 2</option>
								<option value="sector3_saltlake">Sector 3</option>
								<option value="sector4_saltlake">Sector4</option>
							  </select>
						</div>
						<div class="form-group"> 
							<label>Address </label>
							<input id="#" type="text" class="form-control" placeholder="Enter Address" required name="address"></input>
						</div>
						<div class="form-group" required>
							<label>Is food available: </label><br>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="foodAvailability" value="yes" ><i class="glyphicon glyphicon-ok" style="font-size:15px" ></i>Yes
								</label>
							</div>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="foodAvailability" value="no"><i class="glyphicon glyphicon-remove" style="font-size:15px"></i>No
								</label>
							</div>
						</div><br>
						<div class="form-group">
							<label><input type="checkbox" value="" required>Accept The Terms&Conditions </label>
							<br >
							<button id="signUp" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Sign Up</button>
						</div>
				</div>
				
				
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar" style="color: "><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo $profileImage; ?>.png" style="width:45%;" class="w3-round" alt="inf"><br><br>
    <h4><b>Welcome </b></h4>
    <p class="w3-text-grey"><h4><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></b></h4></p>
  </div>
  <div class="w3-bar-block">
    <a href="" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="glyphicon glyphicon-home w3-margin-right"></i>VIEW ADS</a> 
	<a id="b02" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon-plus w3-margin-right"></i>POST AD</a>
    <a href="viewAd.php" onclick="location.href='testing3.php';" class="w3-bar-item w3-button w3-padding"><i class="glyphicon glyphicon-log-out w3-margin-right"></i>VIEW MY AD</a>
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

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="<?php echo $profileImage; ?>.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1 style="color: #ff5500;"><b>Connect To People</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>
      <button class="w3-button w3-white"><i class="fa fa-coffee w3-margin-right"></i>Food Available</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i></button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i></button>
    </div>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="choice1.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="choice1.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="choice1.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="choice1.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="choice1.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="choice1.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>
  
  
<!-- Post ad Form Modal -->
<div class="container">
	<!--Modal -->
	<div id="postAdForm" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!--Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
					<h2 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span>Do You Want To Post an AD</h2>
				</div>
				<div class="modal-body">
				
				
					<form id="signupform" role="form"  method="POST" action="profilePage.php">
						<div class="form-group">
							<label>Please Provide Genuine Details. We Respect Your Privacy</label>
						</div>
						<div class="form-group">
							<label for="sel1">Location:</label>
							  <select class="form-control" id="sel1" name="location" required>
								<option value="sector1_saltlake">Sector 1</option>
								<option value="sector2_saltlake">Sector 2</option>
								<option value="sector3_saltlake">Sector 3</option>
								<option value="sector4_saltlake">Sector4</option>
							  </select>
						</div>
						<div class="form-group"> 
							<label><span class="glyphicon glyphicon-lock"></span>Address </label>
							<input id="#" type="text" class="form-control" placeholder="Enter Address" required name="address"></input>
						</div>
						<div class="form-group" required>
							<label>Is food available: </label><br>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="foodAvailability" value="yes"><i class="fa fa-male" style="font-size:24px" ></i>Yes
								</label>
							</div>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="foodAvailability" value="no"><i class="fa fa-female" style="font-size:24px"></i>No
								</label>
							</div>
						</div><br>
						<div class="form-group">
							<label><input type="checkbox" value="" required>Accept The Terms&Conditions </label>
						</div>
						<div class="form-group">
							<button id="postAd" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Post Ad</button>
						</div>
					</form>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

  <!-- Pagination -->
  <!--
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
	-->
  
  <!-- Footer -->
	<footer class="container-fluid" >
			<p style="text-align:center;font-size: 20px;">&copy; Connect To People<strong><br >Designed By SHUBHAM MUKHERJEE</strong></p>
			<div class="row">
			<div class="col-sm-2 col-sm-offset-10">
			<div class="w3-xlarge w3-padding-32">
				<i class="fa fa-facebook-official w3-hover-opacity"></i>
				<i class="fa fa-instagram w3-hover-opacity"></i>
				<i class="fa fa-snapchat w3-hover-opacity"></i>
				<i class="fa fa-pinterest-p w3-hover-opacity"></i>
				<i class="fa fa-twitter w3-hover-opacity"></i>
				<i class="fa fa-linkedin w3-hover-opacity"></i>
			 </div>
			 </div>
			 </div>
	</footer>
	
	
	
	
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


