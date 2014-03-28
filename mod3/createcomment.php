<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
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

if(isset($_POST['title']) && isset($_POST['comments'])){
        $title = $_POST['title'];
        $comments = $_POST['comments'];
       
}
else{
header("Location: home.php?success=false");
exit;
}


$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3site');

if($mysqli->connect_errno) {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
}

if(mysqli_query($mysqli, "INSERT INTO comments (users, stories, comments) VALUES ('$user', '$title', '$comments')")){
echo $user.$title.$comments;

header("Location: home.php?success=true");
} else {
header("Location: home.php?success=false");
}

?>
</body>
</html>


