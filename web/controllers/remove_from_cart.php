<?php
session_start();
require_once "../function.php";
$remove=new DB_connect();
$cart_id =$_GET['cart_id'];
if(isset($_SESSION['seller_id']))
{
	$remove->delete($cart_id,'seller_cart');
}
else if(isset($_SESSION['buyer_id']))
{
	$remove->delete($cart_id,'buyer_cart');	
}
echo "here";
header("Location:../cart.php");


?>