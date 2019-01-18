<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  	<a class="navbar-brand" href="../views/home.php">MYSTORE</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sandbox-navbar" aria-controls="sandbox-navbar" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="sandbox-navbar">
	    <ul class="navbar-nav mr-auto">
	   	<?php if (!isset($_SESSION['user_i']['username']) or ($_SESSION['user_i']['roles_id'] == 2)) { ?>
	     	<li class="nav-item">
	        	<a class="nav-link <?php if($section == "home") {echo " active";} ?>" href="../views/home.php?section=home">Home</a>
	     	</li>
	     	<li class="nav-item">
	        	<a class="nav-link <?php if($section == "catalog") {echo " active";} ?>" href="../views/catalog.php?section=catalog">Catalog</a>
	     	</li>
	     	<li class="nav-item">
	        	<a class="nav-link <?php if($section == "cart") {echo " active";} ?>" href="../views/cart.php?section=cart">	Cart <span class="badge bg-light text-dark" id="cart-count">
	        		<?php
							if (isset($_SESSION['cart'])) {
								echo array_sum($_SESSION['cart']);
							} else {
								echo 0;
							}
					?>
	        </span></a>
	     </li>
	     <?php } else if ((isset($_SESSION["user"])) && ($_SESSION['user_i']['roles_id'] == 1)) { ?>
		      	<li class="nav-item">
		        <a class="nav-link <?php if($section == "items") {echo " active";} ?>" href="../views/items.php?section=items">Items</a>
		      	</li>
		      	<li class="nav-item">
		        <a class="nav-link <?php if($section == "users") {echo " active";} ?>" href="../views/users.php?section=users">Users</a>
		      	</li>
		      	<li class="nav-item">
		        <a class="nav-link <?php if($section == "orders") {echo " active";} ?>" href="../views/orders.php?section=orders">Orders</a>
		      	</li>
	  	<?php } ?>

	      <?php if (isset($_SESSION["user_i"]['username'])){?>
	      <li class="nav-item dropdown">
	      	<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"> Hi <?php echo $_SESSION["user_i"]['firstname'];?>!</a>
	      		<div class="dropdown-menu">
	      			<?php if (isset($_SESSION['user']) && ($_SESSION['user_i']['roles_id'] == 1)) { ?>
	      				<a href="../controllers/logout.php" class="dropdown-item"> Logout</a>
	      			<?php } else if ((isset($_SESSION["user"])) && ($_SESSION['user_i']['roles_id'] == 2)) { ?>
	      				<a href="../views/profile.php?section=profile" class="dropdown-item"> Profile</a>
	      				<a href="../controllers/logout.php" class="dropdown-item"> Logout</a>
	      			<?php } ?>
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