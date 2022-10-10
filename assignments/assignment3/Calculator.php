<html>
<head>
<title>Calculator</title>
</head>
<body>

<?php

class Calculator {
    public function calc($oper, $x = null, $y = null){
        if($x !== null && $y !== null) {
        } else {
            return "You must enter a string and two numbers" . "<br>";
        }
        switch ($oper){
            case "/";
            if ($y > "0") {
                return "The division of the numbers is  " .$x / $y . "<br>";
            } else {
                return "Cannot divide by 0". "<br>";
            }

            case "*";
                return "The product of the numbers is " . $x * $y. "<br>";
                
            case "+";
                return "The sum of the numbers is  " .$x + $y. "<br>";
                
            case "-";
                return "The difference of the numbers is " .$x - $y. "<br>";
        
            
        }
    

    }
}
?>
</body>
<html>

