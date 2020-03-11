<?php 


	require_once('../config/product_class.php');

	$product = new Product;

	if (isset($_GET['delete'])) 
	{
	
		$id = $_GET['id'];

		$product->deleteProduct($id);

		header('Location:index.php');

	}

 ?>