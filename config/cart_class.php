<?php 

	require_once('database_class.php');

	class Cart extends Database
	{
		
		function __construct()
		{
			$pdo = new Database;
			$con = $pdo->connect();
		}
		
		public function insertCart($title, $price, $amount, $u_id, $p_id, $sess_id, $image)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
		
				$sql = "INSERT INTO cart (title,price,amount,user_id,product_id,session_id,image) VALUES (:title,:price,:amount,:u_id,:p_id,:sess_id,:image)";
				$stmt = $con->prepare($sql);

				$stmt->execute([

						'title'=>$title,
						'price'=>$price,
						'amount'=>$amount,
						'u_id'=>$u_id,
						'p_id'=>$p_id,
						'sess_id'=>$sess_id,
						'image'=>$image

					]);

				echo "Product Added";

			} 
			catch (Exception $e) 
			{
				
				echo "No Product AAdded";				

			}
				
		}

		public function displayCart($sess_id)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
			
				$sql = "SELECT * FROM cart WHERE session_id=:s_id";
				$stmt = $con->prepare($sql);

				$stmt->execute([
						's_id'=>$sess_id
					]);
				
				$cart = $stmt->fetchAll();
			
				return $cart;

			}
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function totalSum($sess_id)
		{
			

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
				
				$sql = "SELECT SUM(price*amount)FROM cart WHERE session_id=:s_id";
				$stmt = $con->prepare($sql);
				$stmt->execute([
						's_id'=>$sess_id
					]);
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

				// return true;
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