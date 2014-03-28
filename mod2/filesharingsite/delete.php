<?php session_start() ?>
<!DOCTYPE html>
<html>
<head></head>
<body>

<form name="return"  action="filedirectory.php" method="POST">
        <input type="submit" name="returntodir" value="return to directory" />
</form>
<?php
$filename = $_GET['delete'];
if($_SESSION['token2'] !== $_POST['token2']){
	die("Request forgery detected");
}

$name=$_SESSION['name'];

$path = "/home/ubuntu/public_html/filesharingsite/".$name."/";
chmod ($path, 0777);
unlink("/home/ubuntu/public_html/filesharingsite/".$name."/".$filename);
#echo "you have deleted ".$filename;

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
	if ($filename == $folder[$i]) {
	$dir=dirname(_FILE_);
echo $dir;	
fopen($filename, 'r');
fclose($filename);
	if (unlink($filename)) {
	echo "true";
	}
	} else {
		echo "did not delete";
	}
}
#print("<a href=\"/~ubuntu/filesharingsite/".$username."/".$file."\">$file</a>"."<input type='submit' name='delete$i' value='delete'></br>");

?>
</body>
</html>


