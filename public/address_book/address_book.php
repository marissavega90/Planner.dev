<?php

require_once 'includes/address_data_store.php';

$AddressDataStore = new AddressDataStore('data/address_book.csv');

$addressBook = $AddressDataStore->read();




if (!empty($_POST)) {

	if(strlen($_POST['address']) > 125) 
	{
	    throw new Exception ('Must input item less than 125 characters!');
	}
	if(strlen($_POST['city']) > 125) {
		throw new Exception ('Must input item less than 125 characters!');
	}
	if(strlen($_POST['state']) > 125) {
		throw new Exception ('Must input item less than 125 characters!');
	}
	if (strlen($_POST['zip']) > 125) {
		throw new Exception ('Must input item less than 125 characters!');

	} else {

	$addressBook[] = $_POST;
	$AddressDataStore->write($addressBook);

	}
}


if (isset($_GET['remove'])) {
	$id = $_GET['remove'];
	unset($addressBook[$id]);
	$AddressDataStore->write($addressBook);
}

if (count($_FILES) > 0 && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
	    // Set the destination directory for uploads
	    $uploadDir = '/vagrant/sites/planner.dev/public/uploads/';
	    // Grab the filename from the uploaded file by using basename
	    $filename = basename($_FILES['file1']['name']);
	    // Create the saved filename using the file's original name and our upload directory
	    $savedFilename = $uploadDir . $filename;

	    $uploadedAddressData = new AddressDataStore($savedFilename);

	    if(substr($filename, -3) == 'csv') {

		    // Move the file from the temp location to our uploads directory
		    move_uploaded_file($_FILES['file1']['tmp_name'], $savedFilename);

		    $addressBook = array_merge($addressBook, $uploadedAddressData->read());

		    $AddressDataStore->write($addressBook);

			} else {
				echo "There was an error processing your file, please use CSV file.";
			}
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

		<? foreach ($addressBook as $key => $entry): ?>
		

			<tr>
				<? foreach ($entry as $value): ?>
					<td><?= $value; ?></td>
				<? endforeach; ?>
					<td><a href="/address_book/address_book.php?remove=<?= $key ?>">X</a></td>
			
			</tr>

		<? endforeach; ?>

	</table>

	<form name="additem" id="" method="POST" action="address_book.php">
			 

		<input type="text" id="address" name="address" placeholder="Address">

		<input type="text" id="city" name="city" placeholder="City">
	
		<input type="text" id="state" name="state" placeholder="State">

		<input type="text" id="zip" name="Zip" placeholder="Zip">

		<button value="submit" id="addNew">Submit</button>
	
			 
	</form>

	<h1>Upload File</h1>

	<? if (isset($savedFilename)): ?>

		<p>You can download your file <a href="/address_book/uploads/<?= $filename ?>">here</a>.</p>

	<? endif; ?>


    <form method="POST" enctype="multipart/form-data" action="/address_book/address_book.php">
        <p>
            <label for="file1">File to upload: </label>
            <input type="file" id="file1" name="file1">
        </p>
        <p>
            <input type="submit" value="Upload">
        </p>
    </form>
				

</body>
</html>