<?php 

	require_once('config/product_class.php');

	$product = new Product;

	if (isset($_GET['view'])) 
	{
	
		$id = $_GET['id'];

		$data = $product->editProduct($id);

	}

 ?>


 <?php require_once('layout/navbar.php') ?>

 <?php require_once('layout/sidebar.php') ?>

 	<div class="col-md-9 col-sm-12">

 		<div class="row">

 			<?php foreach ($data as $product) { ?>

 				<div class="m-2">
 					 
			<form method="post" action="cart_insert.php">

				<input type="hidden" name="title" value="<?php echo $product->title ?>">
				<input type="hidden" name="price" value="<?php echo $product->price ?>">

				<input type="hidden" name="id" value="<?php echo $product->id ?>">


				<div class="card">

					<div class="row no-gutters">
						
						<div class="col-md-5">
							
							<img src="images/<?php echo $product->image1?>" class="card-img">

						</div>

						<div class="col-md-7">

							<div class="card-body">
								
								<h5 class="card-title"><b class="mb-3">Title</b> <br><?php echo $product->title ?></h5>

								<p><b>Description</b> <br>
									<?php echo $product->description ?>
								</p>
								<p class="card-text">Price : <?php echo $product->price ?>/=</p>

								<div class="form-row">


					<div class="form-group">
						
						<label for="amount">AMOUNT</label>
						<input type="number" name="amount" class="form-control" id="amount">

					</div>
					</div>

					<div class="form-row">

						<div class="form-group">

							<input type="submit" name="cart" value="ADD TO CART" class="btn btn-success p-1 pl-3 pr-3">
							
						</div>
						
					</div>

					
					
				

							</div>
							
						</div>

					</div>
					
				</div>

			</form>

			</div>

	<?php } ?>
 			
 		</div>
 		
 	</div>

 	</div>

 	<?php require_once('layout/footer.php'); ?>