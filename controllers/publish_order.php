<?php 

session_start();
require_once '../function.php';
$order=new DB_connect();
$data=array();

if(isset($_SESSION['seller_id']))
{
	$id=$_SESSION['seller_id'];
	$tablename='seller_orders';
	$cartname='seller_cart';
	$cart='seller_cart';
	$colname='sellerid';
}
else if(isset($_SESSION['buyer_id']))
{
	$id=$_SESSION['buyer_id'];
	$tablename='buyer_orders';
	$cartname='buyer_cart';
	$cart='buyer_cart';
	$colname='buyerid';
}


$result=$order->select_by_colname_reloaded($cart,array('productid','quantity'),$colname,$id);
$product_id_list='';$quantity='';
while($row=mysqli_fetch_array($result))
{
	$product_id_list.=$row['productid'].",";
	$quantity.=$row['quantity'].",";
}
$product_id_list=rtrim($product_id_list,",");
$quantity=rtrim($quantity,",");
echo $product_id_list." ".$quantity;

$data["price"]=$_SESSION['total_price'];
$data["items"]=$product_id_list;
$data["quantity"]=$quantity;
$data["buyerid"]=$id;


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["firstname"]=$order->test_input($_POST["firstname"]);
	$data["lastname"]=$order->test_input($_POST["lastname"]);
	$data["email"]=$order->test_input($_POST["email"]);
	$data["mobile"]=$order->test_input($_POST["mobile"]);
	$data["address"]=$order->test_input($_POST["address"]);
	$data["city"]=$order->test_input($_POST["city"]);
	$data["state"]=$order->test_input($_POST["state"]);
	$data["country"]=$order->test_input($_POST["country"]);
	$data["pin"]=$order->test_input($_POST["pin"]);
}
$order->insert($data,$tablename);
//Clear cart.

$clear=new DB_connect();
$clear->delete_column($cartname,$colname,$id);




$max_id=$order->get_max($tablename,'id');
$_SESSION['order_id']=$max_id;
echo $_SESSION['order_id'];
header('location:../select_payment_method.php');
?>