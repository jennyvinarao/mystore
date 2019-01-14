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

	<div class="container my-4">
		<div class="row">
			<h1>Cart Page</h1>
		</div> <!-- end of row -->
		<hr>

		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="text-center">
						<th>Item Name</th>
						<th>Item Price</th>
						<th>Item Quantity</th>
						<th>Item Subtotal</th>
						<th>Actions</th>						
					</tr>
				</thead>
				<tbody>
					<?php
						// var_dump($_SESSION['cart']);
 						if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
 							$cart_total = 0;
 							foreach ($_SESSION['cart'] as $id => $qty) {

 								$sql = "SELECT * FROM items WHERE id= '$id'";

 								$result = mysqli_query($conn, $sql);
 								$item = mysqli_fetch_assoc($result);
 								$subTotal = $_SESSION['cart'][$id] * $item['price'];
 								$cart_total += $subTotal;?>
						<tr>
							<td class="item_name"> <?php echo $item['name'] ?></td>
							<td class="item_price"> <?php echo $item['price'] ?></td>
							<td class="item_quantity"> <input type="number" class="form-control" value="<?php echo $qty ?>" data-id = "<?php echo $id; ?>" min='1'></td>
							<td class="item_subtotal"> <?php echo $subTotal ;?></td>
							<td class="item-action text-center">
								<button class="btn btn-danger item_remove" data-id = "<?php echo $id; ?>">Remove from cart</button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td class="text-right font-weight-bold" colspan="4"> Total</td>
						<td class="text-right font-weight-bold" id="total_price"> <?php echo $cart_total?></td>
					</tr>
					<tr>
						<td class="text-right" colspan="6">
							<a href="./catalog.php" class="btn btn-success align-left">Order More!</a>
							<a href="./checkout.php" class="btn btn-danger align-left">Proceed to Checkout</a>
						</td>
					</tr>
				</tfoot>
				<?php  
					}else {
 						echo '<tr> 

 								<td class="text-center text-danger" colspan="6"> No items in the cart.</td>
 							</tr>';
 						}
 				?>
			</table>
			
		</div>
	</div>


<?php }?>