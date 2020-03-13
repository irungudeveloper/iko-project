<?php 

	require_once('database_class.php');

	/**
	 * 
	 */
	class Order extends Database
	{
		
		public function insertOrder()
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{

				$cart_sql = "SELECT * FROM cart";
				$stmt = $con->prepare($cart_sql);
				$stmt->execute();
				$data = $stmt->fetchAll();

				$order_sql = "INSERT INTO orders (title,price,total,amount,user_id) VALUES (:title,:price,:total,:amount,:u_id)";

				foreach ($data as $order) 
				{

					$title =  $order->title;
					$price =  $order->price;
					$total = ($order->amount)*($order->price);
					$amount = $order->amount;
					$u_id = $order->user_id;

					try 
					{

						$stmt = $con->prepare($order_sql);

						$stmt->execute([

							'title' => $title,
							'price' => $price,
							'total' => $total,
							'amount' => $amount,
							'u_id' => $u_id

						]);
						
					} 
					catch (Exception $e) 
					{

						return false;
						
					}

				}

				return true;
				
			} 
			catch (Exception $e) 
			{
			
				return false;

			}

		}

		public function displayOrder($id)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{

				$sql = "SELECT * FROM orders WHERE user_id = :id";
				$stmt = $con->prepare($sql);
				$stmt->execute([

							'id'=>$id
							
						]);
				$data = $stmt->fetchAll();

				return $data;
				
			} 
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function displayCustomerOrder()
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
			
				$sql = "SELECT * FROM orders";
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

		public function deliveredOrder()
		{

			$pdo = new Database;
			$con = $pdo->connect();

			$sql = "SELECT * FROM orders WHERE status = 1";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			$data = $stmt->fetchAll();

			return $data;

		}

		public function pendingOrder()
		{

			$pdo = new Database;
			$con = $pdo->connect();

			$sql = "SELECT * FROM orders WHERE status = 0";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			$data = $stmt->fetchAll();

			return $data;

		}

		public function deliveryStatus($id,$status)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{

				$sql = "UPDATE orders SET status = :status WHERE id = :id";
				$stmt = $con->prepare($sql); 
				$stmt->execute([

					'status'=>$status,
					'id'=>$id

				]); 
				
			} 
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function pendingCount()
		{
			$pdo = new Database;
			$con = $pdo->connect();

			$sql = "SELECT COUNT(*) AS totalorders FROM orders WHERE status = 0 ";

			try 
			{
				$status = 1;
				$stmt = $con->prepare($sql);
				$stmt->execute();

				$data = $stmt->fetchAll(); 

				return $data;
				
			} catch (Exception $e) 
			{
				return false;
			}
		}
		
	}

 ?>