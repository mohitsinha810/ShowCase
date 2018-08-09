<?php


require_once "function.php";
$show=new DB_connect();
$cols=array("id","title","type","width","height","price","shortdesc","image","sellerid");
if(isset($_SESSION['seller_id']))
{
	$seller_id=$_SESSION['seller_id'];
}
$result=$show->select_by_colname_reloaded('product',$cols,'category',$_GET['category']);
?>

<?php 
	$count=0;
	$put=0;
	if($count==0 or $count%5==0)
	{
		echo '<div class="row">';
		$put=1;
	}
 	while($row=mysqli_fetch_array($result))
			{ 
				$seller=$show->select_by_colname('seller','firstname','id',$row['sellerid']);
				$seller=mysqli_fetch_array($seller);
	?>
	<div class="col-lg-3 col-sm-4 col-xs-6 product-view">
		<div class="card">
			<div class="card-header category-view"></div>
			<a href="details.php?product_id=<?php echo $row['id']+8887; ?> ">
				<img class="card-img-top" src="gallery/<?php echo $row['image']; ?>">
			</a>
			<div class="card-header" style="overflow:hidden;">
				<span class="float-left" ><b><?php  echo  $row["title"]; ?></b></span> 
				<span class="float-right">   <small>  <?php echo $row['width'].'X'.$row['height'].'in' ?>  </small> </span>
			</div>
			<div class="card-footer">
				<span class="float-left"><i class="fa fa-rupee"></i><?php echo $row['price']; ?></span>
				<button type="button" class="btn btn-sm btn-outline-dark float-right" 
				 onclick="window.location.href='controllers/addtocart.php?product_id=<?php echo $row['id']+8887; ?>';">Add to cart</button>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if($put=1){echo "</div>"; $put=0;} ?>
</div>