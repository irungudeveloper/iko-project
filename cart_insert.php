<?php 

	require_once('config/cart_class.php');

	$cart = new Cart;

	if (isset($_POST['cart'])) 
	{

		$title = $_POST['title'];
		$price = $_POST['price'];
		$amount = $_POST['amount'];
		$u_id = $_POST['u_id'];

		$cart->insertCart($title, $price, $amount, $u_id);

		header('Location:index.php');
	
	}

 ?>