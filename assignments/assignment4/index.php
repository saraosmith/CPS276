<?php
$output = "";
if(count($_POST) > 0){
    require_once 'addNameProc.php';
    $addName = new AddNameProc($_POST["name"]);
    $output = $addName -> set_name($_POST["name"]) . $_POST["namelist"];
    if(isset($_POST["ClearName"])){
        $output = "";
      }
   }
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Names</title>
    </head>
    <body>
        <main class="container">
            <h1>Add Names</h1>
        </main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        <input class="btn btn-primary" type="submit" name="submit" value="AddName">
                        <input class="btn btn-primary" type="submit" name="ClearName" value="ClearName">
                        <div class="form-group">
                            <label for="EnterName" class="form-label">Enter Names: </label>
                            <input type="text" class="form-control" name="name" id="EnterName">
                        </div>
                        <div class="form-group">
                            <label for="textareaName" class="form-label">List of Names: </label>
                            <textarea style="height: 500px;" class="form-control"
                            id="namelist" name="namelist"><?php 
                            echo $output;
                            ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
