<?php 

	require_once('config/product_class.php');

	$product = new Product;
	$data = $product->displayProduct();

 ?>


 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<div class="col-md-9 col-sm-12">

 		<div class="row">

 			<div class="col-md-12 col-sm-12 d-sm-none d-md-block">

 				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="..." class="d-block w-100" alt="...">
				    </div>
				    <div class="carousel-item">
				      <img src="..." class="d-block w-100" alt="...">
				    </div>
				    <div class="carousel-item">
				      <img src="..." class="d-block w-100" alt="...">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
 				
 			</div>
 			
 		</div>

 		<div class="row">

 		<?php foreach ($data as $product) { ?>

 			<div class="card col-md-3 m-2">
 				<img src="images/<?php echo $product->image1 ?>" class="pt-2 card-img" alt="" width="500px" height="250px">

 				<div class="card-body">

 					<h5 class="card-title"><?php echo $product->title ?></h5>
 					<p class="card-text">Price : <?php echo $product->price ?></p>
 					<p class="card-text">Location : <?php echo $product->location ?></p>

 				</div>

 					<form method="GET" action="product_view.php">

					<input type="hidden" name="id" value="<?php echo $product->id ?>">

					<input type="submit" name="view" value="VIEW PRODUCT" class="btn btn-success p-1 pl-3 pr-3 m-2">
					
				</form>
 					
 			</div>
 			
		<?php } ?>

	</div>
 		
 	</div>

 </div>

	

	<?php require_once('layout/footer.php') ?>


