<?php session_start();
		if(!isset($_SESSION['seller-login-error'])){$_SESSION['seller-login-error']="";}
		if(!isset($_SESSION['buyer-login-error'])){$_SESSION['buyer-login-error']="";}
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
	 	<div class="row">
	 		<div class="col">
	 			<div class="card">
	 				<div class="card-header">
			 			<h1 class="text-center">Login as Buyer</h1>
			 		</div>
			 		<form method="post" id="buyer-login" action="controllers/buyer_login_verify.php">
			 			<div class="card-body">
				 			<label for="email">E-mail</label>
							<input type="email" name="buyer-email" id="buyer-email" class="form-control">
							<div id="invalid-buyer-email" class="error">
							</div>

							<label for="password">Password</label>
							<input type="password" name="buyer-password" id="buyer-password" class="form-control">
							<div id="invalid-buyer-password" class="error">
							</div>
							<span class="error"><?php echo $_SESSION['buyer-login-error'] ?></span>
						</div>
							<div class="card-footer text-center">
								<button type="button" class="btn custom-btn btn-lg" id="buyer-noSubmit">Submit</button>
							</div>
					</form>
			 	</div>
			 </div>
	 		<div class="col">
	 			<div class="card">
	 				<div class="card-header">
			 			<h1 class="text-center">Login as Seller</h1>
			 		</div>
			 		<form method="post" id="seller-login" action="controllers/seller_login_verify.php">
			 			<div class="card-body">

				 			<label for="email">E-mail</label>
							<input type="email" name="seller-email" id="seller-email" class="form-control">
							<div id="invalid-seller-email" class="error">
							</div>

							<label for="password">Password</label>
							<input type="password" name="seller-password" id="seller-password" class="form-control">
							<div id="invalid-seller-password" class="error">
							</div>
							<span class="error"><?php echo $_SESSION['seller-login-error'] ?></span>
						</div>
							<div class="card-footer text-center">
								<button type="button" class="btn custom-btn btn-lg" id="seller-noSubmit">Submit</button>
							</div>

			 			</form>
		 		</div>
	 		</div>
	 	</div>
	 </div>

<?php include "elements/footer.php"?>

<script>
	$(document).ready(function()
	{
		$('#seller-noSubmit').click(function()
			{
				let count=0;
				count+=validateEmail('seller-email','invalid-seller-email','E-mail');
				count+=validatePassword('seller-password','invalid-seller-password','Password');
				if(count==2){$('#seller-login').submit();}
			});

		$('#buyer-noSubmit').click(function()
			{
				let count=0;
				count+=validateEmail('buyer-email','invalid-buyer-email','E-mail');
				count+=validatePassword('buyer-password','invalid-buyer-password','Password');
				if(count==2){$('#buyer-login').submit();}
			});
	
			function validateEmail(idInput,idError,show)
			{
				let email=$('#'+idInput).val();
				let re= /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if(email==""){$('#'+idError).text(show+' cannot be empty');return 0;}
				else if(!re.test(email)){$('#'+idError).text('Invalid '+show.toLowerCase()+'.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
			function validatePassword(idInput,idError,show)
			{
				let password=$('#'+idInput).val();
				if(password==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}
	});
</script>
