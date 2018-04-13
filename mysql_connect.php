<?php

$db_host = "localhost" ;
$db_username = "root";
$db_pass = "";
$db_name = "user_ino";

// Create connection
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT firstname, lastname, email FROM registration_db";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Hello ".$row["firstname"]. "You have successfully logged in ";
    }
} 
else {
    echo "Sorry Wrong Password";
}

mysqli_close($conn);
?> 