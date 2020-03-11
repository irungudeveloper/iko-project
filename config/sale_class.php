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
	}

 ?>