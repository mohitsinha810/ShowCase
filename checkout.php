<?php session_start();?>
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
	 	<h1 class="text-center">CHECKOUT</h1>
	 	<h2 class="text-center">Fill in the following details to complete the purchase.</h2>
	 	<hr>
	 	<form method="post" action="controllers/publish_order.php">
	 		<h2>Contact details</h2>
	 		<div class="row">
	 			<div class="col-sm-6">
			 		<label for="email">E-mail*</label>
			 		<input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
			 		<div id="invalid-input-email" class="error"></div>
			 	</div>
			 	<div class="col-sm-6">
			 		<label for="mobile">Mobile</label>
			 		<input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
			 		<div id="invalid-input-mobile" class="error"></div>
			 	</div>
			 </div>
			 <br>
	 		<h2>Shipping address</h2>
	 		<div class="row">
	 			<div class="col-sm-6">
			 		<label for="firstname">First name</label>
			 		<input type="text" name="firstname" class="form-control" placeholder="First name (optional)" id="firstname">
			 		<div id="invalid-input-firstname" class="error"></div>
			 	</div>
			 	<div class="col-sm-6">
			 		<label for="lastname">Last name*</label>
			 		<input type="text" name="lastname" class="form-control" placeholder="Last name" id="lastname">
			 		<div id="invalid-input-lastname" class="error"></div>
			 	</div>
			 </div>
			 <label for="address">Address*</label>
			 <textarea type="text" name="address" class="form-control" placeholder="Address" id="address"></textarea>
			 <div id="invalid-input-address" class="error"></div>
			 <div class="row">
			 	<div class="col-sm-4">
			 		<label for="city">City*</label>
			 		<input type="text" name="city" class="form-control" placeholder="City" id="city">
			 		<div id="invalid-input-city" class="error"></div>
			 	</div>
			 	<div class="col-sm-4">
			 		<label for="state">State/Province*</label>
			 		<input type="text" name="state" class="form-control" placeholder="State/Province" id="state">
			 		<div id="invalid-input-state" class="error"></div>
			 	</div>
			 	<div class="col-sm-4">
			 		<label for="country">Country*</label>
			 		<input type="text" name="country" class="form-control" placeholder="Country" id="country">
			 		<div id="invalid-input-country" class="error"></div>
			 	</div>
			 </div>
			 <label for="pin">Pin code</label>
			 <input type="number" name="pin" class="form-control" placeholder="Pin code" id="pin">
			 <div id="invalid-input-pin" class="error"></div>
		</form>
		
		<br>
		<div class="text-center">
			 	<button type="button" class="btn btn-lg btn-primary" id="nosubmit">Proceed to payment</button>
			 </div>
	 <?php include "elements/footer.php" ?>
</body>
<script>
	$(document).ready(function()
	{
		$("#nosubmit").click(function()
		{
			let count=0;
			count+=validateName('firstname','invalid-input-firstname','First name');
			count+=validateName('lastname','invalid-input-lastname','Last name');
			count+=validateAddress('address','invalid-input-address','Address');
			count+=validateAddress('city','invalid-input-city','City');
			count+=validateAddress('state','invalid-input-state','State');
			count+=validateAddress('country','invalid-input-country','Country');
			count+=validatePin('pin','invalid-input-pin','Pin code');
			count+=validateEmail('email','invalid-input-email','E-mail');
			count+=validateNumber('mobile','invalid-input-mobile','Mobile')
			if(count==9){ $('form').submit();  }
		});

	});

			function validateName(idInput,idError,show)
			{
				let name=$('#'+idInput).val();
				if(name==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else if(!name.match(/^[0-9a-zA-Z ]+$/)){$('#'+idError).text('Invalid '+show.toLowerCase()+'.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validateAddress(idInput,idError,show)
			{
				let name=$('#'+idInput).val();
				if(name==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}


			function validatePin(idInput,idError,show)
			{
				let mobile=$('#'+idInput).val();
				if(mobile==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else if(!mobile.match(/^\d{6}$/)){$('#'+idError).text('Invalid '+show.toLowerCase()+'. Pin code must be of 6 digits.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validateNumber(idInput,idError,show)
			{
				let mobile=$('#'+idInput).val();
				if(mobile==""){return 1;}
				else if(!mobile.match(/^\d{10}$/)){$('#'+idError).text('Invalid '+show.toLowerCase()+'. Mobile number must be of 10 digits.');return 0;}
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


</script>




