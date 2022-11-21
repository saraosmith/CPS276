
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
        <title>Add Notes</title>
    </head>
    <body>
        <main class="container">
            <h1>Add Notes</h1>
        </main>
        <div class="container">
            <div class="row">
                <div class="col">
                <a href="index.php">Display Notes</a>
                <form class="form-group" method="POST" action="<?php $_PHP_SELF ?>">
                    <label for="datetime" >Date and Time</label>
                <input type="datetime-local" class="form-control" id="datetime" name="datetime"/>
                    <label for="note" >Note</label>
                <textarea class="form-control" style="height: 50vh" id="note" name="note"></textarea>
                <input type="submit" class="btn btn-primary" name="submit" value="Add Note"/>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>
<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dt->checkSubmit($_POST);
    }

?>