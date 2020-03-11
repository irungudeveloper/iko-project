<?php 

	require_once('config/cart_class.php');

	$cart = new Cart;

	$data = $cart->displayCart();

	

 ?>