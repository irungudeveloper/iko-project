<style type="text/css">
	
	.no-data
	{
		background-color: tomato;
	}



</style>

 	<?php require_once('layout/navbar.php') ?>
 	<?php require_once('layout/sidebar.php') ?>

 	<?php 

	require_once('config/cart_class.php');

	$session_id = "";

	if (isset($_SESSION['u_id'])) 
	
		$session_id = $_SESSION['u_id'];
	

	$cart = new Cart;
	$data = $cart->displayCart($session_id);
	$total = $cart->totalSum($session_id);
	
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
		@ header('Location : cart_view.php');

	}

 ?>

 	

 	<div class="col-md-10 col-sm-12 p-0 m-0 ">

	<div class="row p-3 bg-white m-3">
 		<p class="display-4 text-danger">Your Cart</p>

 			<table class="table table-responsive-sm ">
 			
 			<thead class="thead-light">
 				<th scope="col">Title</th>
 				<th scope="col">Image</th>
 				<th scope="col">Amount</th>
 				<th scope="col">Price</th>
 				<th scope="col">Subtotal</th>
 				<th scope="col"></th>
 			</thead>

 			<tbody>

 				<?php 

 				if ($data !=null) 
					{

 				foreach ($data as $cart) { ?>
 				
 				<tr>
 					<td><?php echo $cart->title ?></td>
 					<td>
 						<img src="images/<?php echo $cart->image ?>" width="50px" height="50px">
 					</td>
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

 							<input type="submit" name="delete" value="DELETE" class="btn btn-danger" onclick="refreshFunction()" id="delete">

 						</form>

 					</td>
 				</tr>

 			<?php } } else{ ?>

 					<td colspan="6" class="text-center text-white bg-danger" >No Items In Your Cart</td>

 			<?php } ?>

 			<?php if (!isset($_SESSION['name'] ))  { ?>
 				
 				<tr>
 					<td>You Need To Sign In To Checkout</td>
 				</tr>

 			<?php }else{ ?>

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

 				<?php } ?>

 			</tbody>

 		</table>

 		</div>
 		
 	</div>

 	</div>

 	<?php require_once('layout/footer.php') ?>