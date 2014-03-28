<?php session_start(); ?>
<!DOCTYPE html>
<head>
<title></title>
</head>
<body>
<?php $_SESSION['token'] = substr(md5(rand()), 0, 10);
 $_SESSION['token2'] = substr(md5(rand()), 0, 10); ?>

<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label><input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />	
<input type="submit" value="Upload File" />
</form>

<?php
$username = $_SESSION['name'];

$path = "/home/ubuntu/public_html/filesharingsite/".$username."/";
chmod($path, 0777);

$results = array();
$dir_handle = opendir($path);

while($file = readdir($dir_handle)){
	if($file != "." &&  $file != ".."){
		$results[] = $file;
	}
}
closedir($dir_handle);
$_SESSION['files'] = $results;
$folder = $_SESSION['files'];

for($i=0; $i<sizeof($folder); $i++){
$file = $folder[$i];

print("<a href=\"/~ubuntu/filesharingsite/".$username."/".$file."\">$file</br> </a>");
}

?>

<br>
<br>
<form name="delete" action="delete.php" method="GET">
Insert file name you want to delete: <input type="text" name="delete">
<input type="hidden" name="token2" value="<?php echo $_SESSION['token2'];?>" />
<input type="submit" value="Delete">

</form>
<form name="logout"  action="logout.php" method="POST">

	<input type="submit" name="logout" value="logout" />
</form>
</body>
</html>


