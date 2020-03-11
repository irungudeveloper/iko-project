<?php 

	require_once('../config/category_class.php');

	$object = new Category;

	if (isset($_POST['submit'])) 
	{
		

		$category = $_POST['category'];
		$desc = $_POST['description'];

		$response = $object->insertCategory($category,$desc);

		var_dump($response);

	}



 ?>

 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>
 
 	<form action="new_category.php" method="post">
 		
 		<input type="text" name="category" placeholder="Category Name">

 		<textarea rows="10" cols="30" name="description" placeholder="Category description">
 			
 		</textarea>

 		<input type="submit" name="submit" value="CREATE CATEGORY">

 	</form>

 </div>
 
