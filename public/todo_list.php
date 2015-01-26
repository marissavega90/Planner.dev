<?php

class UnexpectedTypeException extends Exception { }

require_once '../inc/filestore.php';

$ToDoDataStore = new Filestore('data/todo.txt');

$toDoList = $ToDoDataStore->read();

$listItems = [];



define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'parks_user');

require_once ('../db_connect.php');




// Verify there were uploaded files and no errors
if (count($_FILES) > 0 && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
    // Set the destination directory for uploads
    $uploadDir = '/vagrant/sites/planner.dev/public/uploads/';

    // Grab the filename from the uploaded file by using basename
    $filename = basename($_FILES['file1']['name']);

    // Create the saved filename using the file's original name and our upload directory
    $savedFilename = $uploadDir . $filename;

    // Move the file from the temp location to our uploads directory
    move_uploaded_file($_FILES['file1']['tmp_name'], $savedFilename);



    $toDoList = array_merge($toDoList, $ToDoDataStore->read("uploads/" . $filename));

    $ToDoDataStore->write($toDoList);
}






    // if (isset($_POST['todo']) {
    //     strlenthrow new Exception ('Input is more than 240 characters!');
    // }


    $listItems = $ToDoDataStore->read('data/todo.txt');

    try {

        if (isset($_POST['todo'])) {

            if(strlen($_POST['todo']) > 240 || empty($_POST['todo'])) {
                throw new UnexpectedTypeException ('Must input item less than 240 characters!');
            }

                $listItems[] = $_POST['todo'];

                $ToDoDataStore->write($listItems);
            
        }
    }

    catch (UnexpectedTypeException $e) {

        echo $e->getMessage();

    }


    

    if (isset($_GET['remove'])) {
        
        $id = $_GET['remove'];
        unset($listItems[$id]);
        $listItems = array_values($listItems);
        $ToDoDataStore->write($listItems);
    }

    var_dump($listItems);

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>To-Do List</title>

            <!-- Font-Awesome -->
            <!-- <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">

            <!-- Bootstrap -->
            <!-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.cyborg.min.css"> -->

            <!-- <link rel="stylesheet" href="/css/todo_list_style.css"> -->

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        
</head>
<body>
    
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><i class="fa fa-pencil-square-o fa-1x"></i></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/todo_list.php">To-Do List <span class="sr-only">(current)</span></a></li>
                <li><a href="#add">Add New Item <i class="fa fa-plus-square fa-1x"></i></a></li>
                <li><a href="#">Remove Item <i class="fa fa-minus-square"></i></a></li>
                <li><a href="#">Save List <i class="fa fa-floppy-o"></i></a></li>
                <li><a href="#">Open List <i class="fa fa-list"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-minus-circle"></i> Remove All</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4 class="lead">What Do You Want To Do?</h4>
                    <ul id="white">
                        <? foreach($listItems as $key => $value): ?>
                            <li><?= $value; ?> | <a href="/todo_list.php?remove=<?= $key ?>">X</a></li>
                        <? endforeach; ?>
                    </ul>
                    <br>
                    <br>
                    <form name="additem" method="POST" enctype="multipart/form-data" action="/todo_list.php">
                        
                        <input id="todo" name="todo" type="text" placeholder="Add your task">
                        
                    
                        <button type="submit" id="addNew">Add Item</button>
                    </form>
                        <h4>Upload File</h4>

            <?
            // Check if we saved a file
            if (isset($savedFilename)): ?>
                <?= "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>"; ?>
            
            <? endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <p>
                    <label for="file1">File to upload: </label>
                    <input type="file" id="file1" name="file1">
                </p>
                <p>
                    <input type="submit" value="Upload">
                </p>
            </form>
            </div>
        </div>
    </div>
    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
</body>
</html>