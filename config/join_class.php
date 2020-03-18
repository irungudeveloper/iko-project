<?php 

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
	}

 ?>