
<?php require_once('layout/navbar.php') ?>
<?php require_once('layout/sidebar.php') ?>
<?php

 require_once('../config/join_class.php');

 $u_id = $_SESSION['u_id'];

 $sales_obj = new Join;

 $product_sales = $sales_obj->fetchProductSalesTable($u_id);

 $month_sales = $sales_obj->fetchMonthSales($u_id);

 $year_sales = $sales_obj->fetchYearSales($u_id);

 ?>

 <div class="col-md-10">
 	
 	<div class="row bg-white m-2 mt-3 p-3">

 		<p class="text-danger display-4">Your Sales</p>

 		<div class="col-md-12">

 			<form action="sales.php" method="post" class="form-inline float-right">
		      
 				<select id="select" class="form-control" name="select">
 				  
				  <option value="1">Product Sales Table</option>
				  <option value="2">Month Sales Table</option>
				  <option value="3">Yearly Sales Table</option>
				</select>

		      <button class="btn btn-success my-2 my-sm-0 ml-md-3" type="submit" name="submit">View</button>

		    </form>

 		</div>

 		<div class="col-md-12">
 			
 			<table class="table table-responsive-sm">

 				<?php if (!isset($_POST['submit'])) { ?>
 						
 					<thead class="thead-light">
 						<th scope="col">Product Name</th>
 						<th scope="col">Sold Amount</th>
 						<th scope="col">Total Sales Generated</th>
 					</thead>

 					<tbody>
 						
 						<?php foreach ($product_sales as $product) { ?>
 							
 							<tr>
 								
 								<td><?php echo $product->title ?></td>
 								<td>
 									<?php 

 										if ($product->sales == null) {
 											
 											echo "0";
 										}

 										echo $product->totals;

 								 	?>
 								 		
 								 </td>
 								<td>
 									<?php 

 										if ($product->totals == null) {
 											
 											echo "0";
 										}

 										echo $product->totals;

 								 	?>
 								 	
 								 </td>

 							</tr>
 						</tbody>
 						<?php }}elseif (isset($_POST['submit'])) { ?>

 						<?php


 						 $select = $_POST['select'];

 						 	if ($select == 2) { ?>

 						 			<thead class="thead-light">
				 						<th scope="col">Month</th>
				 						<th scope="col">Total Sales</th>
				 					</thead>
				 					<tbody>
 						 		<?php foreach ($month_sales as $product) { ?>
 						 		
 						 		
 						 			
 						 		
 						 			<tr>
 								
 								<td><?php echo $product->month ?></td>
 								<td>
 									<?php 

 										if ($product->sales == null) {
 											
 											echo "0";
 										}

 										echo $product->sales;

 								 	?>
 								 		
 								 </td>

 							</tr>
 						 			

 						 		<?php }

 						 		?>
 						 		
 						 	</tbody>	
 						 	
 						 	<?php }else
 						 		if ($select == 3) { ?>
 						 		
 						 			<thead class="thead-light">
				 						<th scope="col">Year</th>
				 						<th scope="col">Total Sales</th>
				 					</thead>

				 				<tbody>

 						 		<?php foreach ($year_sales as $product) { ?>
 						 			
 						 			<tr>
 								
 								<td><?php echo $product->year ?></td>
 								<td>
 									<?php 

 										if ($product->sales == null) {
 											
 											echo "0";
 										}

 										echo $product->sales;

 								 	?>
 								 		
 								 </td>

 							</tr>

 						 	<?php } ?>
 						</tbody>

 						<?php }else
 						if ($select == 1) { ?>
 							
 							<thead>
 						<th scope="col">Product Name</th>
 						<th scope="col">Sold Amount</th>
 						<th scope="col">Total Sales Generated</th>
 					</thead>

 					<tbody>
 						
 						<?php foreach ($product_sales as $product) { ?>
 							
 							<tr>
 								
 								<td><?php echo $product->title ?></td>
 								<td>
 									<?php 

 										if ($product->sales == null) {
 											
 											echo "0";
 										}

 										echo $product->totals;

 								 	?>
 								 		
 								 </td>
 								<td>
 									<?php 

 										if ($product->totals == null) {
 											
 											echo "0";
 										}

 										echo $product->totals;

 								 	?>
 								 	
 								 </td>

 							</tr>
 						</tbody>

 						<?php }} ?>
 						
 						<?php } ?>
 				
 			</table>

 		</div>
 		
 	</div>

 </div>
	
	</div>

<?php require_once('layout/footer.php'); ?>