<?php 

	require_once('database_class.php');

	class Cart extends Database
	{
		
		function __construct()
		{
			$pdo = new Database;
			$con = $pdo->connect();
		}
		
		public function insertCart($title, $price, $amount)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
		
				$sql = "INSERT INTO cart (title,price,amount) VALUES (:title,:price,:amount)";
				$stmt = $con->prepare($sql);

				$stmt->execute([

						'title'=>$title,
						'price'=>$price,
						'amount'=>$amount

					]);

				echo "Product Added";

			} 
			catch (Exception $e) 
			{
				
				echo "No Product AAdded";				

			}
				
		}

		public function displayCart()
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
			
				$sql = "SELECT * FROM cart";
				$stmt = $con->prepare($sql);

				$stmt->execute();
				$cart = $stmt->fetchAll();
			
				return $cart;

			}
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function totalSum()
		{
			

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
				
				$sql = "SELECT SUM(price*amount)FROM cart";
				$stmt = $con->prepare($sql);
				$stmt->execute();
				$data = $stmt->fetchAll();

				return $data;
				

			} 
			catch (Exception $e) 
			{
				
				return false;

			}

		}

		public function deleteSingle($id)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
			
				$sql = "DELETE FROM cart WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->execute([

						'id'=>$id

				]);

				return true;
			} 
			catch (Exception $e) 
			{

				return false;

			}

		}

		public function delete()
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{

				$sql = "DELETE FROM cart";
				$stmt = $con->prepare($sql);
				$stmt->execute();

				return true; 
				
			}
			 catch (Exception $e) 
			{
				
				return false;

			}


		}

	}

 ?>