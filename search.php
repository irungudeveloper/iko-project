
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

 	<div class="row p-2">

 		<?php foreach ($search as $product) { ?>
 			
 			<div class="card m-2" style="width:1200px;">

					<div class="row no-gutters">
						
						<div class="col-md-4">
							
							<img src="images/<?php echo $product->image1 ?>" class="d-block w-100" height="200px" width="200px">	
						
						</div>

						<div class="col-md-8">

							<div class="card-body">
								
								<h5 class="card-title"><b class="mb-3">Title</b> <br><?php echo $product->title ?></h5>

								<p><b>Description</b> <br>
									<?php echo $product->description ?>
								</p>
								<p class="card-text">Price : <?php echo $product->price ?>/=</p>

								<div class="form-row">

									<form method="GET" action="product_view.php">

									<input type="hidden" name="id" value="<?php echo $product->id ?>">

									<input type="submit" name="view" value="VIEW PRODUCT" class="btn btn-success p-1 pl-3 pr-3 m-2">
									
								</form>

							</div>
							
						</div>

					</div>
					
		</div>
	</div>

 		<?php }}else { ?> <p class="text-center text-danger">Invalid Search</p> <?php } } else{echo "Search For Product First";} ?>

 		
 		
 	</div>
 	
 </div>

 <?php require_once('layout/footer.php') ?>