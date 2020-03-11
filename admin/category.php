<?php 

	require_once('../config/category_class.php');

	$category = new Category;
	$data = $category->displayCategory();

 ?>

 	<?php require_once('layout/navbar.php') ?>

 	<?php require_once('layout/sidebar.php') ?>

 	<table>

 		<thead>
 			<th>Name</th>
 			<th>Description</th>
 			<th></th>
 		</thead>

 		<tbody>
 			
 			<?php foreach ($data as $category) 
 			{
 			?>

 				<tr>
 					
 					<td><?php echo $category->name ?></td>
 					<td><?php echo $category->description ?></td>
 					<td>
 						<form method="post" action="edit_category.php">
 							<input type="hidden" name="id" value="<?php echo $category->id ?>">
 							<input type="submit" name="edit" value="EDIT">
 						</form>
 					</td>
 					<td>
 						<form method="post" action="delete_category.php">
 							<input type="hidden" name="id" value="<?php echo $category->id ?>">
 							<input type="submit" name="delete" value="DELETE">
 						</form>
 					</td>
 				</tr>
 				
			<?php } ?>

 		</tbody>

 	</table>
 
 	</div>