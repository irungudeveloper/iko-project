<?php 

	require_once('config/order_class.php');

	$order = new Order;

	$data = $order->displayCustomerOrder();

 ?>

 <?php require_once('layout/navbar.php') ?>

 <?php require_once('layout/sidebar.php') ?>

 	<div class="col-md-9 col-sm-12">

 		<div class="row">

 			<table class="table">
 		
		 		<thead class="thead-light">
		 			<th scope="col">Title</th>
		 			<th scope="col">Price</th>
		 			<th scope="col">Amount</th>
		 			<th scope="col">Status</th>
		 		</thead>

		 		<tbody class="table-striped">
		 			
		 			<?php 

		 				foreach ($data as $order) 
		 				{

		 				?>

		 				<tr>
		 					<td><?php echo $order->title ?></td>
		 					<td><?php echo $order->price ?></td>
		 					<td><?php echo $order->amount ?></td>
		 					
		 						<?php 

		 							$status = $order->status;

		 							echo ($status == 1) ? "<td><button class='btn btn-success p-1 pl-3 pr-3 disabled'>DELIVERED</button></td>" : "<td><button class='btn btn-warning p-1 pl-3 pr-3 disabled'>PENDING</button></td>";

		 						 ?>	
		 					
		 				</tr>

		 			<?php
		 				}

		 			 ?>

		 		</tbody>

 			</table>
 			
 		</div>
 		
 	</div>
 
 </div>

 <?php require_once('layout/footer.php') ?>
 
