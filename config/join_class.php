<?php 

	require_once('database_class.php');

	/**
	 * 
	 */
	class Join extends Database
	{

		private $pdo;
		private $connect;
		
		function __construct()
		{
			$this->pdo = new Database;
			$this->connect = $this->pdo->connect();

			return $this->connect;
		}

		function fetchOrders($id)
		{
			$con = $this->connect;

			$sql = "SELECT orders.id AS o_id,orders.title,orders.price,orders.amount,orders.status, users.id AS u_id , users.fname,users.lname,users.email FROM orders LEFT JOIN users ON orders.session_id=users.id WHERE orders.user_id =:id";

			try 
			{
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

		function fetchProductSales($id)
		{
			$con = $this->connect;

			$sql = "SELECT b.title,sum(a.amount) AS sales FROM `orders` a RIGHT JOIN products b on a.product_id = b.id WHERE b.user_id=:id group by b.id";

			try 
			{
				$stmt = $con->prepare($sql);
				$stmt->execute(['id'=>$id]);
				$data = $stmt->fetchAll();

				return $data;

			} 
			catch (Exception $e) 
			{
				return false;
			}

			} 


		function fetchMonthSales()
		{
			$con = $this->connect;

			$sql = "SELECT sum(total) AS sales,MONTHNAME(created_at)AS month FROM orders group by MONTH(created_at)";

			try 
			{
				
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
			
		}

 ?>