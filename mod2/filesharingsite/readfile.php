<?php session_start() ?>
<!DOCTYPE html>
<head>
<title></title>
</head>
<body>
<?php
$file = $_SESSION['files'];
$h = fopen("$file", "r");

$linenum = 1;
while(!feof($h)){
	printf("%s", fgets($h));
}
fclose($h);


?>
</body>
</html>

