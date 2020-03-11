<?php 

	require_once('../config/product_class.php');
	require_once('../config/category_class.php');

	$category = new Category;
	$product = new Product;

	$category_data = $category->displayCategory();

	if (isset($_GET['edit'])) 
	{
		
		$id = $_GET['id'];
		$data = $product->editProduct($id);

	}

 ?>

 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

	<?php foreach ($data as $product) { ?>

		<form method="POST" action="product_update.php">

			<input type="hidden" name="id" value="<?php echo $product->id ?>">
			
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $product->title?>">

			<br>

			<label>Price</label>
			<input type="number" name="price" value="<?php echo $product->price ?>">

			<br>

			<label>Stock</label>
			<input type="number" name="stock" value="<?php echo $product->stock ?>">

			<br>

			<label>Location</label>
			<input type="text" name="location" value="<?php echo $product->location ?>">

			<br>

			<select name="cat_id">
				
				<?php foreach ($category_data as $category) { ?>
					
					<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>

				<?php } ?>

			</select>

			<br>

			<input type="submit" name="update" value="Update Product">

		</form>

	<?php } ?>


</div>