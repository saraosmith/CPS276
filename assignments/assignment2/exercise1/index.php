<?php
$ul = "<ul>" ;

$i = 1;

while($i < 5){
  $ul .= "<li>$i";
  $j = 0;
  $ul .= "<ul>";
  while($j < 5){
    $ul .= "<li>$j</li>";
  }

  $ul .= "</ul></li>";

  $i++;
}

$ul .= "</ul>";

   
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Nested List</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
  <body>
    <?php echo $ul; ?>
  </body>
</html>