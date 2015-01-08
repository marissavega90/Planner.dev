<?php

require_once 'includes/address_data_store.php';

$AddressDataStore = new AddressDataStore;

$AddressDataStore->filename = 'data/address_book.csv';

$addressBook = $AddressDataStore->readAddressBook();

if (!empty($_POST)) {
	$addressBook[] = $_POST;
	$AddressDataStore->writeAddressBook($addressBook);
}

if (isset($_GET['remove'])) {
	$id = $_GET['remove'];
	unset($addressBook[$id]);
	$AddressDataStore->writeAddressBook($addressBook);
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
				
		<?foreach ($addressBook as $key => $entry): ?>
			<tr>
				<?php foreach ($entry as $value): ?>
					<td><?= $value ?></td>
				<?php endforeach ?>
					<td><a href="/address_book/address_book.php?remove=<?= $key ?>">X</a></td>
			
			</tr>
		<? endforeach; ?>

	</table>

	<form name="additem" id="" method="POST" action="address_book.php">
			 

		<input type="text" id="address" name="address" placeholder="Address">

		<input type="text" id="city" name="city" placeholder="City">
	
		<input type="text" id="state" name="state" placeholder="State">

		<input type="text" id="zip" name="Zip" placeholder="Zip">

		<button value="submit">Submit</button>
	
			 
	</form>
				

</body>
</html>