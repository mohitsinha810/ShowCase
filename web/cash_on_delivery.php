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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 	if(isset($_SESSION['seller_name'])){include "elements/headerseller.php"; $tablename='seller_orders';}
			else if(isset($_SESSION['buyer_name'])){include "elements/headerbuyer.php"; $tablename='buyer_orders';}
			else {include "elements/header.php";}
			require_once "function.php";
			$set=new DB_connect();
			$data=array();
			$data['payment']=1;
			$set->update_column($data,$tablename,'id',$_SESSION['order_id']);
	 ?>

	 <div class="container">
	 	<div class="alert alert-info text-center">
	 		<h1> Keep the Cash ready! <i class="fas fa-truck" style="font-size:150%;"></i>&nbsp;</h1>
	 	</div>
	 	<br>
	 	<h2 class="text-center">You have opted for the cash-on-delivery option. The product will be dispatched as soon as possible. </h2><br>
	 	<div class="text-center">
	 		<button type="button" class="btn btn-lg btn-primary" onclick="window.location.href='index.php';">Back to Home</button>
	 	</div>
	 </div>


	<?php include "elements/footer.php" ?>
</body>
	