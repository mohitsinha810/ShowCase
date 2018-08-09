<?php
session_start();
require_once "../function.php";
$check=new DB_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["email"]=$check->test_input($_POST["buyer-email"]);
	$data["password"]=$check->test_input($_POST["buyer-password"]);
}
$result=$check->select_by_colname("buyer","*","email",$data["email"]);
$row=mysqli_fetch_array($result);
if($row['password']==$data['password'])
{
	echo "Correct password";
	$_SESSION['buyer_id']=$row['id'];
	$_SESSION['buyer_name']=$row['firstname'];
	$_SESSION['buyer-login-error']="";
	header("Location:../cart.php");
}
else
{
	echo "Incorrect password";
	$_SESSION['buyer-login-error']="Incorrect username or password.";
	header("Location:../login.php");
}



?>