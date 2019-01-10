<?php 
	$pageTitle = "Register";
	session_start();
?>
<?php 

require_once '../partials/template.php';

?>

<?php function get_page_content() { ?>

<?php require_once '../partials/header.php';?>
<?php require_once '../controllers/connect.php';?>
	

<div class="container py-5">
	<section class="row justify-content-center">
		<?php if (isset($_SESSION["user"])){?>
			<div class="col">
				<h1> Welcome <?php echo $_SESSION["user"];?>! 🚀 </h1>
				
			</div>
			<?php } else{ ?>
		<div class="col-md-6">
			<form id="register_form" action="../controllers/register_endpoint.php" method="POST">
				<h2>Register 💁</h2>
		 <!-- method="POST" action="../controllers/authenticate.php"		       -->
		 				<div class="form-group">
							<label for="firstname"> Firstname: </label>
							<input id="firstname" type="text" name="firstname" class="form-control" >
							<span> </span>
						</div>
						<div class="form-group">
							<label for="lastname"> Lastname: </label>
							<input id="lastname" type="text" name="lastname" class="form-control" >
							<span> </span>
						</div>
						<div class="form-group">
							<label for="email"> Email: </label>
							<input id="email" type="text" name="email" class="form-control" >
							<span> </span>
						</div>
						<div class="form-group">
							<label for="address"> Address: </label>
							<input id="address" type="text" name="address" class="form-control" >
							<span> </span>
						</div>

						<div class="form-group">
							<label for="username"> Username: </label>
							<input id="username" type="text" name="username" class="form-control" >
							<span> </span>
						</div>

						<div class="form-group">
							<label for="password">Password:</label>
							<input id="password" type="password" name="password" class="form-control">
							<span></span>

						</div>
						<div class="form-group">
							<label for="password">Confirm Password:</label>
							<input id="conpass" type="password" name="conpass" class="form-control">
							<span></span>

						</div>



						<button type="button" id="regBtn" class="btn btn-block btn-success">Register</button>
			</form>
		</div>
		<?php }?>
	</section>
	
</div>


<script>
	$('#regBtn').click(function(){

		//put validation here
		let errorFlag = false;
		//firstname & lastname field is empty
		// const firstname = $('#firstname').val();

		// if (firstname == 0) {
		// 	$('#firstname').next().css('color','red');
		// 	$('#firstname').next().html('This field is required');
		// 	errorFlag = true;
		// }else {
		// 	$.ajax({
		// 		method: 'POST',
		// 		url:'../controllers/check_username.php',
		// 		data: {firstname: firstname},
		// 		async: false
		// 	}).done(data => {
		// 		console.log(data);
		// 		if(data == "exists") {
		// 			$('#firstname').next().css('color','red');
		// 			$('#firstname').next().html('username is already taken');
		// 			errorFlag = true;
		// 		}else {
		// 			$('#firstname').next().css('color','red');
		// 			$('#firstname').next().html('username is available');
		// 		}
		// 	});
		const username = $('#username').val();

		//username field is empty
		if (username == 0) {
			$('#username').next().css('color','red');
			$('#username').next().html('This field is required');
			errorFlag = true;
		}else {
			$.ajax({
				method: 'POST',
				url:'../controllers/check_username.php',
				data: {username: username},
				async: false
			}).done(data => {
				console.log(data);
				if(data == "exists") {
					$('#username').next().css('color','red');
					$('#username').next().html('username is already taken');
					errorFlag = true;
				}else {
					$('#username').next().css('color','red');
					$('#username').next().html('username is available');
				}
			});
			//password validation
			const password = $('#password').val();
			const confirmPassword = $('#conpass').val();

			if (password.length == 0) {
				$('#password').next().css('color','red');
				$('#password').next().html('this field is required');
				errorFlag = true;
			}else {
				$('#password').next().html('');//removes error message
				if (password !== confirmPassword) {
					$('#conpass').next().css('color','red');
					$('#conpass').next().html('passwords did not match');
					errorFlag = true;

				}
			}
		}

	if (errorFlag == false) {
		$('#register_form').submit();
	}
	});

</script>


<?php require_once("../partials/footer.php");?>



<?php }?>