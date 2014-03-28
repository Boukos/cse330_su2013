<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Bold Printer</title></head>
<body>
<?php

$h = fopen("users.txt", "r");
session_start();
$_SESSION['name']=$_GET['name'];
#echo $_SESSION['name'];


echo "<ul>\n";
while( !feof($names) ){
                $temp=fgets($h);
                if(trim($temp)==$_SESSION['name']){
header("Location: filedirectory.php");
#mkdir("/filesharing/'.$_SESSION['name']", 0700);
#header("Location: upload.php");
exit;
}
}
echo "Invalid Username";
echo "</ul>\n";

fclose($h);
?>
</body>
</html>

