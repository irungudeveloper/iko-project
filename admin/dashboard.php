<?php 
	
	require_once('../config/product_class.php');
	require_once('../config/order_class.php');

	$product_data = new Product;
	$order_data = new Order;

	$product_count = $product_data->productCount();
	$order_count = $order_data->pendingCount();

 ?>

<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php') ?>

	<div class="col-md-10 col-sm-12">

			<div class="row justify-content-center">

				<div class="card col-md-3 bg-primary m-2">
					<div class="card-body">
						<h5 class="text-white font-weight-bold ">Products In Stock</h5>
						<p class="text-white float-right display-4"><?php echo $product_count ?></p>
					</div>

						<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>
					
				</div>

				<div class="card col-md-3 bg-warning m-2 ml-5">
					<div class="card-body">
						<h5 class="text-white font-weight-bold">Pending Orders</h5>
						<p class="text-white float-right display-4"><?php echo $order_count ?></p>
					</div>

					<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>

				</div>

				<div class="card col-md-3 bg-success m-2 ml-5">
					<div class="card-body">
						<h5 class="text-white">Total Sales</h5>
						<p></p>
					</div>

					<p class="float-right text-white display-5"><i class="fas fa-arrow-circle-right float-right"></i></p>
				
				</div>
				
			</div>

		<div class="row mt-2">

			<div class="col-md-6 p-0">
				
				<div class="card ml-3">

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

			<div class="col-md-5 align-self-end p-0">
				
				<div class="card bg-success">
					frtmbvrltkbm
				</div>

			</div>
			
		</div>

		</div>
		
	</div>

<?php require_once('layout/footer.php') ?>