<!DOCTYPE html>
<html>
<body>

<?php

$name = "Hello World";
echo str_word_count($name)."<br>";
echo strrev($name)."<br>";
echo strpos($name,"World")."<br>";
$name = str_replace("World","Dolly",$name);
echo $name."<br>";
echo date("H");


$carNames = array("Mercedes","Lamborgini","Audi","BMW");
for($x = 0;$x < count($carNames);$x++){
	echo "$carNames[$x].<br>";
}
?>

</body>
</html>