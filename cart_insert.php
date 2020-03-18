<?php 

	require_once('config/cart_class.php');

	$cart = new Cart;

	if (isset($_POST['cart'])) 
	{

		$title = $_POST['title'];
		$price = $_POST['price'];
		$amount = $_POST['amount'];
		$u_id = $_POST['u_id'];
		$p_id = $_POST['p_id'];
		$sess_id = $_POST['sess_id'];

		$cart->insertCart($title, $price, $amount, $u_id, $p_id, $sess_id);

		header('Location:index.php');
	
	}

 ?>