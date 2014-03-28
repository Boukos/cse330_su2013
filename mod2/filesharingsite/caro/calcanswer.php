<!DOCTYPE html>
<html>
<head><title>calculator</title></head>
<body>
<div>The answer </div>
  <?php
    $input1 = $_GET['in1'];
    $input2 = $_GET['in2'];
    
    $calc = $_GET['radio'];
    
    if ($calc == Add) {
    $answer = $input1 + $input2;        
    }
    if ($calc == Subtract) {
    $answer = $input1 - $input2;        
    }
    if ($calc == Multiply) {
    $answer = $input1 * $input2;        
    }
    if ($calc == Divide && $input2!=0) {
    $answer = $input1 / $input2;        
    }
    
    print("the answer is " + $answer);
?>

</body>

</html>