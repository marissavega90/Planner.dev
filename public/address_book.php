<?php

$addressBook = [];

$filename = 'address_book.csv';

function saveFile ($filename) {

	$handle = fopen('address_book.csv', 'w');

		foreach ($filename as $row) {
		    fputcsv($handle, $row);
		}

	fclose($handle);

}

function read_Address_Book($fileName) {

		$handle = fopen($fileName, 'r');

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

$addressBook = read_Address_Book($fileName);


if (!empty($_POST)) {
		
		$addressBook[] = $_POST;
		saveFile($fileName, $addressBook);
	} else {
		echo "Error! Must fill out all forms!";
}

?>

<html>
<head>
    <title>Address Book</title>
</head>
<body>

	<table>
		<tr>

			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			
		</tr>
				
		<?foreach ($addressBook as $entry): ?>
			<tr>
				<?php foreach ($entry as $value): ?>
					<td><?= $value ?></td>
				<?php endforeach ?>
			
			</tr>
		<? endforeach; ?>

	</table>

	<form name="additem" id="" method="POST" action="/address_book.php">
			 

		<input type="text" id="address" name="address" placeholder="Address">

		<input type="text" id="city" name="city" placeholder="City">
	
		<input type="text" id="state" name="state" placeholder="State">

		<input type="text" id="zip" name="Zip">

		<button value="submit">Submit</button>
	
			 
	</form>
				

</body>
</html>