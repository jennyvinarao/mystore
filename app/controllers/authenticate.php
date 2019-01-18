<?php
	session_start();

	require_once './connect.php';

	$username =$_POST['username'];
	$password =$_POST['password'];


	$sql = "SELECT * FROM users WHERE username = '$username'";

	$result = mysqli_query($conn,$sql);
	$user_info = mysqli_fetch_assoc($result);
	// var_export($user_info); 
	// var_export($user_info['password']);

	// var_export(password_hash($password, PASSWORD_BCRYPT));

	// if (!password_hash($password, $user_info['password']) {
		
	// 	//$_SESSION['error_message'] = "Login Failed: Incorrect Username or Password";

	// } else
	if(!password_verify($password, $user_info['password']) == true) {
		// die("login_failed");
		$_SESSION['error_message'] = "Login Failed: Incorrect Username or Password";
	} else {
		$_SESSION['user_i'] = $user_info;
		$_SESSION['user'] = $username;
	}

	// // AND password = '$password' 

	// if(mysqli_num_rows($result) > 0){
	// 	$_SESSION['user_i'] = $user_info;
	// 	$_SESSION['user'] = $username;
	// } else {
	// 	$_SESSION['error_message'] = "Login Failed: Incorrect Username or Password";
	// }
	header('Location: ../views/login.php');



?>