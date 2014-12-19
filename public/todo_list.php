<?php

    $listItems = [];


    function openFile($filename) {
        $contentsarray = [];
        if(filesize($filename) > 0) {
           $handle = fopen($filename, 'r');
            $contents = trim(fread($handle, filesize($filename)));
            $contentsarray = explode("\n", $contents);
            fclose($handle); 
        }
        
        return $contentsarray;
    }

    function save_file($filename,$array) {
            $handle = fopen($filename, 'w');
                foreach ($array as $item) {
                    fwrite($handle, $item . PHP_EOL);
                }
            fclose($handle);

            // echo "The save was successful." . PHP_EOL;
        }

    $listItems = openFile('data/todo.txt');

    if (isset($_POST['todo'])) {

        $listItems[] = $_POST['todo'];

        save_file('data/todo.txt', $listItems);
    }
    

    if (isset($_GET['remove'])) {
        
        $id = $_GET['remove'];
        unset($listItems[$id]);
        $listItems = array_values($listItems);
        save_file('data/todo.txt', $listItems);
    }

    

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>To-Do List</title>

            <!-- Font-Awesome -->
            <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">

            <!-- Bootstrap -->
            <link rel="stylesheet" href="/bootstrap/css/bootstrap.cyborg.min.css">

            <link rel="stylesheet" href="/css/todo_list_style.css">

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
        <h4 class="lead">What Do You Want To Do?</h4>
            <ul id="white">
                <?php
                    foreach ($listItems as $key => $item) {
                        echo "<li>{$item} <a href=\"/todo_list.php?remove={$key}\"><i class=\"fa fa-minus-square-o\"></i></li></a>";
                        echo "<form method=\"GET\" action=\"?remove={$key}\"></form>";
                    }; 
                ?>  
            </ul>
            <br>
            <br>
            <form method="POST" action="todo_list.php">
                <h6 id="add">Add New Item <i class="fa fa-plus-square fa-1x"></i></h6>
                <p>
                    <label for="todo">To</label>
                    <input id="todo" name="todo" type="text" placeholder="Add your task">
                </p>
            <br>
                <button type="submit">Add File</button>
            </form>
    </div>
    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
</body>
</html>