<?php session_start(); ?>
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
	 	<h1 class="text-center">Upload New Product</h1>
	 	<h2 class="text-center">Just fill the below details and your artwork will be uploaded in no time!</h2>
	 	
		<form  method="post" action="verifyupload.php" id="upload" enctype="multipart/form-data">
			<div class="row">
	 		<div class="col-md-6">
			 		<label for="title">Title*</label>
					<input type="text" name="title" id="title" class="form-control">
					<div id="invalid-input-title" class="error">
					</div>

					<label for="type">Type*</label>
					<select class="form-control" name="type" id="type">
					  <option value="None">Select Type</option>
					  <option value="Painting">Painting</option>
					  <option value="Drawing">Drawing</option>
					  <option value="Other">Other</option>
					</select>
					<div id="invalid-input-type" class="error">
					</div>

					<label for="category">Category</label>
					<select class="form-control" name="category" id="category">
					  <option value="None">Select Category</option>
					  <option value="Abstract Art">Abstract Art</option>
					  <option value="Landscape">Landscape</option>
					  <option value="Portrait">Portrait</option>
					  <option value="Paintings On Nature">Paintings On Nature</option>
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
					  <option value="None">Select Surface</option>
					  <option value="Canvas">Canvas</option>
					  <option value="Cloth">Cloth</option>
					  <option value="Hardboard">Hardboard</option>
					  <option value="Silk">Silk</option>
					  <option value="Thickpaper">Thickpaper</option>
					  <option value="Watercolorpaper">Watercolor Paper</option>
					  <option value="Fabrianosheet">Fabriano Sheet</option>
					  <option value="Ivorysheet">Ivory Sheet</option>
					  <option value="Ricepaper">Rice Paper</option>
					  <option value="Thickpaper">Thick Paper</option>
					</select>
					<div id="invalid-input-surface" class="error">
					</div>

					<label for="size">Size* (In inches)</label>
					<div class="row">
						<div class="col-sm-4">
							<input type="number" name="width" id="width" class="form-control" placeholder="Width">
							<div id="invalid-input-width" class="error">
							</div>
						</div>
						<div class="col-sm-1 text-center">
							<i class="fa fa-times"></i>
						</div>
						<div class="col-sm-4">
							<input type="number" name="height" id="height" class="form-control" placeholder="Height">
							<div id="invalid-input-height" class="error">
							</div>
						</div>
					</div>
					<div id="invalid-input-size" class="error">
					</div>

					<label for="yearofartwork">Year Of Artwork</label>
					<input type="number" name="yearofartwork" id="yearofartwork" class="form-control" placeholder="YYYY">
					<div id="invalid-input-yearofartwork" class="error">
					</div>

					<label for="delivery">Artwork to be delivered as*</label>
					<select class="form-control" name="delivery" id="delivery">
						<option value="None">Select</option>
						<option value="Rolled">Rolled</option>
						<option value="Stretched">Stretched</option>
						<option value="Framed">Framed</option>
						<option value="Boxed">In a Plywood Box</option>
					</select>
					<div id="invalid-input-delivery" class="error">
					</div>

					<label for="price">Price* ( <i class="fa fa-rupee"></i> )</label>
					<small>(Please do not add any symbols or extra special characters.)</small>
					<input type="number" name="price" id="price" class="form-control">
					<div id="invalid-input-price" class="error">
					</div>

					<label for="shortdesc">Write a short description of the artwork (15-20 words)*</label>
					<textarea class="form-control" id="shortdesc" name="shortdesc"></textarea>
					<div id="invalid-input-shortdesc" class="error">
					</div>

					<label for="longdesc">Write a long description of the artwork (30-50 words)</label>
					<textarea class="form-control" id="longdesc" name="longdesc"></textarea>
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
	 	 	<button type="button" class="btn custom-btn btn-lg" id="noSubmit">Add Artwork</button>
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