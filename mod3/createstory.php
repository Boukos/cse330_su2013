<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['user'])) {
session_destroy();
header("Location: login.php?success=false");
exit;
}
else{
$user = $_SESSION['user'];
}

if($_SESSION['token2'] != $_POST['token2']){
        die("Request forgery detected");
}

if(isset($_POST['title']) && isset($_POST['url'])&& isset($_POST['categories'])){
	$title = $_POST['title'];
	$url = $_POST['url'];
	$categories = $_POST['categories'];
}
else{
header("Location: addstory.php?success=false");
exit;
}


$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3site');

if($mysqli->connect_errno) {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
}

if(mysqli_num_rows(mysqli_query($mysqli, "SELECT stories FROM stories WHERE stories = '$title'" )) >0 ){
header("Location: addstory.php?success=false");
}
else{
mysqli_query($mysqli, "INSERT INTO stories (users, stories, url, categories) VALUES ('$user', '$title', '$url', '$categories')");
header("Location: home.php?success=true");
}
?>
</body>
</html>
   
