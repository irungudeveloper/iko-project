<?php 
	
	require_once('../config/product_class.php');
	$product = new Product;
	$data = $product->displayProduct();

 ?>

 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>


 	<div class="col-md-9 col-sm-12">

 		<div class="row">

 			<table class="table table-striped">
			
				<thead class="thead-light">
					<th scope="col">Title</th>
					<th scope="col">Image</th>
					<th scope="col">Price</th>
					<th scope="col">Stock</th>
					<th scope="col">Location</th>
					<th scope="col">Description</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</thead>

				<tbody class="">

					<?php foreach ($data as $product) { ?>

					<tr>
					<td><?php echo $product->title ?></td>
					<td>
						<img src="../images/<?php echo $product->image1 ?>" height="50px" width="50px">
					</td>
					<td><?php echo $product->price ?></td>
					<td><?php echo $product->stock ?></td>
					<td><?php echo $product->location ?></td>
					<td><?php echo $product->description ?></td>
					<td>
						<form method="GET" action="product_edit.php">
							<input type="hidden" name="id" value="<?php echo $product->id?>">
							<input type="submit" name="edit" value="EDIT" class="text-white btn btn-warning p-1 pl-3 pr-3">
						</form>

					</td>
					<td>
						<form method="GET" action="product_delete.php">
							<input type="hidden" name="id" value="<?php echo $product->id?>">
							<input type="submit" name="delete" value="DELETE" class="btn btn-danger p-1 pl-3 pr-3">
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