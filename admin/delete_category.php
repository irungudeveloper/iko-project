<?php 

	require_once('../config/category_class.php');

	$object = new Category;

	if (isset($_POST['delete'])) 
	{
	
		$id = $_POST['id'];

		try 
		{
		
			$object->deleteCategory($id);
			header('Location:category.php');

		} 
		catch (Exception $e) 
		{
			
			return false;

		}

	}

 ?>