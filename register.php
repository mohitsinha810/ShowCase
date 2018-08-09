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
		<h1>Why showcase?</h1>
		<h2>You are probably wondering why would you want to make an account with us! Here we try to make it clear.</h2>
		<p>We are en e-commerce website specializing in art.You can find a huge number of artworks on our site for sale like oil paintings,drawings,water color paintings,sketches and many more.Also,by registering,you can avail a 10% discount on all your purchases!Also,by registering as as seller,you can show your work to a huge number of art lovers and make some money from your art.We only take a small percentage of it as commission.You can easily avail to our delivery facility as well.</p>
		<p>ShowCase is a buyer/seller website which specializes in artworks. Your private info and artworks are safe with us and we will not misuse them in any way.Also, we provide a <a href="termsconditions.php">terms and coditions</a> policy which every user has to follow.</p>
		<p>Just follow the below links to register!</p>
		<h1>How do you want to register?</h1><hr>
		<div class="row">
			<div class="col">
				<a href="signup_buyer.php"><button class="btn custom-btn btn-lg">Register as a buyer</button></a>
			</div>
			<div class="col">
				<a href="signup-seller.php"><button class="btn custom-btn btn-lg">Register as a seller</button></a>
			</div>
		</div>
	</div>

	<?php include "elements/footer.php" ?>
</body>