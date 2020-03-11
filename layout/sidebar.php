
<?php 

require_once('config/category_class.php');

	$category = new Category;
	$category_data = $category->displayCategory();

?>

<div class="row m-0 p-0">

	<div class="col-md-2 d-sm-none d-md-block">

		<ul class="list-group list-group-flush">

		<?php foreach ($category_data as $category) { ?>
			
			<li class="list-group-item" id="<?php echo $category->id ?>"><?php echo $category->name ?></li>

		<?php } ?>
		
		</ul>

	</div>
		
	