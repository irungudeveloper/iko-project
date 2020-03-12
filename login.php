
<?php 

	require_once('config/user_class.php');

	$login = new User;

	if (isset($_POST['submit'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		try 
		{
			
			$response = $login->userLogin($email,$password);

			$type = $login->getUserInfo($response);

			foreach ($type as $user_info) 
			{
		
				if ($user_info->type_id == 1) 
				{
					header('Location:admin/dashboard.php');
				}else
				{
					header('Location:index.php');
				}

			} 
		}
		catch (Exception $e) 
		{
			echo "ERRORRRRRRRRRRRRR";	
		}
	}


 ?>


<?php require_once('layout/navbar.php') ?>

		<div class="col-md-12 col-sm-12">

 		

 		<p class="text-center pt-3 text-danger">* Log In Details</p>
 		<div class="row justify-content-center">
 			
 			<form action="login.php" method="post" class="bg-light p-4">

 			<div class="form-row">
 				
 				<div class="form-group col-md-12">
 					
 					<label for="stock">Email</label>
					<input type="email" name="email" class="form-control" id="stock">

 				</div>

 				<div class="form-group col-md-12">
 						
					<label for="price">Password</label>
					<input type="password" name="password" class="form-control" id="price">


 				</div>

 			</div>


			<div class="form-row">

				<div class="form-group col-md-12 text-center pt-2">

					<input type="submit" name="submit" value="Log In" class="btn btn-success p-1 pl-5 pr-5">
					
				</div>
				
			</div>


	

		

	</form>


 		</div>
 		
 		</div>

<?php require_once('layout/footer.php') ?>