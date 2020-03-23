<?php 

	require_once('database_class.php');

	/**
	 * 
	 */
	class Sale extends Database
	{
		
		private $pdo;
		private $con

		function __construct()
		{
			
			$this->pdo = new Database;
			$this->con = $this->pdo->connect();

			return $this->con; 

		}

		function totalSale($id)
		{
			$con = $this->con;
			$sql = "SELECT SUM(total) AS total_sale FROM orders WHERE user_id = :id";

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
	}

 ?>