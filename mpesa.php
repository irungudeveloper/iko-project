<?php 

	require_once('config/mpesa_utils.php');

	if (isset($_POST['mpesa_pay'])) 
	{

		$telephone = $_POST['telephone'];
		$amount = 4 ;

		// echo $amount;

		$mpesa = new mpesa_utils;
		$response = $mpesa->onlineCheckout($telephone,$amount);

		$checkID = $response['CheckoutRequestID'];



	}

	echo $checkID;

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>IKO | HOME </title>
 </head>
 <body>

 	<form action="confirm_pay.php" method="post">
 		<input type="hidden" name="checkID" value="<?php echo $checkID ?>">
 		<input type="submit" name="confirm">

 	</form>
 
 </body>
 </html>