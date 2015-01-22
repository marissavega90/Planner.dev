<?php

class AddressDataStore
 {
     public $this->filename = 'address_book.csv';

     function readAddressBook($filename)
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

$readAddressBook = readAddressBook($filename);
     }

     function writeAddressBook($addressesArray)
     {
         // Code to write $addressesArray to file $this->filename
     	$addressesArray
     	$handle = fopen($this->filename, 'w');

		foreach ($array as $value) {
		    fputcsv($handle, $value);
		}

	fclose($handle);

}
     }

 }

?>