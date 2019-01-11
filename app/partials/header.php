<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  	<a class="navbar-brand" href="../../index.php">MYSTORE</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sandbox-navbar" aria-controls="sandbox-navbar" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="sandbox-navbar">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link <?php if($section == "home") {echo " active";} ?>" href="../views/home.php?section=home">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link <?php if($section == "catalog") {echo " active";} ?>" href="../views/catalog.php?section=catalog">Catalog</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link <?php if($section == "cart") {echo " active";} ?>" href="#">Cart <span class="badge bg-light text-dark" id="cart-count">
	        0</span></a>
	      </li>
	      <?php if (isset($_SESSION["user"])){?>
	      <li class="nav-item dropdown">
	      	<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"> Hi <?php echo $_SESSION["user"];?>!</a>
	      	<div class="dropdown-menu">
	      		<a href="../controllers/logout.php" class="dropdown-item"> Logout</a>
	      	</div>
	      </li>	
	      <?php } else{?>
	      	
	      <li class="nav-item align">
	        <a class="nav-link <?php if($section == "login") {echo " active";} ?>" href="../views/login.php?section=login">💁Login</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link <?php if($section == "register") {echo "active";} ?>" href="./register.php?section=register">Register</a>
	      </li>
	  <?php }?>
	    </ul>
	  </div>
  </div>
</nav>