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

				$order_sql = "INSERT INTO orders (title,price,total,amount) VALUES (:title,:price,:total,:amount)";

				foreach ($data as $order) 
				{

					$title =  $order->title;
					$price =  $order->price;
					$total = ($order->amount)*($order->price);
					$amount = $order->amount;


				
					try 
					{

						$stmt = $con->prepare($order_sql);

						$stmt->execute([

							'title' => $title,
							'price' => $price,
							'total' => $total,
							'amount' => $amount

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

		public function displayOrder()
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

			$sql = "SELECT COUNT(id) FROM orders WHERE status = 0";

			try 
			{

				$stmt = $con->prepare($sql);
				$data = $stmt->execute();

				return $data;
				
			} catch (Exception $e) 
			{
				return false;
			}
		}
		
	}

 ?>