<?php

    require_once 'date_time.php';
    $dt = new Date_Time();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Notes</title>
    </head>
    <body>
        <main class="container">
            <h1>Display Notes</h1>
        </main>
        <div class="container">
            <div class="row">
                <div class="col">
                <a href="./add_notes.php">Add Notes</a>
                <form class="form-group" method="POST" action="<?php $_PHP_SELF ?>">
                    <label for="begDate" >Begining Date</label>
                <input type="date" class="form-control" id="begDate" name="begDate"/>
                    <label for="endDate" >Ending Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate"/>
                <input type="submit" class="btn btn-primary" name="submit" value="Get Notes"/>
                </div>
            </div>
        </div>
    </form>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $notes = $dt->getNotes($_POST['begDate'],$_POST['endDate']);
    if(count($notes)>0){
?>
<table>
<tr><th>Date and Time</th><th>Note</th></tr>

<?php
for($i=0;$i<count($notes);$i++){
    if($i%2==0){
        echo "<tr> <td>".$notes[$i]['datetime']."</td>
        <td>".$notes[$i]['note']."</td><tr>";
    }else{
        echo "<tr> <td>".$notes[$i]['datetime']."</td>
        <td>".$notes[$i]['note']."</td><tr>";

    }

}
?>
    </table>
<?php

    }else{
        echo "No notes found for the date range selected";
    }
}
?>

    </body>
</html>