<!DOCTYPE html>
<html>
<head>
	<title>Be a seller!</title>
	<!-- Latest compiled and minified CSS -->
	 <link rel="shortcut icon" href="images/canvas.ico">      
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php 	if(isset($_SESSION['seller_name'])){include "elements/headerseller.php";}
			else if(isset($_SESSION['buyer_name'])){include "elements/headerbuyer.php";}
			else {include "elements/header.php";}
	 ?>
	<div class="container">
		<h1>Terms and conditions.</h1>
		<h2>Hate terms and conditions? We do too! But these are an important part of any business and thus we have tried to make an exhaustive list of them. Have a fun read!</h2>
		<hr>
		<h2 style="font-weight: bold;">For Buyers:</h2>
		<ol class="ol-item">
			<li class="inner-item">All payments must be made during the time of purchase in case of online payments.If cash-on-delivery service is availed,the delivery charges must still be paid online during the purchase, otherwise the item will not be dispatched.</li>
			<li class="inner-item">All items are to be bought at the quoted price or the discounted price as shown on the showcase.no extra discount will be given in any case.</li>
			<li class="inner-item">We have a 7-days no questions asked return policy.The amount shall be deposited in the buyers account within 48 hours of returning the item.Delivery charges will be deducted as per your location.</li>
			<li class="inner-item">To avail the return policy,the item must be undamaged,properly packaged and clean.if the conditions are not satisfied, we may refuse to take the item back.</li>
		</ol>

		<hr>
		<h2 style="font-weight: bold;">For Sellers:</h2>
		<ol class="ol-item">
			<li class="inner-item">All selers must first create and verify there accounts as per the uidelines before they can put up there work for sale on ShowCase.</li>
			<li class="inner-item">All sellers must verify there bank detais as per the form. In case of this condition being not fulfilled will lead to the seller beingunable to sell there work here.</li>
			<li class="inner-item">All artworks must be original,authentic and certified before putting up for sale. Uncertified,damaged or dirty artworks will not be accepted.</li>
			<li class="inner-item">The artwork must match the photo of the same as per uploaded by the seller. For this,we recommend clicking the photograph with a good quality camera.In case of any disperancy, Showcase reserves the right to disallow or reject the artwork.</li>
			<li class="inner-item">ShowCase will take 15% commission on the sale of your artwork. Please consider your price accordingly.</li>
			<li class="inner-item">The tax rate of your country will also be applicable on any sale of your artwork.</li>
		</ol>
		<div class="text-center">
			<button type="button" class="btn custom-btn btn-lg"  onclick="history.go(-1);"><i class="fa fa-angle-double-left"></i> Back</button>
		</div>
	</div>
	<?php include "elements/footer.php" ?>
</body>