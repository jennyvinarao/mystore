<?php

require_once './connect.php';

$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
	echo "exists";
}else {
	echo 'available';
}

mysqli_close($conn);

?>