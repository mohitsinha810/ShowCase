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
		<h1>Be a buyer on our website in minutes!</h1>
		<h2>Join our site and buy awesome artworks online with ease and comfort. Also, avail a 10% discount on all your purchases!</h2>
		<p>Our website ShowCase is an amazing platform for anyone to buy amazing artworks. Choose from many different masterpieces and many categories.</p>
		<p>We only want list artworks that are 100% original,authentic and hand-made. To know more about this, read our <a href="termsconditions.php">terms and conditions.</a></p>
		<h2>Just follow these a few easy steps and become a seller on our website!</h2>
		<ol class="ol-item">
			<li class="step-item">Create your buyer account on ShowCase.</li>
			<li class="step-item">Browse all the artworks present on our site.Add your desired artwork to the cart.</li>
			<li class="step-item">Proceed to checkout and confirm the payment and delivery details.</li>
			<li class="step-item">Get the artwork delivered to your doorstep!</li>
		</ol>
		<hr>
		<div class="text-center">
			<a href="buyer_signup_form.php"><button class="btn btn-outline-info btn-lg">Continue on to register <i class="fa fa-angle-double-right"></i></button></a>
		</div>
	</div>

	<?php include "elements/footer.php" ?>
</body>

