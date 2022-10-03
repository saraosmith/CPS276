<?php
    $numOfRowsVal = 15;
    $numOfColsVal = 5;

    $table= "<table border= '1'>";

    for($i = 1; $i <= $numOfRowsVal; $i++) {
        $table = $table."<tr>";
    
        for($j = 1; $j <= $numOfColsVal; $j++) {
            $table=$table."<td> Row".$i." Column".$j."</td>";
        }
    }

    $table = $table."</tr>";

    $table = $table."</table>";
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
        if(isset($table)) {
           echo $table; 
        }
    ?>

    </body>
</html>