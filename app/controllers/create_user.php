<?php

require_once './connect.php';
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = 2;


$sql_q = "SELECT * FROM users WHERE username = '$username' ";
	$result_q = mysqli_query($conn, $sql_q);

$sql = "INSERT INTO users (firstname,lastname,email,address,username,password,roles_id) VALUES ('$firstname','$lastname','$email','$address','$username','$password', '$role')";

$result = mysqli_query($conn, $sql);



$user_info = mysqli_fetch_assoc($result_q);

var_dump($result);
if ($result === TRUE) {
	$_SESSION["user"] = $username;
	$_SESSION['user_i'] = $user_info;
	header("Location: ../views/register.php");
} else {
	echo 'error' . $sql . "<br>" . mysqli_error($conn);
}
var_export($_SESSION['user']);

// if(mysqli_num_rows($result) > 0) {
// 		die("user_exists");
// 	} else {
// 		$sql_insert = "INSERT INTO users(username, password, firstname, lastname, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$address'); ";
// 		$result = mysqli_query($conn, $sql_insert);		
// 	}


mysqli_close($conn);




?>