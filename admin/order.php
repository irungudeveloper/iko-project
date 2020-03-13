 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<?php 

	require_once('../config/order_class.php');

	$u_id = $_SESSION['u_id'];

	$order = new Order;
	$data = $order->displayOrder($u_id);


	if (isset($_POST['delivered'])) 
	{
	
		$id = $_POST['id'];
		$status = 1;
		$order->deliveryStatus($id,$status);

		header('Location:order.php');

	}

	 ?>


 	<div class="col-md-9 col-sm-12">

 		<div class="row">
 			
 			<table class="table table-striped">
 		
		 		<thead class="thead-light">
		 			<th scope="col">Title</th>
		 			<th scope="col">Price</th>
		 			<th scope="col">Amount</th>
		 			<th scope="col">Status</th>
		 			<th scope="col"></th>
		 		</thead>
		 		
		 		<tbody>
		 		
		 			<?php 

		 				foreach ($data as $order) 
		 				{
		 				
		 			?>
		 			
		 				<tr>
		 					
		 					<td><?php echo $order->title ?></td>
		 					<td><?php echo $order->price ?></td>
		 					<td><?php echo $order->amount ?></td>
		 					<td><?php 

		 						$status = $order->status;

		 						echo ($status == 1) ? "DELIVERED" : "PENDING";

		 					 ?></td>
		 					 <td>
		 					 	<form action="order.php" method="post">

		 					 		<input type="hidden" name="id" value="<?php echo $order->id?>">

		 					 		<input type="submit" name="delivered" value="Delivered" class="btn btn-success p-1 pl-3 pr-3">
		 					 		
		 					 	</form>
		 					 </td>

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