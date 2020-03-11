<?php 

	require_once('../config/category_class.php');

	$object = new Category;

	if (isset($_POST['submit'])) 
	{
	
		$id = $_POST['id'];
		$category = $_POST['category'];
		$desc = $_POST['description'];

		try 
		{

			$object-> updateCategory($id,$category,$desc);
			header('Location:category.php');
			
		} 
		catch (Exception $e) 
		{
			return false;
			
		}

	}

 ?>