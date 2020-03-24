<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php') ?>

<?php 

	require_once('config/product_class.php');

	$product = new Product;

		if (isset($_GET['category_id'])) 
		{
			$data = $_GET['category_id'];
			
			$product_data = $product->productCategoryView($data);

		?>

		<div class="col-md-10">
		<div class="row m-2 bg-white p-2">

 		<div class="col-md-12">
 			<p class="h4 font-weight-bold">Category <span class="badge rounded-pill bg-danger text-white pl-4 pr-4"><?php echo $_GET['category']; ?></span></p>
 		</div>

 		<div class="row m-2">

		<?php foreach ($product_data as $product) { ?>
	

			<div class="col-md-3 col-sm-6">
 			<div class="card mt-2 w-100">
 				<img src="images/<?php echo $product->image1 ?>" class="card-img" alt="" width="900px" height="150px">

 				<div class="card-body">

 					<p class="card-text"><?php echo $product->title ?></p>
 					<p class="card-text">Price <span class="badge badge-danger"><?php echo $product->price ?></span></p>

 				</div>

 					<form method="GET" action="product_view.php" class="text-center">

					<input type="hidden" name="id" value="<?php echo $product->id ?>">

					<input type="submit" name="view" value="VIEW PRODUCT" class="btn btn-success p-1 pl-3 pr-3 m-2">
					
				</form>
 					
 			</div>
 			</div>

 	<?php }} ?>

 </div>
</div>
</div>

<?php require_once('layout/footer.php') ?>