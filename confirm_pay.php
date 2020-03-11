<?php 

	require_once('config/mpesa_utils.php');

	if (isset($_POST['confirm'])) 
	{
	
		$check = $_POST['checkID'];

		$mpesa = new mpesa_utils;

		$response = $mpesa->transactionStatus($check);

		

	}

 ?>