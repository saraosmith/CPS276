<?php

$msg = "";
require_once 'directory.php';
if(isset($_POST['create'])){
  $success = mkdir('mydirectory');
  chmod('mydirectory', 0777);

  if($success){
    $msg = "Path were file is located";
  }
  else{
    $msg = "A directory already exists with that name";
  }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Form</title>
  </head>
  <body>
  </main>
    <div id="wrapper" class="container">
        <div class="row">
            <div class="col">
                <form action="directory.php" method="POST">
                <h1>File and Directory Assignment </h1>
                <p><?php echo $msg; ?></p>
                <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only</p>
                    <label for="fname">Folder name</label>
                    <input type="text" class="form-control">
                <div class="form-group">
                    <label for="textareaName" class="form-label">File Content </label>
                    <textarea style="height: 200px;" class="form-control"
                    id="namelist" name="namelist"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="create" value="Submit">
        </form>
    </div> 
  </body>
</html>


