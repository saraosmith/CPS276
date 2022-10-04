<?php
    function table1(){
        $numOfRows = 15;
        $numOfColms = 5;
        $table = "<table border='1'>";
        
        for($i = 1; $i <= $numOfRows; $i++){
            $table .= "<tr>";
            for($j = 1; $j <= $numOfColms; $j++){
                $table .= "<td> Row $i Column $j </td>";
        }
        }
        $table .= "</tr>";
        $table .= "</table>";
        echo $table;
        }
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
        echo table1();
    ?>

    </body>
</html>