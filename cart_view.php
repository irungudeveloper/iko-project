<?php 

	require_once('config/cart_class.php');
	// require_once('config/order_class.php');

	$cart = new Cart;
	$data = $cart->displayCart();
	$total = $cart->totalSum();
	// $oder = new Order;

	//print_r($total);

	foreach ($total as $value) 
	{
		
		$val = json_encode($value);
		echo"<br>";
		$dec = json_decode($val,TRUE);
		$real = array_keys($dec);
		$key = array_key_exists("SUM(price*amount)", $dec);
		//var_dump($key);

		 $total = $dec["SUM(price*amount)"];

	}

	if (isset($_POST['delete'])) 
	{

		$id = $_POST['product_id'];
	
		$delete = $cart->deleteSingle($id);
		header('Location:cart_view.php');

	}

 ?>

 	
 	<?php require_once('layout/navbar.php') ?>
 	<?php require_once('layout/sidebar.php') ?>

 	<div class="col-md-9 col-sm-12 m-2">

 		<div class="row">

 			<table class="table">
 			
 			<thead class="thead-light">
 				<th scope="col">Title</th>
 				<th scope="col">Amount</th>
 				<th scope="col">Price</th>
 				<th scope="col">Subtotal</th>
 				<th scope="col"></th>
 			</thead>

 			<tbody char="table-striped">

 				<?php foreach ($data as $cart) { ?>
 				
 				<tr>
 					<td><?php echo $cart->title ?></td>
 					<td><?php echo $cart->amount ?></td>
 					<td><?php echo $cart->price ?></td>

 					<td>
 						<?php 

 							$subamount = ($cart->price)*($cart->amount);


 							echo $subamount;

 						 ?> 	
 					</td>
 					<td>

 						<form action="cart_view.php" method="post">
 							
 							<input type="hidden" name="product_id" value="<?php echo $cart->id; ?>">

 							<input type="submit" name="delete" value="DELETE" class="btn btn-danger ">

 						</form>

 					</td>
 				</tr>

 			<?php } ?>

 				<tr>
 					<td colspan="4">
 						<p>
 							TOTAL : <?php echo $total ?>
 						</p>
 					</td>

 					<td colspan="1">

 							<form action="checkout.php" method="POST">

				 				<input type="submit" name="checkout" value="CHECKOUT" class="btn btn-success">

				 			</form>

 					</td>

 				</tr>

 			</tbody>

 		</table>

 		</div>
 		
 	</div>

 		

 	</div>

 	<?php require_once('layout/footer.php') ?>

 