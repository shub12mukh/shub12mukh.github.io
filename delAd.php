<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="file.js">
	</script>
	<script>
		$(document).ready(function(){
			$("#myModalLoginForm").modal('show');
		});
		
		$(document).ready(function(){
			$("#b01").click(function(){
				$("#myModalLoginForm").modal('hide');
				$("#sureForDel").modal('show');
			});
		});
		
		$(document).ready(function(){
			$("#b02").click(function(){
				$("#myModalLoginForm").modal('show');
				$("#sureForDel").modal('hide');
			});
		});
		
	</script>
	<style>
	.btn-success{
		margin: 15px;
	}
	.btn{
		margin: 15px;
	}
	</style>
</head>
<body>

<!-- Login Form Modal -->
	<div class="container">
		<!--Modal -->
		<div id="myModalLoginForm" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!--Modal Content -->
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" onclick="location.href='profilePage.php';"><span class="glyphicon glyphicon-remove"></span></button>
						<h2 style="text-align:center;"><span class="glyphicon glyphicon-time"></span>You have A Previous Ad</h2>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<button class="btn btn-success btn-lg" onclick="location.href='profilePage.php';">Take Me to My Profile Page</button>
								<button class="btn btn-success btn-lg" id="b01">Delete Previous AD</button>
							</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger pull-left" onclick="location.href='profilePage.php';" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Are you Sure -->
	<div class="container">
		<!--Modal -->
		<div id="sureForDel" class="modal fade" role="dialog">
			<div class="modal-dialog modal-md">
				<!--Modal Content -->
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal" id="b02" onclick="location.href='profilePage.php';" ><span class="glyphicon glyphicon-remove"></span></button>
						<h2 style="text-align:center;"><span class="glyphicon glyphicon-time"></span>Are You Sure you want to Delete this AD</h2>
					</div>
					<div class="modal-body">
								<button class="btn btn btn-warning btn-lg" onclick="location.href='delAdConfirmed.php'" onclick="deleteAd()">YES</button>
								<button class="btn btn-primary btn-lg pull-right" id="b01" onclick="location.href='profilePage.php';">NO</button>
					<div class="modal-footer">
						<button class="btn btn-danger pull-left" onclick="location.href='profilePage.php';" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
