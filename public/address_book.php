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


?>

<html>
<head>
    <title>Address Book</title>
</head>
<body>

	<table>
		<tr>
			<th>Header</th>
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