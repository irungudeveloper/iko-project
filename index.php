<style>
	
	.card:hover
	{
		box-shadow: 0px 5px 5px gray;
	}

</style>

<?php 

	require_once('config/product_class.php');

	$product = new Product;
	$data = $product->displayAllProduct();

 ?>


 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<div class="col-md-10 col-12 col-sm-12">

 		<div class="row p-2">
 			
 			<div class="col-md-12 d-sm-none d-md-block">
 				
 				<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner" style="height: 350px;">
				    <div class="carousel-item active">
				      <img src="images/iko_carousel.png" class="d-block w-100" alt="...">
				    </div>
				    <div class="carousel-item">
				      <img src="images/iko_carousel_2.png" class="d-block w-100" alt="...">
				    </div>
				    <div class="carousel-item">
				      <img src="images/iko_carousel_3.png" class="d-block w-100" alt="...">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>

 			</div>

 		</div>

 		<div class="row p-3 m-2 bg-white ">

 		<div class="col-md-12">
 			<p class="h4 font-weight-bold">Recent Products & Services</p>
 		</div>

 		<div class="row">
 			
 				
 			
 		

 		<?php foreach ($data as $product) { ?>

 			<div class="col-md-3 col-sm-12 col-12">
 			<div class="card m-3 col-sm-12 col-12">
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
 			
		<?php } ?>

	</div>
 		</div>
 	</div>

 </div>

	

	<?php require_once('layout/footer.php') ?>


