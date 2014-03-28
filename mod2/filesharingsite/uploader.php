<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form name="return"  action="filedirectory.php" method="POST">
        <input type="submit" name="return" value="return to filedirectory" />
</form>
<?php>
session_start();
// Get the filename and make sure it is valid
if($_SESSION['token'] !== $_POST['token']){
	die("Request forgery detected");
}
$filename = basename($_FILES['uploadedfile']['name']);

$username = $_SESSION['name'];
$user_path=sprintf("/home/ubuntu/public_html/filesharingsite/%s", $username);

if (!file_exists($user_path)){
mkdir($user_path,0777);
chmod($user_path,0777);
	if(!mkdir($user_path,0777)){
	echo "did not make dir";
}
}

$full_path= sprintf("/home/ubuntu/public_html/filesharingsite/%s/%s", $username, $filename);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path)){
	echo "you have successfully uploaded ".$filename;
        exit;
}else { 
        echo " sorry file is unable to be uploaded";
        exit;
}
?>

</body>
</html>
