<?php 
	$pageTitle = "Catalog";
	session_start();
	
?>


<?php 

require_once '../partials/template.php';

?>

<?php function get_page_content() { 
	global $conn;
?>

	<?php
		if (!isset($_SESSION['user'])) {
			header("location: ./login.php");
		}

	?>

	<h1> Hello! Welcome to your checkout page!</h1>

	<form method="POST" action="../controllers/placeorder.php">
		<div class="container mt-4">
			<div class="row">
				<div class="col-8">
					<h5>Shipping Address</h5>
				<div class="form-group">
					<input type="text" class="form-control" name="addressLine1" value= "<?php echo $_SESSION['users']['address'];?>">
				</div>				
				</div>
			</div>
				<div class="row">
					<h4>Order Summary</h4>
						<div class="col-sm-6">
							<p> Total </p>
							
						</div>
						<div class="col-sm-6" id="total_price">
							<?php
								$cart_total = 0;
							
								foreach ($_SESSION['cart'] as $id => $qty) {
									$sql = "SELECT * FROM items WHERE id = $id";
									$result = mysqli_query($conn, $sql);
									$item = mysqli_fetch_assoc($result);

									$subTotal = $_SESSION['cart'][$id] * $item['price'];

									$cart_total += $subTotal;
								}
								echo $cart_total;

							?>
							
						</div>
				</div>

		</div>
		

	</form>




<?php }?>