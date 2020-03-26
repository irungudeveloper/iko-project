<?php 

	require_once('../config/join_class.php');

	session_start();
	$u_id = $_SESSION['u_id'];

	$chart = new Join;

	$data = $chart->fetchMonthSales($u_id);

	echo json_encode($data);

 ?>