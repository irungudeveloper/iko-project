
<style type="text/css">
	
	.side-nav
	{
		background-color: white !important;
		/*height: 100vh;*/
		padding-top: 20px;
		text-align: justify;
	}

	.side-nav li,a
	{
		text-decoration: none !important;
		list-style: none;
		font-size: 18px;
		color: black;
		padding-bottom: 10px;
		border-bottom: 1px solid-white;
		margin-left: 4px;
	}

	.content
	{
		min-height: 100vh;
	}

	li:hover
	{
		cursor: pointer;
		color: tomato;
		border-bottom: 1px solid-white;
	}

	a:hover
	{
		color: tomato;
		border-bottom: 1px solid-white;
	}

	



</style>

<div class="row m-0 p-0 content">

	<div class="col-md-2 d-sm-none d-md-block side-nav">

		<li class="pb-md-3">
			<a href="dashboard.php">
				<i class="fas fa-home"></i>
				Dashboard
			</a>
		</li>

		  <li class=""><i class="fas fa-user-alt"></i> Manage Profile</li>

		  <li class="" data-toggle="collapse" href="#productCollapse" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-shopping-cart"></i>  
		  		Products <i class="fas fa-caret-right"></i>	
		  </li>
	
		<div class="collapse" id="productCollapse">
		  
		  <li class="">
		  	<a href="product_insert.php" class="nav-link"><i class="far fa-circle"></i>  New Product</a>
		  	<a href="index.php" class="nav-link"><i class="far fa-circle"></i>  Manage Product</a>
		  </li>
		  
		
		</div>

		  <li class="">

		  	<a href="order.php" class=""><i class="fas fa-sort"></i>  Manage Orders</a>

			</li>
		  
		  <li class="">
		  	<a href="sales.php"><i class="fas fa-money-bill-wave"></i>  Manage Sales</a>
		  </li>

	</div>
	