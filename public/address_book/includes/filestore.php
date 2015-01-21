<?php

 class Filestore

 {
		 public $filename = '';

		 function __construct($filename)
		 {
				 $this->filename = $filename;
		 }

		 /**
			* Returns array of lines in $this->filename
			*/

		 protected function readLines()
		 {
				$contentsarray = [];

					if(filesize($filename) > 0) {

						 $handle = fopen($filename, 'r');

							$contents = trim(fread($handle, filesize($filename)));
							$contentsarray = explode("\n", $contents);
							fclose($handle); 
					}
				
				return $contentsarray;
		 }

		 /**
			* Writes each element in $array to a new line in $this->filename
			*/
		 function writeLines($array)
		 {
				$handle = fopen($filename, 'w');
								foreach ($array as $item) {
										fwrite($handle, $item . PHP_EOL);
								}
						fclose($handle);
		 }

		 /**
			* Reads contents of csv $this->filename, returns an array
			*/
		 function readCSV()
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
		 }

		 /**
			* Writes contents of $array to csv $this->filename
			*/
		 function writeCSV($addressBook)
		 {

			$handle = fopen($this->filename, 'w');

				foreach ($addressBook as $value) {
						fputcsv($handle, $value);
				}

				fclose($handle);

			}
 }

