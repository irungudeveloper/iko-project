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

		<div class="col-md-10 p-4">

			<form method="POST" action="product_update.php">

			<input type="hidden" name="id" value="<?php echo $product->id ?>">
			
			<div class="form-row">

				<div class="form-group col-md-12">
					
					<label for="title">Title</label>
					<input type="text" name="title" value="<?php echo $product->title?>" id="title" class="form-control">


				</div>
				
			</div>

			<div class="form-row">

				<div class="form-group col-md-6">
					
					<label for="price">Price</label>
					<input type="number" name="price" value="<?php echo $product->price ?>" id="price" class="form-control">

				</div>

				<div class="form-group col-md-6">
					
						<label for="stock">Stock</label>
						<input type="number" name="stock" value="<?php echo $product->stock ?>" id="stock" class="form-control">

				</div>

			</div>

			<div class="form-row">
				
				<div class="form-group col-md-6">
					
					<label for="location">Location</label>
					<input type="text" name="location" value="<?php echo $product->location ?>" id="location" class="form-control">

				</div>

				<div class="form-group col-md-6">
					
					<label for="select">Choose Category</label>

					<select name="cat_id" class="form-control" id="select">
				
					<?php foreach ($category_data as $category) { ?>
						
						<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>

					<?php } ?>

					</select>

				</div>

			</div>

			<input type="submit" name="update" value="Update Product" class="btn btn-success p-1 pl-3 pr-3">

		</form>

	<?php } ?>
			
		</div>

</div>

<?php require_once('layout/footer.php') ?>