<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php') ?>

<?php 

	require_once('config/product_class.php');

	$product = new Product;

	if (isset($_POST['category_id'])) 
	{
		echo "Success";
		exit();
	}

 ?>
	
<?php require_once('layout/footer.php') ?>