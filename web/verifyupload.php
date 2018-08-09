<?php
session_start();
require_once "function.php";
$upload=new DB_connect();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data["title"]=$upload->test_input($_POST["title"]);
	$data["type"]=$upload->test_input($_POST["type"]);
	$data["surface"]=$upload->test_input($_POST["surface"]);
	$data["width"]=$upload->test_input($_POST["width"]);
	$data["height"]=$upload->test_input($_POST["height"]);
	$data["yearofartwork"]=$upload->test_input($_POST["yearofartwork"]);
	$data["delivery"]=$upload->test_input($_POST["delivery"]);
	$data["price"]=$upload->test_input($_POST["price"]);
	$data["shortdesc"]=$upload->test_input($_POST["shortdesc"]);
	$data["longdesc"]=$upload->test_input($_POST["longdesc"]);
	$data["image"]=$upload->test_input($_POST["jugaad"]);
	$data["category"]=$upload->test_input($_POST["category"]);
}
$extn=explode(".",$data["image"])[1];
if(isset($_SESSION['seller_id']))
{
	$data['sellerid']=$_SESSION['seller_id'];
	$data['image']=$_SESSION['seller_id'].$data['title'].".".$extn;
}
else
{
	$data['image']=$data['title'].".".$extn;
}
$upload->insert($data,'product');

echo "here";




if(isset($_FILES['image']))
	{
		 $errors= array(); 
         $file_name = $_FILES['image']['name']; 
         $file_size =$_FILES['image']['size'];      
         $file_tmp =$_FILES['image']['tmp_name'];
         $file_type=$_FILES['image']['type'];
    
         $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
   		 $expensions= array("jpeg","jpg","png");
      
 
        if(in_array($file_ext,$expensions)=== false)
        {
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
 		if($file_size > 2097152)
    	{
			$errors[]='File size must be excately 2 MB';
		}
		if(empty($errors)==true)
        {
			move_uploaded_file($file_tmp,"gallery/".$data["image"]);
			echo "Success";
		}
     	else
     	{
			print_r($errors);
		}
  
    }
    
	

header("Location:myseller.php");
?>