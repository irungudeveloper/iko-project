<?php 
	
	require_once('config/user_class.php');

	session_start();
	
	echo $_SESSION['type_id'];

	if ($_SESSION['type_id'] == 1) 
	{
		header('Location:admin/dashboard.php');
	}else
	{
		header('Location:index.php');
	}

	
 ?>
