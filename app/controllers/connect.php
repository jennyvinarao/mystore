<?php

$host ="db4free.net";
$username = "jenvinarao";
$password = "ak0jenny1612";
$dbname = "mystoredb";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection failed:' . mysqli_error($conn));
}

// echo 'connected successfully';

?>