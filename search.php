
<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php'); ?>

<?php 
	
	require_once('config/product_class.php');
	$object = new Product;

	if (isset($_POST['search_btn'])) 
	{
			
		$search_data = $_POST['search'];

		$search = $object->searchProduct($search_data);

		if ($search != null)
		{
			
 ?>

 <div class="col-md-10">

 	<div class="row p-2 bg-white m-2">

 		<div class="col-md-12 col-12">
 			<p class="text-danger display-5">Searching For <span class="badge-secondary bg-info pl-3 pr-3 rounded-pill"><?php echo $search_data ?></span></p>
 		</div>

 		<?php foreach ($search as $product) { ?>
 			
 			<div class="col-md-3 col-sm-6">
 			<div class="card mt-2">
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

 		<?php }}else { ?> <p class="text-center text-danger">Invalid Search</p> <?php } } else{echo "Search For Product First";} ?>

 		
 		
 	</div>
 	
 </div>

 <?php require_once('layout/footer.php') ?>