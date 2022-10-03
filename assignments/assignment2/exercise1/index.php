<?php
$ul = "<ul>" ;

$i = 0;

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
      <title>Table</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
  <body>
    <?php echo $ul; ?>
 
  <ul>
  <li>1</li>
    <ul>
      <li>1</li>
      <li>2</li>
      <li>3</li>
    </ul>
  <li>2</li>
  <ul>
      <li>1</li>
      <li>2</li>
      <li>3</li>
    </ul>
  <li>3 
    <ul>
      <li>1</li>
      <li>2</li>
      <li>3</li>
    </ul>
  </li>
  <li>4</li>
  <ul>
      <li>1</li>
      <li>2</li>
      <li>3</li>
    </ul>
</ul>
  

 
  </body>
</html>