<?php session_start(); ?>
<!DOCTYPE html>
<head><title>Log-in Page</title></head>
<body>
<form name="login" action="checklogin.php"  method="GET">
<p> Username: <input type="text" name="name"></p>
<p><input type="submit" value="Submit"></p>
</form>
<!--<style type="text/css" >
body {
background-color: #ccffff;
}
</style>
<?php
if(array_key_exists('nameinput', $_POST)){
	$names = fopen("users.txt", "r");
	$nameinput = $_POST['nameinput'];
	$exists = false;
	while(!feof($names)){
		$linename = trim(fgets($names));
		if(($nameinput == $linename) && ($nameinput != "" )){
			$exists = true;
			$username = $nameinput;
			$_SESSION['username'] = $username;
			printf("valid username\n");
			header("Location: filedirectory.php");
			#header("Location: upload.php");
		}
	}
	if($exists == false){
		printf("invalid username");
	}
fclose($names);
}
?>

</body>
</html>
