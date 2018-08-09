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
	 	<h1 class="text-center">Contact Us</h1>
	 	<h2 class="text-center">Feel free to drop us a message!</h2>
	 	<hr>

	 	<form method="post" action="controllers/contactpage.php">
	 		<label for="name">Name*</label>
	 		<input type="text" name="name" id="name" class="form-control">
	 		<div id="invalid-input-name" class="error">
	 		</div>
	 		<label for="email">E-mail*</label>
	 		<input type="email" name="email" id="email" class="form-control">
	 		<div id="invalid-input-email" class="error">
	 		</div>
	 		<label for="subject">Subject*</label>
	 		<input type="text" name="subject" id="subject" class="form-control">
	 		<div id="invalid-input-subject" class="error">
	 		</div>
	 		<label for="message">Message*</label>
	 		<textarea name="message" id="message" class="form-control"></textarea>
	 		<div id="invalid-input-message" class="error">
	 		</div>
	 		<div class="text-center">
	 			<button type="button" class="btn btn-lg btn-info" id="noSubmit">Send</button>
	 		</div>
	 	</form>
	 </div>


	<?php include "elements/footer.php" ?>
</body>

<script>
	$(document).ready(function()
		{
			$("#noSubmit").click(function()
				{
					let count=0;
					count+=validateName('name','invalid-input-name','Name');
					count+=validateEmail('email','invalid-input-email','E-mail');
					count+=validateText('subject','invalid-input-subject','Subject');
					count+=validateText('message','invalid-input-message','Message');
					if(count==4)
					{
						$("form").submit();
					}
				});
		});

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
			
			function validateText(idInput,idError,show)
			{
				let text=$('#'+idInput).val();
				if(text==""){$('#'+idError).text(show+' cannot be empty.');return 0;}
				else{$('#'+idError).text('');return 1;}
			}

</script>
	