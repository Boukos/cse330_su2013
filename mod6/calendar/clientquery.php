<!DOCTYPE html>
<?php
require 'database.php';
session_start();
?>
<html><head></head>
<body>
<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
        
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
} 
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
 var name = '<?php echo $_SESSION['username']; ?>'
// var day = '<?php echo $_SESSION['date']; ?>'
var day = '<?php echo $_POST['date']; ?>'
// var name = document.getElementById('name').value;
// var day = document.getElementById('day').value;
 
// var day = "2013624";

var queryString = "?name=" + name ;
 queryString +=  "&day=" + day;
 ajaxRequest.open("POST", "serverquery.php" + 
                              queryString, true);
 ajaxRequest.send(null); 
}
</script>
<!--<form>
<input type='button' onclick='ajaxFunction()' 
                              value='show events'/>
</form>
<div id='ajaxDiv'>Your result will display here</div>
--></body>
</html>
