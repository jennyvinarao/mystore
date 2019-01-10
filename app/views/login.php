<?php 
	$pageTitle = "Login";
	session_start();
?>
<?php 

require_once '../partials/template.php';

?>

<?php function get_page_content() { ?>

<?php require_once("../partials/header.php");?>
<?php require_once("../controllers/connect.php");?>
	

<div class="container py-5">
	<section class="row justify-content-center">
		<?php if (isset($_SESSION["user"])){?>
			<div class="col">
				<h1> Welcome <?php echo $_SESSION["user"];?>! 🚀 </h1>
				<p>Start your first purchase now! <a href="./catalog.php">ORDER NOW!</a> </p>
				
			</div>
			<?php } elseif (isset($_SESSION["error_message"])){?>
			<div class="col">
				<h1> <?php echo $_SESSION["error_message"];?> </h1>
				<a href="./login.php">Back to Login</a></p>
				<?php session_unset();?>
				
			</div>
			<?php }else {?>
				<div class="col-md-6">
					<form method="POST" action="../controllers/authenticate.php">

						<h2>Login 💁</h2>
							<div class="form-group">
								<label for="username"> Username: </label>
								<input id="username" type="text" name="username" class="form-control">
								<span> </span>
							</div>

							<div class="form-group">
								<label for="password">Password:</label>
								<input id="password" type="password" name="password" class="form-control">
								<span> </span>
							</div>
							<button type="submit" class="btn btn-block btn-success">Login </button>
					</form>
				</div>
		<?php }?>	
	</section>
	
</div>


<?php require_once("../partials/footer.php")?>


<?php }?>