<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Create account</title></head>
<body>
<?php 

if(isset($_POST['user']) && isset($_POST['pw'])){
$user = $_POST['user'];
$password = $_POST['pw'];
}

else{
header("Location: register.php");
exit;
}

$encPW = crypt($password);
$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3site');
 
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}

if(mysqli_num_rows(mysqli_query($mysqli, "SELECT name FROM registeredusers WHERE name = '$user'" )) >0 ){
header("Location: register.php?invalid=true");
}
else{
mysqli_query($mysqli, "INSERT INTO registeredusers (name, password) VALUES ('$user', '$encPW')");
header("Location: login.php?success=true"); 
}


?>
</body>
</html>
