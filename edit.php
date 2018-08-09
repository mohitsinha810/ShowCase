<?php session_start(); ?>
<?php

$product_id=$_GET['product_id']-8887;


require_once "function.php";
$edit=new DB_connect();
$result=$edit->selectbyid($product_id,'product');
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Buy and sell artworks online</title>
	<!-- Latest compiled and minified CSS -->
	 <link rel="shortcut icon" href="images/canvas.ico">      
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 	if(isset($_SESSION['seller_name'])){include "elements/headerseller.php";}
			else if(isset($_SESSION['buyer_name'])){include "elements/headerbuyer.php";}
			else {include "elements/header.php";}
	 ?>

	 <div class="container">
	 	<h1 class="text-center">Edit Product</h1>
	 	<h2 class="text-center">Just fill the below details and your artwork will be uploaded in no time!</h2>
	 	
		<form  method="post" action="controllers/edit_in_product_table.php?product_id=<?php echo $product_id;?>" id="upload" enctype="multipart/form-data">
			<div class="row">
	 		<div class="col-md-6">
			 		<label for="title">Title*</label>
					<input type="text" name="title" id="title" class="form-control" value="<?php echo $row['title']; ?>">
					<div id="invalid-input-title" class="error">
					</div>

					<label for="type">Type*</label>
					<select class="form-control" name="type" id="type">
					  <option value="None" <?php if($row['type']=='None'){echo 'selected';} ?>>Select Type</option>
					  <option value="Painting"  <?php if($row['type']=='Painting'){echo 'selected';} ?>>Painting</option>
					  <option value="Drawing" <?php if($row['type']=='Drawing'){echo 'selected';} ?>>Drawing</option>
					  <option value="Other" <?php if($row['type']=='Other'){echo 'selected';} ?>>Other</option>
					</select>
					<div id="invalid-input-type" class="error">
					</div>

					<label for="category">Category</label>
					<select class="form-control" name="category" id="category">
					  <option value="None" <?php if($row['category']=='None'){echo 'selected';} ?>>Select Category</option>
					  <option value="Abstract Art" <?php if($row['category']=='Abstract Art'){echo 'selected';} ?>>Abstract Art</option>
					  <option value="Landscape" <?php if($row['category']=='Landscape'){echo 'selected';} ?>>Landscape</option>
					  <option value="Portrait" <?php if($row['category']=='Portrait'){echo 'selected';} ?>>Portrait</option>
					  <option value="Paintings On Nature" <?php if($row['type']=='Paintings on Nature'){echo 'selected';} ?>>Paintings On Nature</option>
					</select>
					<div id="invalid-input-category" class="error">
					</div>

					<!--<label for="material">Material*</label>
					<select multiple="multiple" size="1" class="form-control">
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="opel">Opel</option>
					  <option value="audi">Audi</option>
					</select>
					<div id="invalid-input-material" class="error">
					</div>-->

					<label for="surface">Surface*</label>
					<select class="form-control" name="surface" id="surface">
					  <option value="None" <?php if($row['surface']=='None'){echo 'selected';} ?>>Select Surface</option>
					  <option value="Canvas" <?php if($row['surface']=='Canvas'){echo 'selected';} ?>>Canvas</option>
					  <option value="Cloth" <?php if($row['surface']=='Cloth'){echo 'selected';} ?>>Cloth</option>
					  <option value="Hardboard" <?php if($row['surface']=='Hardboard'){echo 'selected';} ?>>Hardboard</option>
					  <option value="Silk" <?php if($row['surface']=='Silk'){echo 'selected';} ?>>Silk</option>
					  <option value="Thickpaper" <?php if($row['surface']=='Thickpaper'){echo 'selected';} ?>>Thickpaper</option>
					  <option value="Watercolorpaper" <?php if($row['surface']=='Watercolorpaper'){echo 'selected';} ?>>Watercolor Paper</option>
					  <option value="Fabrianosheet" <?php if($row['surface']=='Fabrianosheet'){echo 'selected';} ?>>Fabriano Sheet</option>
					  <option value="Ivorysheet" <?php if($row['surface']=='Ivorysheet'){echo 'selected';} ?>>Ivory Sheet</option>
					  <option value="Ricepaper" <?php if($row['surface']=='Ricepaper'){echo 'selected';} ?>>Rice Paper</option>
					  <option value="Thickpaper" <?php if($row['surface']=='Thickpaper'){echo 'selected';} ?>>Thick Paper</option>
					</select>
					<div id="invalid-input-surface" class="error">
					</div>

					<label for="size">Size* (In inches)</label>
					<div class="row">
						<div class="col-sm-4">
							<input type="number" name="width" id="width" class="form-control" placeholder="Width" 
							value="<?php echo $row['width']; ?>">
							<div id="invalid-input-width" class="error">
							</div>
						</div>
						<div class="col-sm-1 text-center">
							<i class="fa fa-times"></i>
						</div>
						<div class="col-sm-4">
							<input type="number" name="height" id="height" class="form-control" placeholder="Height" 
							value="<?php echo $row['height']; ?>">
							<div id="invalid-input-height" class="error">
							</div>
						</div>
					</div>
					<div id="invalid-input-size" class="error">
					</div>

					<label for="yearofartwork">Year Of Artwork</label>
					<input type="number" name="yearofartwork" id="yearofartwork" class="form-control" placeholder="YYYY" 
					value="<?php echo $row['yearofartwork']; ?>">
					<div id="invalid-input-yearofartwork" class="error">
					</div>

					<label for="delivery">Artwork to be delivered as*</label>
					<select class="form-control" name="delivery" id="delivery">
						<option value="None"  <?php if($row['deliery']=='None'){echo 'selected';} ?>>Select</option>
						<option value="Rolled"  <?php if($row['delivery']=='Rolled'){echo 'selected';} ?>>Rolled</option>
						<option value="Stretched"  <?php if($row['delivery']=='Stretched'){echo 'selected';} ?>>Stretched</option>
						<option value="Framed"  <?php if($row['delivery']=='Framed'){echo 'selected';} ?>>Framed</option>
						<option value="Boxed"  <?php if($row['delivery']=='Boxed'){echo 'selected';} ?>>In a Plywood Box</option>
					</select>
					<div id="invalid-input-delivery" class="error">
					</div>

					<label for="price">Price* ( <i class="fa fa-rupee"></i> )</label>
					<small>(Please do not add any symbols or extra special characters.)</small>
					<input type="number" name="price" id="price" class="form-control" value="<?php echo $row['price']; ?>">
					<div id="invalid-input-price" class="error">
					</div>

					<label for="shortdesc">Write a short description of the artwork (15-20 words)*</label>
					<textarea class="form-control" id="shortdesc" name="shortdesc"><?php echo $row['shortdesc']; ?></textarea>
					<div id="invalid-input-shortdesc" class="error">
					</div>

					<label for="longdesc">Write a long description of the artwork (30-50 words)</label>
					<textarea class="form-control" id="longdesc" name="longdesc"><?php echo $row['longdesc']; ?></textarea>
					<div id="invalid-input-longdesc" class="error">
					</div>

				
	 		</div>
	 		<div class="col-md-6">
	 			<div class="text-center" style="padding-top:10%;">
	 				<h2>Upload a good photograph of the artwork.</h2>
	 				<br>
		 			<div class="card text-center" style="max-width:350px;margin:auto;">
		 				<div class="card-header">
		 					<output id="list"></output>
		 				</div>
		 				<div class="card-body">
		 					<div class="text-center">
			 					<input type="file" name="image" id="image" accept="image/png,image/jpeg">
			 				</div>
			 			</div>
			 		</div>
			 		<small>Your uploaded image will be shown on our website as your product image.</small>
			 		<div id="invalid-input-image" class="error">
			 		</div>
			 	</div>
	 		</div>
	 	 </div>
	 	 <hr>
	 	 <div class="text-center">
	 	 	<button type="button" class="btn custom-btn btn-lg" id="noSubmit">Upload Artwork</button>
	 	 </div>
	 	 <input type="text" id="jugaad" name="jugaad" style="display:none;">
	 	</form>
	 	</div>


	 <?php include "elements/footer.php" ?>
	 <!-- Initialize the plugin: -->
