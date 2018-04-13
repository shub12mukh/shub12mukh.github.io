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
	$gender = $_SESSION['gender'];
	$email = $_SESSION['username'];
	$sql = "SELECT fname, lname, email, location , address , foodAvailability , image , details FROM `ads_db` WHERE gender = '$gender'  and email != '$email'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$test_data_full[]=$row;
		}
		 $json_full['testData']=$test_data_full;
		 $myJSON_full = json_encode($json_full);
	}
?>

<?php
	$db_host = "localhost" ;
	$db_username = "root";
	$db_pass = "";
	$db_name = "user_info";
	$conn = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
	$gender = $_SESSION['gender'];
	$email = $_SESSION['username'];
	$sql = "SELECT fname, lname, location , address , foodAvailability , image , details FROM `ads_db` WHERE gender = '$gender'  and email != '$email' and foodAvailability='yes'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$test_data_foodA[]=$row;
		}
		 $json_foodA['testData']=$test_data_foodA;
		 $myJSON_foodA = json_encode($json_foodA);
	}
?>

<?php
	$db_host = "localhost" ;
	$db_username = "root";
	$db_pass = "";
	$db_name = "user_info";
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
	else $myJSON_showRequestsContact=0;
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="render.js"></script> -->
<style>..
	body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<style>
	div .btn-primary{
		margin-left: 120px;
		margin-bottom: 25px;
		margin-top: 25px;
	}
</style>
<style>
	footer{
		margin-top: 700px;
	}
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
		
		$(document).on('click','.approveBtn',function(){
			var request = $(this).attr('request');
			updateNumberModal(request);
		});
		
		function updateNumberModal(request){
			$("#phoneModal").modal('show');
			$("#updateNumber").click(function(){
				var phone_number = $("#phone").val();
				data={
					name: request,
					phone: phone_number
				};
				$.ajax({
					url: 'phoneUpdate.php', 
					type: "POST",
					data: data,
					success: function(data){
						alert("Sucessfully Approved Contact");
					} 
				});
			});
		}
</script>



<!-- Showing only those ads which has a food Availability. -->
<script>
$(document).ready(function(){
	var json = <?php echo $myJSON_full; ?>;
	buildD01(json,false);
	$("#fAvailable").click(function(){
		buildD01(json,true);
	});
	$('#all').click(function(){
		buildD01(json,false);
	});
	$('.requestBtn').click(function(){
		var x = $(this).attr('owner');
		$.ajax({
            url: 'requestContact.php', //This is the current doc
            type: "POST",
            data: 'name='+x,
            success: function(data){
                alert(data);
            }
        });
	});
});



function buildD01(json,foodFilter){
	document.getElementById("d01").innerHTML = "";
	var temp = '';
	for(a in json.testData){
		if(foodFilter){
			if(json.testData[a].foodAvailability.toUpperCase()=="YES")
				temp=render(temp,json.testData[a]);
		}
		else
			 temp=render(temp,json.testData[a]);
	}
	$("#d01").html(temp);
}
function render(temp,a){
		temp += '<div class="w3-third w3-container w3-margin-bottom "><img src="'+a.image+'" width="100%" height="250px">';
		temp += '<div class="w3-container w3-white"><h4 style="margin-top: 15px;"><b>Posted by: '+a.fname+' '+a.lname+'</b></h4><br><p><b>Location Is: </b></p>'+a.location+'</b><br><b>'+a.address+'</b><br>';
		temp += '<b>Food Availability: '+a.foodAvailability.toUpperCase()+'<br><br>Details:- </b>';
		temp += '<br>Big Spacious fully furnished room. Attached Toilet and kitchen. Tv, Fridge, Ac already installed. The room is on the top most floor.</p>';
		temp += '<button class="btn btn-info center-block img-responsive requestBtn" style="margin-top: 20px; margin-bottom: 30px;" owner="'+a.email+'" name="requestContact"><span>Request Contact</span></button></div></div>';
		return temp;
}
</script>



