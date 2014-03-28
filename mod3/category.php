<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Stories in category</title></head>
<body>
<?php
if(!isset($_GET['cat'])){
header("Location: home.php?success=false");
exit;
}
else{
$cat = $_GET['cat'];
}

echo "Category is: ".$cat."<br>";
$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'mod3site');

if($mysqli->connect_errno) {
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit;
}


if(mysqli_num_rows(mysqli_query($mysqli, "SELECT categories, stories, url, users FROM stories where categories='$cat'")) >0)
{
        $storyR = mysqli_query($mysqli, "SELECT categories, stories, url, users FROM stories where categories = '$cat'");
        while($row=$storyR -> fetch_row()){
                echo "<u><b><a href=\"category.php?cat=".$row[0]."\">".$row[0]."</a></b> - " . $row[1] . "<i>   posted by " . $row[3] . "</i> (<a href=" . $row[2] . ">".$row[2]."</a>)</u>";
                       
echo "<br>";
if(mysqli_num_rows(mysqli_query($mysqli, "SELECT comments, users FROM comments where stories='$row[1]'")) >0 ){
        $commentR = mysqli_query($mysqli, "SELECT comments, users FROM comments  where stories='$row[1]'");

                while ($rowc=$commentR -> fetch_row()) {
                        echo $rowc[0]. "<i>     posted by ".$rowc[1]."</i>";
echo"<br>";
                }
                }
}
}
?>

</body>
</html>
