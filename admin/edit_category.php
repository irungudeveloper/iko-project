<?php 

	require_once('../config/category_class.php');

	$category = new Category;

	if (isset($_POST['edit'])) 
	{
	
		$id = $_POST['id'];

		$data = $category->editCategory($id);

	}

 ?>

 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<form action="update_category.php" method="post">
 		
 		<?php foreach ($data as $category) { ?>

 			<div class="form-row">

 				<div class="form-group col-md-12">
 					
 					<label for="category">Category</label>
 					<input type="text" name="category" value="<?php echo $category->name?>" id="category" class="form-control">

 				</div>
 				
 			</div>

 			<div class="form-row">

 				<div class="form-group col-md-12">
 					
 				<label for="description">Description</label>
 				<textarea name="description" rows="10" cols="30" class="form-control">
 						<?php echo $category->description ?>
 				</textarea>

 				</div>
 				
 			</div>
 			
 			<input type="hidden" name="id" value="<?php echo $category->id ?>">
 			
 			

 			<input type="submit" name="submit" value="UPDATE">

 		<?php } ?>

 	</form>
 
 	</div>