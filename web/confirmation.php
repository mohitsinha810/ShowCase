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
	 	<div class="alert alert-info">
	 		<h1 class="text-center">Message sent.</h1>
	 	</div>
	 	<h2 class="text-center">We have successfully received your message and also sent you a confirmation e-mail on your given e-mail address. We will reply to your query as soon as possible.</h2>
	 	<p class="text-center" style="font-size:150%;">Meanwhile, feel free to follow-up on <b>showcasecommerce@gmail.com.</b></p><br>
	 	<div class="text-center">
	 		<button class="btn btn-lg btn-primary" onclick="window.location.href='index.php';">Back to Home</button>
	 	</div>
	 </div>


	 <?php include "elements/footer.php" ?>
</body>
	