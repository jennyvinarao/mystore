<?php 
	$pageTitle = "Items";
	session_start();

require_once '../partials/template.php';
	
?>

<?php function get_page_content() { 
?>

<?php if (isset($_SESSION['user']) && ($_SESSION['user_i']['roles_id'] == 1)) {
		global $conn;
 ?>
	<div class="container pt-4">
		<div class="row">
			<div class="col-md-10">
				<h3>Orders Admin Page</h3>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr class="text-center">
						<th>Transaction Code</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
			
						$sql_order = "SELECT o.id, o.transaction_code, o.status_id, s.name AS status FROM orders o JOIN statuses s ON(o.status_id = s.id);";

                            $orders = mysqli_query($conn, $sql_order);
                            foreach($orders as $order) { ?>
                            	<tr>
                              		<td><?php echo $order['transaction_code']; ?></td>
                              		<td><?php echo $order['status']; ?></td>
                              		<td>
                              			<?php if ($order['status'] == "pending") { ?>
                              				<a href="../controllers/complete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-success btn-block"> Complete Order</a>
                              				<a href="../controllers/cancel_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-block"> Cancel Order</a>
                              			<?php } ?>
                              			
                              		</td>
                              	</tr>
                    <?php }?>
				</tbody>
			</table>
		</div>
	</div>
<?php } else {
	header("Location: ./error.php");
	}
?>



<?php }?>