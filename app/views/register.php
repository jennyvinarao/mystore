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
		<div class="col-md-12">
			<form id="register_form" action="../controllers/create_user.php" method="POST">
				<h2 class="bg-dark p-3 text-light text-center">Register 💁</h2>
		 				<div class="form-group row">
							<label for="firstname" class="col-sm-2 col-form-label"> First Name: </label>
							<input id="firstname" type="text" name="firstname" class="form-control col-sm-7" placeholder="Enter your first name here" >
							<span class="validation col-sm-3 text-left"> </span>
						</div>
						<div class="form-group row">
							<label for="lastname" class="col-sm-2 col-form-label"> Last Name: </label>
							<input id="lastname" type="text" name="lastname" class="form-control col-sm-7" placeholder="Enter your last name here" >
							<span class="validation col-sm-3 text-left"> </span>
						</div>
						<div class="form-group row">
							<label for="address" class="col-sm-2 col-form-label"> Address: </label>
							<input id="address" type="text" name="address" class="form-control col-sm-7" placeholder="Enter your address here">
							<span class="validation col-sm-3 text-left"> </span>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label"> Email: </label>
							<input id="email" type="email" name="email" class="form-control col-sm-7" placeholder="Enter your email here." >
							<span class="validation col-sm-3 text-left"> </span>
						</div>

						<div class="form-group row">
							<label for="username" class="col-sm-2 col-form-label"> Username: </label>
							<input id="username" type="text" name="username" class="form-control col-sm-7" placeholder="Enter your user name here" >
							<span class="validation col-sm-3 text-left"> </span>
						</div>

						<div class="form-group row">
							<label for="password" class="col-sm-2 col-form-label">Password:</label>
							<input id="password" type="password" name="password" class="form-control col-sm-7" placeholder="Enter your password here">
							<span class="validation col-sm-3 text-left"> </span>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-2 col-form-label">Confirm Password:</label>
							<input id="conpass" type="password" name="conpass" class="form-control col-sm-7" placeholder="Repeat your password here">
							<span class="validation col-sm-3 text-left"> </span>
						</div>


						<button type="button" id="regBtn" class="btn btn-success">Register</button>
						<a href="./login.php" class="btn btn-success">Login</a>
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
		const firstname = $('#firstname').val();
		const lastname = $('#lastname').val();
		const email = $('#email').val();
		const address = $('#address').val();
		const username = $('#username').val();

		if (firstname == 0) {
			$('#firstname').next().css('color','red');
			$('#firstname').next().html('This field is required');
			errorFlag = true;
		}else {
			$('#firstname').next().html(' ');
		}
		if (lastname == 0) {
			$('#lastname').next().css('color','red');
			$('#lastname').next().html('This field is required');
			errorFlag = true;
		}else {
			$('#lastname').next().html(' ');
		}
		if (!email.includes("@")) {
			$('#email').next().css('color','red');
			$('#email').next().html('Valid email required');
			errorFlag = true;
		}else {
			$('#email').next().html(' ');
		}

		if (address == 0) {
			$('#address').next().css('color','red');
			$('#address').next().html('This field is required');
			errorFlag = true;
		}else {
			$('#address').next().html(' ');
		}		


		//username field is empty
		if (username.length < 10) {
			$('#username').next().css('color','red');
			$('#username').next().html("Username should be atleast 10 characters") 
			errorFlag = true;
		}else {
			errorFlag = true;
			$.ajax({
				method: 'POST',
				url:'../controllers/check_username.php',
				data: {username: username},
				async: false
			}).done(data => {
				console.log(data);
				if(data == "exists") {
					$('#username').next().css('color','red');
					$('#username').next().html('Username is already taken');
					errorFlag = true;
				}else {
					$('#username').next().css('color','red');
					$('#username').next().html('Username is available');
				}
			});

		}

			//password validation
			const password = $('#password').val();
			const confirmPassword = $('#conpass').val();

			if (password.length == 0) {
				$('#password').next().css('color','red');
				$('#password').next().html('This field is required');
				errorFlag = true;
			}
			else {
				$('#password').next().html(' ');}

			if (password.length < 8) {
				$('#password').next().css('color','red');
				$('#password').next().html("Please provide a stronger password") 
				errorFlag =true;
			}
			else {
				$('#password').next().html(' ');}

			if (password !== confirmPassword) {
					$('#conpass').next().css('color','red');
					$('#conpass').next().html('Passwords did not match');
					errorFlag = true;

				}
			

	if (errorFlag == false) {
		$('#register_form').submit();
	}
	});

</script>


<?php require_once("../partials/footer.php");?>



<?php }?>