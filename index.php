<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['username']))
	header('Location: profilePage.php');
else{
	header('Location: landing.php');
}
?>
</body>
</html>