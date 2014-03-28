<!DOCTYPE html>
<html><head>
<meta charset="UTF-8"><title>LOGIN</title></head>
<body>
<?php
session_start();
if(isset($_GET['success'])){
	if($_GET['success']=='true'){
		echo "Account created succesfully";
	}
	else{
		echo "Invalid username or password";
	}
}
$_SESSION['token'] = substr(md5(rand()),0, 10);
?>
<form name = "login" action = "home.php" method="POST">
User name: <input type="text" name="name"><br>
Password: <input type="password" name="pw"><br>
<input type="radio" name="guest" value="registered" checked>Registered User<br>
<input type="radio" name="guest" value="guest">Guest<br>
<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
<input type="submit" value="Log in">
</form>
<form name="register" action = "register.php" method= "POST">
<input type = "submit" value="Register">
</form>
</body>
</html>
