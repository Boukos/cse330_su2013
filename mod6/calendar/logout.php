<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>Logout</title>
</head>
<body>
<?php
	session_destroy();
	header("Location: calendar.php");
	exit;
?>
</body>
</html>

