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

	 <?php
	 	require "function.php";
	 	$get=new DB_connect();


	 ?>

	 <div class="container text-center">
		<h1>Our Artists</h1>
		<h2>Showcase has lots of talented artists who show their artworks here. Feel free to take a look!</h2> 
		<hr>


	</div>



	<?php include "elements/footer.php" ?>
</body>