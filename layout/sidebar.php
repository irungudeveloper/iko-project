
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

<div class="row m-0 p-0 d-sm-none d-none">

	<div class="col-md-2 mt-3">

		<ul class="list-group list-group-flush">

		<?php foreach ($category_data as $category) { ?>
			
			<a id="<?php echo $category->id ?>" onclick="cat_id(this.id)"><li class="list-group-item point p-2">

				<?php echo $category->name ?></li></a>
			

		<?php } ?>
		
		</ul>

	</div>

	<div class="check">
		
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		
		$(document).ready(function cat_id(clicked)
		{
			var id = clicked;

			$.ajax({

				url : 'category_view.php',
				type : 'POST',
				data : {category_id : id},
				dataType : 'json',
				success : function(data)
				{
					console.log(data);
				}

				});

		});

	</script>
		
	