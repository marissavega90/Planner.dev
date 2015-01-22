<?php

class Filestore
{
	public $filename = '';
	protected $isCSV = false;
	
	function __construct($filename)
	{
		$this->filename = $filename;
		

		if (substr($filename, -3) == 'csv') {
			$this->isCSV = true;
		}

	}
		 /**
			* Returns array of lines in $this->filename
			*/
		 public function readLines()
		 {
				$contentsarray = [];

					if(filesize($this->filename) > 0) {

						 $handle = fopen($this->filename, 'r');

							$contents = trim(fread($handle, filesize($this->filename)));
							$contentsarray = explode("\n", $contents);
							fclose($handle); 
					}
				
				return $contentsarray;
		 }

		 /**
			* Writes each element in $array to a new line in $this->filename
			*/
		 public function writeLines($array)
		 {
				$handle = fopen($this->filename, 'w');
								foreach ($array as $item) {
										fwrite($handle, $item . PHP_EOL);
								}
						fclose($handle);
		 }

		 /**
			* Reads contents of csv $this->filename, returns an array
			*/
		 public function readCSV()
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
		 public function writeCSV($addressBook)
		 {

			$handle = fopen($this->filename, 'w');

				foreach ($addressBook as $value) {
						fputcsv($handle, $value);
				}

				fclose($handle);

			}

		public function read()
		{
			if ($this->isCSV) {
				return $this->readCSV();
			} else {
				return $this->readLines();
			}

		}

		public function write($array) 
		{
			if($this->isCSV) {
				$this->writeCSV($array);

			} else {
				$this->writeLines($array);
			}
		}
 }

