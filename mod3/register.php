<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>registration</title></head>
<body>
<form name="register" action="createaccount.php" method="POST">
Create username: <input type = "text" name = "user"></br>
Create password: <input type="password" name="pw"></br>
<input type="submit" value= "Submit"></br>

<?php

if(isset($_GET['invalid'])){
echo "User name already exists";
}

?>

</body>


</html>
