<?php 
	
	require_once('../config/product_class.php');
	require_once ('../config/category_class.php');

	$product = new Product;
	$category = new Category;

	$data = $category->displayCategory();

	$target_dir = "../images/";

	if (isset($_POST['submit'])) 
	{
		$title = $_POST['title'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$location = $_POST['location'];
		$cat_id = $_POST['cat_id'];
		$description = $_POST['description'];

		$img1 = $_FILES["image1"]["name"];
		$img2 = $_FILES["image2"]["name"];
		$img3 = $_FILES["image3"]["name"];

		$target_file_1 = $target_dir.basename($_FILES["image1"]["name"]);
		$target_file_2 = $target_dir.basename($_FILES["image2"]["name"]);
		$target_file_3 = $target_dir.basename($_FILES["image3"]["name"]);

		move_uploaded_file($_FILES["image1"]["tmp_name"], $target_dir.$img1);
		move_uploaded_file($_FILES["image2"]["tmp_name"], $target_dir.$img2);
		move_uploaded_file($_FILES["image3"]["tmp_name"], $target_dir.$img3);
		
		$product->insertProduct($title,$price,$stock,$location,$cat_id,$img1,$img2,$img3,$description);

		header('Location:index.php');

	}	

 ?>

 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<div class="col-md-9 col-sm-12">

 		

 		<div class="row justify-content-end">
 			<p class="display-5 text-primary pt-4"><span><b>+</b></span> New Product</p>
 		</div>
 			
 		<form action="product_insert.php" method="post" enctype="multipart/form-data">

 			<div class="form-row">

 				<div class="form-group col-md-12">
 					
 					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" id="title">

 				</div>
 				
 			</div>

 			<div class="form-row">
 				
 				<div class="form-group col-md-6">
 					
 					<label for="stock">Stock</label>
					<input type="number" name="stock" class="form-control" id="stock">

 				</div>

 				<div class="form-group col-md-6">
 						
					<label for="price">Price</label>
					<input type="number" name="price" class="form-control" id="price">


 				</div>

 			</div>

 			<p>Insert Product Images</p>

 			<div class="form-row">
 				
 				<div class="form-group col-md-4">
 					
 					<input class="form-control" type="file" name="image1">

 				</div>

 				<div class="form-group col-md-4">
 					
 					<input type="file" name="image2" class="form-control" />

 				</div>

 				<div class="form-group col-md-4">
 					
 					<input type="file" name="image3" class="form-control" />

 				</div>

 			</div>

 			<div class="form-row">
 				
 				<div class="form-group col-md-6">

 					<label for="location">Location</label>
					<input type="text" name="location" class="form-control" id="location">
 					
 				</div>

 				<div class="form-group col-md-6">

 					<label for="category">Category</label>
 					<select name="cat_id" id="category" class="form-control">

					<?php foreach ($data as $category) { ?>
					
						<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>

					<?php } ?>
					
					</select>
 					
 				</div>

 			</div>

 			<div class="form-row">

 				<div class="form-group">

			    <label for="exampleFormControlTextarea1">Product Description</label>
		   		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="150" name="description"></textarea>

			 </div>
 				
 			</div>

			<div class="form-row">

				<div class="form-group col-md-12">

					<input type="submit" name="submit" value="Insert Product" class="btn btn-success p-1 pl-5 pr-5">
					
				</div>
				
			</div>


	

		

	</form>

 		</div>
 		
 	</div>

</div>

	<?php require_once('layout/footer.php'); ?>