<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"><title>Add a story</title></head>
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
?>

<form name="addstory" action="createstory.php" method = "POST">
Story name: <input type="text" name="title"><br>
URL: <input type="text" name="url"><br>
Category: <input type="text" name="categories"><br>
<input type="hidden" name="token2" value="<?php echo $_SESSION['token2'];?>" />
<input type="submit" name="create" value="Submit">
</form>
</body>
</html>
