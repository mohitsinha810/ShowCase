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
	<?php 	if(isset($_SESSION['seller_name'])){include "elements/headerseller.php"; $tablename='seller_orders';}
			else if(isset($_SESSION['buyer_name'])){include "elements/headerbuyer.php"; $tablename='buyer_orders';}
			else {include "elements/header.php";}
			require_once "function.php";
			$set=new DB_connect();
			$data=array();
			$data['payment']=2;
			$set->update_column($data,$tablename,'id',$_SESSION['order_id']);
	 ?>

	 <div class="container">
	 	<div class="alert alert-success">
	 		<h1 class="text-center">Payment Successful!</h1>
	 	</div><br>
	 	<h2 class="text-center">We have recieved the payment successfully. Your order has now been placed and will be dispatched as soon as possible. </h2><br>
	 	<h2 class="text-center text-info">Thank you for purchasing from ShowCase.</h2>
	 </div>

	 

	 <?php include "elements/footer.php" ?>
</body>
	