<script>
    $(document).ready(function()
	{
		if (window.FileReader)
		{
			document.getElementById('image').addEventListener('change', handleFileSelect, false);
		}
		else 
		{
			 alert('This browser does not support FileReader');
		}				
		$('#noSubmit').click(function()
			{
				let count=0;
				count+=validateName('title','invalid-input-title','Title');
				count+=validateSelect('type','invalid-input-type','Type');
				count+=validateSelect('surface','invalid-input-surface','Surface');
				count+=validateSelect('delivery','invalid-input-delivery','Delivery');
				count+=validateText('shortdesc','invalid-input-shortdesc','Short description');
				count+=validateNumber('width','invalid-input-width','Width');
				count+=validateNumber('height','invalid-input-height','Height');
				count+=validateImage('image','invalid-input-image','Image');
				//count+=validateName('lastname','invalid-input-lastname','Last name');
				//count+=validateEmail('email','invalid-input-email','E-mail');
				count+=validateNumber('price','invalid-input-price','Price');
				//count+=validateSelect('category','invalid-input-category','Category');
				if(count==9){$('#upload').submit();}
				//count+=validatePassword('password','invalid-input-password','Password');
				
			});
			
			function validateSelect(idInput,idError,show)
			{
				let type=$('#'+idInput+' option:selected');
				if(type.val()=="None")
				{
					$('#'+idError).text('Please select one '+show.toLowerCase()+' type.');
					return 0;
				}
				else
				{
					$('#'+idError).text('');
					return 1;
				}
			}
			function validateImage(idInput,idError,show)
			{
				let image=$('#'+idInput).val();
				document.getElementById('jugaad').value=image;
				console.log(image);
				if(image=='')
				{
					$('#'+idError).text('Please select an image to upload.');
					return 0;
				}
				else
				{
					$('#'+idError).text('');
					return 1;
				}
			}


			function handleFileSelect(evt) 
			{
        		let files = evt.target.files;
        		let f = files[0];
        		let reader = new FileReader();
         
          		reader.onload = (function(theFile)
          		{
                	return function(e) 
                	{
                  		document.getElementById('list').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" width="250" />'].join('');
               		 };
          		})(f);
           		reader.readAsDataURL(f);
			}



			function validateName(idInput,idError,show)
			{
				let name=$('#'+idInput).val();
				if(name==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validateEmail(idInput,idError,show)
			{
				let email=$('#'+idInput).val();
				let re= /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if(email==""){$('#'+idError).text(show+' cannot be empty');return 0;}
				else if(!re.test(email)){$('#'+idError).text('Invalid '+show.toLowerCase()+'.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validateNumber(idInput,idError,show)
			{
				let mobile=$('#'+idInput).val();
				if(mobile==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validatePassword(idInput,idError,show)
			{
				let password=$('#'+idInput).val();
				if(password==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else if(!password.match(/[a-z]\d|\d[a-z]/i)||password.length<8){$('#'+idError).text('Invalid '+show.toLowerCase()+'.  ');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validateText(idInput,idError,show)
			{
				let text=$('#'+idInput).val();
				if(text==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
	});
</script>