<!-- View Request Contact modal JS-->
<script>

	$(document).ready(function(){
		$("#b04").click(function(){
			var temp = '';
			$("#requestForContactModal").modal('show');
			
			var json = <?php echo $myJSON_showRequestsContact; ?>;
			if(json != 0){
				for(a in json.testData){ 
					temp += '<div class="row" style="margin-top:15px; margin-bottom: 50px;">';
					temp +=	'<div class="col-md-4"><h4>Requested By: <br><b>'+json.testData[a].user_requested_name+'</b></h4></div>';
					temp += '<div class="col-md-4"><h4>Email is: <br><b>'+json.testData[a].user_requested_email+'<b><h4></h4></b></b></h4></div><b><b>';
					temp += '<div class="col-md-4"><button type="button" class="btn btn-info approveBtn" request="'+json.testData[a].user_requested_email+'"';
					if(json.testData[a].starter==1)
						temp+=' disabled ';
					temp+='style="margin-top:23px; margin-left: 50px;">Approve</button><button ';
					if(json.testData[a].starter==1)
						temp+=' disabled ';
					temp+='class="btn btn-danger" id="notInterestedBtn" style="margin-top:23px; margin-left: 10px;">Not Interested</button></div></b></b></div>';
					document.getElementById('rfcModal').innerHTML = temp;
				}
			}
			else document.getElementById('rfcModal').innerHTML = '<h2 style="margin:10px; margin-top: 100px; margin-bottom: 15px; text-align:center; ">It seems that you have not posted any ad</h2><br><button class="btn btn-primary" style="margin-left: 280px; margin-buttom: 400px;" id="postFromShowContactRequest"><h4 style="text-align: center; ">Post AD now to get a roommate</h4></button>';
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
							<label>Details </label>
							<input id="#" type="text" class="form-control" placeholder="Enter Details" required name="details"></input>
						</div>
						<div class="form-group">
							<label><input type="checkbox" value="" required>Accept The Terms&Conditions </label>
							<br >
							<button id="signUp" class="btn btn-success btn-block" type="submit" name="submit"><span class="glyphicon glyphicon-off"></span>Post AD</button>
						</div>
					</form>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
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

<!-- Request for contact Modal -->
<div class="container">
	<!--Modal -->
	<div id="requestForContactModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!--Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
					<h2 style="text-align:center;"><span class="glyphicon glyphicon-bullhorn"></span> View All Your Requests Here</h2>
				</div>
				<div class="modal-body" >
					<div id="rfcModal" class="container-fluid" >
						
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>CLOSE</button>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Phone Number Modal-->
<div class="container">
	<!--Modal -->
	<div id="phoneModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			<!--Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
					<h4 style="text-align:center;"><span class="glyphicon glyphicon-bullhorn"></span> ADD PHONE NUMBER</h4>
				</div>
				<div class="modal-body" >
					<div class="form-group"> 
						<label>Enter Your Phone Contact: </label>
						<input id="phone" type="text" class="form-control" placeholder="Enter Phone Number" required name=""></input>
						<div class="alert alert-warning" style="margin-top:10px;margin-bottom: 100px;">
							<strong>Careful!!Your Phone number will be shared.</strong>
						</div>
						<button id="updateNumber" style="margin-top: 40px;" class="btn btn-success btn-block" type="button" name="submit">Create Match</button>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>CLOSE</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left animated fadeInLeft" style="z-index:3;width:300px;" id="mySidebar" style="color: "><br>
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
	<a id="b04" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>REQUEST FOR CONTACTS</a>
	<a onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>MATCHES</a>
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
      <button class="w3-button w3-black" id="all">ALL</button>
      <button class="w3-button w3-white" id="fAvailable"><i class="fa fa-coffee w3-margin-right"></i>Food Available</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i></button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i></button>
    </div>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div id="d01" class="w3-row-padding">
    
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

