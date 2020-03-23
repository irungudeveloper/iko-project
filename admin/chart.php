
<?php 

	session_start();

	require_once('../config/join_class.php');

	$chart = new Join;
	$u_id = $_SESSION['u_id'];

	$data = $chart->fetchProductSales($u_id);

	echo json_encode($data);

 ?>
