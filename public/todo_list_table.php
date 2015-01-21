<?php


    $listItems = ['Walk Wesley', 'Finish Seven Samurai', 'Watch 13 Assassins', 'Bake some cookies'];
    
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

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        <style type="text/css">
        body {
            background-image: url(/img/background.jpg);
            background-size: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 70px;
        }
        .navbar {
            background-color: rgba(128, 128, 128, 0.0); /* Red [0-255], Green [0-255], Blue [0-255], Alpha [0-1] */
            border-color: rgba(128, 128, 128, 0.0);
        }
        .container {
            border: 2px solid;
            border-color: white;
            height: 54px;
            width: 370px;
            padding: 1px;
            margin: 40px;
            margin-left: 245px;
            text-align: center;
        }
        .container2 {
           /* border: 2px solid;
            border-color: white; */
            height: 54px;
            width: 370px;
            padding: 1px;
            margin: 40px;
            margin-left: 245px;
            text-align: justify;
            color: #FFFFFF;
            text-indent: 35px;
        }
        table, td, th, tr {
            background-color: rgba(128, 128, 128, 0.0);
            height: 38px;
            width: 370px;
            padding: 1px;
            margin: 40px;
            margin-left: 250px;
            text-align: justify;
            color: #FFFFFF;
        }
        .table {
            height: 135px;
            width: 360px;
            background-color: rgba(128, 128, 128, 0.3);
        }
        .table-bordered {
            border: 2px solid #FFFFFF;
        }
        </style>
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
                <li class="active"><a href="#">To-Do List <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Add New Item <i class="fa fa-plus-square fa-1x"></i></a></li>
                <li><a href="#">Remove Item <i class="fa fa-minus-square"></i></a></li>
                <li><a href="#">Save List <i class="fa fa-floppy-o"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-minus-circle"></i> Remove All</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <h4 class="lead">What Do You Want To Do?</h4>
    </div>
        <table class="table table-bordered table-hover">
            <tr>
                <th><i class="fa fa-pencil-square-o fa-1x"></i> To-Do List</th>
            </tr>
            <tr>
                <td>1. Walk Wesley <i class="fa fa-square"></i></td>
            </tr>
            <tr>
                <td>2. Eat all the food <i class="fa fa-square"></i></td>
            </tr>
            <tr>
                <td>3. Watch Babadook. Much scary. <i class="fa fa-check-square"></i></td>
            </tr>
        </table>
    <div>
        
    </div>
    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
</body>
</html>