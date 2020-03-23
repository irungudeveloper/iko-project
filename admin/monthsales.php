<?php 

	require_once('../config/join_class.php');

	$chart = new Join;

	$data = $chart->fetchMonthSales();

	echo json_encode($data);

 ?>