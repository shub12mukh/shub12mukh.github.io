<?php 
<!DOCTYPE html>
<html lang="en">

  <head>
	<link rel="icon" href="favicon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Connect To People</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="file.js">
	</script>
	
	<style>
		.modal-header{
		height: 100px;
		background-color: #5cb85c;
		color:white !important;
		text-align: center;
		}
		.modal-footer{
			background-color: #f9f9f9;
		}
		
		
		
		.container1 .btn {
			position: absolute;
			top: 80%;
			left: 50%;
			transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			background-color: #f4511e;
			border-radius: 7px;
			color: white;
			font-size: 16px;
			padding: 12px 24px;
			border: none;
			cursor: pointer;
			text-align: center;
			}

			.container1 .btn:hover {
				background-color: black;
			}
			.btn span {
			  cursor: pointer;
			  display: inline-block;
			  position: relative;
			  transition: 0.5s;
			}
			
			.btn span:after {
			  content: '\00bb';
			  position: absolute;
			  opacity: 0;
			  top: 0;
			  right: -20px;
			  transition: 0.5s;
			}

			.btn:hover span {
			  padding-right: 25px;
			}

			.btn:hover span:after {
			  opacity: 1;
			  right: 0;
			}
			
	</style>
	
  </head>
  
  
  <body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#">CONNECT TO PEOPLE</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="#">Home</a></li>
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Page 1-1</a></li>
				<li><a href="#">Page 1-2</a></li>
				<li><a href="#">Page 1-3</a></li>
			  </ul>
			</li>
			<li><a href="#">Page 2</a></li>
			<li><a href="#">Page 3</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#" id="signIdSelector"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="#" id="loginIdSelector"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	
	
	
	
	<!-- Login Form Modal -->
	<div class="container">
		<!--Modal -->
		<div id="myModalLoginForm" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!--Modal Content -->
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
						<h2 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span>Login</h2>
					</div>
					<div class="modal-body">
					
					
						<form role="form" method="POST" action = "mysql_login.php">
							<div class="form-group" >
								<label><span class="glyphicon glyphicon-user"></span>Username: </label>
								<input id="loginEmail" type="text" name="username" class="form-control" placeholder="Enter Email" required autocomplete="off" data-toggle="popover" data-content="invalid email"></input>
							</div>
							<div class="form-group">
								<label><span class="glyphicon glyphicon-eye-open"></span>Password: </label>
								<input type="password" name="password" class="form-control" placeholder="Enter Password" required ></input>
								<div class="checkbox">
									<label><input type="checkbox" value="">Remember me</label>
								</div>
								<button id="logIn" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Login</button>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
						<h4>Not a member?<a href="" id="signUpSelectorFromLogIn">Sign Up</a></h4>
						<h4>Fogot <a href=""> Password?</a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	<!-- Sign Up Form Modal -->
	<div class="container">
		<!--Modal -->
		<div id="myModalSigninForm" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!--Modal Content -->
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
						<h2 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span>Sign Up</h2>
					</div>
					<div class="modal-body">
					
					
						<form id="signupform" role="form"  method="POST" action="mysql_signup.php">
							<div class="form-group">
								<label><span class="glyphicon glyphicon-user"></span>First Name: </label>
								<input type="text" class="form-control" placeholder="Enter Name" required name="fname"></input>
							</div>
							<div class="form-group">
								<label><span class="glyphicon glyphicon-user"></span>Last Name: </label>
								<input type="text" class="form-control" placeholder="Enter Name" required name="lname"></input>
							</div>
							<div class="form-group">
								<label><span class="glyphicon glyphicon-eye-open"></span>Email: </label>
								<input id="signupEmail" type="text" class="form-control" placeholder="Enter Email" required name="email" data-toggle="popover" data-content="invalid email"></input>
								
							</div>
							<div class="form-group">
								<label><span class="glyphicon glyphicon-lock"></span>Password: </label>
								<input id="#" type="password" class="form-control" placeholder="Enter Password" required name="password"></input>
							</div>
							<div class="form-group">
								<label><input type="checkbox" value="" required>Accept The Terms&Conditions </label>
							</div>
							<div class="form-group">
								<button id="signUp" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Sign Up</button>
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
	
	<!-- For Carousel -->
		<div class="container">  
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" ></li>
				  <li data-target="#myCarousel" data-slide-to="1" ></li>
				  <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<div class="container1">
						<img src="first.jpg" alt="Snow" style="width:100%;height: 550px;">
						<button class="btn"><span>Read More </span></button>
					</div>
				  </div>

				  <div class="item">
					<div class="container1">
						<img src="second1.jpg" alt="Snow" style="width:100%;height: 550px;">
						<button class="btn" id="loginIdSelectorfromCarousel"><span>Log In </span></button>
					</div>
				  </div>
    
				  <div class="item">
					<div class="container1">
						<img src="third.png" alt="Snow" style="width:100%;height: 550px;">
						<button class="btn" id="signUpSelectorfromCarousel"><span>Sign Up </span></button>
					</div>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		</div>

	
  </body>
</html>
?>