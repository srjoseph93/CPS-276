<?php
    static $output = array();
    if(isset($_POST['submit'])) {
        require_once "NameFuncs.php";
        $addName = new NameFuncs($_POST["names"]);
        $namelist = $_POST["namelist"];
        if(!empty($namelist))
            $output = $addName->setName($namelist);
    }
    else if(isset($_POST['clear'])) {
        $output = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content ="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Assignment 4</title>
    </head>
    <body>
        <main class="container">
            <h1>Add Names</h1>
        </main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Name">
                        <input class="btn btn-primary" type="submit" name="clear" value="Clear Names">
                        <div class="form-group">
                            <label for="Enter Name" class="form-label">Enter Names: </label>
                            <input type="text" class="form-control" name="namelist" id="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="form-label">List of Names: </label>
                            <textarea class="form-control" name="names" id="textArea" rows="15"><?php
                                $i=0;
                                while($i < count($output)){
                                    echo $output[$i++]."\n";
                                }
                            ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>