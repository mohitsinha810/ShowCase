<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Buy and sell artworks online</title>
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
	 	<div class="alert alert-danger">
			<h1 class="text-center">Oops! Something went wrong.</h1>
		</div>
		<h2 class="text-center">Seems like your payment could not be completed due to a problem. We will try to fix it as soon as possible. Please try again. </h2>
		<br><br>
		<div class="row text-center">
			<div class="col-sm-6"><button class="btn btn-lg btn-primary" onclick="window.location.href='checkout.php';">Back to Checkout</button></div>
			<div class="col-sm-6"><button class="btn btn-lg btn-primary" onclick="window.location.href='cart.php';">Cancel and go back to Cart</button></div>
		</div>
	</div>


	<?php include "elements/footer.php" ?>
</body>
	