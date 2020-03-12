<?php 

	require_once('config/user_class.php');

	$user = new user;

	$user_type = $user->getUserType();

	$target_dir = "admin/images/";

	if (isset($_POST['submit'])) 
	{
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$type = $_POST['type_id'];
		$date = date("Y-m-d");

		$img1 = $_FILES["image1"]["name"];
		$target_file_1 = $target_dir.basename($_FILES["image1"]["name"]);

		move_uploaded_file($_FILES["image1"]["tmp_name"], $target_dir.$img1);

		$password = $_POST['password'];
		$hash = password_hash($password, PASSWORD_DEFAULT);		

		try 
		{
			$user->createUser($fname,$lname,$img1,$email,$hash,$type,$date);
			
			header('Location : index.php');	
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
 					
 					<input class="form-control" type="file" name="image1">

 				</div>

 			</div>

 			<div class="form-row">
 				
 				<div class="form-group col-md-12">

 					<label for="category">User Role</label>
 					<select name="type_id" id="category" class="form-control">

					<?php foreach ($user_type as $type) { ?>
					
						<option value="<?php echo $type->id ?>"><?php echo $type->role ?></option>

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