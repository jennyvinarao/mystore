<?php

require_once './connect.php';
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = password_hash($_POST ['password']), PASSWORD_BCRYPT;

$sql = "INSERT INTO users(firstname,lastname,email,address,username,password) VALUES ('$firstname','$lastname','$email','$address','$username','$password')";

$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	$_SESSION["user"] = $username;
	header("Location: ../views/register.php");
} else {
	echo 'error' . $sql . "<br>" . mysqli_error($conn);
}

// if(mysqli_num_rows($result) > 0) {
// 		die("user_exists");
// 	} else {
// 		$sql_insert = "INSERT INTO users(username, password, firstname, lastname, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$address'); ";
// 		$result = mysqli_query($conn, $sql_insert);		
// 	}


mysqli_close($conn);




?>