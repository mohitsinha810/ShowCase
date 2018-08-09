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
	<style>
		th{color:white;background-color:  #007BFF;}
	</style>
</head>
<body>
	<?php 	if(isset($_SESSION['seller_name'])){include "elements/headerseller.php";}
			else if(isset($_SESSION['buyer_name'])){include "elements/headerbuyer.php";}
			else {include "elements/header.php";}
	 ?>


	<div class="container">
	 	<h1 class="text-center">My Orders</h1>
	 	<h2 class="text-center">Check all of your placed orders.</h2>
	 </div>
	 <hr>
	 <div class="container">
	 	<table class="table table-bordered table-striped table-responsive-md">
	 		<tr>
	 			<th>S.No.</th>
	 			<th>Products name</th>
	 			<th>Quantity</th>
	 			<th>Total price</th>
	 			<th>Payment</th>
	 		</tr>
	 	
	 </div>

	 <?php
	 		$count=1;
	 		require_once "function.php";
	 		$get=new DB_connect();
	 		$result_orders=$get->select_by_colname_reloaded('buyer_orders',array('id','items','quantity','price','buyerid','payment'),'buyerid',$_SESSION['buyer_id']);
	 		//Loop for all orders.
	 		while($row_orders=mysqli_fetch_array($result_orders))
	 		{
	 			echo '<tr>';
	 			echo '<td><b>'.$count.'.</b></td>';
	 			$products=explode(',',$row_orders['items']);
	 			$quantity=explode(',',$row_orders['quantity']);

	 			echo '<td><ol>';
	 			for($x=0;$x<count($products);$x++)
	 			{

	 				$result_products=$get->select_by_colname_reloaded('product',array('title'),'id',$products[$x]);
	 				$row_products=mysqli_fetch_array($result_products);
	 				echo '<li>'.$row_products['title'].'</li>';
	 			}
	 			echo '</ol></td>';

	 			echo '<td>';
	 			for($x=0;$x<count($quantity);$x++)
	 			{
	 				echo ''.$quantity[$x].'<br>';
	 			}
	 			echo '</td>';
	 			echo '<td>'.'<i class="fa fa-rupee"></i>'.$row_orders['price'].'</td>';
	 			if($row_orders['payment']=='1')
	 			{
	 				echo '<td class="text-success">Cash On Delivery</td>';
	 			}
	 			else if($row_orders['payment']=='2')
	 			{
	 				echo '<td class="text-success">Paid</td>';
	 			}
	 			else
	 			{
	 			?>
	 				<td>
	 					<span class="text-danger">No payment method selected</span><br>
	 					<a href="select_payment_method.php?order_id=<?php echo $row_orders['id']+8887; ?>">Pay Now</a>
	 				</td>
	 			<?php
	 			}
	 			echo '</tr>';
	 			$count++;
	 		}
	 ?>
	 </table>
	<?php include "elements/footer.php" ?>
</body>
	
