<?php
$username = $_POST['name'];

$otp = "787878";
// the message
$msg = "First line of text\n".$otp;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
//mail("shub12mukh@gmail.com","My subject",$msg);
echo $username;
?>
