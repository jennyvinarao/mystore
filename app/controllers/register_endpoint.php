<?php

require_once './connect.php';
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = sha1($_POST ['password']);

$sql = "INSERT INTO users(firstname,lastname,email,address,username,password) VALUES ('$firstname','$lastname','$email','$address','$username','$password')";

$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	$_SESSION["user"] = $username;
	header("Location: ../views/register.php");
} else {
	echo 'error' . $sql . "<br>" . mysqli_error($conn);
}



?>