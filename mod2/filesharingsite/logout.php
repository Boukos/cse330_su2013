<?php session_start(); ?>
<!DOCTYPE html>
<head>
<title>logout</title>
</head>
<body>
<?php
session_destroy();
echo ("you are logged out");
header("Location: login.php");
exit;
?>
</body>
</html>

