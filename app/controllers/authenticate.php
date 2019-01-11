<?php
	session_start();

	require_once './connect.php';

	$username =$_POST['username'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";

	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		$_SESSION['user'] = $username;
	} else {
		$_SESSION['error_message'] = "Login Failed: Incorrect Username or Password";
	}
	header('Location: ../views/login.php');


?>