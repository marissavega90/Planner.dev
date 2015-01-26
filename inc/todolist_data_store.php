<?php

require_once('filestore.php');

class ToDoListDataStore extends Filestore

{
     public $filename = '';

     public function __construct($dbc)
     {
     	// $this->filename = $input;
        parent::__construct($dbc);
     }


     

     public function readToDoList()
     {
       return $this->read(); 


		
	} 

    function writeToDoList($toDoList)
    {

    	$this->write($toDoList);

	}

}




?>