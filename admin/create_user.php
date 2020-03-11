<?php 

	require_once('../config/user_class.php');

	$user = new user;
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

 <?php require_once('../layout/navbar.php')  ?>
 <?php require_once('../layout/sidebar.php') ?>


 <?php require_once('layout/footer.php') ?>