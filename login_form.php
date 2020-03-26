<style>
	
	.content
	{
		min-height: 100vh; 
	}

</style>

<?php require_once('layout/navbar.php') ?>

		<div class="col-md-12 col-sm-12 content">

			<?php 

			if (!empty($_GET['message'])) 
				{
					$message = $_GET['message']; ?>

					<div class="row">
						<div class="col-md-12 alert alert-danger">
							Invalid Email Or Password
						</div>
					</div>

				<?php } ?>
 		

 		<p class="text-center pt-3 text-danger">* Log In Details</p>
 		<div class="row justify-content-center">
 			
 			<form action="login.php" method="post" class="bg-light p-4 m-2">

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