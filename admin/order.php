 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<?php 

	require_once('../config/order_class.php');
	require_once('../config/join_class.php');

	$u_id = $_SESSION['u_id'];

	$order = new Order;
	$join = new Join;
	$data = $join->fetchOrders($u_id);


	if (isset($_POST['delivered'])) 
	{
	
		$id = $_POST['id'];
		$status = 1;
		$order->deliveryStatus($id,$status);

		header('Location:order.php');

	}

	 ?>


 	<div class="col-md-10 col-sm-12">

 		<div class="row bg-white m-3 p-4">
 			
 			<p class="display-4 text-danger">Your Orders</p>

 			<table class="table table-striped table-responsive-sm">
 		
		 		<thead class="thead-light">
		 			<th scope="col">Customer Name</th>
		 			<th scope="col">Customer Contact</th>
		 			<th scope="col">Product</th>
		 			<th scope="col">Price</th>
		 			<th scope="col">Amount</th>
		 			<th scope="col">Status</th>
		 		</thead>
		 		
		 		<tbody>
		 		
		 			<?php 

		 				foreach ($data as $order) 
		 				{
		 				
		 			?>
		 			
		 				<tr>
		 					<td><?php echo $order->fname." ".$order->lname ?></td>
		 					<td><?php echo $order->email ?></td>
		 					<td><?php echo $order->title ?></td>
		 					<td><?php echo $order->price ?></td>
		 					<td><?php echo $order->amount ?></td>
		 					<td>
		 						<?php 

		 						$status = $order->status;

		 						if ($status == 1) { ?>
		 							
		 							<button class="btn btn-success">DELIVERED</button>

		 						<?php } else{ ?>  

		 							<form action="order.php" method="post">

		 					 		<input type="hidden" name="id" value="<?php echo $order->o_id?>">

		 					 		<input type="submit" name="delivered" value="PENDING" class="btn btn-warning p-1 pl-3 pr-3">
		 					 		
		 					 	</form>

		 					 <?php }?></td>

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