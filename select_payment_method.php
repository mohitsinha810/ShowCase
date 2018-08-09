<?php session_start(); ?>
<?php 
	if(isset($_GET['order_id']))
	{
		$_SESSION['order_id']=$_GET['order_id']-8887;
	}

?>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Buttons/2.0.0/css/buttons.min.css" />
</head>
<body>
	<?php 	if(isset($_SESSION['seller_name'])){include "elements/headerseller.php";}
			else if(isset($_SESSION['buyer_name'])){include "elements/headerbuyer.php";}
			else {include "elements/header.php";}
	 ?>

	 <div class="container">
	 	<h1 class="text-center">Select a payment method</h1>
	 	<h2 class="text-center">Select a payment method that suits you. We support both COD and cards!</h2>
	 	<br><br>
	 	<div class="jumbotron" style="padding:4rem;padding-left:4rem;padding-right:4rem;">
	 		<div class="row">
	 			<div class="col-sm-6 text-center">
	 				<button class="button button-jumbo button-primary button-rounded" 
	 				onclick="window.location.href='cash_on_delivery.php';">Cash on Delivery <i class="fa fa-truck"></i></button><br><br>
	 				<p style="color:black;font-size:1.5rem;">Pay when the product arrives at your house and not a minute before!</p>
	 			</div>
	 			<div class="col-sm-6 text-center">
	 				<button onclick="window.location.href='controllers/payment.php'" class="button button-jumbo button-rounded" style="background-color: #1AAF5D;color:white;">PayU <i class="fa fa-credit-card"></i></button><br><br>
	 				<p style="color:black;font-size:1.5rem;">Or pay with your credit or debit card using PayU money's awesome payment gateway!</p>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="text-center">
	 		<button class="btn btn-primary btn-lg" onclick="window.history.back();"><i class="fa fa-angle-double-left"></i> Back</button>
	 	</div>
	 </div>

	 <?php include "elements/footer.php" ?>
</body>