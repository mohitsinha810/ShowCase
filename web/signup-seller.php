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
		<h1>Be a seller on our website in minutes!</h1>
		<h2>Join our site and sell your artwork online with ease and comfort.</h2>
		<p>Our website ShowCase is an amazing platform for selling,reselling or hosting your artworks. It is easy,free and comfortable to be a seller on our website.All your artworks will be properly shown, displayed and marketed on our website.</p>
		<p>We only want that all the artworks are original, 100% hand-made and authenticated with certificates.Only then can you list these on our site.For details, read our <a href="termsconditions.php">terms and conditions.</a></p>
		<h2>Just follow these a few easy steps and become a seller on our website!</h2>
		<ol class="ol-item">
			<li class="step-item">Create your seller account on ShowCase.</li>
			<li class="step-item">Upload your artworks.</li>
			<li class="step-item">Courier it to us if it is bought online by one of our many buyers.</li>
			<li class="step-item">Get paid on the account you have given us! It's cashless, fast and secure!</li>
		</ol>
		<hr>
		<div class="text-center">
			<a href="sellersignupform1.php"><button class="btn btn-outline-info btn-lg">Continue on to register <i class="fa fa-angle-double-right"></i></button></a>
		</div>
	</div>

	<?php include "elements/footer.php" ?>
</body>

