<!DOCTYPE html>
<?php
require 'database.php';
session_start();
?>
<html>
<head></head>
<body>
<?php

if($_SESSION['token2'] != $_POST['token2']){
        die("Request forgery detected");
}
 
$username=$_SESSION['username'];
if (isset($_POST ['name'])) {
        $eventname = $_POST['name'];
        if(!$eventname){
                printf("Please enter a name for the event.");
        }
                if(isset($_POST['time'])){
                         $eventtime = $_POST['time'];
        if(!$eventtime){
                                printf("Please enter a time for the event.");
                        }
                        if(isset($_POST['day'])){
                                $eventdate = $_POST['day'];
               if(!$eventdate){
                                        printf("Invalid date. Please try again.");
                                }

$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'cal');
if($mysqli->connect_errno) {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
}
        mysqli_query($mysqli, "DELETE FROM events WHERE event_name='$eventname' and  user_name='$username' and time='$eventtime' and  date='$eventdate'"); // VALUES ('$eventname', '$username', '$eventtime', '$eventdate')");
                                
                               
                              
//                                       header("Location: calendar.php");
echo($eventname + "ev" + $eventtime + "tt" + $eventdate);
                                }
                        }
                }
?>
</body>
</html>
