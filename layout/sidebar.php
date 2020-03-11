
<?php 

require_once('config/category_class.php');

	$category = new Category;
	$category_data = $category->displayCategory();

?>

<style type="text/css">
	
	.bg-set
	{
		background-color: #f5f5f5 !important;
	}

	li
	{
		text-align: center;
		font-size: 18px;
	}

	li.pointer
	{
      cursor: pointer;
    }

    li:hover
    {
    	color: tomato;
    }

    a
    {
    	text-decoration:none !important;
    	color: black;
    }

</style>

<div class="row m-0 p-0">

	<div class="col-md-2 d-sm-none d-md-block mt-3">

		<ul class="list-group list-group-flush">

		<?php foreach ($category_data as $category) { ?>
			
			<a href=""><li class="list-group-item point" id="<?php echo $category->id ?>">

				<?php echo $category->name ?></li></a>
			

		<?php } ?>
		
		</ul>

	</div>

	<div class="check">
		
	</div>
		
	