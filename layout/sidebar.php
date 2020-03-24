
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

    .content
    {
    	min-height: 100vh;
    }

</style>

<div class="row m-0 p-0 mt-3 content">

	<div class="col-md-2 mt-3 d-sm-none d-md-block d-none">

		<ul class="list-group list-group-flush">

		<?php foreach ($category_data as $category) { ?>
			
			<a id="<?php echo $category->id ?>" onclick="this.id" href="category_view.php?category_id=<?php echo $category->id ?>&category=<?php echo $category->name?>"><li class="list-group-item point p-2">

				<?php echo $category->name ?></li></a>
			

		<?php } ?>
		
		</ul>

	</div>

	<div class="check">
		
	</div>



