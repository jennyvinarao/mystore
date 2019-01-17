<?php 
	$pageTitle = "Items";
	session_start();

require_once '../partials/template.php';
	
?>

<?php function get_page_content() { 
	global $conn;
?>

	<?php 
	$item_id = $_GET['id'];
	$sql = "SELECT * FROM items WHERE id= $item_id";
	$result = mysqli_query($conn,$sql);
	$item = mysqli_fetch_assoc($result);
	//var_dump(item);
	?>
	<div class="container">
		<div class="col-sm-8 offset  offset-sm-2">
			<h3>Delete Item?</h3>
						<form id="process_edit_item" action="../controllers/delete.php" method="POST">
							<div class="form-group">
								<label for="name" required>Name:</label>
								<input type="text" class="form-control col-8" name="name" value="<?php echo $item['name']; ?>">
							</div>
							<div class="form-group">
								<label for="price">Price:</label>
								<input type="text" class="form-control col-8" name="price" value="<?php echo $item['price']; ?>" required>
							</div>
							<div class="form-group">
								<label for="description">Description:</label>
								<textarea type="text" class="form-control col-8" name="description" rows="5" required"><?php echo $item['description'];?></textarea>
							</div>
							<div class="form-group">
								<label for="category">Categories:</label>
								<select class="form-control col-8" name="category_id" id="category" required>
									<?php 
										$sql = "SELECT * FROM categories";
										$categories = mysqli_query($conn, $sql);
										foreach ($categories as $category) {
											extract($category);

											//termary operator
											$selected = $item['category_id'] == $id ? 'selected': '';
											echo "<option value='$id' $selected>$name</option>"; 
										}
									?>
								</select>
							</div>

							<input type="hidden" name="id" value="<?php echo $item['id']?>">
							<button type="submit" class="btn btn-primary">Delete</button>
						</form>
		</div>
		
	</div>


<?php }?>