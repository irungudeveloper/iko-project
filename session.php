<?php 
	
	require_once('config/user_class.php');

	session_start();
	$_SESSION['name'] = null;

	// $login = new User;

	// if (isset($_POST['submit'])) 
	// {
	// 	$email = $_POST['email'];
	// 	$password = $_POST['password'];

	// 	try 
	// 	{
			
	// 		$response = $login->userLogin($email,$password);

	// 		// $type = $login->getUserInfo($response);

	// 		// foreach ($type as $user_info) 
	// 		// {
	// 		// 	$_SESSION['name'] = $user_info->fname;

	// 		// 	if ($user_info->type_id == 1) 
	// 		// 	{

	// 		// 		header('Location:admin/dashboard.php');
	// 		// 	}else
	// 		// 	{
	// 		// 		header('Location:index.php');
	// 		// 	}
	// 		}

	// 	} 
	// 	catch (Exception $e) 
	// 	{
	// 		return false;	
	// 	}
	// }

	// var_dump($_SESSION['name']);

 ?>
