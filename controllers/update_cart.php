<?php
session_start();
require_once '../function.php';
$update=new DB_connect();



if(isset($_POST['price']))
{	
	if($_POST['id_name']=='buyerid'){$tablename='buyer_cart';}
	else if($_POST['id_name'=='sellerid']){$tablename='seller_cart';}
	$id_name=$_POST['id_name'];
	$id_no=$_POST['id'];
	$_SESSION['total_price']=$_POST['price'];
	$products=explode(',',$_POST['products']);
	$quantity=explode(',',$_POST['quantity']);
	for($x=0;$x<count($products);$x++)
	{
		$sql="UPDATE buyer_cart SET quantity=$quantity[$x] WHERE productid=$products[$x] AND $id_name=$id_no;";
		$update->run_query($sql);
	}
}



?>