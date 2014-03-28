<!DOCTYPE html>
<html>
<head><title>hello</title></head>
<body>
<?php
echo "hello";
$dir=scandir("/var/www/share");

for ($j=0;$j<count($dir);$j++){
$link=$dir[$j];
echo $link;
echo "<a href="/var/www/share.$link">hello</a>";
}
?>
</body>
</html>

