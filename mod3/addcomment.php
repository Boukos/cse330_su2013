
<!DOCTYPE html>
<html>
<head>
<!--<meta charset="UTF-8">-->
<title>Add a comment</title></head>
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
$title=$_POST['title'];
}
else{
header("Location: addcomment.php?success=false");
}
?>


<form name="addcomment" action="createcomment.php" method = "POST">
Comment: <input type="text" name="comments"><br>
<input type="hidden" name="title" value="<?php echo $title;?>" />
<input type="hidden" name="token2" value="<?php echo $_SESSION['token2'];?>" />
<input type="submit" name="create" value="Submit">
</form>
</body>
</html>








