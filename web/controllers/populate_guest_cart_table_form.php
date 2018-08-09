<style>
	.border{padding-top:0.5rem;padding-bottom:0.5rem;}
</style>

<div class="container">

	<div class="row" style="background-color:grey;color:white;">
	<div class="col-2 border aa" >
		
	</div>
	<div class="col-2 border" >
		<b>Image</b>
	</div>
	<div class="col-2 border">
		<b>Title</b>
	</div>
	<div class="col-2 border">
		<b>Price</b>
	</div>
	<div class="col-2 border">
		<b>Quantity</b>
	</div>
	<div class="col-2 border">
		<b>Total</b>
	</div>
</div>

<?php
	$count=1;
	$product_id_list='';
	$price=array();
	require_once "function.php";
	$get=new DB_connect();
	$total_price=0;
	$_SESSION['cart_price']=0;
	//Select from cart depending on seller or buyer id.
	//Populating the cart dynamically.
	if(isset($_SESSION['guest_cart'])){
	foreach($_SESSION['guest_cart'] as $product)
	{
		//Getting details of product.
		$result2=$get->select_by_colname_reloaded('product',array('title','width','height','price','image'),'id',$product['product_id']);
		$product_id_list.=$product['product_id'].',';
		$row_product=mysqli_fetch_array($result2);

		//Get seller id if not present.
		if(!isset($_SESSION['seller_id']))
		{
			$result4=$get->select_by_colname('product','sellerid','id',$product['product_id']);
			$result4array=mysqli_fetch_array($result4);
			$seller_id=$result4array['sellerid'];
		}

		//Getting details of seller.
		$result3=$get->select_by_colname_reloaded('seller',array('firstname','lastname'),'id',$seller_id);
		$row_seller=mysqli_fetch_array($result3);
		$total_price+=$row_product['price'];
		$_SESSION['cart_price']+=$row_product['price'];
?>



<div class="row">
	<div class="col-2 border">
		<button class="btn btn-outline-danger delete" id="<?php echo $product['product_id']; ?>"><i class="fa fa-times"></i></button>
	</div>
	<div class="col-2 border">
		<image src="gallery/<?php echo $row_product['image']; ?>" class="img-fluid" alt="A picture" style="max-height:100%;">
	</div>
	<div class="col-2 border">
		<h5 class="text-left" ><?php echo $row_product['title']; ?></h5>
	</div>
	<div class="col-2 border">
		<span><i class="fa fa-rupee"></i> <?php echo $row_product['price']; $price[$count]=$row_product['price'];   ?></span>
	</div>
	<div class="col-2 border">
		<input type="number" style="width:50%;" value="<?php echo $product['quantity']; ?>" id="<?php echo $count; ?>" class="form-control" min="1">
	</div>
	<div class="col-2 border" id="<?php echo $count.'price';?>">
		<span><i class="fa fa-rupee"></i><?php echo $row_product['price']; ?></span>
	</div>
</div>



 <?php $count+=1; } } ?>

<div class="row">
	<div class="col-8">

	</div>
	<div class="col-4 border text-center">
 		<button id="update" class="btn btn-primary">Update Cart</button>
 	</div>
</div>
<br>
<div class="row">
	<div class="col-8">
	</div>
	<div class="col-4 border">
		<h1>Cart Total</h1>
		<hr>
		<i class="fa fa-rupee"></i><span id="total-price"><b><?php echo $total_price;?></b></span>
	</div>
</div>
<div class="row">
	<div class="col-8">
	</div>
	<div class="col-4">
		<br>
		<button style="width:100%;" class="btn btn-info" onclick="window.location.href='login_alert.php';" id="checkout">Checkout</button>
		<br><br>
		<button style="width:100%;"  class="btn btn-primary" onclick="window.history.back();">Back</button>
	</div
</div>


<?php  $product_id_list=rtrim($product_id_list,','); ?>




 <script>
 	$(document).ready(function()
 	{
 		$("#update").click(function()
 			{
 				let id,price,quantity,amount,total=0,qString='';
 				<?php 
 						$size=sizeof($price);
 						for($x=1;$x<=$size;$x+=1)
 						{

 				?>
 				id=<?php echo $x; ?>;
 				price=<?php echo $price[$x]; ?>;
 				quantity=$("#"+id).val();
 				qString+=quantity.toString()+',';
 				amount=price*quantity;
 				if(amount<0){ amount=0; }
 				total+=amount;
 				$("#"+id+"price").html("<i class='fa fa-rupee'>"+amount);
 			<?php } ?>
 				$("#total-price").html("<b>"+total+"</b>");
 				qString=qString.replace(/,\s*$/, "");
 				let products= <?php   echo '"'.$product_id_list.'"';  ?>;
 				
 				
 				$.ajax({  
				    type: 'POST',  
				    url: 'controllers/update_session.php', 
				    data: { price:total,quantity:qString,products:products},
				    success: function() {
				        console.log('Success');
				    }
				});
 			});

 		

 		$(".delete").click(function()
 			{
 				let id=this.id[0];
 				
 				$("#delete-id").val(id);
				$("#delete-in-guest-cart").submit();
 			});

 		/*$("#checkout").click(function()
 		{
 			$('form').submit();
 		});
 		document.getElementById("update").click();*/
 	});
 </script>
 
 <form method="post" action="controllers/delete_session.php" id="delete-in-guest-cart">
 	<input type="hidden" id="delete-id" name="delete">
 </form>
 
