<?php
session_start();

require_once 'function.php';
$insertdata=new DB_connect();

$data=array("firstname"=>"","lastname"=>"","email"=>"","mobile"=>"","password"=>"");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["firstname"]=$insertdata->test_input($_POST["firstname"]);
	$data["lastname"]=$insertdata->test_input($_POST["lastname"]);
	$data["email"]=$insertdata->test_input($_POST["email"]);
	$data["mobile"]=$insertdata->test_input($_POST["mobile"]);
	$data["password"]=$insertdata->test_input($_POST["password"]);
}
$insertdata->insert($data,'seller');
$get=new DB_connect();
$_SESSION['seller_id']=$get->get_max('seller','id');
$_SESSION['seller_name']=$data['firstname'];
$_SESSION['seller_email']=$data['email'];
header("Location:myseller.php");
?>