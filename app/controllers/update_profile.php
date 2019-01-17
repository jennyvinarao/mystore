<?php

require_once './connect.php';
session_start();

$id = $_POST['user_id'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$email = $_POST['email'];

$sql_update = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', address = '$address' WHERE id ='$id'";

mysqli_query($conn, $sql_update);

$sql_new_query = "SELECT * FROM users WHERE id= '$id'";

$result = mysqli_query($conn, $sql_new_query);

$_SESSION['user_i'] = mysqli_fetch_assoc($result);

header("Location: ../views/profile.php?section=prof");



?>