<?php 

	require_once('config/cart_class.php');

	$cart = new Cart;

	if (isset($_POST['cart'])) 
	{

		$title = $_POST['title'];
		$price = $_POST['price'];
		$amount = $_POST['amount'];

		$cart->insertCart($title, $price, $amount);

		header('Location:index.php');
	
	}

 ?>