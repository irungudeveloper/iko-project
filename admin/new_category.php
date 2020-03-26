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

 	<div class="col-md-10">
 		
 		<div class="row bg-white m-2 p-3">
 			<p class="text-danger display-4">Add New Category</p>
 			<form action="new_category.php" method="post" class="form ">

 		<div class="form-row">

 			<div class="form-group col-md-12">
	 			<label for="category">Category Name</label>
	 			<input type="text" name="category" placeholder="Category Name" class="form-control" id="category">
 			</div>
 		
 		</div>
 		
 		<div class="form-row">
 			<div class="form-group col-md-12">
 				<label for="description">Description</label>
 				<textarea rows="3" cols="150" name="description" placeholder="Category description" class="form-control"></textarea>
 			</div>
 		</div>
 			
 		

 		<input type="submit" name="submit" value="CREATE CATEGORY" class="btn btn-success">

 	</form>
 		</div>

 	</div>
 
 	

 </div>
 
