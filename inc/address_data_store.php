<?php

require_once('/vagrant/sites/planner.dev/inc/filestore.php');

class AddressDataStore extends Filestore

{
     public $filename = '';

     public function __construct($input = 'address_book.csv')
     {
     	// $this->filename = $input;
        parent::__construct($input);
     }


     

     public function readAddressBook()
     {
       return $this->read(); 


		
	} 

    function writeAddressBook($addressBook)
    {

    	$this->write($addressBook);

	}

}




?>