<?php 

session_start();
require_once "../function.php";
$product_id=$_GET['product_id'];
$edit=new DB_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["title"]=$edit->test_input($_POST["title"]);
	$data["type"]=$edit->test_input($_POST["type"]);
	$data["surface"]=$edit->test_input($_POST["surface"]);
	$data["width"]=$edit->test_input($_POST["width"]);
	$data["height"]=$edit->test_input($_POST["height"]);
	$data["yearofartwork"]=$edit->test_input($_POST["yearofartwork"]);
	$data["delivery"]=$edit->test_input($_POST["delivery"]);
	$data["price"]=$edit->test_input($_POST["price"]);
	$data["shortdesc"]=$edit->test_input($_POST["shortdesc"]);
	$data["longdesc"]=$edit->test_input($_POST["longdesc"]);
	$data["image"]=$edit->test_input($_POST["jugaad"]);
	$data["category"]=$edit->test_input($_POST["category"]);
}
$extn=explode(".",$data["image"])[1];
echo $_SESSION['seller_id'];
if(isset($_SESSION['seller_id']))
{
	$data['sellerid']=$_SESSION['seller_id'];
	$data['image']=$_SESSION['seller_id'].$data['title'].".".$extn;
}
else
{
	$data['image']=$data['title'].".".$extn;
}
$edit->update($data,'product',$product_id);



?>