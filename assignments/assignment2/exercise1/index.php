<?php

  function loop(){
    $i = 1;
    $j = 1;
    
    while($i < 5){
      $j = 1;
      $x = "<li> $i </li>";
      while($j < 6){
       $x .= "<ul> <li> $j </li> </ul>";
       $j++;
        
      }
      echo $x;
      $i++;
      

    }
  }
   


   
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Nested List</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
  <body>
    <?php echo loop(); ?>
  </body>
</html>