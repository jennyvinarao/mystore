<?php

session_start();

	function getCartCount() {
		return array_sum($_SESSION['cart']);
	}



$item_id = $_POST['item_id'];
$item_quantity = $_POST['item_quantity'];

if ($item_quantity == "0") {
	unset($_SESSION['cart'][$item_id]);
} else {
	if (isset($_SESSION['cart'][$item_id])) {
		$update_flag = $_POST['update_from_cart_page'];
		if ($update_flag == 0) {
			//add the item_quantity as the new value
			$_SESSION['cart'][$item_id] += $item_quantity;
			
		}else {
	
		$_SESSION['cart'][$item_id] = $item_quantity;
		}

	}else {
	
		$_SESSION['cart'][$item_id] = $item_quantity;
	}
} 



echo getCartCount();

?>