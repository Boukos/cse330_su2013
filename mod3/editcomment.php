<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Edit comment</title></head>
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

if(isset($_POST['title']) && isset($_POST['comments'])){
$title = $_POST['title'];
$comments = $_POST['comments'];
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
        if(mysqli_num_rows(mysqli_query($mysqli, "SELECT comments, users FROM comments where stories='$title'")) >0 ){
	echo "Comment is: ".$comments;
        mysqli_query($mysqli, "DELETE FROM comments where stories='$title' and comments='$comments'");

//header("Location: home.php?success=true");
} else {
header("Location: home.php?success=false");

}
}

?>

<form name="newcomment" action="createcomment.php" method="POST">
Retype comment: <input type="text" value="<?php echo $comments; ?>"  name="comments">
<input type="submit" value="Submit">  
<input type="hidden" name="token2" value="<?php echo $_SESSION['token2'];?>" />
 <input type="hidden" name="title" value="<?php echo $title ?>" /></form>
</body>
</html>








