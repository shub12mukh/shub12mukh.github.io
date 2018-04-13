<!DOCTYPE html>

<html>

	

<body>

	<title>I Am riku</title>
	<p>helloo
<?php

$name = $email = $remember ="";
if($_SERVER["REQUEST_METHOD"]== "POST"){
	$name = validate($_POST["name"]);
	$email = validate($_POST["email"]);
	$remember = validate($_POST["remember"]);
}

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>




<form id="f01" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
E-mail: <input type="text" name="email" value="<?php echo $name; ?>"><br>
<label>
      <input type="checkbox"  name="remember" value="foodYes" style="margin-bottom:15px"> Food Available
	  <input type="checkbox"  name="remember" value="foodNo" style="margin-bottom:15px"> Food Not Available
</label>
<input type="submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $remember;
echo "<br>";
?>


</body>
</html>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		alert("Working");
		
	});

</script>