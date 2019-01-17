<?php 
	$pageTitle = "Items";
	session_start();

require_once '../partials/template.php';
	
?>

<?php function get_page_content() { 
	global $conn;
?>
	<?php if (isset($_SESSION['user']) && ($_SESSION['user_i']['roles_id'] == 1)) { ?>
	<div class="container mt-3">
		<div class="row">
			<a href="./new_item.php" class="btn btn-primary">Add new item</a>
		</div>
		
				<div class="row">
				<?php 

				$sql = "SELECT * FROM items";
				$items = mysqli_query($conn, $sql);

				foreach ($items as $item) { ?>
					
						<div class="col-sm-3 mt-1">
							<img class="card-img-top h-25 w-100" src="<?php echo $item['img_path']; ?>">
							<div class="card-body">
								<h4 class="card-title"><?php echo $item['name']; ?></h4>
								<p class="card-text"><?php echo $item['description']; ?></p>
								<p class="card-text">Php <?php echo $item['price']; ?></p>

								<input type="hidden" value="<?php echo $item['id']; ?>">
								
							</div> <!-- end of card body -->

				<div class="card-footer">
					<a href="./edit_item.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Edit item</a>
					<a href="../controllers/delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">Delete Item</a>
						
				</div>
				
			</div> <!-- end of col  -->
				<?php } ?>
			
		</div> <!-- end of row -->
	</div>
<?php } else {
	header("Location: ./error.php");
	}
	?>



<?php }?>