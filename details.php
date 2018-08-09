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

require_once "function.php";
$show=new DB_connect();
$product_id=$_GET['product_id']-8887;
$result=$show->selectbyid($product_id,'product');
$row=mysqli_fetch_array($result);
$result2=$show->select_by_colname_reloaded('seller',array('firstname','lastname'),'id',$row['sellerid']);
$row2=mysqli_fetch_array($result2);

?>
<div class="container">
	<div class="detail">
		<div class="row">
			<div class="col-md-6">
					<img class="img-fluid img-thumbnail" src="gallery/<?php echo $row['image']; ?>" style="width:100%; height:auto;">
			</div>
			<div class="col-md-6">
				<h1><?php echo $row['title']; ?></h1>
				<div> 
					by Artist <?php echo ucfirst($row2['firstname'])." ".ucfirst($row2['lastname']); ?>	
				</div>
				<div class="text-lg">
					<br>
					<b><i class="fa fa-rupee"></i><?php echo $row['price']; ?></b>
					<button type="button" class="btn btn-sm btn-primary float-right" 
					 onclick="window.location.href='controllers/addtocart.php?product_id=<?php echo $row['id']+8887; ?>';">Add to cart</button>
					<br>
				</div>
				<br>
				<div>
					<b>Size: </b> <?php echo $row['width']; ?>X</i><?php echo $row['height']; ?><br>
					<b>Type: </b> <?php echo $row['type']; ?><br>
					<b>Surface: </b> <?php echo $row['surface']; ?><br>
					<b>Created in: </b> <?php echo $row['yearofartwork']; ?><br>
					<b>Category:</b> <?php echo $row['category']; ?><br>
					<b>Artist sign and certificate: </b> Provided<br>
					<b>Quality: </b> Hand-painted<br>
					<b>To be delivered as: </b> <?php echo $row['delivery']; ?><br>
					<b>Return policy: </b> Can be returned within 7 days of purchase<br>
					

				</div>

			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div>
			<b>Desciption:</b><br>
			<?php echo $row['shortdesc']; ?><br>
			<b>Details:</b><br>
			<?php echo $row['longdesc']; ?>
		</div>
	</div>
</div>
<br><br>
<div class="text-center">
	<button type="button" onclick="window.history.back();" class="btn btn-lg custom-btn">Back</button>
</div>





	<?php include "elements/footer.php" ?>
</body>
	









