
<style>
	
	.card-height
	{
		height: 155px !important;
	}

</style>



<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php') ?>

<?php 
	
	require_once('../config/product_class.php');
	require_once('../config/order_class.php');
	require_once('../config/user_class.php');

	$product_data = new Product;
	$order_data = new Order;
	$user_data = new User;
	$u_id = $_SESSION['u_id'];

	$product_count = $product_data->productCount($u_id);
	$order_count = $order_data->pendingCount($u_id);
	$user_profile = $user_data->displayUser($u_id);

 ?>

	<div class="col-md-10 col-sm-12">

			<div class="row p-3">

				<div class="card col-md-3 bg-primary m-2 card-height col-sm-12">
					<div class="card-body">
						<h5 class="text-white font-weight-bold text-wrap">Products In Stock</h5>
						<p class="text-white float-right display-4 text-wrap">
							
							<?php //echo $product_count 

								foreach ($product_count as $prod_data) {
									echo $prod_data->totalproducts;
								}

							?>
								
						</p>
					</div>

						<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>
					
				</div>

				<div class="card col-md-3 bg-warning m-2 ml-md-5 card-height col-sm-12">
					<div class="card-body">
						<h5 class="text-white font-weight-bold text-wrap">Pending Orders</h5>
						<p class="text-white float-right display-4 text-wrap">
								<?php 
										foreach ($order_count as $data) {
											echo $data->totalorders;
										}
								 ?>
										
						</p>
					</div>

					<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>

				</div>

				<div class="card col-md-3 bg-success m-2 ml-md-5 card-height">
					<div class="card-body">
						<h5 class="text-white text-wrap">Total Sales</h5>
						<p></p>
					</div>

					<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>
				
				</div>
				
			</div>

		<div class="row p-3">

			<div class="col-md-6 p-1">
				
				<div class="card p-4">

					<p class="display-5 text-center pt-3">Product Sales Graph</p>

					<canvas id="myChart"></canvas>
					
				</div>

			</div>

			<div class="col-md-6 p-1 ">
				
				<div class="card p-4">

					<p class="display-5 text-center pt-3">Monthly Sales Graph</p>

					<canvas id="myChart2" ></canvas>
					
				</div>

			</div>
			
		</div>

		</div>
		
	</div>

<?php require_once('layout/footer.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="chart.js"></script>
<script type="text/javascript" src="chart_month.js"></script>