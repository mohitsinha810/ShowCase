<?php
session_start();
require_once "../function.php";
$check=new DB_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["email"]=$check->test_input($_POST["seller-email"]);
	$data["password"]=$check->test_input($_POST["seller-password"]);
}
$result=$check->select_by_colname("seller","*","email",$data["email"]);
$row=mysqli_fetch_array($result);
if($row['password']==$data['password'])
{
	echo "Correct password";
	$_SESSION['seller_id']=$row['id'];
	$_SESSION['seller_name']=$row['firstname'];
	$_SESSION['seller-login-error']="";
	header("Location:../myseller.php");
}
else
{
	echo "Incorrect password";
	$_SESSION['seller-login-error']="Incorrect username or password.";
	header("Location:../login.php");
}



?>