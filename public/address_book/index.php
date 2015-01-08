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

<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>Address Book</title> 
	<meta name="description" content="BlackTie.co - Free Handsome Bootstrap Themes" />	    
	<meta name="keywords" content="themes, bootstrap, free, templates, bootstrap 3, freebie,">
	<meta property="og:title" content="">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	
	<link rel="prefetch" href="images/zoom.png">

	<style type="text/css">

	.table {

		background-color: rgba(128, 128, 128, 0.7);

	}

	</style>
		
</head>

<body>
	<div class="navbar navbar-fixed-top" data-activeslide="1">
		<div class="container">
		
			<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			
			<div class="nav-collapse collapse navbar-responsive-collapse">
				<ul class="nav row">
					<li data-slide="1" class="col-12 col-sm-2"><a id="menu-link-1" href="#slide-1" title="Next Section"><span class="icon icon-home"></span> <span class="text">HOME</span></a></li>
				</ul>
				<div class="row">
					<div class="col-sm-2 active-menu"></div>
				</div>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

	
	<!-- === MAIN Background === -->
	<div class="slide story" id="slide-1" data-slide="1">
		<div class="container">
			<div id="home-row-1" class="row clearfix">
				<div class="col-12">
					<h1 class="font-semibold">ADDRESS BOOK <span class="font-thin">PROJECT</span></h1>

						<table class="table table-bordered">
							<tr>

								<th>Address</th>
								<th>City</th>
								<th>State</th>
								<th>Zip</th>
								<th></th>
								
							</tr>
									
							<?php foreach ($addressBook as $key => $entry): ?>
								<tr>
									<?php foreach ($entry as $value): ?>
										<td><?= $value ?></td>
									<?php endforeach ?>
										<td><a href="/address_book/index.php?remove=<?= $key ?>"><span class="text">X</span></a></td>
								
								</tr>
							<? endforeach; ?>

						</table>

						<form name="additem" method="POST" action="index.php">
			 

							<input type="text" id="address" name="address" placeholder="Address">

							<input type="text" id="city" name="city" placeholder="City">
	
							<input type="text" id="state" name="state" placeholder="State">

							<input type="text" id="zip" name="Zip" placeholder="Zip">

							<button value="submit">Submit</button>
	
			 
						</form>
					<br>
					<br>
				</div><!-- /col-12 -->
			</div><!-- /row -->
			<div class="container">
				<div id="home-row-1" class="row clearfix">
					<div class="col-6 col-sm-6">
						
					</div>
				</div>
			</div>
			<div id="home-row-2" class="row clearfix">
				<div class="col-12 col-sm-4">
				<div class="col-12 col-sm-4">
				<div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="5"><img src="images/s03.png"></div><span></span></div>
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /slide1 -->
	

</body>

	<!-- SCRIPTS -->
	<script src="js/html5shiv.js"></script>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox.pack-v=2.1.5.js"></script>
	<script src="js/script.js"></script>
	
	<!-- fancybox init -->
	<script>
	$(document).ready(function(e) {
		var lis = $('.nav > li');
		menu_focus( lis[0], 1 );
		
		$(".fancybox").fancybox({
			padding: 10,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
	
	});
	</script>

</html>