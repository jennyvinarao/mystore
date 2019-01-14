<?php 
	$pageTitle = "Catalog";
	session_start();
	
?>


<?php require_once '../partials/template.php';?>



<?php function get_page_content() {?>
<?php require_once '../controllers/connect.php';
	global $conn;
?>
<div class="container py-5 m-3">
	<div class="row">
		<!-- categories -->
		<div class="col-sm-2">
			<!-- display categories -->
			<h2>Categories</h2>
			<ul class="list-group">
				<a href="catalog.php">
					<li class="list-group-item"> All </li>
				</a>

				<?php 
					$sql = "SELECT * FROM categories";
					$categories = mysqli_query($conn,$sql);
					foreach ($categories as $category) { ?>
						<a href="catalog.php?category_id=<?php echo $category['id'] ; ?>">
							<li class="list-group-item">
								<?php echo $category['name']; ?>
							</li>
						</a>
					<?php }	 ?>
			</ul>
			<h2>Sort by:</h2>
			<ul class="list-group border">
				<a href="../controllers/sort.php?sort=asc">
					<li class="list-group-item"> Price: Lowest to Highest </li>
				</a>
				<a href="../controllers/sort.php?sort=desc">
					<li class="list-group-item"> Price: Highest to Lowest </li>
				</a>

			</ul>
	

		</div> <!-- end categories -->
		
		<!-- items -->
		<div class="col-sm-10">
			<div class="container">
				
				<?php 
					$sql2 = "SELECT * FROM items";

					// filter via category
					if(isset($_GET['category_id'])) {
						$sql2 .=" WHERE category_id =".$_GET['category_id'];
					}

					if(isset($_SESSION['sort'])) {
						$sql2 .= $_SESSION['sort'];
					}				

					$items = mysqli_query($conn, $sql2);

					echo "<div class='row'>";

					foreach ($items as $item) { ?>
						<div class="col-sm-3 ">
							<div class="card h-100">
								<img class="card-img-top h-25 w-100" src="<?php echo $item['img_path']; ?>">
								<div class="card-body">
									<h5 class="card-title">
										<b><?php echo $item['name']; ?></b>
									</h5>
									<p class="card-text display-6">
										<?php echo $item['description']; ?>
										<br>
										<i>Php <?php echo $item['price']; ?></i>
									</p>
								</div>
									<div class="card-footer">
									<input type="number" class="form-control mb-2" value="1" min="0">
									<button class="btn btn-block btn-outline-primary add-to-cart" data-id="<?php echo $item['id']; ?>">Add to Cart</button>
									</div>
							</div> <!-- end card -->
						</div> <!-- end item col -->
					<?php } echo "</div>" ; ?> <!-- end of items row -->	
					<div class="container py-2 text-right">
					<a href="./cart.php" class="btn btn-success">Go to Cart</a>	
					</div>
			</div> <!-- end items container -->
		</div> <!-- end items -->
	</div> <!-- end row -->



</div> <!-- end container -->





<?php }  ?>
