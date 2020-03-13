<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php'); ?>


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

 	<p>YOUR ORDER IS SUBMITTED FOR PROCESSING</p>

<?php require_once('layout/footer.php') ?>