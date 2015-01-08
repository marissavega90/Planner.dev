<?php

class AddressDataStore
{
     public $filename = '';

     function __construct($input = 'address_book.csv') {

     	$this->filename = $input;
     }

     function readAddressBook()
     {
        // Code to read file $this->filename
		$handle = fopen($this->filename, 'r');

		$addressBook = [];

			while(!feof($handle)) {
				
				$row = fgetcsv($handle);
				
				if (!empty($row)) {

					$addressBook[] = $row;
				}
			}

		return $addressBook;

	fclose($handle);
		
	}

    function writeAddressBook($addressBook)
    {
        // Code to write $addressesArray to file $this->filename

		$handle = fopen($this->filename, 'w');

			foreach ($addressBook as $value) {
			    fputcsv($handle, $value);
			}

		fclose($handle);

	}

}

?>