<?php 

	require_once('database_class.php');

	/**
	 * 
	 */
	class Category extends Database
	{
		
		private $pdo;
		private $con;

		function __construct()
		{

			$this->pdo = new Database;
			$this->con = $this->pdo->connect();

			return $this->con;

		}

		public function insertCategory($category,$desc)
		{

			$sql = "INSERT INTO categories(name,description) VALUES (:name,:description)";

			try 
			{
			
				$con = $this->con;

				$stmt = $con->prepare($sql);
				$stmt->execute([

						'name'=>$category,
						'description'=>$desc

					]);

				return true;

			} 
			catch (Exception $e) 
			{
				
				return false;

			}

		}

		public function displayCategory()
		{

			$sql = "SELECT * FROM categories";

			try 
			{

				$con = $this->con;

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

		public function deleteCategory($id)
		{

			$sql = "DELETE FROM categories WHERE id = :id";

			try 
			{

				$con = $this->con;

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

		public function editCategory($id)
		{

			$sql = "SELECT * FROM categories WHERE id = :id";

			try 
			{
				
				$con = $this->con;

				$stmt = $con->prepare($sql);

				$stmt->execute([

						'id' => $id

					]); 

				$data = $stmt->fetchAll();

				return $data; 

			} 
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function updateCategory($id,$category,$desc)
		{

			$sql = "UPDATE categories SET name = :name , description = :description WHERE id = :id";

			try 
			{
			
				$con = $this->con;

				$stmt = $con->prepare($sql);

				$stmt->execute([

						'id' => $id,
						'name' => $category,
						'description' => $desc

					]);

				return true;

			} 
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		
	}

 ?>