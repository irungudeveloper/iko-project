<style type="text/css">
  
  nav
  {
    background-color: #E0EEEE !important;
  }

  a
  {
    font-size: 18px;
  }

  a:hover
  {
    color: tomato !important;
  }

  form
  {
    margin-top: 10px;
  }

  .brand-img
  {
    border-radius: 40%;
    height: 80px !important;
    width: 80px !important; 
  }

</style>

<?php require_once('header.php') ?>

<?php 

	require_once('config/category_class.php');
  
	$category_object = new Category;
	$category_data = $category_object->displayCategory();

 ?>

<div class="row m-0 p-0">

	<div class="col-12 m-0 p-0">

		<nav class="navbar navbar-expand-lg navbar-light pb-md-3 pt-md-3">
  <a class="navbar-brand" href="#">
  		
  		<img src="images/iko_logo.png" width="100" height="100" alt="" class="brand-img">

  		IKO
	</a>

  <form action="search.php" method="POST" class="form-inline d-md-none d-sm-block d-block">
      <input class="form-control pl-5 pr-5" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-success d-none d-sm-none d-md-block" type="submit" name="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse ml-md-5" id="navbarSupportedContent">
    <ul class="navbar-nav mr-md-5">
      <li class="nav-item ml-md-4">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown ml-md-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php foreach ($category_data as $category) { ?>
        
        	<a class="dropdown-item" href="category_view.php?category_id=<?php echo $category->id ?>&category=<?php echo $category->name?>"><?php echo $category->name ?></a>
        
        <?php } ?>
        </div>

      </li>
     
    </ul>
    <form action="search.php" method="POST" class="form-inline d-sm-none d-none d-md-block">
      <input class="form-control pl-5 pr-5" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-success my-2 my-sm-0 ml-md-3" type="submit" name="search_btn"><i class="fa fa-search" aria-hidden="true"></i>
</button>
    </form>

    <ul class="navbar-nav ml-auto">

    	<li class="nav-item">
			<a href="cart_view.php" class="nav-link mr-3"><i class="fas fa-shopping-cart"></i> Cart</a>   		
	   	</li>

      <?php if (isset($_SESSION['type_id'] )) {

        if ($_SESSION['type_id'] == 1) { ?>
     
        <li class="nav-item">
              <a href="admin/dashboard.php" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>      
            </li>

    <?php } } ?>

       <?php if (!isset($_SESSION['u_id'])) { ?>
           <li class="nav-item">
              <a href="create_user.php" class="nav-link">SIGN UP</a>      
            </li>

            <li class="nav-item d-none d-sm-none ">
               <a href="#" class="nav-link">|</a>
            </li>
              
            <li class="nav-item">
               <a href="login_form.php" class="nav-link">LOG IN</a>
            </li>
       <?php } else { ?>
               <li class="nav-item active mr-md-4">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> LOG OUT</a>
              </li>
      <?php } ?>

    	

    </ul>

  </div>
</nav>
		
	</div>
	
</div>
