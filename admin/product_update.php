<?php 

	require_once('../config/product_class.php');

	$product = new Product;

	if (isset($_POST['update']))
	{
	
		$id = $_POST['id'];
		$title = $_POST['title'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$location = $_POST['location'];
		$cat_id = $_POST['cat_id'];

		$response = $product->updateProduct($id,$title,$price,$stock,$location,$cat_id);

		header('Location:index.php');

	}

 ?>