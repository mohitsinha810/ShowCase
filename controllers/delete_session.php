<?php

	session_start();
	$id=$_POST['delete'];
	$keys=array_keys($_SESSION['guest_cart']);
	$count=$keys[0];
	echo $count;
	foreach($_SESSION['guest_cart'] as $product)
	{
		if($product['product_id']==$id)
		{
			break;
		}
		else
		{
			$count++;
		}
	}
	unset($_SESSION['guest_cart'][$count]);
	header("location:../guest_cart.php");

?>