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

				$order_sql = "INSERT INTO orders (title,price,total,amount,user_id,product_id,session_id) VALUES (:title,:price,:total,:amount,:u_id,:p_id,:sesh_id)";

				foreach ($data as $order) 
				{

					$title =  $order->title;
					$price =  $order->price;
					$total = ($order->amount)*($order->price);
					$amount = $order->amount;
					$u_id = $order->user_id;
					$p_id = $order->product_id;
					$sesh_id = $order->session_id;

					try 
					{

						$stmt = $con->prepare($order_sql);

						$stmt->execute([

							'title' => $title,
							'price' => $price,
							'total' => $total,
							'amount' => $amount,
							'u_id' => $u_id,
							'p_id' => $p_id,
							'sesh_id'=>$sesh_id

						]);

						$this->updateAmount($p_id,$amount);
						
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

		public function updateAmount($p_id,$amount)
		{

			$dbamount_sql = "SELECT stock FROM products WHERE id = :p_id";
			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{
			

				$stmt = $con->prepare($dbamount_sql);
				$stmt->execute([

						'p_id'=>$p_id

					]);

				$db_amount = $stmt->fetchAll();

				foreach ($db_amount as $db_data) 
				{
					$stock = $db_data->stock;
					$rem_amount = $stock - $amount;

				}

				$update_sql = "UPDATE products SET stock = :stock WHERE id = :id";

				try 
				{

					$u_stmt = $con->prepare($update_sql);
					$u_stmt->execute([

								'stock'=>$rem_amount,
								'id'=>$p_id

							]);

					return true;
					
				} 
				catch (Exception $e) 
				{
					return "Could Not Update";
				}

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

		public function pendingCount($id)
		{
			$pdo = new Database;
			$con = $pdo->connect();

			$sql = "SELECT COUNT(*) AS totalorders FROM orders WHERE status = 0 AND user_id = :id ";

			try 
			{
				$status = 1;
				$stmt = $con->prepare($sql);
				$stmt->execute([
						'id'=>$id
					]);

				$data = $stmt->fetchAll(); 

				return $data;
				
			} catch (Exception $e) 
			{
				return false;
			}
		}
		
	}

 ?>