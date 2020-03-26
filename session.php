<?php 
	
	require_once('config/user_class.php');

	session_start();
	
	echo $_SESSION['type_id'];

	if ($_SESSION['type_id'] == 1) 
	{
		header('Location:admin/dashboard.php');
	}
	else
	if ($_SESSION['type_id'] == 2) {
		header('Location:index.php');
	}
	else
	{
		header('Location:login_form.php?message=fail');
	}

	
 ?>
