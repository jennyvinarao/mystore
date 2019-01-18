<?php 
	$pageTitle = "Checkout";
	session_start();
	
?>


<?php 

require_once '../partials/template.php';

?>

<?php function get_page_content() { 
	global $conn;
?>
	<?php if (isset($_SESSION['user']) && ($_SESSION['user_i']['roles_id'] == 2)) { ?>
		<?php
			if (!isset($_SESSION['user'])) {
				header("location: ./login.php");
			}

		?>
		<div class="container m-3">
			<h1 class="text-center"> Checkout Page</h1>

			<form method="POST" action="../controllers/placeorder.php">
				<div class="container mt-4">
					<div class="row">
						<div class="col-8 form-group row">
							<h5 class="col-form-label">Shipping Address:</h5>
						<div class="form-group ml-3">
							<input type="text" class="form-control" name="addressLine1" value= "<?php echo $_SESSION['user_i']['address'];?>">
						</div>				
						</div>
						<div class="col-8 form-group row">
				 			<h4 class="col-form-label">Payment Methods</h4>
				 			<div class="form-group ml-3">
				 				<select name="payment_mode" id="payment_mode" class="form-control">
				 					<?php 
				 					$payment_mode_query = "SELECT * FROM payment_modes";
				 					$payment_modes = mysqli_query($conn, $payment_mode_query);
				 					foreach ($payment_modes as $payment_mode) {
				 						extract($payment_mode);
				 						echo "<option value='$id'>$name</option>";
				 					}
				 					 ?>
				 				</select>
				 				</div>
		 				</div> <!-- payment methods -->
					</div>	

						<h4 class="text-center">Order Summary</h4>
						<div class="row">
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
						<hr>
						<button type="submit" class="btn btn-primary btn-block" >Place Order Now</button>
						<div class="row cart-items mt-4">
							<div class="table-responsive">
								<table class="table table-striped table-bordered" id="cart-items">
									<thead>
										<tr class="text-center"> 
											<th colspan="2">Item Name</th>
											<th>Item Price</th>
											<th>Item Quantity</th>
											<th>Item Subtotal</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach ($_SESSION['cart'] as $id => $qty){
											$sql = "SELECT * FROM items WHERE id = $id";

											$result = mysqli_query($conn, $sql);
											$item = mysqli_fetch_assoc($result);
										
										?>
										<tr>
										<td colspan="2"><?php echo $item['name'];?></td>
										<td> <?php echo $item['price'];?></td>
										<td> <?php echo $qty;?></td>
										<td> <?php echo $qty * $item['price'];?></td>
										</tr>

									</tbody>
									<?php }?>
								</table>
								
							</div>
							
						</div>

				</div>
				

			</form>

		</div>
	<?php } else {
		header("Location: ./error.php");
	}
	?>



<?php }?>