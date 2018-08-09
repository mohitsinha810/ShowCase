<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="index.php">ShowCase</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
	 <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav mr-auto">
	    </ul>
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="index.php#ourcollection">Paintings</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Categories
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	        	<div class="row">
	        		<div class="col">
			          <a class="dropdown-item" href="category.php?category=Abstract Art">Abstract Art</a>
			          <a class="dropdown-item" href="category.php?category=Landscape">Landscape</a>
			          <a class="dropdown-item" href="category.php?category=Portrait">Portrait</a>
			          <a class="dropdown-item" href="category.php?category=Paintings On Nature">Paintings On Nature</a>
			      	</div>
	      		</div>
	        </div>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Hello <?php echo $_SESSION["seller_name"]; ?>!
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	        	<div class="row">
	        		<div class="col">
			          <a class="dropdown-item" href="myseller.php">My Account</a>
			          <a class="dropdown-item" href="uploadnew.php">Upload Artwork</a>
			          <a class="dropdown-item" href="#">Update Profile </a>
			          <a class="dropdown-item" href="logout.php">Logout</a>
			      	</div>
	      		</div>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i>&nbsp;My Cart<span id="cart-value"></span></a>
	      </li>
	    </ul>
	  </div>
</nav>