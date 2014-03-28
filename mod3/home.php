<!DOCTYPE html>
<html>
<head><title>home</title></head>
<body>
<?php
session_start();

if(isset($_POST['token'])){
$_SESSION['checkToken'] = $_POST['token'];
}
if($_SESSION['token'] != $_SESSION['checkToken']){
	die("Request forgery detected");
}
$isGuest=true;


if($_POST['guest'] != "guest"){
$isGuest = false;
if (isset($_POST['name']) && isset($_POST['pw'])) {
$_SESSION['user'] = $_POST['name'];
$user = $_SESSION['user'];
$_SESSION['pass'] = $_POST['pw'];
$pw = $_SESSION['pass'];
} else if(isset($_SESSION['user'])){
$user = $_SESSION['user'];
$pw = $_SESSION['pass'];
}
else{
session_destroy();
header("Location: login.php?success=false");
exit;
}
}
else{
$_SESSION['user'] = "guest";
$user = "guest";
$_SESSION['pass'] = "password";
$pw = "password";
}
$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3site');

if($mysqli->connect_errno) {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
}
if(mysqli_num_rows(mysqli_query($mysqli, "SELECT name FROM registeredusers WHERE name = '$user'" )) >0 ){

	$result = mysqli_query($mysqli, "SELECT password FROM registeredusers WHERE name  = '$user'" );
$hashedPass = $result->fetch_row();

if(crypt($pw,$hashedPass[0]) != $hashedPass[0]){
		session_destroy();
		header("Location: login.php?success=false");

	exit;
	}

}else{
session_destroy();
header("Location: login.php?success=false");
exit;
}
$_SESSION['token2'] = substr(md5(rand()), 0, 10);
echo "Logged in as: ".$user;
?> 

<form name = "logout" action="logout.php" method ="POST">
<input type = "submit" value= "Log out"></form>
<?php if(!$isGuest){
echo "<form name = \"addstory\" action = \"addstory.php\" method = \"POST\">
<input type = \"submit\" value=\"Add story\">
<input type=\"hidden\" name=\"token2\" value=\"". $_SESSION['token2']."\" />
</form>";} ?>
</br>
<?php
if(mysqli_num_rows(mysqli_query($mysqli, "SELECT categories, stories, url, users FROM stories")) >0 )
{
	$storyR = mysqli_query($mysqli, "SELECT categories, stories, url, users FROM stories ORDER BY categories");
	while($row=$storyR -> fetch_row()){
		echo "_____________________________________________________________</br>";
		echo "<u><b><a href=\"category.php?cat=".$row[0]."\">".$row[0]."</a></b> - " . $row[1] . "<i>	posted by " . $row[3] . "</i> (<a href=" . $row[2] . ">".$row[2]."</a>)</u></br>";
		if($user == $row[3]){
			echo "<form name=\"deletestory\" action=\"deletestory.php\" method=\"POST\">
				<input type=\"hidden\" name=\"title\" value=\"".$row[1]."\">
				<input type=\"hidden\" name=\"token2\" value=\"".$_SESSION['token2']."\"/>
				<input type=\"submit\" value=\"Delete story\">
				</form>";
		}  
if(!$isGuest){
echo "<form name=\"addcomment\" action=\"addcomment.php\" method=\"POST\">
 <input type=\"hidden\" name=\"title\" value=\"".$row[1]."\">
                                <input type=\"hidden\" name=\"token2\" value=\"".$_SESSION['token2']."\"/>
                               
 <input type=\"submit\" value=\"Add comment\">
                                </form>";
}
echo "<br>";
if(mysqli_num_rows(mysqli_query($mysqli, "SELECT comments, users FROM comments where stories='$row[1]'")) >0 ){
	$commentR = mysqli_query($mysqli, "SELECT comments, users FROM comments  where stories='$row[1]'");

		while ($rowc=$commentR -> fetch_row()) {
			echo $rowc[0]. "<i>	posted by ".$rowc[1]."</i></br>";

			if ($user ==$rowc[1]) {
				 echo "<form name=\"editcomment\" action=\"editcomment.php\" method=\"POST\">
 <input type=\"hidden\" name=\"title\" value=\"".$row[1]."\">
			 <input type=\"hidden\" name=\"comments\" value=\"".$rowc[0]."\">
                      <input type=\"hidden\" name=\"token2\" value=\"".$_SESSION['token2']."\"/>
                                <input type=\"submit\" value=\"Edit comment\">
                                </form>"; 	
				 echo "<form name=\"deletecomment\" action=\"deletecomment.php\" method=\"POST\">
				<input type=\"hidden\" name=\"title\" value=\"".$row[1]."\">
				<input type=\"hidden\" name=\"token2\" value=\"".$_SESSION['token2']."\"/>
                                <input type=\"hidden\" name=\"comments\" value=\"".$rowc[0]."\">
				<input type=\"submit\" value=\"Delete comment\">
                                </form>";		
				?> </br> <?php	

			}
		} 
		}	



	}
}
?>
</body>
</html>
