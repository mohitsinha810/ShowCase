<?php
session_start();
$product_id=$_GET['product_id']-8887;


require_once "../function.php";
$add=new DB_connect();

if(isset($_SESSION['seller_id'])){  $sellerid=$_SESSION['seller_id']; $tablename="seller_cart"; }
else{  $sellerid="";  }

if(isset($_SESSION['buyer_id'])){  $buyerid=$_SESSION['buyer_id']; $tablename="buyer_cart"; }
else{  $buyerid="";  }

if($sellerid=="" and $buyerid==""){  $guest=true;  }
else{  $guest=false;  }

if(!$guest)
{
	$result=$add->select_by_colname($tablename,'productid','productid',$product_id);
	if($result->num_rows == 0) 
	{
		$data['productid']=$add->test_input($product_id);
		if($tablename=="seller_cart"){$data['sellerid']=$add->test_input($sellerid);}
		if($tablename=="buyer_cart"){$data['buyerid']=$add->test_input($buyerid);}
		$data['quantity']=$add->test_input('1');

		$add->insert($data,$tablename);

	}
	else{}
	header("Location:../cart.php");
}
else
{
	$_SESSION['guest_cart'][]=array("product_id"=>$product_id,"quantity"=>1);
	echo 'done';
	header("location:../guest_cart.php");
}

?>