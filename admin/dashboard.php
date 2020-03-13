
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
	$order_count = $order_data->pendingCount();
	$user_profile = $user_data->displayUser($u_id);

 ?>

	<div class="col-md-10 col-sm-12">

			<div class="row p-3">

				<div class="card col-md-3 bg-primary m-2 card-height">
					<div class="card-body">
						<h5 class="text-white font-weight-bold ">Products In Stock</h5>
						<p class="text-white float-right display-4">
							
							<?php //echo $product_count 

								foreach ($product_count as $prod_data) {
									echo $prod_data->totalproducts;
								}

							?>
								
						</p>
					</div>

						<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>
					
				</div>

				<div class="card col-md-3 bg-warning m-2 ml-5 card-height">
					<div class="card-body">
						<h5 class="text-white font-weight-bold">Pending Orders</h5>
						<p class="text-white float-right display-4">
								<?php 
										foreach ($order_count as $data) {
											echo $data->totalorders;
										}
								 ?>
										
						</p>
					</div>

					<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>

				</div>

				<div class="card col-md-3 bg-success m-2 ml-5 card-height">
					<div class="card-body">
						<h5 class="text-white">Total Sales</h5>
						<p></p>
					</div>

					<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>
				
				</div>
				
			</div>

		<div class="row p-3">

			<div class="col-md-6 p-0">
				
				<div class="card">

					<p class="display-5 text-center pt-3">Sales Graph</p>

					<canvas id="myChart" width="400" height="400"></canvas>
					<script>
					var ctx = document.getElementById('myChart').getContext('2d');
					var myChart = new Chart(ctx, {
					    type: 'bar',
					    data: {
					        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					        datasets: [{
					            label: '# of Votes',
					            data: [12, 19, 3, 5, 2, 3],
					            backgroundColor: [
					                'rgba(255, 99, 132, 0.2)',
					                'rgba(54, 162, 235, 0.2)',
					                'rgba(255, 206, 86, 0.2)',
					                'rgba(75, 192, 192, 0.2)',
					                'rgba(153, 102, 255, 0.2)',
					                'rgba(255, 159, 64, 0.2)'
					            ],
					            borderColor: [
					                'rgba(255, 99, 132, 1)',
					                'rgba(54, 162, 235, 1)',
					                'rgba(255, 206, 86, 1)',
					                'rgba(75, 192, 192, 1)',
					                'rgba(153, 102, 255, 1)',
					                'rgba(255, 159, 64, 1)'
					            ],
					            borderWidth: 1
					        }]
					    },
					    options: {
					        scales: {
					            yAxes: [{
					                ticks: {
					                    beginAtZero: true
					                }
					            }]
					        }
					    }
					});
					</script>
					
				</div>

			</div>

			<div class="col-md-1">
				
			</div>

			<div class="col-md-5 bg-white">
				
				<div class="row p-3">
					
					<?php foreach ($user_profile as $profile) { ?>
						
						<div class="col-md-12">

							<div class="row justify-content-center">
								<img src="images/<?php echo $profile->image ?>" height="55px" width="55px" class="rounded-circle text-center">
							</div>

						<p class="display-5">User Name : <?php echo $profile->fname ?> <?php echo $profile->lname  ?></p>
						<p class="display-5">Email : <?php echo $profile->email ?></p>
						<p class="display-5">Account Created At : <?php echo $profile->created_at ?></p>

						</div>

					<?php } ?>

				</div>

			</div>
			
		</div>

		</div>
		
	</div>

<?php require_once('layout/footer.php') ?>