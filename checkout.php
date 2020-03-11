<?php 

	
	require_once('config/cart_class.php');
	require_once('config/order_class.php');

	$order = new Order;
	$cart = new Cart;

	if (isset($_POST['checkout'])) 
	{
	
		$order->insertOrder();	
		$cart->delete();

	}

	

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>IKO | HOME</title>
 </head>
 <body>

 	<p>YOUR ORDER IS SUBMITTED FOR PROCESSING</p>
 
 </body>
 </html>