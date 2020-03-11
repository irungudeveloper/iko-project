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
 			
 			<input type="hidden" name="id" value="<?php echo $category->id ?>">
 			<input type="text" name="category" value="<?php echo $category->name?>">
 			<textarea name="description" rows="10" cols="30">
 				<?php echo $category->description ?>
 			</textarea>

 			<input type="submit" name="submit" value="UPDATE">

 		<?php } ?>

 	</form>
 
 	</div>