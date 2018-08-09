<!DOCTYPE html>
<html>
<head>
	<title>Register as a seller</title>
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
		<h1 class="text-center">Fill the form to register</h1>
			<form id="form" method="post" action="controllers/inject_buyer.php">
				<label for="firstname">First name</label>
				<input type="text" name="firstname" id="firstname" class="form-control">
				<div id="invalid-input-firstname" class="error">
				</div>

				<label for="lastname">Last name</label>
				<input type="text" name="lastname" id="lastname" class="form-control">
				<div id="invalid-input-lastname" class="error">
				</div>

				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" class="form-control">
				<div id="invalid-input-email" class="error">
				</div>

				<label for="mobile">Mobile</label>
				<input type="number" name="mobile" id="mobile" class="form-control">
				<div id="invalid-input-mobile" class="error">
				</div>

				<label for="password">Password (Please enter atleast one letter and one alphabet. Minimum length of password must be eight. )</label>
				<input type="password" name="password" id="password" class="form-control">
				<div id="invalid-input-password" class="error">
				</div>
				<br>
				<div class="text-center">
					<button type="button" class="btn custom-btn btn-lg" id="noSubmit">Submit</button>
				</div>

		</form>
	</div>

	<?php include "elements/footer.php"; ?>

<script>
	$(document).ready(function()
	{
		$('#noSubmit').click(function()
			{
				let count=0;
				count+=validateName('firstname','invalid-input-firstname','First name');
				count+=validateName('lastname','invalid-input-lastname','Last name');
				count+=validateEmail('email','invalid-input-email','E-mail');
				count+=validateNumber('mobile','invalid-input-mobile','Mobile');
				count+=validatePassword('password','invalid-input-password','Password');
				if(count==5){$('form').submit();}
			});
	
			function validateName(idInput,idError,show)
			{
				let name=$('#'+idInput).val();
				if(name==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else if(!name.match(/^[0-9a-zA-Z]+$/)){$('#'+idError).text('Invalid '+show.toLowerCase()+'.');return 0;}
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
				else if(!mobile.match(/^\d{10}$/)){$('#'+idError).text('Invalid '+show.toLowerCase()+'. Mobile number must be of 10 digits.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validatePassword(idInput,idError,show)
			{
				let password=$('#'+idInput).val();
				if(password==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else if(!password.match(/[a-z]\d|\d[a-z]/i)||password.length<8){$('#'+idError).text('Invalid '+show.toLowerCase()+'.  ');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
	});
</script>

</body>