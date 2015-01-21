<?php

require_once('/vagrant/sites/planner.dev/public/address_book/includes/filestore.php');

class AddressDataStore extends Filestore

{
     public $filename = '';

     public function __construct($input = 'address_book.csv')
     {

     	$this->filename = $input;
     }


     

     public function readAddressBook()
     {
       return $this->readCSV(); 


		
	} 

    function writeAddressBook($addressBook)
    {

    	$this->writeCSV($addressBook);

	}

}




?>