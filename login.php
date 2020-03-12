
<?php 

	require_once('config/user_class.php');

	$login = new User;

	session_start();

	$_SESSION['name'] = null;
	$_SESSION['u_id'] = null;
	$_SESSION['profile'] = null;
	$_SESSION['type_id'] = null;

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
		
				$_SESSION['name'] = $user_info->fname;
				$_SESSION['u_id'] = $user_info->id;
				$_SESSION['profile'] = $user_info->image;
				$_SESSION['type_id'] = $user_info->type_id;

			} 

			header('Location:session.php');
		}
		catch (Exception $e) 
		{
			return false;
		}
	}

	var_dump($_SESSION['name']);

 ?>