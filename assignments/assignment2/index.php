<?php
$outer = 5;
$inner = 5;
$i = 1;
$j = 1;
$table = "<table border='1'>";

while ($i <= $outer){
    $table .= "<tr>";
    $j = 1;
    while($j <= $inner){
        $table .= "<td>Row {$i} Cell {$j}</td>";
        $j++;
    }
    $table .= "<tr>";
    $i++;
}
$table .= "</table>";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Table</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
     
    <?php 
       echo $table;
    ?>

    </body>
</html>