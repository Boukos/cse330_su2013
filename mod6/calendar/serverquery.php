<?php
$dbhost = "localhost";
$dbuser = "wustl_inst";
$dbpass = "wustl_pass";
$dbname = "cal";
        //Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
        //Select Database
mysql_select_db($dbname) or die(mysql_error());
        // Retrieve data from Query String
$name = $_GET['name'];

$day = $_GET['day'];
        // Escape User Input to help prevent SQL Injection
$name = mysql_real_escape_string($name);

$day = mysql_real_escape_string($day);
        //build query
$query = "SELECT * FROM events WHERE user_name = '$name'";
        $query .= " AND date = '$day'";


        //Execute query
$qry_result = mysql_query($query) or die(mysql_error());


        //result string
$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>eventname</th>";
//$display_string .= "<th>username</th>";
$display_string .= "<th>time</th>";
$display_string .= "<th>day</th>";

while($row = mysql_fetch_array($qry_result)){
        $display_string .= "<tr>";
     
        $display_string .= "<td>$row[event_name]</td>";
//$display_string .= "<td>$row[user_name]</td>";
        $display_string .= "<td>$row[time]</td>";

        $display_string .= "<td>$row[date]</td>";
        $display_string .= "</tr>";
        
}
//echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo ($display_string);
?>
