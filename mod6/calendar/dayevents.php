<?php 
include 'database.php';
?>

<?php

if(isset($_POST['date'])){
	$date = $_POST['date'];
echo $date;
}

mysql_select_db("events", $connect);
$events = mysql_query("SELECT event_name FROM events WHERE date='$date'");
echo "Today's events:" <br>;
while($row = mysql_fetch_array($events)){
	echo .$row ."<br>";
}
}

?>

