<?php 

	require_once('config/user_class.php');

	$user = new user;

	$user_type = $user->getUserType();

	$target_dir = "images/";

	if (isset($_POST['submit'])) 
	{
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$type = $_POST['type'];
		$date = $_POST['date'];

		$image = $_FILES["image"]["name"];
		$target_file = $target_dir.basename($_FILES["image"]["name"]);

		move_uploaded_file($_FILES["image"]["name"], $target_dir.$image);

		$password = $_POST['password'];
		$hash = password_hash($password, PASSWORD_DEFAULT);		

		try 
		{
			$user->createUser($fname,$lname,$image,$email,$hash,$type,$date);
			return true;	
		} 
		catch (Exception $e) 
		{
			return false;
		}

	}

 ?>

 <?php require_once('layout/navbar.php')  ?>


 	<div class="col-md-12 col-sm-12">

 		

 		<p class="text-center pt-3 text-danger">* Fill In The Details In The Form</p>
 		<div class="row justify-content-center">
 			
 			<form action="create_user.php" method="post" enctype="multipart/form-data" class="bg-light p-4">

 			<div class="form-row">

 				<div class="form-group col-md-6">
 					
 					<label for="title">First Name</label>
					<input type="text" name="fname" class="form-control" id="title">

 				</div>

 				<div class="form-group col-md-6">
 					
 					<label for="title">Last Name</label>
					<input type="text" name="lname" class="form-control" id="title">

 				</div>
 				
 			</div>

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

 			<p>Profile Picture</p>

 			<div class="form-row">
 				
 				<div class="form-group col-md-12">
 					
 					<input class="form-control" type="file" name="image">

 				</div>

 			</div>

 			<div class="form-row">
 				
 				<div class="form-group col-md-12">

 					<label for="category">User Role</label>
 					<select name="type_id" id="category" class="form-control">

					<?php foreach ($data as $category) { ?>
					
						<option value="<?php echo $user_type->id ?>"><?php echo $user_type->role ?></option>

					<?php } ?>
					
					</select>
 					
 				</div>

 			</div>

			<div class="form-row">

				<div class="form-group col-md-12 text-center pt-2">

					<input type="submit" name="submit" value="Create Account" class="btn btn-success p-1 pl-5 pr-5">
					
				</div>
				
			</div>


	

		

	</form>


 		</div>
 		
 		</div>

 <?php require_once('layout/footer.php') ?>