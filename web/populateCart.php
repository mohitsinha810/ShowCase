<?php



	require_once "function.php";
	$get=new DB_connect();
	$total_price=0;
	//Select from cart depending on seller or buyer id.
	if(isset($_SESSION['seller_id']))
	{
		$result=$get->select_by_colname_reloaded('seller_cart',array('id','productid','quantity'),'sellerid',$_SESSION['seller_id']);
		$seller_id=$_SESSION['seller_id'];
	}
	else if(isset($_SESSION['buyer_id']))
	{
		$result=$get->select_by_colname_reloaded('buyer_cart',array('id','productid','quantity'),'buyerid',$_SESSION['buyer_id']);
	}

	//Populating the cart dynamically.
	while($row_cart=mysqli_fetch_array($result))
	{
		//Getting details of product.
		$result2=$get->select_by_colname_reloaded('product',array('title','width','height','price','image'),'id',$row_cart['productid']);
		$row_product=mysqli_fetch_array($result2);

		//Get seller id if not present.
		if(!isset($_SESSION['seller_id']))
		{
			$result4=$get->select_by_colname('product','sellerid','id',$row_cart['productid']);
			$result4array=mysqli_fetch_array($result4);
			$seller_id=$result4array['sellerid'];
		}

		//Getting details of seller.
		$result3=$get->select_by_colname_reloaded('seller',array('firstname','lastname'),'id',$seller_id);
		$row_seller=mysqli_fetch_array($result3);
		$total_price+=$row_product['price'];
?>

<div class="container cart">
	<div class="row">
		<div class="col-md-8">
			<div class="row cart-item" style="margin-top:0.5rem;border:1px solid rgb(234,234,234);">
				<div class="col-md-4" style="padding-left:0rem;">
					<image src="gallery/<?php echo $row_product['image']; ?>" class="img-fluid" alt="A picture" style="max-height:100%;">
				</div>
				<div class="col">
					<div class="row" style="margin-top:1rem;">
						<div class="col">
							<h5 class="text-left" ><?php echo $row_product['title']; ?></h5>
						</div>
						<div class="col text-right">
							<h5><i class="fa fa-rupee"></i><?php  echo $row_product['price']; ?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<span><b>Artist</b></span>
						</div>
						<div class="col text-right">
							<span><?php  echo $row_seller['firstname']." ".$row_seller['lastname']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<span><b>Size</b></span>
						</div>
						<div class="col text-right">
							<span><?php echo $row_product['width']."X".$row_product['height']."in"; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<span><b>Quantity</b></span>
						</div>
						<div class="col text-right">
							<span><?php echo $row_cart['quantity']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<a href="#">View details</a>
						</div>
						<div class="col text-right">
							<a href="controllers/remove_from_cart.php?cart_id=<?php echo $row_cart['id'] ?>">Remove from cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4" style="border:1px solid rgb(234,234,234);margin-top:0.5rem;padding:1rem;">
			<div class="row">
				<div class="col">
					<b>Price:</b>
				</div>
				<div class="col text-right">
					<span><i class="fa fa-rupee"></i> <?php echo $row_product['price']; ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<b>Shipping:</b>
				</div>
				<div class="col text-right">
					<span><i class="fa fa-rupee"></i> 0</span>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<hr>
					<b>Total:</b>
				</div>
				<div class="col text-right">
					<hr>
					<span><i class="fa fa-rupee"></i> <?php echo $row_product['price']; ?></span>
				</div>
			</div>
		</div>
	</div>
</div>




 <?php }  ?>

 <div class="container">
	 <div class="row">
	 	<div class="col-md-8">
	 	</div>
	 	<div class="col-md-4" style="border:1px solid rgb(180,180,180);margin-top:0.5rem;padding:1rem;">
	 		<div class="row">
	 			<div class="col">
	 				<span><b>Subtotal:</b></span>
	 			</div>
	 			<div class="col text-right">
	 				<span><b><i class="fa fa-rupee"></i><?php echo $total_price; ?></b></span>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 <div class="row" style="margin-top:1rem;">
	 	<div class="col-md-8">
	 	</div>
	 	<div class="col-md-4">
			<div class="row">
				<div class="col">
	 				<button class="btn btn-info" onclick="window.location.href='index.php';">Continue Shopping</button>
	 			</div>
	 			<div class="col text-right">
	 				<button class="btn btn-primary" onclick="window.location.href='checkout.php';">Checkout</button>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</div>
