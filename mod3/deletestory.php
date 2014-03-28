<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Delete a story</title></head>
<body>

<?php
session_start();
if (!isset($_SESSION['user'])) {
session_destroy();
header("Location: login.php?success=false");
exit;
}

if($_SESSION['token2'] != $_POST['token2']){
        die("Request forgery detected");
}

if(isset($_POST['title'])){
$title = $_POST['title'];
}
else{
header("Location:home.php?success=false");
}

$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3site');

if($mysqli->connect_errno) {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
}

if(!mysqli_num_rows(mysqli_query($mysqli, "SELECT stories FROM stories WHERE stories = '$title'" )) >0 ){
header("Location: home.php?success=false");
}
else{
	if(mysqli_num_rows(mysqli_query($mysqli, "SELECT comments, users FROM comments where stories='$row[1]'")) >0 ){
	mysqli_query($mysqli, "DELETE FROM comments where stories='$title'");
mysqli_query($mysqli, "DELETE FROM stories where stories='$title'");
header("Location: home.php?success=true");
} else {
mysqli_query($mysqli, "DELETE FROM comments where stories='$title'");
mysqli_query($mysqli, "DELETE FROM stories where stories='$title'");
header("Location: home.php?success=true");

}
}


?>





</body>
</html>









