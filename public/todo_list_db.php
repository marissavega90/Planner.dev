<?php

class UnexpectedTypeException extends Exception { }

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'planner');

define('DB_USER', 'codeup');

define('DB_PASS', 'codeup');

require_once ('../db_connect.php');

require_once ('../inc/todolist_data_store.php');

// until upload
// $ToDoDataStore = new ToDoListDataStore();

// $toDoList = $ToDoDataStore->read();

if (!empty($_POST)) {
	if ( 
		empty($_POST['to_do']) || 
		empty($_POST['date']) ||
		empty($_POST['priority'])
	) {
    	echo 'Must fill out form completely!';
	} else {

		$query = "INSERT INTO to_do_list (to_do, date, priority)
			VALUES (:to_do, :date, :priority)";
			
		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':to_do', $_POST['to_do'], PDO::PARAM_STR);
	    $stmt->bindValue(':date',  $_POST['date'],  PDO::PARAM_STR);
		$stmt->bindValue(':priority', $_POST['priority'], PDO::PARAM_INT);
		$stmt->execute();
	}
}

if (isset($_GET['remove'])) {
	$id = $_GET['remove'];
	$query = "DELETE FROM to_do_list
			WHERE id = :id";
	$stmt = $dbc->prepare($query);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);

	$stmt->execute();
}

if (isset($_GET['check'])) {
	// $complete = 1;
	$id = $_GET['check'];
	$query = "UPDATE to_do_list SET complete = 1
			WHERE id = :id";
	$stmt = $dbc->prepare($query);
	$stmt->bindValue(':id', $id);

	$stmt->execute();
}


$nextprev = $dbc->query("SELECT COUNT(*) FROM to_do_list")->fetchColumn();

if(!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
};

$offset = ($page-1) * 10;

$query = $dbc->prepare("SELECT id, to_do, date, priority, complete, date_created
				FROM to_do_list ORDER BY priority LIMIT 10 OFFSET :offset");
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->execute();

$list_items = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
   

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>

    <!-- Bootstrap -->
    <link href="css/to_do_bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style type="text/css">

    .input-long {
    	width: 500px;
    }

    body {
    	background-image: url(img/tree_bark.png);
    }

    .table {
    	background-color: white;
    }

    </style>

    </head>
<body>


<div class="container">
	<h1 class="text-center">To-Do List</h1>
	<table class="table table-bordered">
		<tr>

			<th>To-Do:</th>
			<th>Date To-Do</th>
			<th>Priority</th>
			<th>Completed</th>
			<th>Date Created</th>
			<th>Delete Item</th>
			
		</tr>

		<? foreach ($list_items as $key => $entry): ?>

			<tr>
				<td><?= $entry['to_do']; ?></td>
				<td><?= date('l jS \of F Y', strtotime($entry['date'])); ?></td>
				<td><?= $entry['priority']; ?></td>
				<? if($entry['complete'] == 0): ?>

				<td><a href="todo_list_db.php?check=<?= $entry['id'] ?>" class="fa fa-square-o fa-2x"></a></td>
				
				<?php else: ?>

				<td><a href="todo_list_db.php?check=<?= $entry['id'] ?>" class="fa fa-check-square-o fa-2x"></a></td>

				<? endif ?>

				<td><?= date('l jS \of F Y', strtotime($entry['date_created'])); ?></td>

				<td><a href="todo_list_db.php?remove=<?= $entry['id'] ?>" class="btn btn-danger">Delete</a></td>
			</tr>

		<? endforeach; ?>


	</table>

	

		<form name="additem" id="" method="POST" action="todo_list_db.php">

		
		 
			<input class="input-lg" type="text" id="to_do" name="to_do" placeholder="Add new item">

			<input class="input-lg" type="text" id="date" name="date" placeholder="Date To-Do (YYYY-MM-DD)">

			<input class="input-long input-lg" type="text" id="priority" name="priority" placeholder="Priority (1 = Highest priority   5 = Lowest priority)">

			<button class="btn btn-default" type="submit" name="submit">Submit</button>

			

		</form>

	

</div>
<div class="container">
	<nav>
	  	<ul class="pager">

			<? if ($page > 1 ): ?>
				
			    <li class="previous"><a href="?page=<?= $page-1 ?>"><span aria-hidden="true">&larr;</span> Previous</a></li>

			<? endif; ?>

			<? if ($page <= $nextprev/10):?> 

		    	<li class="next"><a href="?page=<?= $page+1 ?>">Next <span aria-hidden="true">&rarr;</span></a></li>

			<? endif; ?>

	  	</ul>
	</nav>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>


