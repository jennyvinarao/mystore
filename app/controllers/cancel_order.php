<?php

require_once './connect.php';

$id = $_GET['id'];

$update_status_query = "SELECT status_id FROM orders WHERE id ='$id';";

$order_to_edit = mysqli_query($conn, $update_status_query);

$order = mysqli_fetch_assoc($order_to_edit);

if($order['status_id'] == 1) {
	$update_status_query = "UPDATE orders SET status_id = 3 WHERE id='$id';"; 
}else {
	$update_status_query = "UPDATE orders SET status_id = 1 WHERE id='$id';";
}

$result = mysqli_query($conn, $update_status_query);
if(!$result) {
	echo mysqli_error($conn);
}

header("Location: ../views/orders.php");
 ?>	


?>