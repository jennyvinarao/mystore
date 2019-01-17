<?php 
	$pageTitle = "Items";
	session_start();

require_once '../partials/template.php';
?>

<?php function get_page_content() { 
	global $conn;	

	if (isset($_SESSION['user']) && $_SESSION['user_i']['roles_id'] ==1) { ?>

		<div class="container m-3">
			<h4  class="text-center">User Admin Page</h4>
			<div class="row">
				<div class="table-responsive sm-8 offset-sm-2">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>

								<th>Username</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
								$get_user_detail_query = "SELECT u.id, u.username, u.firstname, u.lastname, u.email, r.name AS role FROM users u JOIN roles r ON(u.roles_id = r.id)";
								$user_details = mysqli_query($conn, $get_user_detail_query);

								foreach ($user_details as $indiv_user) { ?>
									<tr>
										<td><?php echo $indiv_user['username'] ?></td>
										<td><?php echo $indiv_user['firstname'] ?></td>
										<td><?php echo $indiv_user['lastname'] ?></td>
										<td><?php echo $indiv_user['email'] ?></td>
										<td><?php echo $indiv_user['role'] ?></td>
										<td>
											<?php
											$id = $indiv_user['id'];
											if ($indiv_user['role'] == 'admin') {
												echo "<a href= '../controllers/grant_admin.php?id=$id'class ='btn btn-danger btn-block'> Revoke Admin </a>";											
												}else {
													echo "<a href= '../controllers/grant_admin.php?id=$id'class ='btn btn-success btn-block'>Make Admin </a>";		
												}	
											?>
										</td>
										
									</tr>
	
								<?php } ?>
						</tbody>
						
					</table>
					
				</div>
				
			</div>
		</div>




	<?php } else {
		header("Location: ./error.php");
	}
	?>




<?php }?>