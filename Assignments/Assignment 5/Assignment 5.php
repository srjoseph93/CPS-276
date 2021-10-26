<?php
    static $output = "";
    if(isset($_POST['submit'])) {
        require_once "Directories.php";
        $addDirectory = new Directories();
        $folderName = $_POST["folderName"];
        $fileContent = $_POST["fileContent"];
        $output = $addDirectory->makeDirectory($folderName, $fileContent);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content ="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Assignment 5</title>
    </head>
    <body>
        <main class="container">
            <h1>File and Directory Assignment</h1>
            <p>Enter a folder name and the contents of the file. Folder names should contain alpha numeric characters only.</p>
            <p><?php
                echo $output;
            ?></p>

        </main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="Folder Name" class="form-label">Folder Name </label>
                            <input type="text" class="form-control" name="folderName" id="Folder Name">
                        </div>
                        <div class="form-group">
                            <label for="File Content" class="form-label">File Content </label>
                            <input type="text" class="form-control" name="fileContent" id="File Content">
                        </div>
                        <div>
                           <br> <input class="btn btn-primary" type="submit" name="submit" value="Submit"> </br>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>