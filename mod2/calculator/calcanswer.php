<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>calculator</title></head>
<body>

  <?php
    $input1 = $_GET['in1'];
    $input2 = $_GET['in2']; 
    $calc = $_GET['radio'];
    
    if ($calc == add) {
    $answer = $input1 + $input2;
    echo htmlentities($input1." + ".$input2." = ".$answer);    
    }
    if ($calc == subtract) {
    $answer = $input1 - $input2;        
   echo htmlentities($input1." - ".$input2." = ".$answer);
 }
    if ($calc == multiply) {
    $answer = $input1 * $input2;        
echo htmlentities($input1." * ".$input2." = ".$answer);
    }
    if ($calc == divide) {
	if ($input2 == 0 && $input1 !=0) {
	echo htmlentities("cannot divide by 0 ");
    	} else {
	$answer = $input1 / $input2;        
echo htmlentities($input1." / ".$input2." = ".$answer);
	    }
	}

	
?>

</body>

</html>
